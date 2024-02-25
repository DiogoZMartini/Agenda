@extends('templates.template')

@section('template')
    <div class="mostrar">
        <h1 class="titulo">Visualizar</h1>
        
        <p>Id: {{   $Endereco->id }}</p>
        <p>Cep: {{   $Endereco->cep }}</p>
        <p>Estado: {{ $Endereco->estado   }}</p>
        <p>Cidade: {{ $Endereco->cidade   }}</p>
        <p>Bairro: {{   $Endereco->bairro  }}</p>
        <p>Rua: {{  $Endereco->rua   }}</p>
        <p>Complemento: {{  $Endereco->complemento  }}</p>
    </div>
@endsection