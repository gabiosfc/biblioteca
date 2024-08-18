@extends('layouts.app')

@section('content')
    <h1>Editar Livro</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            @endforeach
        </div>
    @endif

    <form action="{{ route('livros.update', $livro->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $livro->titulo }}" required>
        </div>
        <div class="form-group">
            <label for="autor">Autor:</label>
            <input type="text" name="autor" id="autor" class="form-control" value="{{ $livro->autor }}" required>
        </div>
        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn" id="isbn" class="form-control" value="{{ $livro->isbn }}" required>
        </div>
        <div class="form-group">
            <label for="editora">Editora:</label>
            <input type="text" name="editora" id="editora" class="form-control" value="{{ $livro->editora }}" required>
        </div>
        <div class="form-group">
            <label for="ano_publicacao">Ano de Publicação:</label>
            <input type="number" name="ano_publicacao" id="ano_publicacao" class="form-control" value="{{ $livro->ano_publicacao }}" required>
        </div>
        <div class="form-group">
            <label for="disponivel">Disponível:</label>
            <select name="disponivel" id="disponivel" class="form-control">
                <option value="1" {{ $livro->disponivel ? 'selected' : '' }}>Sim</option>
                <option value="0" {{ !$livro->disponivel ? 'selected' : '' }}>Não</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">Atualizar</button>
    </form>
@endsection
