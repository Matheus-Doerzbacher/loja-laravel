<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;

class OrderSeeder extends Seeder
{
    public function run()
    {
        Order::factory()
            ->count(15)
            ->create()
            ->each(function ($order) {
                $itens = OrderItem::factory()->count(rand(1, 5))->create([
                    'order_id' => $order->id
                ]);

                // Atualizar total da venda
                $total = $itens->sum(fn($item) => $item->quantity * $item->price);
                $order->update(['total_price' => $total]);
            });
    }
}
