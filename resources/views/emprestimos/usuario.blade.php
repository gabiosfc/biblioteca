@extends('layouts.app')

@section('content')
    <h1>Meus Empréstimos</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('alert'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: 'Aviso',
                    text: '{{ session('alert') }}',
                    icon: 'info',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Título do Livro</th>
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
                    <td>{{ $emprestimo->data_devolucao ? $emprestimo->data_devolucao : 'Não devolvido ainda' }}</td>
                    <td>
                        @if (!$emprestimo->data_devolucao)
                            <form action="{{ route('emprestimos.devolucao') }}" method="POST">
                                @csrf
                                <input type="hidden" name="emprestimo_id" value="{{ $emprestimo->id }}">
                                <button type="submit" class="btn btn-danger">Devolver Livro</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('livros.disponiveis') }}" class="btn btn-primary">Voltar para Livros Disponíveis</a>
@endsection
