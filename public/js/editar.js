$('#editModal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var recipientId = button.data('id');
    console.log(recipientId);
    
    function atualizarPessoa(){
        var formData = $('#editform').serialize();
        $.ajax({
            url: "/pessoa/edit/" + recipientId,
            method: "GET",
            data: formData,
            success: function(data){
                $('#nomeEdit').val(data.pessoa.nome);
                $('#sobrenomeEdit').val(data.pessoa.sobrenome);
                $('#sexoEdit').val(data.pessoa.sexo);

                
            },
            error: function(xhr){
                console.error(xhr.responseText);
            }
        });
    }
})