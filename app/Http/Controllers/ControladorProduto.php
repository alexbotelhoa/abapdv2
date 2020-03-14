<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Produto;
use App\Message;
use Illuminate\Http\Request;

class ControladorProduto extends Controller
{
    private $produto;

    public function __construct()
    {
        $this->produto = new Produto();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        $alerta = Message::getSuccess();
        return view('produtos.index', ['produtos' => $produtos, 'alerta' => $alerta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $alerta = Message::getError();
        return view('produtos.create', ['categorias' => $categorias, 'alerta' => $alerta]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->input('nome') == '') {
            Message::setError("Informe o NOME!");
            return redirect()->route('produtos.create');
        }

        if ($request->input('preco') == '') {
            Message::setError("Informe o PREÇO!");
            return redirect()->route('produtos.create');
        }

        if ($request->input('categoria_id') == '') {
            Message::setError("Informe a CATEGORIA!");
            return redirect()->route('produtos.create');
        }

        $this->produto->nome = $request->input('nome');
        $this->produto->preco = $request->input('preco');
        $this->produto->categoria_id = $request->input('categoria_id');
        $this->produto->save();

        Message::setSuccess("Registro incluído com sucesso!");
        return redirect()->route('produtos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        $categoria = Categoria::find($produto->categoria_id);
        return view('produtos.show', ['produto' => $produto, 'categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        $categorias = Categoria::all();
        $alerta = Message::getError();
        return view('produtos.edit', ['produto' => $produto, 'categorias' => $categorias, 'alerta' => $alerta]);
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
        if ($request->input('nome') == '') {
            Message::setError("Informe o NOME!");
            return redirect()->route('produtos.edit');
        }

        if ($request->input('preco') == '') {
            Message::setError("Informe o PREÇO!");
            return redirect()->route('produtos.edit');
        }

        if ($request->input('categoria_id') == '') {
            Message::setError("Informe a CATEGORIA!");
            return redirect()->route('produtos.edit');
        }

        $nome = $request->input('nome');
        $preco = $request->input('preco');
        $categoria_id = $request->input('categoria_id');

        Produto::where('id','=',$id)
            ->update([
                'nome' => $nome,
                'preco' => $preco,
                'categoria_id' => $categoria_id
            ]);
        Message::setSuccess("Registro alterado com sucesso!");
        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produto::destroy($id);
        Message::setSuccess("Registro excluído com sucesso!");
        return redirect()->route('produtos.index');
    }
}