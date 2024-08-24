@extends('layouts.master')

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
        <br>
        <br>
        <br>
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo') }}">
        </div>
        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" name="autor" id="autor" class="form-control" value="{{ old('autor') }}">
        </div>
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" id="isbn" class="form-control" value="{{ old('isbn') }}">
        </div>
        <div class="form-group">
            <label for="editora_id">Editora</label>
            <select name="editora_id" id="editora_id" class="form-control" onchange="toggleNovaEditora()">
                <option value="">Selecione uma editora</option>
                @foreach($editoras as $editora)
                    <option value="{{ $editora->id }}" {{ old('editora_id') == $editora->id ? 'selected' : '' }}>
                        {{ $editora->nome }}
                    </option>
                @endforeach
                <option value="nova">Adicionar Nova Editora</option>
            </select>
        </div>
        <div class="form-group" id="novaEditora" style="display: none;">
            <label for="nova_editora_nome">Nome da Nova Editora</label>
            <input type="text" name="nova_editora_nome" id="nova_editora_nome" class="form-control" value="{{ old('nova_editora_nome') }}">
        </div>
        <div class="form-group">
            <label for="ano_publicacao">Ano de Publicação</label>
            <input type="text" name="ano_publicacao" id="ano_publicacao" class="form-control" value="{{ old('ano_publicacao') }}" maxlength="4" pattern="\d{4}" title="O ano deve ser um número de 4 dígitos">
        </div>
        <div class="form-group">
            <label for="quantidade_disponivel">Quantidade Disponível</label>
            <input type="text" name="quantidade_disponivel" id="quantidade_disponivel" class="form-control" value="{{ old('quantidade_disponivel') }}">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

    <script>
        function toggleNovaEditora() {
            var editoraSelect = document.getElementById('editora_id');
            var novaEditoraDiv = document.getElementById('novaEditora');
            if (editoraSelect.value === 'nova') {
                novaEditoraDiv.style.display = 'block';
            } else {
                novaEditoraDiv.style.display = 'none';
            }
        }
    </script>
@endsection
