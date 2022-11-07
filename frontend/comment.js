
console.log('MEU DEUS');
 $('.div .ui.comments #form1 button').click(function(){
    console.log('pegou');

    $('.div .ui.comments #form1').submit(function(e){
        e.preventDefault();
        console.log('AII');

        var _comment = $('#comment').val();
        var _cod = $('#cod').val();

        console.log(_comment,_cod);

        $.ajax({
            url:'http://localhost/www/Oficial/frontend/inserir_comment.php',
            method: 'POST',
            data:{comment:_comment,cod:_cod},
            dataType:'json'
            
            
        }).done(function(result){
            $('#comment').val('');
            console.log(result);
            getComments();
        }).fail(function(jqXHR, textStatus, msg){
            try {
                const result = JSON.parse('');
                console.log(result);
              } catch (err) {
                // 👇️ SyntaxError: Unexpected end of JSON input
                console.log('error', err);
              }
              
        });
    });
});

function getComments(_cod) {
    var _cod = $('#cod').val();
    console.log(_cod);
    $.ajax({
        url: 'http://localhost/www/Oficial/frontend/selecionar_comments.php',
        method: 'POST',
        data:{cod:_cod},
        dataType: 'json'
    }).done(function(result){
        console.log(result);
        if(result!='Nenhum comentário encontrado'){
            //var box_comm = document.querySelector('.div .ui.comments .comment');
            document.querySelector('.div .ui.comments .comment').innerHTML = "";
            for (var i = 0; i < result.length; i++) {
            console.log('ai');
            
            $('.div .ui.comments .comment').prepend('<a class="avatar"><img src="../trivegano/usuarios/cliente/'+result[i].foto_usuario+'"></a><div class="content"><a class="author">'+result[i].nome_usuario+'</a> <div class="metadata"><span class="date">'+result[i].data_coment+'</span></div><div class="text"><p>'+result[i].comentario+'</p> </div><div class="actions"><a class="reply">Reply</a> </div></div>');
            } 
        }
        else{
            $('.div .ui.comments .comment').prepend('<div class=""><h1 class="ui left aligned header" style="font-size: 15px;margin:2%;">Não há comentários.</h1></div>');
        }
          
    }).fail(function(jqXHR, textStatus, msg){
        try {
            const result = JSON.parse('');
            console.log(result);
          } catch (err) {
            // 👇️ SyntaxError: Unexpected end of JSON input
            console.log('error', err);
           
          }
          
    });
}

   getComments();


//<a class="author">'+result[i].nome_cliente+'</a> 