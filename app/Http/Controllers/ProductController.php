<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    public function index()
    {
        $isFuncionario = Auth::user()->isFuncionario;
        if (!$isFuncionario) {
            return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
        }
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $isFuncionario = Auth::user()->isFuncionario;
        if (!$isFuncionario) {
            return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
        }
        return view('products.create');
    }

    public function store(Request $request)
    {
        $isFuncionario = Auth::user()->isFuncionario;
        if (!$isFuncionario) {
            return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
        }
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|nullable|max:2048',
            'quantidade_estoque' => 'required|integer|min:0',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('products', 'public') : null;

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'quantidade_estoque' => $request->quantidade_estoque,
        ]);

        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!');
    }

    public function edit(Product $product)
    {
        $isFuncionario = Auth::user()->isFuncionario;
        if (!$isFuncionario) {
            return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
        }
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $isFuncionario = Auth::user()->isFuncionario;
        if (!$isFuncionario) {
            return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
        }
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|nullable|max:2048',
            'quantidade_estoque' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            $imagePath = $product->image;
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'quantidade_estoque' => $request->quantidade_estoque,
        ]);

        return redirect()->route('products.index')->with('success', 'Produto atualizado!');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produto excluído!');
    }

    public function vitrine()
    {
        $products = Product::all();
        return view('products.vitrine', compact('products'));
    }
}
?>