@extends('layouts.app', ["current" => "produtos"])

@section('body')

    <h4>Produtos Visualizar</h4>

    <div class="card border">
        <div class="card-body">
            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input type="text" class="form-control" name="nome" id="nome" readonly value="{{ $produto->nome }}">
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="text" class="form-control" name="preco" id="preco" readonly value="{{ number_format($produto->preco, 2, ',', '.') }}">
            </div>
            <div class="form-group">
                <label for="categoria_id">Categoria</label>
                <input type="text" class="form-control" name="categoria_id" id="categoria_id" readonly value="{{ $categoria->nome }}">
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary btn-sm">Voltar</a>
        </div>
    </div>

@endsection