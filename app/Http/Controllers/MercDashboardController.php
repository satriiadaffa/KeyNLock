<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Merchant;
use App\Models\Order;
use App\Models\Review;
use App\Models\User;

use Illuminate\Support\Facades\Session;

class MercDashboardController extends Controller
{
    public function index(){


        $merchant_username = session('merchant_username');
        $merchant = Merchant::where('merchant_username', $merchant_username)->firstOrFail();

        $orders = Order::where('merchant_username', $merchant_username)
                            ->get();

        $ratings = Review::where('merchant_username', $merchant_username)->get()->pluck('rating');

        $totaldata = $ratings->count();

        $sum = 0;
        foreach ($ratings as $rating) {
            $sum += $rating;
        }

        $average_rating = ($totaldata > 0) ? $sum / $totaldata : 0;



        return view('merchant.mercIndex', [
            'title' => 'Merchant Dashboard',
            'merchant' => $merchant,
            'orders' => $orders,
            'average_rating' => $average_rating,
            'review' => $totaldata
        ]);
    }

    public function orderHistoryMerchant(){

        $merchant_username = session('merchant_username');
        $merchant = Merchant::where('merchant_username', $merchant_username)->firstOrFail();

        $orders = Order::where('merchant_username', $merchant_username)
                ->where(function($query) {
                    $query->where('order_status', 'selesai')
                          ->orWhere('order_status', 'telah_direview');
                })
                ->get();

        $orderIncomes = Order::where('merchant_username', $merchant_username)
        ->where(function($query) {
                $query->where('order_status', 'selesai')
                        ->orWhere('order_status', 'telah_direview');
        })
        ->get()->pluck('total_order');
        
        $totalCusts = $orders->count();

        $totalIncome = 0;
        foreach ($orderIncomes as $income) {
            $totalIncome += $income;
        }


        return view('merchant.mercOrderHistory',[
            "title" => "Merchant Order History",
            'merchant' => $merchant,
            'orders' => $orders,
            'totalCusts' => $totalCusts,
            'totalIncome' => $totalIncome
        ]);
    }

    public function userSettingView(){

        

        $user = Auth::user()->userName;

        

        $data = User::where('userName',$user)->first();

        $address = Merchant::where('merchant_username',$user)->first();

        
        return view('merchant.mercAccountSetting',[
            "title" => "Merchant Account Settings",
            "data" => $data,
            'address' => $address
        ]);
    }

    public function userSettingStore(Request $request){

        $merchant_username = Auth::user()->userName;

        $emailSame = User::where('email', $request->email)->exists();

        if ($emailSame) {
            $validatedData = $request->validate([
                'fullName' => 'required|max:255',
                'phoneNumber' =>  'required|',
                'actualAddress' => 'required|max:255|min:5'
            ]);

            User::where('userName',$merchant_username)->update([
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

            User::where('userName',$merchant_username)->update([
                'fullName' => $validatedData['fullName'],
                'email' => $validatedData['email'],
                'phoneNumber' => $validatedData['phoneNumber'],
            ]);

        }


            Merchant::where('merchant_username',$merchant_username)->update([
                'actualAddress' => $validatedData['actualAddress'],
            ]);

        

        
        return redirect()->route('merchant-setting')->with('success','Data Berhasil Dirubah');
    }
}
