<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    // Exibe a lista de usuários
    public function index()
    {
        $isFuncionario = Auth::user()->isFuncionario;
        if (!$isFuncionario) {
            return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
        }
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Exibe o formulário para criar um novo usuário
    public function create()
    {
        $isFuncionario = Auth::user()->isFuncionario;
        if (!$isFuncionario) {
            return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
        }
        return view('users.create');
    }

    // Armazena o novo usuário no banco de dados
    public function store(Request $request)
    {
        $isFuncionario = Auth::user()->isFuncionario;
        if (!$isFuncionario) {
            return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
        }
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'telefone' => 'numeric',
            'endereco' => 'string',
            'isFuncionario' => 'boolean',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'isFuncionario' => $request->isFuncionario ?? false,
        ]);

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso!');
    }

    // Exibe os detalhes de um usuário
    public function show(User $user)
    {
        $isFuncionario = Auth::user()->isFuncionario;
        if (!$isFuncionario) {
            return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
        }
        return view('users.show', compact('user'));
    }

    // Exibe o formulário para editar um usuário existente
    public function edit(User $user)
    {
        $isFuncionario = Auth::user()->isFuncionario;
        if (!$isFuncionario) {
            return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
        }
        return view('users.edit', compact('user'));
    }

    // Atualiza os dados do usuário no banco
    public function update(Request $request, User $user)
    {
        $isFuncionario = Auth::user()->isFuncionario;
        if (!$isFuncionario) {
            return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
        }
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'telefone' => 'numeric',
            'endereco' => 'string',
            'isFuncionario' => 'boolean',
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    // Remove o usuário do banco
    public function destroy(User $user)
    {
        $isFuncionario = Auth::user()->isFuncionario;
        if (!$isFuncionario) {
            return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuário removido com sucesso!');
    }
}