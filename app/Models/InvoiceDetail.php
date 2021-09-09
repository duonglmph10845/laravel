<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'invoice_details';
    protected $primary = 'id';
    protected $fillable = [
        'invoice_id',
        'product_id',
        'unit_price',
        'quantity',
    ];
    public function invoice(){
        return $this->belongsToMany(InvoiceDetail::class, 'invoice_id', 'id');
    }
    public function product(){
        return $this->belongsToMany(Product::class, 'product_id', 'id');
    }
}
