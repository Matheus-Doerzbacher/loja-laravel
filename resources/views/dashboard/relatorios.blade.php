@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Relatórios de Vendas</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Ano</th>
                <th>Mês</th>
                <th>Total Vendido</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendasMensais as $relatorio)
                <tr>
                    <td>{{ $relatorio->ano }}</td>
                    <td>{{ $relatorio->mes }}</td>
                    <td>R$ {{ number_format($relatorio->total, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
