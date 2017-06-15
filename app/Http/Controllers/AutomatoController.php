<?php

namespace App\Http\Controllers;

use App\Automato;
use Illuminate\Http\Request;

class AutomatoController extends Controller
{
    private $automato;

    public function __construct(Automato $automato)
    {
        $this->automato = $automato;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $automatos = $this->automato->get();
        return view('automatos.index', compact('automatos'));
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
            'nome' => trim($request->nome),
            'estados' => trim($request->estados),
            'eventos' => trim($request->eventos),
            'relacao_estados_eventos' => trim($request->relacao_estados_eventos),
            'estado_inicial' => trim($request->estado_inicial),
            'estados_marcados' => trim($request->estados_marcados)
        ];

        $criado = $this->automato->create($dados);

        if($criado){
            return redirect()->route('automatos.index')->with('success', 'Autômato cadastrado com sucesso!');
        }
        else{
            return redirect()->route('automatos.index')->with('error', 'Não foi possível cadastrar o autômato! Por favor, tente novamente!');
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
