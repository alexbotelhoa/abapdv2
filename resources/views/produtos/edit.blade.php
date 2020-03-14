@extends('layouts.app', ["current" => "produtos"])

@section('body')

    <h4>Produtos Editar</h4>

    <div class="card border">
        <div class="card-body">
            <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nome">Nome do Produto</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Produto" value="{{ $produto->nome }}">
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="number" class="form-control" name="preco" id="preco" step="0.01" placeholder="0.00" value="{{ $produto->preco }}">
                </div>
                <div class="form-group">
                    <label for="categoria_id">Categoria</label>
                    <select class="form-control" name="categoria_id">
                        @foreach($categorias as $c)
                            <option @if($produto->categoria_id == $c->id) selected @endif value="{{ $c->id }}">{{ $c->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm">Salvar</button>
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary btn-sm">Voltar</a>
        </div>
    </div>

    @if($alerta != '')
        <div class="alert alert-danger" role="alert">
            {{ $alerta }}
        </div>
    @endif

@endsection