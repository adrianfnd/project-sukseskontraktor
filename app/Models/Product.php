<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'price', 
        'image_url', 
        'description', 
        'category', 
        'stock',
        'manufacturer',
        'model_number',
        'warranty_months',
        'weight',
        'dimensions',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
