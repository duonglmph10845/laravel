<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';
    protected $primary = 'id';
    protected $fillable = [
        'user_id',
        'number',
        'address',
        'total_price',
        'status',
    ];
    public function invoice_details(){
        return $this->hasMany(InvoiceDetail::class, 'invoice_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
