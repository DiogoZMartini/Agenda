$('#cadastrarContatoModal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var recipientId = button.data('id');
    console.log(recipientId);

    $.ajax({
        url: "/contato/create/" + recipientId,
        method: "GET",
        success: function(data){
            $('#pessoa_fk').val(data.pessoa.id);
            if(data.tipoContato.length > 0){
                data.tipoContato.forEach(function(tipoContato){               
                    $('#tipo_contato_fk').append(
                        '<option value="'+ tipoContato.id +'" {{ old("tipo_contato_fk") == '+ tipoContato.id +' ? "selected" : "" }}>'+ tipoContato.descricao +'</option>'
                    );
                });
            }else {
                $('#tipo_contato_fk').append('Tipo de Contato não encontrado');
            }
        }
    })

    $('#formCadastrarContato').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: "/contato/store",
            type:"POST",
            dataType: 'json',
            data: $(this).serialize(),
            success: function(response){
                console.log(response);
                $('#cadastrarContatoModal').modal('hide');
                
            }
        });
        
    })
})