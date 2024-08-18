@extends('layouts.app')

@section('content')
    <h1>Adicionar Novo Livro</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('livros.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo') }}" required>
        </div>
        <div class="form-group">
            <label for="autor">Autor:</label>
            <input type="text" name="autor" id="autor" class="form-control" value="{{ old('autor') }}" required>
        </div>
        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn" id="isbn" class="form-control" value="{{ old('isbn') }}" required>
        </div>
        <div class="form-group">
            <label for="editora">Editora:</label>
            <input type="text" name="editora" id="editora" class="form-control" value="{{ old('editora') }}" required>
        </div>
        <div class="form-group">
            <label for="ano_publicacao">Ano de Publicação:</label>
            <input type="number" name="ano_publicacao" id="ano_publicacao" class="form-control" value="{{ old('ano_publicacao') }}" required>
        </div>
        <div class="form-group">
            <label for="disponivel">Disponível:</label>
            <select name="disponivel" id="disponivel" class="form-control">
                <option value="1" {{ old('disponivel') == 1 ? 'selected' : '' }}>Sim</option>
                <option value="0" {{ old('disponivel') == 0 ? 'selected' : '' }}>Não</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">Salvar</button>
    </form>
@endsection
