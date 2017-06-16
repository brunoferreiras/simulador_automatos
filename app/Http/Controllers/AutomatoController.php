<?php

namespace App\Http\Controllers;

use App\Automato;
use Illuminate\Http\Request;
use App\Http\Controllers\FuncaoController as FuncaoAutomato;

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
        $automato = $this->automato->find($automato->id);

        $funcoes = new FuncaoAutomato($automato);
        $nodes = $funcoes->getNodes();
        $edges = $funcoes->getEdges();
        $eventos = $funcoes->getEvents();
        $estadosMarcados = $funcoes->getEstadosMarcados();
        $estadoInicial = $funcoes->getEstadoInicial();

        dd($eventos);
        return view('automatos.show')
            ->with('automato', $automato)
            ->with('nodes', $nodes)
            ->with('edges', $edges)
            ->with('eventos', $eventos)
            ->with('estadoInicial', $estadoInicial)
            ->with('estadosMarcados', $estadosMarcados);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Automato  $automato
     * @return \Illuminate\Http\Response
     */
    public function edit(Automato $automato)
    {
        $automato = $this->automato->find($automato->id);
        return view('automatos.edit', compact('automato'));
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
        $this->validate($request,[
            'nome' => 'required',
            'estados' => 'required',
            'eventos' => 'required',
            'relacao_estados_eventos' => 'required',
            'estado_inicial' => 'required',
            'estados_marcados' => 'required'
        ]);

        $update = $this->automato->find($automato->id)->update($request->all());

        if($update){
            return redirect()->route('automatos.index')->with('success', 'Autômato editado com sucesso!');
        }
        else{
            return redirect()->route('automatos.index')->with('error', 'Não foi possível editar o autômato! Por favor, tente novamente!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Automato  $automato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Automato $automato)
    {
        $delete = $this->automato->find($automato->id)->delete();

        if($delete){
            return redirect()->route('automatos.index')->with('success', 'Autômato excluído com sucesso!');
        }
        else{
            return redirect()->route('automatos.index')->with('error', 'Não foi possível excluir o autômato! Por favor, tente novamente!');
        }
    }
}
