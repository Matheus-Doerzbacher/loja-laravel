@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Adicionar Produto</h2>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" class="form-control mb-3" placeholder="Nome do Produto" required>
        <textarea name="description" class="form-control mb-3" placeholder="Descrição" required></textarea>
        <input type="number" name="price" class="form-control mb-3" placeholder="Preço" required>
        <input type="number" name="quantidade_estoque" class="form-control mb-3" placeholder="Quantidade em Estoque" required>
        <input type="file" name="image" class="form-control mb-3">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection