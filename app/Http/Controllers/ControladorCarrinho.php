<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Message;
use Illuminate\Http\Request;

class ControladorCarrinho extends Controller
{
    private $carrinho = [
        ['id' => 1, 'produto_id' => '10', 'produto_nome' => 'Produto 10', 'quantidade' => '2', 'preco' => '10','imposto' => '4', 'total' => '20.80'],
        ['id' => 2, 'produto_id' => '20', 'produto_nome' => 'Produto 20', 'quantidade' => '4', 'preco' => '20','imposto' => '8', 'total' => '86.40'],
        ['id' => 3, 'produto_id' => '30', 'produto_nome' => 'Produto 30', 'quantidade' => '6', 'preco' => '30','imposto' => '12', 'total' => '201.60'],
        ['id' => 4, 'produto_id' => '40', 'produto_nome' => 'Produto 40', 'quantidade' => '8', 'preco' => '40','imposto' => '16', 'total' => '371.20'],
        ['id' => 5, 'produto_id' => '50', 'produto_nome' => 'Produto 50', 'quantidade' => '10', 'preco' => '50','imposto' => '20', 'total' => '600.00']
    ];

    public function __construct()
    {
        $carrinho = session('carrinho');
        if (!isset($carrinho)) {
            session(['carrinho' => $this->carrinho]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        $carrinho = session('carrinho');
        $valorSemImposto = 0;
        $valorComImposto = 0;
        $success = Message::getSuccess();
        $error = Message::getError();

        foreach ($carrinho as $c) {
            $valorSemImposto += $c['quantidade'] * $c['preco'];
            $valorComImposto += $c['total'];
        }

        return view('home', [
            'produtos' => $produtos,
            'carrinho' => $carrinho,
            'valorSemImposto' => $valorSemImposto,
            'valorComImposto' => $valorComImposto,
            'success' => $success,
            'error' => $error
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->input('produto_id') == '') {
            Message::setError("Escolha um PRODUTO!");
            return redirect()->route('carrinho.index');
        }

        if ($request->input('quantidade') == '') {
            Message::setError("Informe a QUANTIDADE!");
            return redirect()->route('carrinho.index');
        }

        $carrinho = session('carrinho');
        $id = end($carrinho)['id'];

        $produtos = Produto::find($request->produto_id);
        $nome = $produtos->nome;
        $nome = $produtos->nome;
        $nome = $produtos->nome;
        $nome = $produtos->nome;
        $nome = $produtos->nome;
        $dados = [
            'id' => $id + 1,
            'produto_id' => $produtos->id,
            'produto_nome' => $produtos->nome,
            'quantidade' => $request->quantidade,
            'preco' => $produtos->preco,
            'imposto' => $produtos->categoria->imposto,
            'total' => $request->quantidade * $produtos->preco * $produtos->categoria->imposto
        ];
        $carrinho[] = $dados;
        session(['carrinho' => $carrinho]);
        return redirect()->route('carrinho.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrinho = session('carrinho');
        $index = $this->getIndex($id, $carrinho);
        array_splice($carrinho, $index, 1);
        session(['carrinho' => $carrinho]);
        return redirect()->route('carrinho.index');
    }

    public function getIndex($id, $carrinho)
    {
        $ids = array_column($carrinho, 'id');
        $index = array_search($id, $ids);
        return $index;
    }
}
