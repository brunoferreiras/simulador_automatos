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

        $estados = explode(",", $this->estados);
        $arrayEstados = array();

        foreach($estados as $estado) {
            $arrayEstados[trim($estado)] = trim($estado);
        }

        return implode("|",$arrayEstados);
    }

    public function getEvents()
    {
        $eventos = explode(",", $this->eventos);
        $arrayEventos = array();

        foreach($eventos as $evento) {
            $arrayEventos[trim($evento)] = trim($evento);
        }

        return implode("|",$arrayEventos);
    }

    public function getEdges()
    {
        return "getEdges";
    }

    public function getEstadosMarcados()
    {
        $estadosMarcados = explode(",", $this->estadosMarcados);
        $arrayEstadosMarcados = array();

        foreach($estadosMarcados as $estadoMarcado) {
            $arrayEstadosMarcados[trim($estadoMarcado)] = trim($estadoMarcado);
        }
        return implode("|",$arrayEstadosMarcados);
    }

    public function getEstadoInicial()
    {
        return trim($this->estadoInicial);
    }
}
