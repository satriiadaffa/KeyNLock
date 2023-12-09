<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullName',
        'image',
        'userName',
        'email',
        'email_verified_at',
        'phoneNumber',
        'role',
        'password',
        'mapAddress',
        'actualAddress',
        'confirmPassword'
    ];

    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPhoneNumberAttribute($value)
    {
        // Menambahkan nomor kode (+62) pada awal nomor telepon jika belum ada
        if (strpos($value, '+62') !== 0) {
            $value = '+62' . $value;
        }

        $this->attributes['phoneNumber'] = $value;
    }


    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function merchant()
    {
        return $this->hasOne(Merchant::class);
    }
}
