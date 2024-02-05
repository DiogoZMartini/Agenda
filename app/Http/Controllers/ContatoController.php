<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contato;
use App\DominioTipoContato;
use App\Pessoa;


class ContatoController extends Controller
{
    private $objContato;
    private $objDominio;
    private $objPessoa;


    public function __construct()
    {
        $this->objContato=new Contato();
        $this->objDominio=new DominioTipoContato();
        $this->objPessoa=new Pessoa();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contato=$this->objContato->all();
        return view('contatos',compact('contato'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dominio=$this->objDominio->all();
        return view('create', compact('dominio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cad=$this->objContato->create([
            //'pessoa_id'=>$request->pessoa_id,
            'tipo_contato_id'=>$request->tipo_contato_id,
            'anotacao'=>$request->anotacao,
            'contato'=>$request->contato
        ]);
        if($cad){
            return redirect('contatos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function show(contato $contato, $id)
    {
        $contato=$this->objContato->find($id);
        return view('showContato', compact('contato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function edit(contato $contato, $id)
    {
        $contato=$this->objContato->find($id);
        $dominio=$this->objDominio->all();
        return view('create' , compact('contato', 'dominio'));

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
       /* $this->objContato->where(['id'=>$id])->update([
            //'pessoa_id'=>$request->pessoa_id,
            'tipo_contato_id'=>$request->tipo_contato_id,
            //'anotacao'=>$request->anotacao,
            'contato'=>$request->contato
        ]);
        return redirect('contatos');
        */
        $contato = Contato::findOrFail($id);
        $contato->update([
            'tipo_contato_id' => $request->input('tipo_contato_id'),
            'contato' => $request->input('contato')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function destroy(contato $contato, $id)
    {
        $del=$this->objContato->destroy($id);
        return($del)?"sim":"não";
    }
}
