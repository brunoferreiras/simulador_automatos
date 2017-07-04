<?php

namespace App\Http\Controllers;

use App\Automato;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{
    private $automato;
    private $funcao;

    public function resultadoFuncao(Request $request)
    {
        $this->automato = Automato::find($request->automato);
        $this->funcao = $request->funcao;

        switch ($this->funcao) {
            // Linguagem Gerada
            case '1':
                $view = $this->resultadoLinguagemGerada($this->automato);
                return $view;
                break;
            // Linguagem Marcada
            case '2':
                $view = $this->resultadoLinguagemMarcada($this->automato);
                return $view;
                break;
            // Parte Acessível
            case '3':
                $view = $this->resultadoParteAcessivel($this->automato);
                return $view;
                break;
            // Parte CoAcessível
            case '4':
                $view = $this->resultadoParteCoAcessivel($this->automato);
                return $view;
                break;
            // TRIM
            case '5':
                $view = $this->resultadoTrim($this->automato);
                return $view;
                break;
            // Complemento
            case '6':
                $view = $this->resultadoComplemento($this->automato);
                return $view;
                break;
            default:
                return redirect('funcoes');
        }
    }

    public function resultadoOperacao(Request $request)
    {
        $automato1 = Automato::find($request->automato1);
        $automato1 = new FuncaoController($automato1);
        $automato2 = Automato::find($request->automato2);
        $automato2 = new FuncaoController($automato2);
        $funcao = $request->operacao;

        switch ($funcao) {
            // Composição Produto
            case '1':
                $view = $this->resultadoComposicaoProduto($automato1, $automato2);
                return $view;
                break;
            // Composição Paralela
            case '2':
                $view = $this->resultadoComposicaoParalela($automato1, $automato2);
                return $view;
                break;
            default:
                return redirect('operacoes');
        }
    }

    public function resultadoLinguagemGerada($automato)
    {
        $title = "Linguagem Gerada";
        $automato = new FuncaoController($this->automato);
        $linguagemGerada = $automato->linguagemGerada($automato);
        $possuiGrafico = false;
        return view('resultados.funcao', compact('title', 'possuiGrafico', 'linguagemGerada'));
    }

    public function resultadoLinguagemMarcada($automato)
    {
        $title = "Linguagem Marcada";
        $automato = new FuncaoController($this->automato);
        $linguagemMarcada = $automato->linguagemMarcada($automato);
        $possuiGrafico = false;
        return view('resultados.funcao', compact('title', 'possuiGrafico', 'linguagemMarcada'));
    }

    public function formatNodes($nodes) {
        $arrayEstados = array();
        foreach($nodes as $node) {
            $arrayEstados[trim($node)] = trim($node);
        }

        return implode("|",$arrayEstados);
    }

    public function formatEdges($edges) {
        $linhas = array();
        foreach ($edges as $edge) {
            $linha = implode("|", $edge);
            $linhas[] = $linha;
        }
        $relacoes = implode(";", $linhas);
        return $relacoes;
    }

    public function resultadoParteAcessivel()
    {
        $title = "Parte Acessível";
        $possuiGrafico = true;
        $automato = new FuncaoController($this->automato);
        $automatoResultante = $automato->parteAcessivel($automato);

        return view('resultados.funcao')
               ->with('title', $title)
               ->with('possuiGrafico', $possuiGrafico)
               ->with('automato', $automatoResultante->nome)
               ->with('nodes', $this->formatNodes($automatoResultante->nodes))
               ->with('edges', $this->formatEdges($automatoResultante->edges))
               ->with('eventos', $automatoResultante->eventos)
               ->with('estadoInicial', $automatoResultante->estadoInicial)
               ->with('estadosMarcados', $this->formatNodes($automatoResultante->estadosMarcados));
    }

    public function resultadoParteCoAcessivel()
    {
        $title = "Parte CoAcessível";
        $possuiGrafico = true;
        $automato = new FuncaoController($this->automato);
        $automatoResultante = $automato->parteCoAcessivel($automato);

        return view('resultados.funcao')
               ->with('title', $title)
               ->with('possuiGrafico', $possuiGrafico)
               ->with('automato', $automatoResultante->nome)
               ->with('nodes', $this->formatNodes($automatoResultante->nodes))
               ->with('edges', $this->formatEdges($automatoResultante->edges))
               ->with('eventos', $automatoResultante->eventos)
               ->with('estadoInicial', $automatoResultante->estadoInicial)
               ->with('estadosMarcados', $this->formatNodes($automatoResultante->estadosMarcados));
    }

    public function resultadoTrim()
    {
        $title = "TRIM";
        $possuiGrafico = true;        
        $automato = new FuncaoController($this->automato);
        $automatoResultante = $automato->trim($automato);

        return view('resultados.funcao')
               ->with('title', $title)
               ->with('possuiGrafico', $possuiGrafico)
               ->with('automato', $automatoResultante->nome)
               ->with('nodes', $this->formatNodes($automatoResultante->nodes))
               ->with('edges', $this->formatEdges($automatoResultante->edges))
               ->with('eventos', $automatoResultante->eventos)
               ->with('estadoInicial', $automatoResultante->estadoInicial)
               ->with('estadosMarcados', $this->formatNodes($automatoResultante->estadosMarcados));
    }

    public function resultadoComplemento()
    {
        $title = "Complemento";
        $possuiGrafico = true;
        $automato = new FuncaoController($this->automato);
        $automatoResultante = $automato->complemento($automato);

        return view('resultados.funcao')
               ->with('title', $title)
               ->with('possuiGrafico', $possuiGrafico)
               ->with('automato', $automatoResultante->nome)
               ->with('nodes', $this->formatNodes($automatoResultante->nodes))
               ->with('edges', $this->formatEdges($automatoResultante->edges))
               ->with('eventos', $automatoResultante->eventos)
               ->with('estadoInicial', $automatoResultante->estadoInicial)
               ->with('estadosMarcados', $this->formatNodes($automatoResultante->estadosMarcados));
    }

    public function resultadoComposicaoProduto($automato1, $automato2)
    {
        $title = "Composição Paralela -> ".$automato1->getNome()." e ".$automato2->getNome();
        return view('resultados.operacao', compact('title'));
    }

    public function resultadoComposicaoParalela($automato1, $automato2)
    {
        $title = "Composição Paralela -> ".$automato1->getNome()." e ".$automato2->getNome();
        return view('resultados.operacao', compact('title'));
    }
}
