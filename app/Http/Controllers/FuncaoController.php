<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Automato;

class FuncaoController extends Controller
{
    private $id;
    private $nome;
    private $estados;
    private $eventos;
    private $relacao;
    private $estadoInicial;
    private $estadosMarcados;

    public function __construct(Automato $automato)
    {
        $automato = $automato->find($automato->id);

        $this->id = $automato->id;
        $this->nome = $automato->nome;
        $this->estados = $automato->estados;
        $this->eventos = $automato->eventos;
        $this->relacao = $automato->relacao_estados_eventos;
        $this->estadoInicial =  $automato->estado_inicial;
        $this->estadosMarcados = $automato->estados_marcados;
    }

    public function getNodes()
    {
        return "getNodes";
    }

    public function getEvents()
    {
        return "getEvents";
    }

    public function getEdges()
    {
        return "getEdges";
    }

    public function getEstadosMarcados()
    {
        return "getEstadosMarcados";
    }

    public function getEstadoInicial()
    {
        return "estado inicial";
    }
}
