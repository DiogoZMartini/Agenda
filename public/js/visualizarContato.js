$('#visualizarContatoModal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var recipientId = button.data('id');
    console.log(recipientId);

    $.ajax({
        url: "/contato/show/" + recipientId,
        method: "GET",
        success: function(data){
            $('#contatoVisualizar').val(data.contato.contato);
            $('#tipoContatoVisualizar').val(data.tipoContato.descricao);
            $('#anotacaoVisualizar').append(data.contato.anotacao);
        },
        error: function(xhr){
            console.error(xhr.responseText);
        }
    })


    $('.voltar').on('click', function(){
        window.location.reload(true);
    })

});