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
            if(data.contatos.length > 0){
                data.contatos.forEach(function(item){   
                    var contato = item.contatos;
                    var tipoContato = item.tipoContato;
            
                    $('#contatos').append(
                        '<tr> <td>'+ contato.contato +'</td> <td>'+ tipoContato.descricao +'</td> </tr>'
                        
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