{{-- resources/views/products/edit.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Produto</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" class="mt-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-4">
            <label for="name">Nome do Produto</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>

        <div class="form-group mb-4">
            <label for="price">Preço</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
        </div>

        <div class="form-group mb-4">
            <label for="description">Descrição</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
        </div>

        <div class="form-group mb-4">
            <label for="image">Imagem do Produto</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-primary mt-4">Salvar Alterações</button>
    </form>
</div>
@endsection
