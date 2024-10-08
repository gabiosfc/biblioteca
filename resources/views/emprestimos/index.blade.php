@extends('layouts.master')

@section('content')
    <h1>Meus Empréstimos</h1>
    <p> </p>

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

    <h2>Livros Emprestados</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Data do Empréstimo</th>
                <th>Data da Devolução</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($emprestimos as $emprestimo)
                <tr>
                    <td>{{ $emprestimo->livro ? $emprestimo->livro->titulo : 'Livro não encontrado' }}</td>
                    <td>{{ $emprestimo->livro ? $emprestimo->livro->autor : 'Autor não disponível' }}</td>
                    <td>{{ $emprestimo->data_emprestimo }}</td>
                    <td>{{ $emprestimo->data_devolucao ?? 'Não devolvido' }}</td>
                    <td>
                        <form action="{{ route('emprestimos.devolucao') }}" method="POST">
                            @csrf
                            <input type="hidden" name="emprestimo_id" value="{{ $emprestimo->id }}">
                            <button type="submit" class="btn btn-danger">Devolver Livro</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
