<?php

namespace App\Http\Controllers;

use App\Models\Editora;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::all();
        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        $editoras = Editora::all(); // Adiciona a lista de editoras para a view
        return view('livros.create', compact('editoras'));
    }

    public function store(Request $request)
    {
        // Validação inicial dos campos do livro
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'isbn' => 'required|string|max:255|unique:livros,isbn',
            'ano_publicacao' => 'required|integer|digits:4',
            'quantidade_disponivel' => 'required|integer|min:0',
            'nova_editora_nome' => 'nullable|string|max:255',
        ], [
            'isbn.unique' => 'O ISBN já está cadastrado. Por favor, insira um ISBN diferente.',
            'ano_publicacao.digits' => 'O ano de publicação deve ter exatamente 4 dígitos.',
            'editora_id.required_without' => 'Você deve selecionar uma editora existente ou adicionar uma nova editora.',
        ]);

        // Cria ou recupera a nova editora, se necessário
        if ($request->filled('nova_editora_nome')) {
            // Verifica se a editora já existe
            $novaEditora = Editora::where('nome', $request->nova_editora_nome)->first();
            
            // Se a editora não existir, cria uma nova editora
            if (!$novaEditora) {
                $novaEditora = Editora::create(['nome' => $request->nova_editora_nome]);
            }
            
            // Atualiza o campo editora_id com o ID da nova editora
            $editoraId = $novaEditora->id;
        } else {
            // Se uma editora existente foi selecionada
            $editoraId = $request->input('editora_id');

            // Se nenhuma editora foi selecionada e nenhuma nova editora foi fornecida
            if (!$editoraId) {
                return redirect()->back()->withErrors(['editora_id' => 'A editora é obrigatória.'])->withInput();
            }
        }

        // Atualiza o request com o editora_id correto
        $request->merge(['editora_id' => $editoraId]);

        // Validação final incluindo editora_id
        $request->validate([
            'editora_id' => 'required|exists:editoras,id',
        ]);

        // Cria o livro com os dados fornecidos
        Livro::create($request->all());

        return redirect()->route('livros.index')->with('success', 'Livro adicionado com sucesso!');
    }



    public function show(Livro $livro)
    {
        return view('livros.show', compact('livro'));
    }

    public function edit(Livro $livro)
    {
        $editoras = Editora::all(); // Adiciona a lista de editoras para a view
        return view('livros.edit', compact('livro', 'editoras'));
    }

    public function update(Request $request, Livro $livro)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'editora_id' => 'required|exists:editoras,id', // Atualizado para usar editora_id
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
