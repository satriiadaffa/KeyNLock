<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'merchant_username',
        'customer_username',
        'note',
        'payment_status',
        'order_status',
        'service_order',
        'total_order',
        'panggil'


    ];
}
