$('#editContatoModal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var recipientId = button.data('id');
    console.log(recipientId);
    

        $.ajax({
            url: "/contato/edit/" + recipientId,
            method: "GET",
            success: function(data){
                $('#tipo_contato_fk_edit').val(data.contato.tipo_contato_fk);
                $('#anotacaoEdit').val(data.contato.anotacao);
                $('#contatoEdit').val(data.contato.contato);
                var contato = {
                    tipo_contato_fk: data.contato.tipo_contato_fk
                }
                if(data.tipoContato.length > 0){
                    for (const tipoContato of data.tipoContato) {
                        console.log(tipoContato);
                        $('#tipoContatoFkEdit').append(
                            `<option ${tipoContato.id === contato.tipo_contato_fk ? 'selected' : ''} value="${tipoContato.id}">${tipoContato.descricao}</opion>`
                        );
                    }
                    /*
                    data.tipoContato.forEach(function(tipoContato, contato){   
                        console.log(tipoContato);   
                        $('#tipoContatoFkEdit').append(
                                '<option @if('+ tipoContato.id +' == '+ contato.tipo_contato_fk +') selected @endif value="'+ tipoContato.id +'">'+ tipoContato.descricao +'</option>',                       
                        );
                    });
                    */
                }else {
                    $('#tipo_contato_fk_edit').append('Contatos não encontrado');
                }
                

                
            },
            error: function(xhr){
                console.error(xhr.responseText);
            }
        });

        $('#formEditContato').on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    url: "/contato/update/" + recipientId,
                    type:"POST",
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function(response){
                        console.log(response);
                        $('#editModal').modal('hide');
                        window.location.reload(true);
                    },
                    error: function(xhr){
                        console.error(xhr.responseText);
                    }
                });
                
            })

    $('.voltar').on('click', function(){
        window.location.reload(true);
    })
});
