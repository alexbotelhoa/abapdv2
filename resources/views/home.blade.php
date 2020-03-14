@extends('layouts.app', ["current" => "home"])

@section('body')

    <h4>Lista de Produtos</h4>
    <i class="fas fa-shopping-cart"></i>
    <i class="fas fa-chart-pie"></i>
    <i class="fas fa-chart-bar"></i>
    <i class="fas fa-address-book"></i>
    <div class="card border">
        <form action="{{ route('carrinho.store') }}" method="POST">
            @csrf
                <table class="table">
                    <thead>
                    <tr>
                        <th>Produtos</th>
                        <th>Quantidade</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <select class="form-control" name="produto_id">
                                <option selected value="">Selecione um Produto</option>
                                @foreach($produtos as $c)
                                    <option value="{{ $c->id }}">{{ $c->nome }} - R$ {{ $c->preco }} - {{ $c->categoria->imposto }}%</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="number" class="form-control" name="quantidade" id="quantidade" placeholder="0"></td>
                    </tr>
                    </tbody>
                </table>

            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success btn-sm">Adicionar</button>
                    </div>
                    @if($success != '')
                        <div class="col-sm-10">
                            <div class="form-control form-control-sm alert-success" align="center">
                                {{ $success }}
                            </div>
                        </div>
                    @endif
                    @if($error != '')
                        <div class="col-sm-10">
                            <div class="form-control form-control-sm alert-danger" align="center">
                                {{ $error }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </form>
    </div>

    <div class="jumbotron bg-light border border-secondary">
        <h3 class="card-title">Carrinho de Compras</h3>
        @if(count($carrinho) > 0)
            <form action="{{ route('vendas.store') }}" method="POST">
                @csrf
                <div class="card-deck">
                    <table class="table table-ordered table-hover">
                        <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome do Produto</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Imposto</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($carrinho as $c)
                            <tr>
                                <td>{{ $c['id'] }}</td>
                                <td>{{ $c['produto_nome'] }}</td>
                                <td>{{ $c['quantidade'] }}</td>
                                <td>{{ $c['preco'] }}</td>
                                <td>{{ $c['imposto'] }}</td>
                                <td>{{ $c['total'] }}</td>
                                <td><a href="{{ route('carrinho.destroy', $c['id']) }}" class="btn btn-danger btn-sm">Excluir</a></td>
                            </tr>
                        @endforeach
                        <tr class="bg-light">
                            <td colspan="2">Total S/ Imposto</td>
                            <td>{{ $valorSemImposto }}</td>
                            <td colspan="2">Total C/ Imposto</td>
                            <td>{{ $valorComImposto }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Finalizar Compra</button>
                <a href="{{ route('limparCarrinho') }}" class="btn btn-secondary btn-sm">Limpar Carrinho</a>
            </form>
        @else
            <h5 class="text-danger">Não há produtos no carrinho!</h5>
            <a href="{{ route('limparCarrinho') }}" class="btn btn-secondary btn-sm">Limpar Carrinho</a>
        @endif
    </div>

@endsection