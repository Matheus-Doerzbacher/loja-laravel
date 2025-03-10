@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Usuário</h1>
    <p><strong>Nome:</strong> {{ $user->name }}</p>
    <p><strong>E-mail:</strong> {{ $user->email }}</p>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection