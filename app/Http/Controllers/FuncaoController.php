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

    public function parteAcessivel($automato)
    {
        $nomeParteAcessivel = "Parte acessível do autômato: " . $automato->nome;
        $eventosParteAcessivel = $automato->eventos;
        $estadosMarcadosParteAcessivel = $automato->estadosMarcados;
        $estadoInicialParteAcessivel = $automato->estadoInicial;

        $relacaoParteAcessivel = array();
        $estadosNaoAcessiveis = array();
        $estadosParteAcessivel = array();

        foreach ($automato->estados as $estado) {
            $acessivel = false;
            foreach($automato->relacao as $relacao) {
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
        if($estadosNaoAcessiveis) {
            foreach ($estadosNaoAcessiveis as $estadoNaoAcessivel) {
                foreach($automato->relacao as $relacao) {
                    $from = $relacao[0];
                    $to = $relacao[1];
                    $label = $relacao[2];

                    if($estadoNaoAcessivel != $from) {
                        $relacaoParteAcessivel[] = [$from, $to, $label];
                    }
                }
            }
        } else {
            $relacaoParteAcessivel = $automato->relacao;
        }

        // Retira os estados que não são acessíveis
        foreach ($automato->estados as $estado) {
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
            'estados' => $estadosParteAcessivel,
            'eventos' => $eventosParteAcessivel,
            'estadoInicial' => $estadoInicialParteAcessivel,
            'estadosMarcados' => $estadosMarcadosParteAcessivel,
            'edges' => $relacaoParteAcessivel,
            'relacao' => $relacaoParteAcessivel
        ];

        return $automatoParteAcessivel;
    }

    public function parteCoAcessivel($automato)
    {
        $nomeParteCoAcessivel = "Parte acessível do autômato: " . $automato->nome;
        $eventosParteCoAcessivel = $automato->eventos;
        $estadosMarcadosParteCoAcessivel = $automato->estadosMarcados;
        $estadoInicialParteCoAcessivel = $automato->estadoInicial;

        $relacaoParteCoAcessivel = array();
        $estadosNaoCoAcessiveis = array();
        $estadosParteCoAcessivel = array();

        foreach ($automato->estados as $estado) {
            $coAcessivel = false;
            foreach($automato->relacao as $relacao) {
                $from = $relacao[0];
                $to = $relacao[1];

                if($estado == $from) {
                    $coAcessivel = true;
                }
            }

            if(!$coAcessivel) {
                $estadosNaoCoAcessiveis[] = $estado;
            }
        }        

        // Gera as novas relações do autômato parte acessível
        if($estadosNaoCoAcessiveis) {
            foreach ($estadosNaoCoAcessiveis as $estadoNaoCoAcessivel) {
                foreach($automato->relacao as $relacao) {
                    $from = $relacao[0];
                    $to = $relacao[1];
                    $label = $relacao[2];

                    if($estadoNaoCoAcessivel != $to) {
                        $relacaoParteCoAcessivel[] = [$from, $to, $label];
                    }
                }
            }
        } else {
            $relacaoParteCoAcessivel = $automato->relacao;
        }

        // Retira os estados que não são acessíveis
        foreach ($automato->estados as $estado) {
            $coAcessivel = true;
            foreach ($estadosNaoCoAcessiveis as $estadoNaoCoAcessivel) {
                if($estado == $estadoNaoCoAcessivel) {
                    $coAcessivel = false;
                }
            }
            if($coAcessivel) {
                $estadosParteCoAcessivel[] = $estado;
            }
        }       

        // Gera um objeto contendo o autômato parte acessível
        $automatoParteCoAcessivel = (object) [
            'nome' => $nomeParteCoAcessivel,
            'nodes' => $estadosParteCoAcessivel,
            'estados' => $estadosParteCoAcessivel,
            'eventos' => $eventosParteCoAcessivel,
            'estadoInicial' => $estadoInicialParteCoAcessivel,
            'estadosMarcados' => $estadosMarcadosParteCoAcessivel,
            'edges' => $relacaoParteCoAcessivel,
            'relacao' => $relacaoParteCoAcessivel
        ];

        return $automatoParteCoAcessivel;
    }

    public function trim($automato)
    {
        $nomeTRIM = "TRIM do autômato: " . $automato->nome;        
        $automatoParteAcessivel = $this->parteAcessivel($automato);
        $automatoParteCoAcessivel = $this->parteCoAcessivel($automatoParteAcessivel);
        $automato = $automatoParteCoAcessivel;        
        $estadosTRIM = $automato->estados;
        $eventosTRIM = $automato->eventos;
        $estadosMarcadosTRIM = $automato->estadosMarcados;
        $estadoInicialTRIM = $automato->estadoInicial;
        $relacaoTRIM = $automato->relacao;

        // Gera um objeto contendo o autômato parte acessível
        $automatoTRIM = (object) [
            'nome' => $nomeTRIM,
            'nodes' => $estadosTRIM,
            'estados' => $estadosTRIM,
            'eventos' => $eventosTRIM,
            'estadoInicial' => $estadoInicialTRIM,
            'estadosMarcados' => $estadosMarcadosTRIM,
            'edges' => $relacaoTRIM,
            'relacao' => $relacaoTRIM
        ];

        return $automatoTRIM;
    }

    public function complemento($automato)
    {
        $automato = $this->trim($automato);
        $nomeComplemento = "Complemento do autômato: " . $automato->nome;
        $eventosComplemento = $automato->eventos;
        $estadosComplemento = $automato->estados;        
        $estadoInicialComplemento = $automato->estadoInicial;
        $nomeEstadoDump = 'Xd';

        $estadosComplemento[] = $nomeEstadoDump; // Adiciona o estado d (Xd)
        
        // Inverte a marcação dos estados
        $estadosMarcadosComplemento = $estadosComplemento;
        foreach ($automato->estadosMarcados as $estadoMarcado) {
            $indexValue = array_search($estadoMarcado, $estadosComplemento);
            if($indexValue) {
                unset($estadosMarcadosComplemento[$indexValue]);    
            }
        }

        $relacaoComplemento = array();
        $relacoes = $automato->relacao;
        foreach ($automato->estados as $estado) {
            foreach ($eventosComplemento as $evento) {
                $contEstado = 0;
                foreach ($relacoes as $relacao) {   
                    $cont = 0;                
                    $from = $relacao[0];
                    $to = $relacao[1];
                    $label = $relacao[2];
                    if(($from == $estado) && ($label == $evento) && ($to != $nomeEstadoDump)) {
                        $contDump = 0;
                        foreach ($relacaoComplemento as $item) {
                            if(($item[0] == $estado) && ($item[1] == $nomeEstadoDump) && ($item[2] == $evento)) {
                                $contDump++;
                            }
                        }
                        if($contDump > 0) {
                            array_pop($relacaoComplemento);
                        }
                        $relacaoComplemento[] = [$from, $to, $label];
                        $contEstado++;
                        break;
                    } elseif(($from == $estado) && ($label != $evento)) {
                        foreach ($relacaoComplemento as $item) {
                            if(($item[0] == $estado) && ($item[2] == $evento)) {
                                $cont++;    
                            }                            
                        }
                        if($cont == 0) {
                            $relacaoComplemento[] = [$estado, $nomeEstadoDump, $evento];
                            $contEstado++;
                        }                         
                    }
                }             
            }
            if($contEstado == 0) {
                foreach ($eventosComplemento as $value) {
                    $relacaoComplemento[] = [$estado, $nomeEstadoDump, $value];
                }
            }
            array_shift($relacoes);           
        }
        
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
