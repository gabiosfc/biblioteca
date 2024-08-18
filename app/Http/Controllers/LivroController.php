<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livros = Livro::all();
        return view('livros.index', compact('livros'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livros.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'isbn' => 'required|unique:livros',
            'editora' => 'required',
            'ano_publicacao' => 'required|integer',
        ]);

        Livro::create($request->all());

        return redirect()->route('livros.index')->with('success', 'Livro criado com sucesso.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $livro = Livro::find($id);
        return view('livros.show', compact('livro'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $livro = Livro::find($id);
        return view('livros.edit', compact('livro'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'isbn' => 'required|unique:livros,isbn,'.$id,
            'editora' => 'required',
            'ano_publicacao' => 'required|integer',
        ]);

        $livro = Livro::find($id);
        $livro->update($request->all());

        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $livro = Livro::find($id);
        $livro->delete();

        return redirect()->route('livros.index')->with('success', 'Livro deletado com sucesso.');
    }

}
