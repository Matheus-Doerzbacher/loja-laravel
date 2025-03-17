@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Meus Pedidos</h2>
    @foreach ($orders as $order)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Pedido #{{ $order->id }}</h5>
                <p>Status: <strong>{{ ucfirst($order->status) }}</strong></p>
                <p>Total: R$ {{ number_format($order->total_price, 2, ',', '.') }}</p>
                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary">Ver Detalhes</a>
            </div>
        </div>
    @endforeach
</div>
@endsection