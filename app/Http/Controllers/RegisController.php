<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Merchant;
use App\Models\Service;
use Illuminate\Support\Facades\Hash;

class RegisController extends Controller
{
    public function index(){
        return view('Regis',[
            'title' => 'Register'
        ]);
    }

    public function store(Request $request){

        $phoneNumber = str_replace("-", "", $request->phoneNumber);

        $request->merge(['phoneNumber' => $phoneNumber]);
        


        $validatedData = $request->validate([
            'fullName' => 'required|max:255',
            'userName' => 'required|max:25|min:5|unique:users',
            'email' => 'required|email:dns|unique:users',
            'phoneNumber' =>  'required|digits_between:9,14',
            'role' => 'required',
            'password' => 'required|min:5|max:20|',
            'confirmPassword' => 'required|same:password'
        ]);


        // Ubah beberapa key dalam array

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['confirmPassword'] = Hash::make($validatedData['confirmPassword']);






        // // Tambahkan buyer_id atau seller_id tergantung dari role
        if ($validatedData['role'] == 'merchant') {
            
        // Buat array baru dengan key yang sudah diubah
        $newData = [];
        foreach ($validatedData as $key => $value) {
            switch ($key) {
                case 'fullName':
                    $newData['merchant_name'] = $value;
                    break;
                case 'userName':
                    $newData['merchant_username'] = $value;
                    break;
                case 'email':
                    $newData['merchant_email'] = $value;
                    break;
                // tambahkan kondisi lain sesuai kebutuhan
                default:
                    $newData[$key] = $value;
                    break;
            }
        }

        unset($newData['role']);
        unset($newData['password']);
        unset($newData['confirmPassword']);

        $dataService = [
            'merchant_username' => $newData['merchant_username'],
            'service' => null,
            'price' => null
        ];

        
        
            
        Merchant::create($newData);

        Service::create($dataService);
    
            
    
        } else {
            $newData = [];
        foreach ($validatedData as $key => $value) {
            switch ($key) {
                case 'fullName':
                    $newData['customer_name'] = $value;
                    break;
                case 'userName':
                    $newData['customer_username'] = $value;
                    break;
                case 'email':
                    $newData['customer_email'] = $value;
                    break;
                // tambahkan kondisi lain sesuai kebutuhan
                default:
                    $newData[$key] = $value;
                    break;
            }
        }

        unset($newData['role']);
        unset($newData['password']);
        unset($newData['confirmPassword']);


        Customer::create($newData);


    }
        
        User::create($validatedData);
 

        return redirect('/login')->with('success','Registered! please Login');
    }
}
