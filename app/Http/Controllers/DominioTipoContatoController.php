<?php

namespace App\Http\Controllers;

use App\tipo_contato;
use Illuminate\Http\Request;

use App\DominioTipoContato;


class DominioTipoContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DominioTipoContato = DominioTipoContato::get();
        echo "<pre>";
        var_dump($DominioTipoContato);
        echo "</pre>";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tipo_contato  $tipo_contato
     * @return \Illuminate\Http\Response
     */
    public function show(tipo_contato $tipo_contato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tipo_contato  $tipo_contato
     * @return \Illuminate\Http\Response
     */
    public function edit(tipo_contato $tipo_contato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tipo_contato  $tipo_contato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tipo_contato $tipo_contato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tipo_contato  $tipo_contato
     * @return \Illuminate\Http\Response
     */
    public function destroy(tipo_contato $tipo_contato)
    {
        //
    }
}
