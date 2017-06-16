<?php

namespace App\Http\Controllers;

use App\Automato;
use Illuminate\Http\Request;

class FuncaoController extends Controller
{
    private $automato;

    public function __construct(Automato $automato)
    {
        $this->$automato = $automato;
    }

    public function linguagemGerada()
    {

    }

    public function linguagemMarcada()
    {

    }

    public function parteAcessivel()
    {

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
