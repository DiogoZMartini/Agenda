<?php

namespace App\Http\Controllers;

use App\Pessoa;
use App\Endereco;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                      
        return view('pessoa.index', [

            'Pessoa' => Pessoa::get(),
        
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pessoa.create', [
            'Pessoa' => Pessoa::get(),
            'Endereco' => Endereco::get(),
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
            'nome' => 'required',
            'sobrenome' => 'required',
            'endereco' => 'required',
            'sexo' => 'required',
        ]);
        

        $Pessoa = new Pessoa();
        $Pessoa->nome = $request->nome;
        $Pessoa->sobrenome = $request->sobrenome;
        $Pessoa->endereco_id = $request->endereco;
        $Pessoa->sexo = $request->sexo;
        $Pessoa->save();
        
        return redirect()->route('pessoa.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pessoa  $Pessoa
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoa $Pessoa, $id)
    {

        $Pessoa = Pessoa::find($id);
        $End = Endereco::find($Pessoa->endereco_id);
        return view('pessoa.show', [

            'Pessoa' => $Pessoa,
            'Endereco' => $End,
        
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pessoa  $Pessoa
     * @return \Illuminate\Http\Response
     */
    public function edit(Pessoa $Pessoa)
    {
        
        return view('pessoa.edit', [

            'Pessoa' => $Pessoa,
            'Endereco' => Endereco::get(),    

        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pessoa  $Pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pessoa $P, $id)
    {
        
        $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'sexo' => 'required',
        ]);
        

        $P = Pessoa::find($id);
        $P->nome = $request->nome;
        $P->sobrenome = $request->sobrenome;
        $P->endereco_id = $request->endereco_id;
        $P->sexo = $request->sexo;
        $P->save();
        
        return redirect()->route('pessoa.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pessoa  $Pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoa $Pessoa, $id)
    {

        $Pessoa = $Pessoa::find($id);
        $Pessoa -> delete();

        return back();

    }
}
