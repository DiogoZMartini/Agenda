<?php

namespace App\Http\Controllers;

use App\Pessoa;
use App\Endereco;
use Illuminate\Http\Request;
use App\Rules\CepValidacao;

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

            'Pessoas' => Pessoa::get(),
        
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
            'nome'          => 'required|string',
            'sobrenome'     => 'required|string',
            'sexo'          => 'required',
            'cep'           => ['required', new CepValidacao],
            'rua'           => 'required|string',
            'bairro'        => 'required|string',
            'cidade'        => 'required|string',
            'complemento'   => 'nullable|string',
            'estado'        => 'required|string',
            'numero'        => 'required|numeric',
        ]);
        

        $Endereco = new Endereco();
        $Endereco->cep = $request->cep;
        $Endereco->rua = $request->rua;
        $Endereco->bairro = $request->bairro;
        $Endereco->cidade = $request->cidade;
        $Endereco->complemento = $request->complemento;
        $Endereco->estado = $request->estado;
        $Endereco->numero = $request->numero;
        $Endereco->save();

        $Pessoa = new Pessoa();
        $Pessoa->nome = $request->nome;
        $Pessoa->sobrenome = $request->sobrenome;
        $Pessoa->endereco_id = $Endereco->id;
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
            'nome'          => 'required|string',
            'sobrenome'     => 'required|string',
            'sexo'          => 'required',
            'cep'           => ['required', new CepValidacao],
            'rua'           => 'required|string',
            'bairro'        => 'required|string',
            'cidade'        => 'required|string',
            'complemento'   => 'nullable|string',
            'estado'        => 'required|string',
            'numero'        => 'required|integer',
        ]);

        $P = Pessoa::find($id);
        $P->nome = $request->nome;
        $P->sobrenome = $request->sobrenome;
        $P->endereco_id = $request->endereco_id;
        $P->sexo = $request->sexo;
        $P->save();

        $End = Endereco::find($P->endereco_id);
        $End->cep = $request->cep;
        $End->rua = $request->rua;
        $End->bairro = $request->bairro;
        $End->cidade = $request->cidade;
        $End->complemento = $request->complemento;
        $End->estado = $request->estado;
        $End->numero = $request->numero;
        $End->save();
        
        return redirect()->route('pessoa.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pessoa  $Pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoa $Pessoa, Request $request, $id)
    {
        $id = $request['pessoa_id'];
        $Pessoa = Pessoa::find($id);
        $Pessoa->relEndereco->delete();
        $Pessoa->delete();
        return back();
    }
}
