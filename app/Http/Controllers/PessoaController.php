<?php

namespace App\Http\Controllers;

use App\pessoa;
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
        $pessoas = Pessoa::all();
        return view('pessoas.index', compact('pessoas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pessoas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pessoa::create($request->all());

        return redirect()->route('')
            ->with('success', 'Pessoa criada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show(pessoa $pessoa, $id)
    {
        $pessoa = Pessoa::findOrFail($id);
        return view('pessoas.show', compact('pessoa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function edit(pessoa $pessoa, $id)
    {
        $pessoa = pessoa::findOrFail($id);
        return view('pessoa.edit', compact('pessoa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pessoa $pessoa, $id)
    {
        $pessoa = pessoa::findOrFail($id);
        $pessoa->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(pessoa $pessoa, $id)
    {
        $pessoa = pessoa::findOrFail($id);
        $pessoa->delete();
        return redirect()->route('')
            ->with('success', 'Pessoa excluída com sucesso');
    }
}
