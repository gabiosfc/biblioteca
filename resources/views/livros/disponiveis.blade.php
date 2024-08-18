@extends('layouts.app')

@section('content')
    <h1>Livros Disponíveis</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>ISBN</th>
                <th>Quantidade Disponível</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($livros as $livro)
                <tr>
                    <td>{{ $livro->titulo }}</td>
                    <td>{{ $livro->autor }}</td>
                    <td>{{ $livro->isbn }}</td>
                    <td>{{ $livro->quantidade_disponivel }}</td>
                    <td>
                        <form action="{{ route('emprestimos.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="livro_id" value="{{ $livro->id }}">
                            <button type="submit" class="btn btn-primary">Solicitar Empréstimo</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhum livro disponível no momento.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
