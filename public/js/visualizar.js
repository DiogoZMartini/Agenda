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
            var tipoContato = {
                descricao: data.tipoContato.descricao
            }
            console.log(data.tipoContato);
            for (const tipoContato of data.tipoContato) {
                console.log(contatos);
                console.log(tipoContato);
                $('#contatos').append(
                    `${tipoContato}`
                );
            }
            /*
            if(data.contatos.length > 0){
                for (const contatos of data.contatos) {
                    console.log(contatos);
                    console.log(tipoContato);
                    $('#contatos').append(
                        `<tr> <td> ${contatos.contato} </td> <td> ${tipoContato.descricao} </td> </tr>`
                    );
                }
                data.contatos.forEach(function(contatos, tipoContato){  
                    console.log(tipoContato);             
                    $('#contatos').append(
                            '<tr> <td>'+ contatos.contato +'</td> <td>'+ tipoContato.descricao +'</td> </tr>',                       
                    );
                });
            }else {
                $('#contatoLista').append('Contatos não encontrado');
            }
            */
        },
        error: function(xhr){
            console.error(xhr.responseText);
        }
    })

    $('.voltar').on('click', function(){
        window.location.reload(true);
    })

})