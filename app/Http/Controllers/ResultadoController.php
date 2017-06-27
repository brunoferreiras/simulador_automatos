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
        $possuiGrafico = false;
        return view('resultados.funcao', compact('title', 'possuiGrafico'));
    }

    public function resultadoLinguagemMarcada($automato)
    {
        $title = "Linguagem Marcada";
        $possuiGrafico = false;
        return view('resultados.funcao', compact('title', 'possuiGrafico'));
    }

    public function resultadoParteAcessivel()
    {
        $title = "Parte Acessível";
        $possuiGrafico = true;
        $automato = new FuncaoController($this->automato);
        $automatoResultante = $automato->parteAcessivel();
        dd($automatoResultante);
        return view('resultados.funcao', compact('title', 'possuiGrafico'));
//                ->with('automato', $automato)
//                ->with('nodes', $nodes)
//                ->with('edges', $edges)
//                ->with('eventos', $eventos)
//                ->with('estadoInicial', $estadoInicial)
//                ->with('estadosMarcados', $estadosMarcados);
    }

    public function resultadoParteCoAcessivel($automato)
    {
        $title = "Parte CoAcessível";
        $possuiGrafico = true;
        return view('resultados.funcao', compact('title', 'possuiGrafico'));
    }

    public function resultadoTrim($automato)
    {
        $title = "TRIM";
        $possuiGrafico = true;
        return view('resultados.funcao', compact('title', 'possuiGrafico'));
    }

    public function resultadoComplemento($automato)
    {
        $title = "Complemento";
        $possuiGrafico = true;
        return view('resultados.funcao', compact('title', 'possuiGrafico'));
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
