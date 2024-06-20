<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 
        'customer_name', 
        'customer_email', 
        'customer_phone', 
        'months_rented', 
        'status_payment',
        'status_product'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function xendit()
    {
        return $this->belongsTo(Xendit::class, 'xendit_id', 'id');
    }
}
