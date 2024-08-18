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
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control">
        </div>
        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" name="autor" id="autor" class="form-control">
        </div>
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" id="isbn" class="form-control">
        </div>
        <div class="form-group">
            <label for="ano_publicacao">Ano de Publicação</label>
            <input type="number" name="ano_publicacao" id="ano_publicacao" class="form-control">
        </div>
        <div class="form-group">
            <label for="quantidade_disponivel">Quantidade Disponível</label>
            <input type="number" name="quantidade_disponivel" id="quantidade_disponivel" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
@endsection
