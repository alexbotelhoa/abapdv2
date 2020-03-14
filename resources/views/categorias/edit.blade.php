@extends('layouts.app', ["current" => "categorias"])

@section('body')

    <h4>Categorias Editar</h4>

    <div class="card border">
        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">

                <div class="form-group">
                    <label for="nome">Nome da Categoria</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Categoria" value="{{ $categoria->nome }}">
                </div>
                <div class="form-group">
                    <label for="imposto">Imposto</label>
                    <input type="number" class="form-control" name="imposto" id="imposto" step="0.01" placeholder="0.00" value="{{ $categoria->imposto }}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                <a href="{{ route('categorias.index') }}" class="btn btn-secondary btn-sm">Voltar</a>
            </div>
        </form>
    </div>

    @if($alerta != '')
        <div class="alert alert-danger" role="alert">
            {{ $alerta }}
        </div>
    @endif

@endsection