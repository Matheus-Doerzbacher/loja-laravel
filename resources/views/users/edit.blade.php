@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuário</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="endereco" name="endereco" class="form-control" value="{{ $user->endereco }}">
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="telefone" name="telefone" class="form-control" value="{{ $user->telefone }}">
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="isFuncionario" class="form-check-input" id="isFuncionario" value="1" {{ $user->isFuncionario ? 'checked' : '' }}>
            <label for="isFuncionario" class="form-check-label">Funcionário</label>
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>
</div>
@endsection