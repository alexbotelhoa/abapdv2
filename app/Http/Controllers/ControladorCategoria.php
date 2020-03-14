<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Message;
use Illuminate\Http\Request;

class ControladorCategoria extends Controller
{
    private $categoria;

    public function __construct()
    {
        $this->categoria = new Categoria();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        $alerta = Message::getSuccess();
        return view('categorias.index', ['categorias' => $categorias, 'alerta' => $alerta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alerta = Message::getError();
        return view('categorias.create', compact('alerta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->input('nome') == '') {
            Message::setError("Informe o NOME!");
            return redirect()->route('categorias.create');
        }

        if ($request->input('imposto') == '') {
            Message::setError("Informe o IMPOSTO!");
            return redirect()->route('categorias.create');
        }

        $this->categoria->nome = $request->input('nome');
        $this->categoria->imposto = $request->input('imposto');
        $this->categoria->save();

        Message::setSuccess("Registro incluído com sucesso!");
        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        $alerta = Message::getError();
        return view('categorias.edit', ['categoria' => $categoria, 'alerta' => $alerta]);
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
        if ($request->input('nome') == '') {
            Message::setError("Informe o NOME!");
            return redirect()->route('categorias.edit');
        }

        if ($request->input('imposto') == '') {
            Message::setError("Informe o IMPOSTO!");
            return redirect()->route('categorias.edit');
        }

        $nome = $request->input('nome');
        $imposto = $request->input('imposto');

        Categoria::where('id', '=', $id)
            ->update([
                'nome' => $nome,
                'imposto' => $imposto
            ]);
        Message::setSuccess("Registro alterado com sucesso!");
        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categoria::destroy($id);
        Message::setSuccess("Registro excluído com sucesso!");
        return redirect()->route('categorias.index');
    }
}