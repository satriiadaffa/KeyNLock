<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Merchant;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function sendReview(request $request,$order_id){

        $order = Order::where('id',$order_id)->first();

        $merchant_username = $order->merchant_username;
        $customer_username = $order->customer_username;


        $review = [
            'customer_username' => $customer_username,
            'merchant_username' => $merchant_username,
            'order_id' => $order_id,
            'rating' => $request->star_radio,
            'comment' => $request->rating_desc
        ];

        Review::create($review);

        Order::where('id',$order_id)
            ->update([
            'order_status' => 'telah_direview'
        ]);


        return redirect()->route('customer-dashboard');
    }
}
