@extends('layouts.app')

@section('content')
@include('layouts.navigation_admin')
<div class="container">

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Total de Clientes</h5>
                    <h3>{{ $totalClientes }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Total de Produtos</h5>
                    <h3>{{ $totalProdutos }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Total de Vendas</h5>
                    <h3>{{ $totalVendas }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Faturamento Total</h5>
                    <h3>R$ {{ number_format($faturamentoTotal, 2, ',', '.') }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection