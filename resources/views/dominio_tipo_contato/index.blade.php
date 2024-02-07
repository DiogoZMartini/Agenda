
@extends('templates.template')

@section('template')

    <h1>DominioTipoContato</h1>
    <hr>

    <div>
        <a href="{{ route('dominio.tipo.contato.create') }}">
            <button>Cadastrar</button>
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
                    <td>{{$DmTipoContato->tipo }}</td>
                    <td>{{ $DmTipoContato->descricao }}</td>
                    <a href="{{ route('dominio.tipo.contato.show', ['id' => $DmTipoContato] )}}"  >
                        <button>Visualizar</button>
                   </a>
                </tr>        
            @endforeach
        </tbody>    
    </table>
@endsection