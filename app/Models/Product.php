<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        
        'name',
        'image',
        'price',
        'quantity',
        'category_id',
    ];
    public function categories(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function comments(){
        return $this->hasMany(Comment::class, 'product_id', 'id');
    }
}
