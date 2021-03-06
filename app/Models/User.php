<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'name',
        'email',
        'password',
        'address',
        'gender',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function invoices(){
        return $this->hasMany(Invoice::class, 'user_id', 'id');
    }
    public function invoice_detail(){
        return $this->hasMany(InvoiceDetail::class, 'product_id', 'id');
    }
    public function comments(){
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }
    public function setPasswordAttribute($value)
    {
        $hashed = bcrypt($value);
        $this->attributes['password'] = $hashed;
    }
}
