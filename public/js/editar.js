
$('#editModal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var recipientId = button.data('id');
    console.log(recipientId);
    

        $.ajax({
            url: "/pessoa/edit/" + recipientId,
            method: "GET",
            success: function(data){
                $('#nomeEdit').val(data.pessoa.nome);
                $('#sobrenomeEdit').val(data.pessoa.sobrenome);
                $('#sexoEdit').val(data.pessoa.sexo);

                
            },
            error: function(xhr){
                console.error(xhr.responseText);
            }
        });

        $('#formEdit').on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    url: "/pessoa/update/" + recipientId,
                    type:"POST",
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function(response){
                        console.log(response);
                        $('#editModal').modal('hide');
                        
                    }
                });
                
            })
});
