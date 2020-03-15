@extends('layouts.app', ["current" => "vendas"])

@section('body')

    <div class="card border">
        <div class="card-body">
            <h5 class="card-title"><i class="fas fa-shopping-cart"></i> Carrinho Visualizar</h5>
            <table class="table table-ordered table-hover">
                <thead>
                <tr class="text-center">
                    <th>Código</th>
                    <th>Carrinho</th>
                    <th class="text-left">Nome do Produto</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Imposto</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vendas as $c)
                    <tr class="text-center">
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->carrinho }}</td>
                        <td class="text-left">{{ $c->produto->nome }}</td>
                        <td>{{ $c->quantidade }}</td>
                        <td>{{ number_format($c->preco, 2, ',', '.') }}</td>
                        <td>{{ $c->imposto }}%</td>
                        <td>{{ number_format($c->quantidade * $c->preco * (($c->imposto / 100) + 1), 2, ',', '.') }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot class="card-footer">
                <tr class="text-center font-weight-bold">
                    <td colspan="4" class="text-right">Totais</td>
                    <td>{{ number_format($valorSemImposto, 2, ',', '.') }}</td>
                    <td>{{ number_format($valorDoImposto, 2, ',', '.') }}</td>
                    <td class="text-danger">{{ number_format($valorTotal, 2, ',', '.') }}</td>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="card-footer">
            <a href="../vendas" class="btn btn-secondary btn-sm">Voltar</a>
        </div>
    </div>

@endsection