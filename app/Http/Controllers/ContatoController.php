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
        $filtro = $request->contato;

        $Contato = Contato::where(function ($query) use ($filtro) {
                $query->where('contato', 'LIKE', "%$filtro%");
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
        $Pessoa = Pessoa::with(['relContato', 'relContato.relDominioTipoContato'])->find($id);
         
        if($Pessoa){
            $dados = [
                'pessoa'        => $Pessoa->toArray(),
                'contatos'      => $Pessoa->relContato->toArray(),
                'tipoContato'   => DominioTipoContato::get(),
            ];



            return response()->json($dados);
        }else{
            return response()->json(['error' => 'Contato não encontrada'], 404);
        }

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
        if($Contato){
            $dados = [
                'contato'       => $Contato->toArray(),
                'tipoContato'   => $Contato->relDominioTipoContato->toArray(),
            ];

            return response()->json($dados);
        }else{
            return response()->json(['error' => 'Contato não encontrada'], 404);
        }

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
         
        if($Contato){
            $dados = [
                'contato' => $Contato->toArray(),
                'tipoContato' => DominioTipoContato::get(), 
            ];


            return response()->json($dados);
        }else{
            return response()->json(['error' => 'Contato não encontrada'], 404);
        }
         
        


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
            'tipoContatoFkEdit' => 'required',
            'anotacaoEdit' => 'required',
            'contatoEdit' => 'required',
        ]);
        

        $Contato = Contato::find($id);
        $Contato->tipo_contato_fk = $request->tipoContatoFkEdit;
        $Contato->anotacao = $request->anotacaoEdit;
        $Contato->contato = $request->contatoEdit;
        $Contato->save();

        return response()->json(['success' => true]);

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
