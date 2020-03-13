@extends('layouts.app', ["current" => "categorias"])

@section('body')

    <h4>Categorias Adicionar</h4>

    <div class="card border">
        <div class="card-body">
            <form action="{{ route('categorias.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome da Categoria</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Categoria">
                </div>
                <div class="form-group">
                    <label for="imposto">Imposto</label>
                    <input type="number" class="form-control" name="imposto" id="imposto" step="0.01" placeholder="0.00">
                </div>
                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                <button type="reset" class="btn btn-primary btn-sm">Limpar</button>
                <a href="{{ route('categorias.index') }}" class="btn btn-secondary btn-sm">Voltar</a>
            </form>
        </div>
    </div>

    @if($alerta != '')
        <div class="alert alert-danger" role="alert">
            {{ $alerta }}
        </div>
    @endif

@endsection