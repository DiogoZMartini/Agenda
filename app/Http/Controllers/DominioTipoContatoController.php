<?php

namespace App\Http\Controllers;

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
        return view('dominio_tipo_contato.index', [

            'DominioTipoContato' => $DominioTipoContato,
        
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$DominioTipoContato = DominioTipoContato::get();                
        return view('dominio_tipo_contato.create', [

            //'DominioTipoContato' => $DominioTipoContato,
        
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'tipo' => 'required',
        ]);
        

        $Dominio = new DominioTipoContato();
        $Dominio->tipo = $request->tipo;
        $Dominio->descricao = $request->descricao;
        $Dominio->save();
        
        return redirect()->route('dominio.tipo.contato.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tipo_contato  $tipo_contato
     * @return \Illuminate\Http\Response
     */
    public function show(DominioTipoContato $DominioTipoContato, $id)
    {
        $DominioTipoContato = DominioTipoContato::find($id);
        return view('dominio_tipo_contato.show', [

            'DominioTipoContato' => $DominioTipoContato,
        
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tipo_contato  $tipo_contato
     * @return \Illuminate\Http\Response
     */
    public function edit(DominioTipoContato $DominioTipoContato)
    {

        return view('dominio_tipo_contato.edit', [

            'DominioTipoContato' => $DominioTipoContato,    

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tipo_contato  $tipo_contato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DominioTipoContato $Dominio, $id)
    {

        $request->validate([
            'tipo' => 'required',
        ]);
        

        $Dominio = DominioTipoContato::find($id);
        $Dominio->tipo = $request->tipo;
        $Dominio->descricao = $request->descricao;
        $Dominio->save();

        return redirect()->route('dominio.tipo.contato.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tipo_contato  $tipo_contato
     * @return \Illuminate\Http\Response
     */
    public function destroy(DominioTipoContato $DominioTipoContato, $id)
    {

        $Dominio = $DominioTipoContato::find($id);
        $Dominio -> delete();

        return back();
        
    }
}
