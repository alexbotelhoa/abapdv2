@extends('layouts.app', ["current" => "home"])

@section('body')

    <h3 class="card-title"><img src="{{ asset('/img/shopping-list.png') }}"> Lista de Produtos</h3>
    <div class="bg-light border border-secondary">
        <form action="{{ route('carrinho.store') }}" method="POST">
            @csrf
            <table class="table">
                <thead>
                <tr class="card-header">
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
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-cart-plus"></i> Adicionar Produto</button>
                    </div>
                    @if($success != '')
                        <div class="col-sm-9">
                            <div class="form-control form-control-sm alert-success" align="center">
                                {{ $success }}
                            </div>
                        </div>
                    @endif
                    @if($error != '')
                        <div class="col-sm-9">
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
        <h3 class="card-title"><img src="{{ asset('/img/shopping-cart.png') }}"> Carrinho de Compras</h3>
        @if(count($carrinho) > 0)
            <form action="{{ route('vendas.store') }}" method="POST">
                @csrf
                <div class="card-deck">
                    <table class="table table-ordered table-hover">
                        <thead class="card-header">
                        <tr class="text-center">
                            <th>Código</th>
                            <th>Nome do Produto</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Imposto</th>
                            <th>Total</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="7">
                                <div style="overflow: auto; height: 300px">
                                    <table class="table table-ordered table-hover">
                                        @foreach($carrinho as $c)
                                            <tr class="text-center">
                                                <td>{{ $c['id'] }}</td>
                                                <td class="text-left">{{ $c['produto_nome'] }}</td>
                                                <td>{{ $c['quantidade'] }}</td>
                                                <td>{{ number_format($c['preco'], 2, ',', '.') }}</td>
                                                <td>{{ $c['imposto'] }}%</td>
                                                <td>{{ number_format($c['total'], 2, ',', '.') }}</td>
                                                <td><a href="{{ route('carrinho.destroy', $c['id']) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Excluir</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot class="card-footer">
                        <tr class="text-center font-weight-bold">
                            <td colspan="2">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-shopping-cart"></i> Finalizar Compra</button>
                            </td>
                            <td>Totais</td>
                            <td>{{ number_format($valorSemImposto, 2, ',', '.') }}</td>
                            <td>{{ number_format($valorDoImposto, 2, ',', '.') }}</td>
                            <td class="text-danger">{{ number_format($valorTotal, 2, ',', '.') }}</td>
                            <td><a href="{{ route('limparCarrinho') }}" class="btn btn-secondary btn-sm"><i class="fas fa-cart-arrow-down"></i> Esvaziar</a></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </form>
        @else
            <h5 class="text-danger">Não há produtos no carrinho!</h5>
            <a href="{{ route('limparCarrinho') }}" class="btn btn-secondary btn-sm"> Limpar Carrinho</a>
        @endif
    </div>

@endsection