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
        <button type="submit" class="btn btn-success w-100">Salvar</button>
    </form>
</div>
@endsection