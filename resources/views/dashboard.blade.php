@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Vitrine de Produtos</h2>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img style="object-fit: cover; width: 500px; height: 500px;" class="rounded-md" src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><strong>R$ {{ number_format($product->price, 2, ',', '.') }}</strong></p>
                        <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary">Adicionar ao Carrinho</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
