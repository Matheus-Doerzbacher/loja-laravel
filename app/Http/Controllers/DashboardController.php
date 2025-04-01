<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;   
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function index()
    {
        $totalClientes = User::count();
        $totalProdutos = Product::count();
        $totalVendas = Order::count();
        $faturamentoTotal = Order::sum('total_price');

        return view('dashboard.index', compact('totalClientes', 'totalProdutos', 'totalVendas', 'faturamentoTotal'));
    }

    public function vendas()
    {   
        $isFuncionario = Auth::user()->isFuncionario;
        if (!$isFuncionario) {
            return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
        }
        $vendas = Order::with('cliente')->orderBy('data_venda', 'desc')->get();
        return view('dashboard.vendas', compact('vendas'));
    }

    public function relatorios()
    {
        $isFuncionario = Auth::user()->isFuncionario;
        if (!$isFuncionario) {
            return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
        }
        $vendasMensais = Order::selectRaw('YEAR(data_venda) as ano, MONTH(data_venda) as mes, SUM(total_price) as total')
            ->groupBy('ano', 'mes')
            ->orderBy('ano', 'desc')
            ->orderBy('mes', 'desc')
            ->get();

        return view('dashboard.relatorios', compact('vendasMensais'));
    }
}

