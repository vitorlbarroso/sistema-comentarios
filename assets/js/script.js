$(function(){
    $('#form1').submit(function(event){
        event.preventDefault(); // Quando clicar no botão, ele não atualizará a página.
        var username = $('#name').val(); // Pega o valor do input e salva na variável.
        var comment = $('#comment').val(); // Pega o valor do input e salva na variável.
        
        $.ajax({
            url: 'http://localhost/Estudos/Cursos/YouTube/AjaxPHP/php/insert.php', // URL de envio dos dados
            method: 'POST', // Método utilizado para enviar
            data: {nome: username, comentario: comment}, // Conteúdo a ser enviado
            dataType: 'json' // Tipo de dado enviado
        }).done(function(res){
            $('#name').val('');
            $('#comment').val('');
            getComments();
        });
    });
    
    function getComments(){
        $.ajax({
            url: 'http://localhost/Estudos/Cursos/YouTube/AjaxPHP/php/select.php',
            method: 'GET',
            dataType: 'json'
        }).done(function(res){
            var box_comm = document.querySelector('.box_comment');
            while(box_comm.firstChild){
                box_comm.firstChild.remove();
            }
            for(var i = 0; i < res.length; i++){
                $('.box_comment').prepend('<div class="b_comm"><h4>'+res[i].username+'</h4><p>'+res[i].comment+'</p></div>');
            }
        });
    }
    
    getComments();
});