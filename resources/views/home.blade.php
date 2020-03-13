@extends('layouts.app', ["current" => "home"])

@section('body')
    <div class="jumbotron bg-light border border-secondary">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Categorias</h5>
                        <p class="card-text">
                            Aqui você cadastra todas as suas categorias.
                        </p>
                        <a href="/abapdv2/public/categorias" class="btn btn-primary">Cadastre suas categorias</a>
                    </div>
                </div>
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Produtos</h5>
                        <p class="card-text">
                            Aqui você cadastra todos os seus produtos.
                        </p>
                        <a href="/abapdv2/public/produtos" class="btn btn-primary">Cadastre seus produtos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection