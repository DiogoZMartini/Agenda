@extends('templates.template')
@section('template')
    <h1>
        @if(isset($contato))Editar @else Cadastrar @endif
    </h1>
    <div>
        @if(isset($contato))
            <form name='formEdit' method="POST" action="{{url("contatos/$contato->id")}}">
                @method('PUT')
        @else
            <form name='formCad' method="POST" action="{{url('contatos')}}">
        @endif
        
            @csrf
            <input type="text" name="contato" id="contato" value="{{$contato->contato ?? ''}}" placeholder="Digite o Contato">
            <select name="tipo_contato_id"  id="tipo_contato_id" required>
                <option value="{{$contato->contatoTipo->id ?? ''}}">{{$contato->contatoTipo->tipo ?? 'Selecione'}}</option>
                @foreach($dominio as $dominios)
                    <option value="{{ $dominios->id }}">{{ $dominios->tipo }}</option>
                @endforeach
            </select>
            <input type="text" name="anotacao" id="anotacao" value="{{$contato->anotacao ?? ''}}" placeholder="Digite a Anotação" required>
            <input type="submit" value="@if(isset($contato))Editar @else Cadastrar @endif">

        </form>
    </div>
@endsection