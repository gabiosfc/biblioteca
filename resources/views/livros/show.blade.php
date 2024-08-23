@extends('layouts.master')


@section('content')
    <h1>Detalhes do Livro</h1>
    <p> </p>

    <div class="card">
        <div class="card-header">
            <h2>{{ $livro->titulo }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Autor:</strong> {{ $livro->autor }}</p>
            <p><strong>ISBN:</strong> {{ $livro->isbn }}</p>
            <p><strong>Editora:</strong> {{ $livro->editora }}</p>
            <p><strong>Ano de Publicação:</strong> {{ $livro->ano_publicacao }}</p>
            <p><strong>Quantidade Disponível:</strong> {{ $livro->quantidade_disponivel }}</p>
            <a href="{{ route('livros.index') }}" class="btn btn-primary">Voltar à Lista</a>
        </div>
    </div>
@endsection
