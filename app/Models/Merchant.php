<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Merchant extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'merchants';

    protected $fillable = [
        'merchant_name',
        'merchant_email',
        'merchant_username',
        'phoneNumber',
        'longitude',
        'latitude',
        'province',
        'regency',
        'district',
        'village',


];

    public function user()
    {
        return $this->belongsTo(User::class);
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
