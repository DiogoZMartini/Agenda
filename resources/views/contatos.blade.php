@extends('templates.template')

@section('template')
    <h1>Contatos</h1>
    <hr>    
    <div>
        <a href="{{ url("contatos/create") }}">
            <button>Cadastrar</button>
        </a>
    </div>
    <div>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Pessoa</th>
                <th scope="col">Contato</th>
              </tr>
            </thead>
            <tbody>
                {{--    
                @foreach($contato as $contatos)
                    @php
                        $pessoa=$contatos->find($contatos->id)->contatoPessoa;
                        $dominio=$contatos->find($contatos->id)->contatoTipo;
                    @endphp
                --}}
                @foreach ($Contatos as $Contato)
                    <tr>
                        <th scope="row">{{$contatos->id}}</th>
                        <td>{{$pessoa->nome }}</td>
                        <td>{{$dominio->tipo}}</td>
                            <a href="{{ route('dominio.tipo.contato.show') }}"  >
                                 <button>Visualizar</button>
                            </a>

                            <a href="{{ url("contatos/show/$contatos->id/edit") }}">
                                <button>Edit</button>
                           </a>

                           <a href="{{url("contatos/$contatos->id")}}" class="js-del">
                            <button>Deletar</button>
                            </a>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection