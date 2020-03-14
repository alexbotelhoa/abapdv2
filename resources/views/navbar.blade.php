<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
    <div class="container d-flex justify-content-between">
        <a href="#" class="navbar-brand d-flex align-items-center">
            <img src="{{ asset('/img/coin.png') }}">&nbsp;<strong>PDV</strong>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Portal <span class="sr-only">(current)</span></a>
                </li>
                <li @if($current == "home") class="nav-item active" @else class="nav-item" @endif>
                    <a class="nav-link" href="/abapdv2/public">Home <span class="sr-only">(current)</span></a>
                </li>
                <li @if($current == "categorias") class="nav-item active" @else class="nav-item" @endif>
                    <a class="nav-link" href="/abapdv2/public/categorias">Categorias <span class="sr-only">(current)</span></a>
                </li>
                <li @if($current == "produtos") class="nav-item active" @else class="nav-item" @endif>
                    <a class="nav-link" href="/abapdv2/public/produtos">Produtos <span class="sr-only">(current)</span></a>
                </li>
                <li @if($current == "vendas") class="nav-item active" @else class="nav-item" @endif>
                    <a class="nav-link" href="/abapdv2/public/vendas">Vendas <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>