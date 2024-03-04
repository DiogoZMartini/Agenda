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
        $filtro = array_filter($request->only(['contato', 'pessoa']));

        $contatos = Contato::when($filtro, function ($query) use ($filtro) {
            if (isset($filtro['pessoa'])) {
                $query->whereHas('contatoPessoa', function ($subquery) use ($filtro) {
                    $subquery->where('nome', 'like', '%' . $filtro['pessoa'] . '%');
                });
            }

            if (isset($filtro['contato'])) {
                $query->where('contato', 'like', '%' . $filtro['contato'] . '%');
            }
        })->get();
    
        $pessoas = Pessoa::whereIn('id', $contatos->pluck('pessoa_id'))->get();
    
        return view('contato.index', [
            'Contatos' => $contatos,
            'Pessoas' => $pessoas,
            'filtro' => $filtro,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('contato.create', [
            'TipoContato' => DominioTipoContato::get(),
            'Pessoa' => Pessoa::get()
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
            'pessoa_id' => 'required',
            'tipo_contato_id' => 'required',
            'anotacao' => 'nullable|string',
            'contato' => 'required|string',
        ]);        

        $Contato = new Contato();
        $Contato->pessoa_id = $request->pessoa_id;
        $Contato->tipo_contato_id = $request->tipo_contato_id;
        $Contato->anotacao = $request->anotacao;
        $Contato->contato = $request->contato;
        $Contato->save();
        
        return redirect()->route('contato.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function show(Contato $Contato, $id)
    {

        $Contato = Contato::find($id);
        $Tipo = DominioTipoContato::find($Contato->tipo_contato_id);
        return view('contato.show', [

            'Contato' => $Contato,
            'TipoContato' => $Tipo, 
        
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function edit(Contato $Contato)
    {

        return view('contato.edit', [

            'Contato' => $Contato,
            'Pessoa' => Pessoa::get(),            
            'TipoContato' => DominioTipoContato::get(), 

        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contato $contato, $id)
    {
        
        $request->validate([
            'pessoa_id' => 'required',
            'tipo_contato_id' => 'required',
            'anotacao' => 'required',
            'contato' => 'required',
        ]);
        

        $Contato = Contato::find($id);
        $Contato->pessoa_id = $request->pessoa_id;
        $Contato->tipo_contato_id = $request->tipo_contato_id;
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
