
{{ $oirulut }}


<table>
    <thead>
        <tr>
            <td>Id</td>
            <td>Tipo</td>
            <td>Descrição</td>
            <td>[...]</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($DominioTipoContato as $DmTipoContato)
            <tr>
                <td>{{ $DmTipoContato->id }}</td>
                <td>{{$DmTipoContato->tipo }}</td>
                <td>{{ $DmTipoContato->descricao }}</td>
                <td>[...]</td>
            </tr>        
        @endforeach
    </tbody>    
</table>