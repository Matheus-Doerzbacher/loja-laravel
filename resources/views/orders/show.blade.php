@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalhes do Pedido #{{ $order->id }}</h2>
    <p>Status: <strong>{{ ucfirst($order->status) }}</strong></p>
    <p>Total: R$ {{ number_format($order->total_price, 2, ',', '.') }}</p>

    <h4>Itens do Pedido</h4>
    <ul>
        @foreach ($order->orderItems as $item)
            <li>{{ $item->product->name }} - {{ $item->quantity }}x - R$ {{ number_format($item->price, 2, ',', '.') }}</li>
        @endforeach
    </ul>

    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection