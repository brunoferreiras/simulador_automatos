<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Automato;
use function Sodium\add;

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
            $arrayEventos[] = trim($evento);
        }

        return $arrayEventos;
    }

    public function getEventById($id)
    {
        $eventos = $this->getEvents();
        return $eventos[$id];
    }

    public function getEdges()
    {
        $linhas = explode(";", $this->relacao);
        $edges = array();
        array_pop($linhas);

        foreach ($linhas as $linha) {
            $divisor = explode('->', $linha);
            $estado = trim($divisor[0]);
            $relacoesEstado = $divisor[1];

            $relacaoIndividual = explode('|', $relacoesEstado);

            $i = 0;
            foreach($relacaoIndividual as $unidade) {
                $unidade = trim($unidade);
                if($unidade != '-') {
                    $edge = [
                        "from" => $estado,
                        "to" => $unidade,
                        "label" => $this->getEventById($i)
                    ];
                    $edges[] = $edge;
                }
                $i++;
            }
        }

        $linhas = array();
        foreach ($edges as $edge) {
            $linha = implode("|", $edge);
            $linhas[] = $linha;
        }
        $relacoes = implode(";", $linhas);
        return $relacoes;
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
