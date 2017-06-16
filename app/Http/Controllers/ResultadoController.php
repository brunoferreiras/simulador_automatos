<?php

namespace App\Http\Controllers;

use App\Automato;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{

    public function resultadoFuncao(Request $request)
    {
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
