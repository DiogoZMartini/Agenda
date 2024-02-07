@extends('templates.template')

@section('template')
    <h1>Visualizar</h1>
    <p>Id: {{$DominioTipoContato->id}}</p>
    <p>Tipo: {{$DominioTipoContato->tipo}}</p>
    <p>Descrição: {{$DominioTipoContato->descricao}}</p>
@endsection