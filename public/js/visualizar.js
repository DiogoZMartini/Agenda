$('#visualizarModal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var recipientId = button.data('id');
    console.log(recipientId);
    
    
    $.ajax({
        url: "/pessoa/show/" + recipientId,
        method: "GET",
        success: function(data){
            console.log(data);
            $('#nome').val(data.nome);
            $('#sobrenome').val(data.sobrenome);
            $('#sexo').val(data.sexo);
            $('#cep').val(data.rel_endereco.cep)
            $('#estado').val(data.rel_endereco.estado);
            $('#cidade').val(data.rel_endereco.cidade);
            $('#bairro').val(data.rel_endereco.bairro);
            $('#rua').val(data.rel_endereco.rua);
            $('#numero').val(data.rel_endereco.numero);
            $('#complemento').val(data.rel_endereco.complemento);
            console.log(data.rel_contato);
            if(data.rel_contato){
                data.rel_contato.forEach(function(contato){                     ;
            
                    $('#contatos').append(
                        '<tr> <td>'+ contato.contato +'</td> <td>'+ contato.rel_dominio_tipo_contato.descricao +'</td> </tr>'
                    );
                });
            }else {
                $('#contatoLista').append('Contatos não encontrados');
            }

        },
        error: function(xhr){
            console.error(xhr.responseText);
        }
    })

    $('.voltar').on('click', function(){
        window.location.reload(true);
    })

});