<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 10, 500),
            'image' => $this->faker->imageUrl(),
            'quantidade_estoque' => $this->faker->numberBetween(5, 100),
        ];
    }
}
