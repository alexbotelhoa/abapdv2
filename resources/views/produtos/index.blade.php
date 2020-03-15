@extends('layouts.app', ["current" => "produtos"])

@section('body')

    <div class="card border">
        <div class="card-body">
            <h4 class="card-title"><i class="fas fa-pallet"></i> Cadastro de Produtos</h4>
            @if(count($produtos) > 0)
                <table class="table table-ordered table-hover">
                    <thead>
                    <tr class="text-center">
                        <th>Código</th>
                        <th>Nome do Produto</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th>Opções</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($produtos as $c)
                        <tr class="text-center">
                            <td>{{ $c->id }}</td>
                            <td class="text-left">{{ $c->nome }}</td>
                            <td>{{ number_format($c['preco'], 2, ',', '.') }}</td>
                            <td class="text-left">{{ $c->categoria->nome }}</td>
                            <form action="{{route('produtos.destroy', $c['id'])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <td>
                                    <a href="{{ route('produtos.show', $c->id) }}" class="btn btn-light btn-sm">Visualizar</a>
                                    <a href="{{ route('produtos.edit', $c->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <input class="btn btn-danger btn-sm" type="submit" value="Excluir">
                                </td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h5 class="text-danger">Não há registro de Produtos cadastrados!</h5>
            @endif
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-4">
                    <a href="{{ route('produtos.create') }}" class="btn btn-success btn-sm">Adicionar</a>
                    <a href="../public" class="btn btn-secondary btn-sm">Voltar</a>
                </div>
                <div class="col-sm-8">
                    @if($alerta != '')
                        <div class="form-control form-control-sm text-center alert-success">
                            {{ $alerta }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection