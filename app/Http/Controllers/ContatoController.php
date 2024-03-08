<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contato;
use App\DominioTipoContato;
use App\Pessoa;


class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filtro = array_filter($request->only(['contato']));

        $Contato = Contato::when($filtro, function ($query) use ($filtro) {
            $query->where($filtro);
        })->get();


        return view('contato.index', [
            'Contatos' => $Contato,
            'filtro' => $filtro,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $Pessoa = Pessoa::find($id);
        return view('contato.create', [
            'TipoContatos' => DominioTipoContato::get(),
            'Pessoa' => $Pessoa
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
            'tipo_contato_fk' => 'required',
            'anotacao' => 'nullable|string',
            'contato' => 'required|string',
        ]);        

        $Contato = new Contato();
        $Contato->pessoa_fk = $request->pessoa_fk;
        $Contato->tipo_contato_fk = $request->tipo_contato_fk;
        $Contato->anotacao = $request->anotacao;
        $Contato->contato = $request->contato;
        $Contato->save();
        
        return redirect()->route('pessoa.show', $Contato->pessoa_fk);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $Contato = Contato::find($id);
        $TipoContatos = DominioTipoContato::find($Contato->tipo_contato_fk);
        return view('contato.show', [

            'Contato' => $Contato,
            'TipoContatos' => $TipoContatos, 
        
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Contato = Contato::find($id);

        return view('contato.edit', [

            'Contato' => $Contato,           
            'TipoContatos' => DominioTipoContato::get(), 

        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'tipo_contato_fk' => 'required',
            'anotacao' => 'required',
            'contato' => 'required',
        ]);
        

        $Contato = Contato::find($id);
        $Contato->tipo_contato_fk = $request->tipo_contato_fk;
        $Contato->anotacao = $request->anotacao;
        $Contato->contato = $request->contato;
        $Contato->save();
        
        return redirect()->route('contato.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contato $Contato, Request $request)
    {
        $id = $request['id'];
        $Contato = $Contato::find($id);
        $Contato -> delete();

        return back();

    }
}
