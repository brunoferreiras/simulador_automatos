<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Automato as Automato;

class DashboardController extends Controller
{
    public function index()
    {
    	return view('home');
    }

    public function funcoes()
    {
        $automatos = Automato::get();
        return view('funcoes.painel', compact('automatos'));
    }

    public function operacoes()
    {
        $automatos = Automato::get();
        return view('operacoes.painel', compact('automatos'));
    }
}
