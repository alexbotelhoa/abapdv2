@extends('layouts.app', ["current" => "categorias"])

@section('body')

    <h4>Categorias Adicionar</h4>

    <div class="card border">
        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nome">Nome da Categoria</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Categoria">
                </div>
                <div class="form-group">
                    <label for="imposto">Imposto</label>
                    <input type="number" class="form-control" name="imposto" id="imposto" step="0.01" placeholder="0.00">
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                        <button type="reset" class="btn btn-primary btn-sm">Limpar</button>
                        <a href="{{ route('categorias.index') }}" class="btn btn-secondary btn-sm">Voltar</a>
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