@extends('layouts.master')


@section('content')
    <h1>Editar Livro</h1>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('livros.update', $livro->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $livro->titulo) }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" name="autor" id="autor" value="{{ old('autor', $livro->autor) }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $livro->isbn) }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="editora">Editora</label>
            <input type="text" name="editora" id="editora" value="{{ old('editora', $livro->editora) }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="ano_publicacao">Ano de Publicação</label>
            <input type="number" name="ano_publicacao" id="ano_publicacao" value="{{ old('ano_publicacao', $livro->ano_publicacao) }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="quantidade_disponivel">Quantidade Disponível</label>
            <input type="number" name="quantidade_disponivel" id="quantidade_disponivel" value="{{ old('quantidade_disponivel', $livro->quantidade_disponivel) }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection
