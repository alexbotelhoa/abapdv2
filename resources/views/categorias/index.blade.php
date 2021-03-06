@extends('layouts.app', ["current" => "categorias"])

@section('body')

    <div class="card border">
        <div class="card-body">
            <h4 class="card-title"><i class="fas fa-boxes"></i> Cadastro de Categorias</h4>
            @if(count($categorias) > 0)
                <table class="table table-ordered table-hover">
                    <thead>
                    <tr class="text-center">
                        <th>Código</th>
                        <th>Nome da Categoria</th>
                        <th>Imposto</th>
                        <th>Opções</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categorias as $c)
                        <tr class="text-center">
                            <td>{{ $c->id }}</td>
                            <td class="text-left">{{ $c->nome }}</td>
                            <td>{{ $c->imposto }}%</td>
                            <form action="{{route('categorias.destroy', $c['id'])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <td>
                                    <a href="{{ route('categorias.show', $c->id) }}" class="btn btn-light btn-sm">Visualizar</a>
                                    <a href="{{ route('categorias.edit', $c->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <input class="btn btn-danger btn-sm" type="submit" value="Excluir">
                                </td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h5 class="text-danger">Não há registro de Categorias cadastradas!</h5>
            @endif
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-4">
                    <a href="{{ route('categorias.create') }}" class="btn btn-success btn-sm">Adicionar</a>
                    <a href="../public" class="btn btn-secondary btn-sm">Voltar</a>
                </div>
                <div class="col-sm-8">
                    @if($success != '')
                        <div class="form-control form-control-sm alert-success" align="center">
                            {{ $success }}
                        </div>
                    @endif
                    @if($error != '')
                        <div class="form-control form-control-sm alert-danger" align="center">
                            {{ $error }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection