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
    public function index(Request $request)
    {
        $filtro = array_filter($request->only(['nome', 'sobrenome']));

        $pessoas = Pessoa::when($filtro, function ($query) use ($filtro) {
            $query->where($filtro);
        })->get();
        
        return view('pessoa.index', [
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
            'sexo'          => 'required|in:M,F',
            'cep'           => ['required', new CepValidacao],
            'rua'           => 'required|string',
            'bairro'        => 'required|string',
            'cidade'        => 'required|string',
            'complemento'   => 'nullable|string',
            'estado'        => 'required|string',
            'numero'        => 'required|numeric',
        ]);
        
        $Pessoa = new Pessoa();
        $Pessoa->nome = $request->nome;
        $Pessoa->sobrenome = $request->sobrenome;
        $Pessoa->sexo = $request->sexo;
        $Pessoa->save();

        $Pessoa->relEndereco()->create([
            'cep'             => $request->cep,
            'rua'             => $request->rua,
            'bairro'          => $request->bairro,
            'cidade'          => $request->cidade,
            'complemento'     => $request->complemento,
            'estado'          => $request->estado,
            'numero'          => $request->numero,
            'pessoa_fk'       => $Pessoa->id,
        ]);
        
        return redirect()->route('pessoa.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pessoa  $Pessoa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function edit($id)
    {
        $Pessoa = Pessoa::find($id);
        $End = Endereco::find($Pessoa->endereco_id);
        return view('pessoa.edit', [

            'Pessoa' => $Pessoa,
            'Endereco' =>  $End, 

        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pessoa  $Pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        $P->sexo = $request->sexo;
        $P->save();

        $P->relEndereco()->update([
            'cep'           => $request->cep,
            'rua'           => $request->rua,
            'bairro'        => $request->bairro,
            'cidade'        => $request->cidade,
            'complemento'   => $request->complemento,
            'estado'        => $request->estado,
            'numero'        => $request->numero
        ]);

        return redirect()->route('pessoa.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pessoa  $Pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request['id'];
        $Pessoa = Pessoa::find($id);
        $Pessoa->delete();
        return back();
    }
}
