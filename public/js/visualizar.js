$('#visualizarModal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var recipientId = button.data('id');
    console.log(recipientId);
    
    
    $.ajax({
        url: "/pessoa/show/" + recipientId,
        method: "GET",
        success: function(data){
            $('#nome').val(data.pessoa.nome);
            $('#sobrenome').val(data.pessoa.sobrenome);
            $('#sexo').val(data.pessoa.sexo);
            $('#cep').val(data.endereco.cep)
            $('#estado').val(data.endereco.estado);
            $('#cidade').val(data.endereco.cidade);
            $('#bairro').val(data.endereco.bairro);
            $('#rua').val(data.endereco.rua);
            $('#numero').val(data.endereco.numero);
            $('#complemento').val(data.endereco.complemento);
        },
        error: function(xhr){
            console.error(xhr.responseText);
        }
    })

})