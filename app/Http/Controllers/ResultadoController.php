<?php

namespace App\Http\Controllers;

use App\Automato;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{
    private $automato;

    public function resultadoFuncao(Request $request)
    {
        $automato = Automato::find($request->automato);
        $this->automato = new FuncaoController($automato);
        dd($this->automato);
        $funcao = $request->funcao;


        $title = "TESTE";
        $possuiGrafico = true;
        return view('resultados.funcao', compact('title', 'possuiGrafico'));
    }

    public function resultadoOperacao(Request $request)
    {
        $title = "TESTE2";
        return view('resultados.operacao', compact('title'));
    }
}
