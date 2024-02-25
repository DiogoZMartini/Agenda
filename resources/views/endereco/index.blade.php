@extends('templates.template')

@section('template')
    <div class="tabela">
        <h1 class="titulo">Endereco</h1>
        <hr>

        <div>
            <a href="{{ route('endereco.create') }}">
                <button class="cadastrar btn btn-primary btn-sm">Cadastrar</button>
            </a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Cep</td>
                    <td>Estado</td>
                    <td>Cidade</td>
                    <td>Bairro</td>
                    <td>Rua</td>
                    <td>Complemento</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($Endereco as $End)
                    <tr>
                        <td>{{ $End->id }}</td>
                        <td>{{ $End->cep }}</td>
                        <td>{{ $End->estado }}</td>
                        <td>{{ $End->cidade }}</td>
                        <td>{{ $End->bairro }}</td>
                        <td>{{ $End->rua }}</td>
                        <td>{{ $End->complemento }}</td>
                        <td>
                            <a href="{{ route('endereco.show', ['id' => $End] )}}"  >
                                <button class="btn glyphicon glyphicon-eye-open btn-success"></button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('endereco.edit', ['Endereco' => $End] )}}">
                                <button class="btn glyphicon glyphicon-pencil btn-primary"></button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('endereco.destroy', $End->id )}}">
                                <button class="btn glyphicon glyphicon-trash btn btn-danger"></button>
                            </a>
                        </td>
                    </tr>        
                @endforeach
            </tbody>    
        </table>
    </div>
@endsection