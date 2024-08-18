<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmprestimoController extends Controller
{
    public function index()
    {
        $livros = Livro::where('quantidade_disponivel', '>', 0)->get();
        return view('emprestimos.index', compact('livros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'livro_id' => 'required|exists:livros,id',
        ]);

        $livro = Livro::findOrFail($request->livro_id);

        if ($livro->quantidade_disponivel <= 0) {
            return redirect()->route('emprestimos.index')->with('error', 'Não há livros disponíveis para empréstimo.');
        }

        $emprestimo = Emprestimo::create([
            'user_id' => Auth::id(),
            'livro_id' => $request->livro_id,
            'data_emprestimo' => now(),
        ]);

        $livro->decrement('quantidade_disponivel');

        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo realizado com sucesso!');
    }

    public function devolucao($id)
    {
        $emprestimo = Emprestimo::findOrFail($id);
        $emprestimo->data_devolucao = now();

        $dataLimite = $emprestimo->data_emprestimo->addDays(5);
        if (now()->greaterThan($dataLimite)) {
            $diasAtraso = now()->diffInDays($dataLimite);
            $emprestimo->multa = $diasAtraso * 0.10;
        }

        $emprestimo->save();

        $livro = $emprestimo->livro;
        $livro->increment('quantidade_disponivel');

        return redirect()->route('emprestimos.index')->with('success', 'Devolução registrada com sucesso!');
    }
}

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::all();
        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        return view('livros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'editora' => 'required|string|max:255',
            'ano_publicacao' => 'required|integer',
            'quantidade_disponivel' => 'required|integer|min:0',
        ]);

        Livro::create($request->all());
        return redirect()->route('livros.index')->with('success', 'Livro adicionado com sucesso!');
    }

    public function show(Livro $livro)
    {
        return view('livros.show', compact('livro'));
    }

    public function edit(Livro $livro)
    {
        return view('livros.edit', compact('livro'));
    }

    public function update(Request $request, Livro $livro)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'editora' => 'required|string|max:255',
            'ano_publicacao' => 'required|integer',
            'quantidade_disponivel' => 'required|integer|min:0',
        ]);

        $livro->update($request->all());
        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy(Livro $livro)
    {
        $livro->delete();
        return redirect()->route('livros.index')->with('success', 'Livro deletado com sucesso!');
    }
}
