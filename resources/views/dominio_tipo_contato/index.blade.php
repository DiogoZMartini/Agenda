@extends('templates.template')

@section('template')
    <div class="tabela">
        <h1 class="titulo">DominioTipoContato</h1>
        <hr>

        <div>
            <a href="{{ route('dominio.tipo.contato.create') }}">
                <button class="cadastrar btn btn-primary btn-sm">Cadastrar</button>
            </a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Tipo</td>
                    <td>Descrição</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($DominioTipoContato as $DmTipoContato)
                    <tr>
                        <td>{{ $DmTipoContato->id }}</td>
                        <td>{{ $DmTipoContato->tipo }}</td>
                        <td>{{ $DmTipoContato->descricao }}</td>
                        <td>
                            <a href="{{ route('dominio.tipo.contato.show', ['id' => $DmTipoContato] )}}"  >
                                <button class="btn glyphicon glyphicon-eye-open btn-success"></button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('dominio.tipo.contato.edit', ['DominioTipoContato' => $DmTipoContato] )}}">
                                <button class="btn glyphicon glyphicon-pencil btn-primary"></button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('dominio.tipo.contato.destroy', $DmTipoContato->id )}}">
                                <button class="btn glyphicon glyphicon-trash btn btn-danger"></button>
                            </a>
                        </td>
                    </tr>        
                @endforeach
            </tbody>    
        </table>
    </div>
@endsection