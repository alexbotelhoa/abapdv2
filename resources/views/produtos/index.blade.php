@extends('layouts.app', ["current" => "produtos"])

@section('body')

    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Produtos</h5>
            @if(count($produtos) > 0)
                <table class="table table-ordered table-hover">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome do Produto</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th>Opções</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($produtos as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->nome }}</td>
                            <td>{{ $c->preco }}</td>
                            <td>{{ $c->categoria_id }}</td>
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
            <a href="{{ route('produtos.create') }}" class="btn btn-success btn-sm">Adicionar</a>
            <a href="../public" class="btn btn-secondary btn-sm">Voltar</a>
        </div>
    </div>

@endsection