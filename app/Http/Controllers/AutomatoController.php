<?php

namespace App\Http\Controllers;

use App\Automato;
use Illuminate\Http\Request;

class AutomatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('automatos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('automatos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect(route('automatos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Automato  $automato
     * @return \Illuminate\Http\Response
     */
    public function show(Automato $automato)
    {
        return view('automatos.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Automato  $automato
     * @return \Illuminate\Http\Response
     */
    public function edit(Automato $automato)
    {
        return view('automatos.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Automato  $automato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Automato $automato)
    {
        return redirect(route('automatos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Automato  $automato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Automato $automato)
    {
        return redirect(route('automatos.index'));
    }
}
