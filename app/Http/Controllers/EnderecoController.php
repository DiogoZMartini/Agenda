<?php

namespace App\Http\Controllers;

use App\Endereco;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Endereco = Endereco::get();                
        return view('endereco.index', [

            'Endereco' => $Endereco,
        
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('endereco.create');
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
            'cep'           => ['required', new CepValidacao],
            'rua'           => 'required|string',
            'bairro'        => 'required|string',
            'cidade'        => 'required|string',
            'complemento'   => 'nullable|string',
            'estado'        => 'required|string',
            'numero'        => 'required|integer',
        ]);
        

        $Endereco = new Endereco();
        $Endereco->cep = $request->cep;
        $Endereco->rua = $request->rua;
        $Endereco->bairro = $request->bairro;
        $Endereco->cidade = $request->cidade;
        $Endereco->complemento = $request->complemento;
        $Endereco->estado = $request->estado;
        $Endereco->save();
        
        return redirect()->route('endereco.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function show(Endereco $Endereco, $id)
    {
        
        $Endereco = Endereco::find($id);
        return view('endereco.show', [

            'Endereco' => $Endereco,
        
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Endereco = Endereco::find($id);
        return view('endereco.edit', [
            
            'Endereco' => $Endereco,    

        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        $request->validate([
            'cep' => 'required',
            'rua' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'complemento' => 'required',
            'estado' => 'required',
        ]);

        $Endereco = Endereco::find($id);
        $Endereco->cep = $request->cep;
        $Endereco->rua = $request->rua;
        $Endereco->bairro = $request->bairro;
        $Endereco->cidade = $request->cidade;
        $Endereco->complemento = $request->complemento;
        $Endereco->estado = $request->estado;
        $Endereco->save();
        
        return redirect()->route('pessoa.show', $Endereco->pessoa_fk);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Endereco $Endereco, $id)
    {
        
        $Endereco = $Endereco::find($id);
        $Endereco -> delete();

        return back();

    }
}
