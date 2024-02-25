@extends('templates.template')

@section('template')
    <div class="formulario">
        <form class="form-horizontal" method="POST" action="{{ route('pessoa.update' , $Pessoa->id) }}">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label furmularioTexto">Nome</label>
                <div class="formularioImput">
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ $Pessoa->nome }}">
                </div>
            </div>
            <div class="form-group">
                <label for="sobrenome" class="col-sm-2 control-label furmularioTexto">Sobrenome</label>
                <div class="formularioImput">
                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="{{ $Pessoa->sobrenome }}">
                </div>
            </div>
            <div class="form-group">
                <select name="sexo"  id="sexo" class="form-control seletor" required>
                    <option value="{{ $Pessoa->id }}">{{ $Pessoa->sexo }}</option>
                    <option value="M">M</option>
                    <option value="F">F</option>
                </select>
            </div>
            <div class="form-group">
                <select name="endereco_id"  id="endereco_id" class="form-control seletor" required>
                    <option value="{{ $Pessoa->relEndereco->id }}">{{ $Pessoa->relEndereco->rua }}</option>
                    @foreach($Endereco as $Endereco)
                        <option value="{{ $Endereco->id }}">{{ $Endereco->rua }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-default">Atualizar</button>
      </form>
    </div>
@endsection