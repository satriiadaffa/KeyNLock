<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Merchant;
use App\Models\Service;
use App\Models\Order;
use App\Models\User;
use App\Models\Review;

class CustDashboardController extends Controller
{
    public function index(){

        $allMerchants = Merchant::all();
        
        $customer_username = session('customer_username');

        $customer = Customer::where('customer_username', $customer_username)->firstOrFail();

        $order = Order::where('customer_username', $customer_username)
                        ->whereIn('order_status', ['diterima', 'progress'])
                        ->first();

        $review = Order::where('customer_username', $customer_username)
                        ->where('order_status', 'selesai')
                        ->first();



        

        if($order == !null){
            $merchant_username = $order->merchant_username;

            $orderStatus = $order->order_status;

            $merchant = Merchant::where('merchant_username', $merchant_username)->firstOrFail();

            return view('customer.custIndex', [
                'title' => 'Customer Dashboard',
                'order' => $order,
                'merchant' => $merchant,
                'orderStatus' => $orderStatus,
                'review' => $review,
                'customer' => $customer,
                'allMerchants' => $allMerchants
            ]);

        }
        
        if($review == !null){

            return view('customer.custIndex', [
                'title' => 'Customer Dashboard',
                'order' => $order,
                'merchant' => null,
                'orderStatus' => null,
                'review' => $review,
                'customer' => $customer,
                'allMerchants' => $allMerchants
            ]);

        }



        return view('customer.custIndex', [
            'title' => 'Customer Dashboard',
            'customer' => $customer,
            'review' => $review,
            'orderStatus' => null,
            'allMerchants' => $allMerchants
        ]);
    }

    public function search(Request $request)
    {   

        $data = $request->service;
        return redirect()->route('result',['data' => $data]);


 
    }

    public function result($data){


        $merchants = Merchant::whereJsonContains('exp', $data);

    
        $merchants = Merchant::where(function($query) use ($data) {
            $query->whereJsonContains('exp', $data);
        })
        ->whereNotNull('exp')
        ->get();
        
        if($merchants->count() > 0){
    
            $dataKosong = false;
            foreach ($merchants as $merchant) {
                $merchant->exp = json_decode($merchant->exp, true);
            }
            return view('customer.merchantList', [
                'merchants' => $merchants,
                'dataKosong' => $dataKosong,
                'title' => 'Merchant List',
                'data' => $data
            ]);
        } 
        else 
        {
            $dataKosong = true;
            
            // jika tidak ada data yang ditemukan, tampilkan pesan error atau halaman kosong
            return view('customer.merchantList', [
                'title' => 'Merchant List',
                'dataKosong' => $dataKosong,
                'merchants' => $merchants,
                'data' => $data

            ]);
        }
    
    }

    public function view($merchant){

        $merchants = Service::where('merchant_username',$merchant)->first();

        $mercLoc = Merchant::where('merchant_username',$merchant)->first();

        
        $merchants->service = json_decode($merchants->service, true);
        $merchants->price = json_decode($merchants->price, true);

        $items = array_combine($merchants->service,$merchants->price);

        
        $ratings = Review::where('merchant_username', $merchant)->get()->pluck('rating');

        $totaldata = $ratings->count();

        $sum = 0;
        foreach ($ratings as $rating) {
            $sum += $rating;
        }

        $average_rating = ($totaldata > 0) ? $sum / $totaldata : 0;



        return view('customer.merchantView',[
            'merchants' => $merchants,
            'items' => $items,
            'title' => 'Merchant',
            'mercLoc' => $mercLoc,
            'average_rating' => $average_rating,
            'review' => $totaldata
        
        ]);
    }


    public function orderHistoryCustomer(){

        $customer_username = session('customer_username');

        $orders = Order::where('customer_username', $customer_username)
                ->where(function($query) {
                    $query->where('order_status', 'selesai')
                          ->orWhere('order_status', 'telah_direview');
                })
                ->get();

        return view('customer.custOrderHistory',[
            "title" => "Customere Order History",
            'orders' => $orders
        ]);
    }


    public function userSettingView(){

        

        $user = Auth::user()->userName;

        

        $data = User::where('userName',$user)->first();

        $address = Customer::where('customer_username',$user)->first();

        
        return view('customer.custAccountSetting',[
            "title" => "Customer Account Settings",
            "data" => $data,
            'address' => $address
        ]);
    }

    public function userSettingStore(Request $request){


        $customer_username = Auth::user()->userName;


        $emailSame = User::where('email', $request->email)->exists();

        
        if ($emailSame) {
            $validatedData = $request->validate([
                'fullName' => 'required|max:255',
                'phoneNumber' =>  'required|',
                'actualAddress' => 'required|max:255|min:5'
            ]);

            User::where('userName',$customer_username)->update([
                'fullName' => $validatedData['fullName'],
                'phoneNumber' => $validatedData['phoneNumber'],
            ]);

        
        } else {
            $validatedData = $request->validate([
                'fullName' => 'required|max:255',
                'email' => 'required|email:dns|unique:users',
                'phoneNumber' =>  'required|',
                'actualAddress' => 'required|max:255|min:5'
            ]);

            User::where('userName',$customer_username)->update([
                'fullName' => $validatedData['fullName'],
                'email' => $validatedData['email'],
                'phoneNumber' => $validatedData['phoneNumber'],
            ]);

        }


            Customer::where('customer_username',$customer_username)->update([
                'actualAddress' => $validatedData['actualAddress'],
            ]);

        

        
        return redirect()->route('customer-setting')->with('success','Data Berhasil Dirubah');
    }




}

