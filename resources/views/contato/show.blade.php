@extends('templates.template')

@section('template')
    <div class="mostrar">
        <h1 class="titulo">Visualizar</h1><br>
        
        <p>Id: {{   $Contato->id }}</p>
        <p>Contato: {{ $Contato->contato   }}</p>
        <p>Tipo: {{ $TipoContato->descricao   }}</p>
        <p>Anotação: {{  $Contato->anotacao   }}</p>
    </div>
@endsection