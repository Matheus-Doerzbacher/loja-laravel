@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Criar Usuário</h1>
    <form action="{{ route('users.store') }}" method="POST" class="shadow p-4 rounded">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="endereco" name="endereco" class="form-control">
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="telefone" name="telefone" class="form-control">
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="isFuncionario" class="form-check-input" id="isFuncionario" value="1">
            <label for="isFuncionario" class="form-check-label">Funcionário</label>
        </div>
        <button type="submit" class="btn btn-success w-100">Salvar</button>
    </form>
</div>
@endsection