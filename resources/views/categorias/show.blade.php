@extends('layouts.app', ["current" => "categorias"])

@section('body')

    <h4>Categorias Visualizar</h4>

    <div class="card border">
        <div class="card-body">
            <div class="form-group">
                <label for="nome">Nome da Categoria</label>
                <input type="text" class="form-control" name="nome" id="nome" readonly value="{{ $categoria->nome }}">
            </div>
            <div class="form-group">
                <label for="imposto">Imposto</label>
                <input type="number" class="form-control" name="imposto" id="imposto" readonly value="{{ $categoria->imposto }}">
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary btn-sm">Voltar</a>
        </div>
    </div>

@endsection