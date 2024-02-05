@extends('templates.template')
@section('template')
    <h1>
        Cadastrar
    </h1>
    <div>
            <form name='formCad' method="POST" action="{{url('endereco')}}">
            @csrf
            <input type="text" name="contato" id="contato" value="{{$contato->contato ?? ''}}" placeholder="Digite o Contato">
            <input type="text" name="anotacao" id="anotacao" value="{{$contato->anotacao ?? ''}}" placeholder="Digite a Anotação" required>
            <input type="submit" value="Cadastrar">

        </form>
    </div>
@endsection