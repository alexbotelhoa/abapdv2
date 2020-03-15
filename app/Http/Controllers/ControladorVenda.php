<?php

namespace App\Http\Controllers;

use App\Carrinho;
use App\Message;
use App\Produto;
use App\Venda;
use Illuminate\Http\Request;

class ControladorVenda extends Controller
{
    private $venda;

    public function __construct()
    {
        $this->venda = new Venda();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$vendas = new Venda;
        $vendas = $this->venda->all();
        $vendas = $vendas->groupBy('carrinho');

        $carrinhos = [];
        $count = 1;
        $carrinho = 0;
        $data = 0;
        $success = Message::getSuccess();

        foreach ($vendas as $produtos) {
            $valor = 0;

            foreach ($produtos as $c) {
                $carrinho = $c->carrinho;
                $data = $c->created_at;
                $valor += $c->quantidade * $c->preco * (($c->imposto / 100) + 1);
            }

            array_push($carrinhos, [
                'nr' => $count,
                'carrinho' => $carrinho,
                'data' => $data,
                'valor' => $valor
            ]);

            $count++;
        }

        return view('vendas.index', [
            'carrinhos' => $carrinhos,
            'success' => $success
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carrinho_last = $this->venda->all()->last();
        (empty($carrinho_last)) ? $carrinho_next = 10 : $carrinho_next = (int)$carrinho_last->carrinho + 1;

        $carrinho = session('carrinho');
        foreach ($carrinho as $c) {
            $venda = new Venda();
            $venda->carrinho = $carrinho_next;
            $venda->produto_id = $c['produto_id'];
            $venda->quantidade = $c['quantidade'];
            $venda->preco = $c['preco'];
            $venda->imposto = $c['imposto'];
            $venda->save();
        }

        Message::setSuccess("Venda realizada com sucesso!");
        return redirect()->route('carrinho.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendas = Venda::all()->where('carrinho', '=', $id);
        $valorSemImposto = 0;
        $valorDoImposto = 0;
        $valorTotal = 0;

        foreach ($vendas as $c) {
            $total = $c['quantidade'] * $c['preco'] * (($c['imposto'] / 100) + 1);
            $valorSemImposto += $c['quantidade'] * $c['preco'];
            $valorDoImposto += $total - ($c['quantidade'] * $c['preco']);
            $valorTotal += $total;
        }

        return view('vendas.show', [
            'vendas' => $vendas,
            'valorSemImposto' => $valorSemImposto,
            'valorDoImposto' => $valorDoImposto,
            'valorTotal' => $valorTotal
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendas = Venda::all()->where('carrinho', '=', $id);

        foreach ($vendas as $c) {
            Venda::destroy($c->id);
        }

        Message::setSuccess("Registro excluído com sucesso!");
        return redirect()->route('vendas.index');
    }
}
