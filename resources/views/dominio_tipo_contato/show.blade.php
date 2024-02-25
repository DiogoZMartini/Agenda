@extends('templates.template')

@section('template')
    <div class="mostrar">
        <h1 class="titulo">Visualizar</h1>
        
        <p>Id: {{   $DominioTipoContato->id }}</p>
        <p>Tipo: {{ $DominioTipoContato->tipo   }}</p>
        <p>Descrição: {{    $DominioTipoContato->descricao  }}</p>
    </div>
@endsection