@extends('layouts.app', ["current" => "produtos"])

@section('body')

    <h4>Produtos Adicionar</h4>

    <div class="card border">
        <form action="{{ route('produtos.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nome">Nome do Produto</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Produto">
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="number" class="form-control" name="preco" id="preco" step="0.01" placeholder="0.00">
                </div>
                <div class="form-group">
                    <label for="categoria_id">Categoria</label>
                    <select class="form-control" name="categoria_id">
                        <option selected value="">Selecione uma Categoria</option>
                        @foreach($categorias as $c)
                            <option value="{{ $c->id }}">{{ $c->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                        <button type="reset" class="btn btn-primary btn-sm">Limpar</button>
                        <a href="{{ route('produtos.index') }}" class="btn btn-secondary btn-sm">Voltar</a>
                    </div>
                    <div class="col-sm-8">
                        @if($alerta != '')
                            <div class="form-control form-control-sm text-center alert-danger">
                                {{ $alerta }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection