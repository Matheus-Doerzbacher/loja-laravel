@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('products.create') }}" class="mt-3 btn btn-primary">Adicionar Produto</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td class="align-middle"><img style="object-fit: cover;" class="rounded-md w-20 h-20" src="{{ asset('storage/' . $product->image) }}"></td>
                    <td class="align-middle">{{ $product->name }}</td>
                    <td class="align-middle">{{ $product->description }}</td>
                    <td class="align-middle">R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                    <td class="align-middle text-center">{{ $product->quantidade_estoque }}</td>
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