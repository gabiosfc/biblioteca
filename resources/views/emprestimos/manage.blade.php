@extends('layouts.app')

@section('content')
    <h1>Gerenciar Empréstimos</h1>

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

    <div class="list-group">
        @foreach ($emprestimos as $emprestimo)
            <div class="list-group-item">
                <h5 class="mb-1">{{ $emprestimo->livro->titulo }}</h5>
                <p class="mb-1"><strong>Data do Empréstimo:</strong> {{ $emprestimo->data_emprestimo }}</p>
                <p class="mb-1"><strong>Data de Devolução:</strong> {{ $emprestimo->data_devolucao ?? 'Não devolvido ainda' }}</p>
                @if (!$emprestimo->data_devolucao)
                    <form action="{{ route('emprestimos.devolucao', $emprestimo->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-danger">Registrar Devolução</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
@endsection
