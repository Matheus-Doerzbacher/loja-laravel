<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Funcionario;

class OrderFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'funcionario_id' => Funcionario::factory(),
            'total_price' => 0, // será atualizado ao criar os itens da venda
            'status' => 'pendente',
            'data_venda' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
