<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'funcionario_id', 'total_price', 'status'];

    public function cliente()
    {
        return $this->belongsTo(User::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function itens()
    {
        return $this->hasMany(OrderItem::class);
    }
}
