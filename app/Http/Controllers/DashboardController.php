<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;   

class DashboardController extends Controller
{
    public function index()
    {
        $totalClientes = User::count();
        $totalProdutos = Product::count();
        $totalVendas = Order::count();
        $faturamentoTotal = Order::sum('total');

        return view('dashboard.index', compact('totalClientes', 'totalProdutos', 'totalVendas', 'faturamentoTotal'));
    }

    public function clientes()
    {
        $clientes = User::all();
        return view('dashboard.clientes', compact('clientes'));
    }

    public function estoque()
    {
        $produtos = Product::all();
        return view('dashboard.estoque', compact('produtos'));
    }

    public function vendas()
    {
        $vendas = Order::with('cliente', 'funcionario')->orderBy('data_venda', 'desc')->get();
        return view('dashboard.vendas', compact('vendas'));
    }

    public function relatorios()
    {
        $vendasMensais = Order::selectRaw('YEAR(data_venda) as ano, MONTH(data_venda) as mes, SUM(total_price) as total')
            ->groupBy('ano', 'mes')
            ->orderBy('ano', 'desc')
            ->orderBy('mes', 'desc')
            ->get();

        return view('dashboard.relatorios', compact('vendasMensais'));
    }
}

