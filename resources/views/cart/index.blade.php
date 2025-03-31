@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        <div>
            {{ session('success') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if($cart)
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $id => $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>R$ {{ number_format($item['price'], 2, ',', '.') }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>
                    <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger">Remover</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('cart.clear') }}" class="btn btn-warning">Esvaziar Carrinho</a>
    @else
    <p>O carrinho está vazio.</p>
    @endif
    @if($cart)
    <a href="{{ route('checkout') }}" class="btn btn-success">Finalizar Compra</a>
    @endif
</div>
@endsection