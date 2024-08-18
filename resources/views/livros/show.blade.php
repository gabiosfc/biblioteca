@extends('layouts.app')

@section('content')
    <h1>Detalhes do Livro</h1>

    <div class="card">
        <div class="card-header">
            <h2>{{ $livro->titulo }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Autor:</strong> {{ $livro->autor }}</p>
            <p><strong>ISBN:</strong> {{ $livro->isbn }}</p>
            <p><strong>Editora:</strong> {{ $livro->editora }}</p>
            <p><strong>Ano de Publicação:</strong> {{ $livro->ano_publicacao }}</p>
            <p><strong>Disponível:</strong> {{ $livro->disponivel ? 'Sim' : 'Não' }}</p>
            <a href="{{ route('livros.index') }}" class="btn btn-primary">Voltar à Lista</a>
        </div>
    </div>
@endsection
