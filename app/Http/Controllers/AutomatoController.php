<?php

namespace App\Http\Controllers;

use App\Automato;
use Illuminate\Http\Request;

class AutomatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('automatos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('automatos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nome' => 'required|unique:automatos',
            'estados' => 'required',
            'eventos' => 'required',
            'relacao_estados_eventos' => 'required',
            'estado_inicial' => 'required',
            'estados_marcados' => 'required'
        ]);

        $dados = [
            'nome' => $request->tag_rfid,
            'estados' => $request->cod_barras,
            'eventos' => $request->produto,
            'relacao_estados_eventos' => trim($request->descricao),
            'estado_inicial' => $request->quantidade,
            'estados_marcados' => $request->quantidade,
        ];

        $criado = $this->produto->create($dados);

        if($criado){
            return redirect()->route('automatos.index')->with('success', 'Produto cadastrado com sucesso!');
        }
        else{
            return redirect()->route('automatos.index')->with('error', 'Não foi possível cadastrar o produto! Por favor, tente novamente!');
        }
        
        return redirect(route('automatos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Automato  $automato
     * @return \Illuminate\Http\Response
     */
    public function show(Automato $automato)
    {
        return view('automatos.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Automato  $automato
     * @return \Illuminate\Http\Response
     */
    public function edit(Automato $automato)
    {
        return view('automatos.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Automato  $automato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Automato $automato)
    {
        return redirect(route('automatos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Automato  $automato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Automato $automato)
    {
        return redirect(route('automatos.index'));
    }
}
