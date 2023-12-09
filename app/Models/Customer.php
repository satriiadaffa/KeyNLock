<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';


    protected $fillable = [

        'customer_name',
        'customer_email',
        'customer_username',
        'phoneNumber',
        'province',
        'regency',
        'district',
        'village',


    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function setPhoneNumberAttribute($value)
    {
        // Menambahkan nomor kode (+62) pada awal nomor telepon jika belum ada
        if (strpos($value, '+62') !== 0) {
            $value = '+62' . $value;
        }

        $this->attributes['phoneNumber'] = $value;
    }
}
