<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    public function venda()
    {
        return $this->belongsTo(Order::class);
    }

    public function produto()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
