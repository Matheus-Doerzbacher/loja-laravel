<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\Product;

class OrderItemFactory extends Factory
{
    public function definition()
    {
        $produto = Product::inRandomOrder()->first() ?? Product::factory()->create();
        $quantidade = $this->faker->numberBetween(1, 5);

        return [
            'order_id ' => Order::factory(),
            'product_id' => $produto->id,
            'quantity' => $quantidade,
            'price' => $produto->price,
        ];
    }
}
