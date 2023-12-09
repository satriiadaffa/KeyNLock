<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Merchant;
use App\Models\Customer;

class LoginController extends Controller
{
    public function index(){
        return view('Login',[
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request){
        
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            $user_username = Auth::user()->userName;

            



            // $merchant_username = Merchant::where('merchant_username',$user_username)->first();
            

            
            if($role == 'customer'){
                $customer = Customer::where('customer_username',$user_username)->first();

            
                $dataCheck = $customer->actualAddress;


                $request->session()->put('customer_username', $user_username); // simpan username di dalam session

                
                if($dataCheck==Null){
                    return redirect()->route('customer-data-input');
                }else{
                    return redirect()->route('customer-dashboard');
                }
            }
            else{

                $merchant = Merchant::where('merchant_username',$user_username)->first();

            
                $dataCheck = $merchant->exp;

                $request->session()->put('merchant_username', $user_username); // simpan username di dalam session

                

                if($dataCheck==Null){
                    return redirect()->route('merchant-data-input');
                }else{
                    return redirect()->route('merchant-dashboard');
                }
                
            }

            
        } else {
            return redirect('/login')->with('loginError', 'Invalid credentials');
        }
    }

    public function logout(Request $request){

        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');

    }
}
