<?php

namespace App\Http\Controllers;

use App\Automato;
use Illuminate\Http\Request;

class FuncaoController extends Controller
{
    private $automato;
    private $nome;
    private $estados;
    private $eventos;
    private $relacao;
    private $estadoInicial;
    private $estadosMarcados;

    public function __construct(Automato $automato)
    {
        $this->automato = new GeraAutomatoController($automato);
        $this->nome = $this->automato->getNome();
        $this->setEventos($this->automato->getEvents());
        $this->setEstados($this->automato->getNodes());
        $this->setRelacao($this->automato->getEdges());
        $this->estadoInicial = $this->automato->getEstadoInicial();
        $this->setEstadosMarcados($this->automato->getEstadosMarcados());
    }

    public function getNome() {
        return $this->nome;
    }

    public function setEstados($estados)
    {
        $this->estados = explode("|", $estados);
    }

    public function setEventos($eventos)
    {
        $this->eventos = $eventos;
    }

    public function setRelacao($relacao)
    {
        $linhas = explode(";", $relacao);
        $relacoes = array();

        foreach ($linhas as $linha) {
            $relacoes[] = explode("|", $linha);
        }

        $this->relacao = $relacoes;
    }

    public function setEstadosMarcados($estadosMarcados)
    {
        $this->estadosMarcados = explode("|", $estadosMarcados);
    }

    public function linguagemGerada()
    {

    }

    public function linguagemMarcada()
    {

    }

    public function parteAcessivel()
    {
//        dd($this->relacao);
        $nome = "Parte acessível";
        $relacoes = $this->relacao;
        $estados = $this->estados;
        $eventos = $this->eventos;
        $estadosMarcados = $this->estadosMarcados;
        $estadoInicial = $this->estadoInicial;

        foreach($relacoes as $relacao) {
            $relacao[0]; // Local de saída da seta
        }
        die();

        $nome = $funcoes->getNome();
        $nodes = $funcoes->getNodes();
        $edges = $funcoes->getEdges();
        $eventos = $funcoes->getEvents();
        $estadosMarcados = $funcoes->getEstadosMarcados();
        $estadoInicial = $funcoes->getEstadoInicial();

        dd($nome);
        $automatoParteAcessivel = '';

        return $automatoParteAcessivel;
    }

    public function parteCoAcessivel()
    {

    }

    public function trim()
    {

    }

    public function complemento()
    {

    }

    public function composicaoProduto()
    {

    }

    public function composicaoParalela()
    {

    }
}
