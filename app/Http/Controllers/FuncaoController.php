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
        $nomeParteAcessivel = "Parte acessível do autômato: " . $this->automato->getNome();
        $eventosParteAcessivel = $this->eventos;
        $estadosMarcadosParteAcessivel = $this->estadosMarcados;
        $estadoInicialParteAcessivel = $this->estadoInicial;

        $relacaoParteAcessivel = array();
        $estadosNaoAcessiveis = array();
        $estadosParteAcessivel = array();

        foreach ($this->estados as $estado) {
            $acessivel = false;
            foreach($this->relacao as $relacao) {
                $to = $relacao[1];

                if($estado == $to) {
                    $acessivel = true;
                }
            }

            if(!$acessivel) {
                $estadosNaoAcessiveis[] = $estado;
            }
        }

        // Gera as novas relações do autômato parte acessível
        foreach ($estadosNaoAcessiveis as $estadoNaoAcessivel) {
            foreach($this->relacao as $relacao) {
                $from = $relacao[0];
                $to = $relacao[1];
                $label = $relacao[2];

                if($estadoNaoAcessivel != $from) {
                    $relacaoParteAcessivel[] = [$from, $to, $label];
                }
            }
        }

        // Retira os estados que não são acessíveis
        foreach ($this->estados as $estado) {
            $acessivel = true;
            foreach ($estadosNaoAcessiveis as $estadoNaoAcessivel) {
                if($estado == $estadoNaoAcessivel) {
                    $acessivel = false;
                }
            }
            if($acessivel) {
                $estadosParteAcessivel[] = $estado;
            }
        }

        // Gera um objeto contendo o autômato parte acessível
        $automatoParteAcessivel = (object) [
            'nome' => $nomeParteAcessivel,
            'nodes' => $estadosParteAcessivel,
            'eventos' => $eventosParteAcessivel,
            'estadoInicial' => $estadoInicialParteAcessivel,
            'estadosMarcados' => $estadosMarcadosParteAcessivel,
            'edges' => $relacaoParteAcessivel
        ];

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
        $nomeComplemento = "Complemento do autômato: " . $this->automato->getNome();
        $eventosComplemento = $this->eventos;
        $estadosComplemento = $this->estados;        
        $estadoInicialComplemento = $this->estadoInicial;

        $estadosComplemento[] = 'dump'; // Adiciona o estado d (dump)
        
        // Inverte a marcação dos estados
        $estadosMarcadosComplemento = $estadosComplemento;
        foreach ($this->estadosMarcados as $estadoMarcado) {
            $indexValue = array_search($estadoMarcado, $estadosComplemento);
            if($indexValue) {
                unset($estadosMarcadosComplemento[$indexValue]);    
            }
        }

        $relacaoComplemento = array();
        $relacoes = $this->relacao;
        foreach ($this->estados as $estado) {
            foreach ($eventosComplemento as $evento) {  
                foreach ($relacoes as $relacao) {   
                    $cont = 0;                
                    $from = $relacao[0];
                    $to = $relacao[1];
                    $label = $relacao[2];
                    if(($from == $estado) && ($label == $evento) && ($to != 'dump')) {
                        $relacaoComplemento[] = [$from, $to, $label];
                        break;
                    } elseif(($from == $estado) && ($label != $evento)) {
                        foreach ($relacaoComplemento as $item) {
                            if(($item[0] == $estado) && (($item[2] == $evento))) {
                                $cont++;    
                            }                            
                        }
                        if($cont == 0) {
                            $relacaoComplemento[] = [$estado, 'dump', $evento];    
                        }                         
                    }
                }             
            } 
            array_shift($relacoes);           
        }

        // dd($contador);
        // $relacaoComplemento = array_unique($relacaoComplemento);
        // dd($relacaoComplemento);

        // Gera um objeto contendo o autômato parte acessível
        $automatoComplemento = (object) [
            'nome' => $nomeComplemento,
            'nodes' => $estadosComplemento,
            'eventos' => $eventosComplemento,
            'estadoInicial' => $estadoInicialComplemento,
            'estadosMarcados' => $estadosComplemento,
            'edges' => $relacaoComplemento
        ];

        return $automatoComplemento;
    }

    public function composicaoProduto()
    {

    }

    public function composicaoParalela()
    {

    }
}
