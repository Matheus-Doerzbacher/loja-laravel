@extends('layouts.app')
@section('content')
@include('layouts.navigation_admin')
<div class="container">

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Data</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendas as $venda)
                <tr>
                    <td>{{ $venda->cliente->name }}</td>
                    <td>{{ $venda->data_venda }}</td>
                    <td>R$ {{ number_format($venda->total_price, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        
        </tbody>
    </table>
</div>
@endsection