@extends('layouts.app', ["current" => "vendas"])

@section('body')

    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Vendas</h5>
            @if(count($vendas) > 0)
                <table class="table table-ordered table-hover">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nr Venda</th>
                        <th>Nome do Produto</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Imposto</th>
                        <th>Opções</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vendas as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->cart }}</td>
                            <td>{{ $c->produto_id }}</td>
                            <td>{{ $c->quantidade }}</td>
                            <td>{{ $c->preco }}</td>
                            <td>{{ $c->imposto }}</td>
                            <td>
                                <a href="{{ route('produtos.show', $c->id) }}" class="btn btn-light btn-sm">Visualizar</a>
                                <a href="{{ route('produtos.edit', $c->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                <a href="{{ route('produtos.destroy', $c->id) }}" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h5 class="text-danger">Não há registro de Vendas cadastradas!</h5>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('vendas.create') }}" class="btn btn-success btn-sm">Adicionar</a>
            <a href="../public" class="btn btn-secondary btn-sm">Voltar</a>
        </div>
    </div>

@endsection