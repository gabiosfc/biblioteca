@extends('layouts.app')

@section('content')
    <h1>Livros</h1>
    <a href="{{ route('livros.create') }}" class="btn btn-primary mb-3">Adicionar Novo Livro</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>ISBN</th>
                <th>Ano de Publicação</th>
                <th>Disponível</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($livros as $livro)
                <tr>
                    <td>{{ $livro->id }}</td>
                    <td>{{ $livro->titulo }}</td>
                    <td>{{ $livro->autor }}</td>
                    <td>{{ $livro->isbn }}</td>
                    <td>{{ $livro->ano_publicacao }}</td>
                    <td>{{ $livro->disponivel ? 'Sim' : 'Não' }}</td>
                    <td>
                        <a href="{{ route('livros.show', $livro->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('livros.edit', $livro->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
