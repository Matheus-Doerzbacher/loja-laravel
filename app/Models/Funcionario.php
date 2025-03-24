<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'email', 'cargo'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
