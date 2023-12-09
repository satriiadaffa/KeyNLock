<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Merchant;

class OrderController extends Controller
{
    public function order(request $request,$merchant_username,$serviceItem){

        $order_price = intval(str_replace('.', '', $request->order_price));



        $customer = session('customer_username');

        $dataOrder = [
            'customer_username' => $customer,
            'merchant_username' => $merchant_username,
            'note' => null,
            'payment_status' => 'not_paid',
            'order_status' => 'belum_diterima',
            'payment_by' => 'Tunai',
            'service_order' => $serviceItem,
            'total_order' => $order_price,
            'panggil' => ($request->order_type == 'panggil') ? 1 : 0,
        ];


        Order::create($dataOrder);

        


        // redirect ke halaman customer dashboard
        return redirect()->route('customer-dashboard');
    }


    public function accOrder($order_id){

        $merchant_username = session('merchant_username');


        // $mercLoc = Merchant::where;


        Order::where('id',$order_id)
        ->update([
            'order_status' => 'diterima'
        ]);


        // redirect ke halaman customer dashboard
        return redirect()->route('order-diterima',[
            'order_id' => $order_id
        ]);
    }

    public function orderDiterima($order_id){

        $merchant_username = session('merchant_username');

        $mercLoc = Merchant::where('merchant_username', $merchant_username)->first();

        



        $order = Order::where('id',$order_id)->first();

        $orderer = $order->customer_username;

        $profile = Customer::where('customer_username',$orderer)->first();

        $custLoc = Customer::where('customer_username', $orderer)->first();


        return view('merchant.orderProgress',[
            'title' => 'Order Progress',
            'order' => $order,
            'image' => $profile->image,
            'mercLoc' => $mercLoc,
            'custLoc' => $custLoc,
        ]);
    }

    public function orderProgress($order_id){
            
        Order::where('id',$order_id)
            ->update([
            'order_status' => 'progress'
        ]);



        return redirect()->route('order-diterima',[
            $order_id => $order_id,
        ]);
    }

    public function orderSelesai($order_id){


            Order::where('id',$order_id)
            ->update([
            'order_status' => 'selesai',
            'payment_status' => 'paid'
        ]);
        return redirect()->route('merchant-dashboard');
    }


    
}
