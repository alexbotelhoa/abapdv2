@extends('layouts.app', ["current" => "vendas"])

@section('body')

    <div class="card border">
        <div class="card-body">
            <h4 class="card-title"><i class="fas fa-piggy-bank"></i> Cadastro de Vendas</h4>
            @if(count($carrinhos) > 0)
                <table class="table table-ordered table-hover">
                    <thead>
                    <tr class="text-center">
                        <th>Ordem</th>
                        <th>Carrinho</th>
                        <th>Data da Venda</th>
                        <th>Valor</th>
                        <th>Opções</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($carrinhos as $c)
                        <tr class="text-center">
                            <td>{{ $c['nr'] }}</td>
                            <td>{{ $c['carrinho'] }}</td>
                            <td>{{ date_format($c['data'], "d/m/Y H:i:s") }}</td>
                            <td>{{ number_format($c['valor'], 2, ',', '.') }}</td>
                            <form action="{{route('vendas.destroy', $c['carrinho'])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <td>
                                    <a href="{{ route('vendas.show', $c['carrinho']) }}" class="btn btn-light btn-sm">Visualizar</a>
                                    <input class="btn btn-danger btn-sm" type="submit" value="Excluir">
                                </td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h5 class="text-danger">Não há registro de Vendas cadastradas!</h5>
            @endif
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-4">
                    <a href="../public" class="btn btn-secondary btn-sm">Voltar</a>
                </div>
                <div class="col-sm-8">
                    @if($success != '')
                        <div class="form-control form-control-sm alert-success" align="center">
                            {{ $success }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection