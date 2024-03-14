$(document).ready(function(){ 
    $('#botaoEdit').click(function () { 
        var id = $(this).data('id');
        console.log(id);
        $('#editModal').modal('show');
        $('#editModal').on(function(){
           
            $.ajax({
                url: "/pessoa/edit/" + id,
                method: "GET",
                success: function(data){
                    $('#nomeEdit').val(data.pessoa.nome);
                    $('#sobrenomeEdit').val(data.pessoa.sobrenome);
                    $('#sexoEdit').val(data.pessoa.sexo);
                    
                    
                },
                error: function(xhr){
                    console.error(xhr.responseText);
                },
            });

            $('#btnAtualizar').on('submit', function () { 
                $.ajax({
                    url: "/pessoa/update/" + id,
                    method:"POST",
                    success: function(){
                        console.log(id);
                    }
                });
                return false;
            })
            
        });
    });
});

















/*
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
})
*/