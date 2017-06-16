<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    	return view('home');
    }

    public function funcoes()
    {
        return "TETE";
    }

    public function operacoes()
    {
        return "operacoe";
    }
}
