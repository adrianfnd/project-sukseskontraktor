<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name', 
        'price', 
        'image_url', 
        'description', 
        'category', 
        'available_stock',
        'manufacturer',
        'model_number',
        'warranty_months',
        'weight',
        'dimensions',
        'created_by',
        'updated_by',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}