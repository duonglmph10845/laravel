<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        
        'name',
        'parent_id'
    ];
    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
    public function categoryChildren()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
