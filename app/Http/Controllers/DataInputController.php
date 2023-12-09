<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\Customer;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class DataInputController extends Controller
{
    public function DataMerchant(){
        $username = session('merchant_username');
        $merchant = Merchant::where('merchant_username', $username)->firstOrFail();

        
        $provinces = Province::all();

        return view('merchant.mercDataInput',[
        'title' => 'Merchant Edit',
        'merchant' => $merchant,
        'provinces' => $provinces,
        ]);
    }

    public function getRegencyMerchant(request $request){

        $idProvinsi = $request->id_provinsi;

        $regencies = Regency::where('province_id', $idProvinsi)->get();

        $option = "<option>Pilih Kota/Kabupaten...</option>";

        foreach($regencies as $regency){
            $option.="<option value='$regency->id'>$regency->name</option>";
        }

        echo $option;

    }

    public function getDistrictMerchant(request $request){


        

        $idKota = $request->id_kota;

        $districts = District::where('regency_id', $idKota)->get();

        $option = "<option>Pilih Kecamatan...</option>";

        foreach($districts as $district){
            $option.= "<option value='$district->id'>$district->name</option>";
        }
        echo $option;
    }

    public function getVillageMerchant(request $request){


        

        $idKecamatan = $request->id_kecamatan;

        $villages = Village::where('district_id', $idKecamatan)->get();

        $option = "<option>Pilih Kelurahan/Desa...</option>";

        foreach($villages as $village){
            $option.= "<option value='$village->id'>$village->name</option>";
        }
        echo $option;
    }

    public function getRegencyCustomer(request $request){

        $idProvinsi = $request->id_provinsi;

        $regencies = Regency::where('province_id', $idProvinsi)->get();

        $option = "<option>Pilih Kota/Kabupaten...</option>";

        foreach($regencies as $regency){
            $option.="<option value='$regency->id'>$regency->name</option>";
        }

        echo $option;

    }

    public function getDistrictCustomer(request $request){


        

        $idKota = $request->id_kota;

        $districts = District::where('regency_id', $idKota)->get();

        $option = "<option>Pilih Kecamatan...</option>";

        foreach($districts as $district){
            $option.= "<option value='$district->id'>$district->name</option>";
        }
        echo $option;
    }

    public function getVillageCustomer(request $request){


        

        $idKecamatan = $request->id_kecamatan;

        $villages = Village::where('district_id', $idKecamatan)->get();

        $option = "<option>Pilih Kelurahan/Desa...</option>";

        foreach($villages as $village){
            $option.= "<option value='$village->id'>$village->name</option>";
        }
        echo $option;
    }

    public function UpdateDataMerchant(Request $request, $merchant_username){
        $validate = $request->validate([
            'actualAddress' => 'required',
            'exp' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            
        ]);


        $id_provinsi = $validate['provinsi'];
        $id_kota = $validate['kota'];
        $id_kecamatan = $validate['kecamatan'];
        $id_kelurahan = $validate['kelurahan'];

        $namaProvinsi = ucwords(strtolower(Province::where('id', $id_provinsi)->pluck('name')->first()));
        $namaKota = ucwords(strtolower(Regency::where('id', $id_kota)->pluck('name')->first()));
        $namaKecamatan = ucwords(strtolower(District::where('id', $id_kecamatan)->pluck('name')->first()));
        $namaKelurahan = ucwords(strtolower(Village::where('id', $id_kelurahan)->pluck('name')->first()));


        $validate['exp'] = json_encode($validate['exp']);

        $validateImage = $request->image->getClientOriginalName();

        Merchant::where('merchant_username',$merchant_username)->update([
            'actualAddress' => $validate['actualAddress'],
            'exp' => $validate['exp'],
            'image' => $validateImage,
            'province'=>$namaProvinsi,
            'regency'=>$namaKota,
            'district'=>$namaKecamatan,
            'village'=>$namaKelurahan,
            'longitude' => $validate['longitude'],
            'latitude' => $validate['latitude'],
        ]);

        if($request->hasFile('image')){
        
            $request->file('image')->storeAs('public/fotoProfilMerchant/'.$request->file('image')->getClientOriginalName() );
        }

        $newData = [];
        foreach ($validate as $key => $value) {
            switch ($key) {
                case 'exp':
                    $newData['service'] = $value;
                    break;
                // tambahkan kondisi lain sesuai kebutuhan
                default:
                    $newData[$key] = $value;
                    break;
            }
        }

        unset($newData['actualAddress']);
        unset($newData['longitude']);
        unset($newData['latitude']);

        $validate = $request->validate([
            'price' => 'required',
            
        ]);

        $validate['price'] = json_encode($validate['price']);

        $newData['price'] = $validate['price'];


        Service::where('merchant_username',$merchant_username)->update([
            'service' => $newData['service'],
            'price' => $newData['price']
        ]);
        return redirect()->route('merchant-dashboard')->with('welcome-from-data-input', 'Data Tersimpan, Selamat Datang ' . $merchant_username);

    }

    public function DataCustomer(){
        $username = session('customer_username');
        $customer = Customer::where('customer_username', $username)->firstOrFail();

        $provinces = Province::all();
        return view('customer.custDataInput',[
        'title' => 'Customer Input Data',
        'customer' => $customer,
        'provinces' => $provinces,
    ]);
    }

    public function UpdateDataCustomer(Request $request, $customer_username){


        $validate = $request->validate([
            'actualAddress' => 'required',
            'image' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
    
        ]);

        
        $id_provinsi = $validate['provinsi'];
        $id_kota = $validate['kota'];
        $id_kecamatan = $validate['kecamatan'];
        $id_kelurahan = $validate['kelurahan'];

        $namaProvinsi = ucwords(strtolower(Province::where('id', $id_provinsi)->pluck('name')->first()));
        $namaKota = ucwords(strtolower(Regency::where('id', $id_kota)->pluck('name')->first()));
        $namaKecamatan = ucwords(strtolower(District::where('id', $id_kecamatan)->pluck('name')->first()));
        $namaKelurahan = ucwords(strtolower(Village::where('id', $id_kelurahan)->pluck('name')->first()));



        $validateImage = $request->image->getClientOriginalName();

        // dd($validateImage);


        Customer::where('customer_username',$customer_username)->update([
            'actualAddress' => $validate['actualAddress'],
            'image' => $validateImage,
            'province'=>$namaProvinsi,
            'regency'=>$namaKota,
            'district'=>$namaKecamatan,
            'village'=>$namaKelurahan,
            'longitude' => $validate['longitude'],
            'latitude' => $validate['latitude'],
        ]);

        if($request->hasFile('image')){
        
            $request->file('image')->storeAs('public/fotoProfilCustomer/'.$request->file('image')->getClientOriginalName() );
        }


        return redirect()->route('customer-dashboard')->with('welcome-from-data-input', 'Data Tersimpan, Selamat Datang ' . $customer_username);

    }
}
