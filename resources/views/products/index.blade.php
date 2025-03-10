@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Gerenciar Produtos</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Adicionar Produto</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td class="align-middle"><img src="{{ asset('storage/' . $product->image) }}" width="50"></td>
                    <td class="align-middle">{{ $product->name }}</td>
                    <td class="align-middle">R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                    <td class="align-middle">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection