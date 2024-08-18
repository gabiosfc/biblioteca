<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprestimo;
use App\Models\Livro;
use Carbon\Carbon;

class EmprestimoController extends Controller
{
    public function index()
    {
        // Lista os livros disponíveis para empréstimo e empréstimos em aberto
        $livros = Livro::where('quantidade_disponivel', '>', 0)->get();
        $emprestimos = Emprestimo::whereNull('data_devolucao')
            ->where('user_id', auth()->id())
            ->get();

        return view('emprestimos.index', compact('livros', 'emprestimos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'livro_id' => 'required|exists:livros,id',
        ]);

        // Verifica se o livro está disponível para empréstimo
        $livro = Livro::findOrFail($request->livro_id);
        if ($livro->quantidade_disponivel <= 0) {
            return redirect()->route('livros.disponiveis')->with('error', 'O livro não está disponível para empréstimo.');
        }

        // Cria o empréstimo
        $emprestimo = Emprestimo::create([
            'livro_id' => $livro->id,
            'user_id' => auth()->id(),
            'data_emprestimo' => Carbon::now()->toDateString(),
            'data_devolucao' => null,
        ]);

        // Atualiza a quantidade disponível do livro
        $livro->decrement('quantidade_disponivel');

        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo solicitado com sucesso!');
    }

    public function livrosDisponiveis()
    {
        // Lista os livros disponíveis para empréstimo
        $livros = Livro::where('quantidade_disponivel', '>', 0)->get();

        return view('livros.disponiveis', compact('livros'));
    }


    public function devolucao(Request $request)
    {
        $request->validate([
            'emprestimo_id' => 'required|exists:emprestimos,id',
        ]);

        // Busca o empréstimo pelo ID
        $emprestimo = Emprestimo::findOrFail($request->emprestimo_id);

        // Verifica se o empréstimo foi devolvido
        if ($emprestimo->data_devolucao) {
            return redirect()->route('emprestimos.index')->with('error', 'O livro já foi devolvido.');
        }

        // Calcula a multa se houver atraso
        $dataDevolucao = Carbon::now()->toDateString();
        $dataEmprestimo = Carbon::parse($emprestimo->data_emprestimo);
        $diasAtraso = $dataEmprestimo->diffInDays($dataDevolucao) - 5;

        if ($diasAtraso > 0) {
            $multa = $diasAtraso * 0.10; // R$0,10 por dia de atraso
        } else {
            $multa = 0.00;
        }

        // Atualiza o empréstimo
        $emprestimo->update([
            'data_devolucao' => $dataDevolucao,
            'multa' => $multa,
        ]);

        // Atualiza a quantidade disponível do livro
        $livro = Livro::findOrFail($emprestimo->livro_id);
        $livro->increment('quantidade_disponivel');

        return redirect()->route('emprestimos.index')->with('success', 'Livro devolvido com sucesso!');

    }

    public function usuario()
    {
        // Lista os empréstimos do usuário com o livro associado
        $emprestimos = Emprestimo::with('livro')
            ->where('user_id', auth()->id())
            ->orderBy('data_emprestimo', 'desc')
            ->get();

        return view('emprestimos.usuario', compact('emprestimos'));
    }

}
