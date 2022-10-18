
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    var usuario = {
        'nome': 'João',
        'profissao': 'Engenheiro',
        'cidade': 'São Paulo'
        }
    
    var dados = JSON.stringify(usuario);
    
    $.ajax({
        url: 'teste.php',
        type: 'POST',
        data: {data: dados},
        success: function(result){
        // Retorno se tudo ocorreu normalmente
        },
        error: function(jqXHR, textStatus, errorThrown) {
        // Retorno caso algum erro ocorra
        }
    });
    