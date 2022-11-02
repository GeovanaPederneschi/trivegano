
$(document).ready(function() {
   

    //Quando o campo uf perde o foco.
    
    $("#modal-center5 .grid-3 .spacescroll .cover .uk-grid  .wrap-input100-grid #uf").blur(function() {


        var rua = $('#rua').val();
        var bairro = $("#bairro").val();
        var cidade = $("#cidade").val();
        var uf = $("#uf").val(); 
        console.log('EAAI');
        //console.log(rua+bairro+cidade+uf)

        //Verifica se os campos tem capo informado
        if (rua != "" && bairro !="" && cidade != "" && uf != "") {

            console.log('FOIII')
            
                $('#modal-center5 .grid-3 .spacescroll .cover .wrap-input100 #cep').val('...');
            
                //Consulta o webservice viacep.com.br/
                // $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                $.getJSON("https://viacep.com.br/ws/"+ uf +"/" + cidade + "/" + rua + "/json/?callback=?", function(dados) {
                

                    if (!("erro" in dados) && (dados.length > 0)) {
                        $("#modal-center5 .grid-3 .spacescroll .cover .wrap-input100 #cep").val(dados[0].cep);
                        //console.log(dados);
                    }
                    else if(dados.length == 0){
                        $('#cep').val('');
                        alert('Endereço inválido');
                    }
                    else{
                        alert('Endereço inválido');
                    }
                });
        } //end if.
        else{
            //encontrar bairro
            if(rua != "" && bairro == "" && cidade != "" && uf != ""){

                $('#cep').val('...');
                $('#bairro').val('...');

                $.getJSON("https://viacep.com.br/ws/"+ uf +"/" + cidade + "/" + rua + "/json/?callback=?", function(dados) {

                    if (!("erro" in dados) && (dados.length > 0)) {
                        $("#modal-center5 .grid-3 .spacescroll .cover .wrap-input100 #cep").val(dados[0].cep);
                        $('#modal-center5 .grid-3 .spacescroll .cover .wrap-input100-grid #bairro').val(dados[0].bairro);
                    }
                    else if(dados.length == 0){
                        $('#cep').val('');
                        $('#bairro').val('');
                        //alert('Endereço inválido');
                    }
                    /* else{
                        alert('Endereço inválido');
                    } */
                });
                
            }
        }
    });


    $('#modal-center5 .grid-3 .spacescroll .ifield .btn3').on('click',function(){

        var rua = $('#modal-center5 .grid-3 .spacescroll .cover .uk-grid  .wrap-input100-grid #rua').val();
        var bairro = $("#modal-center5 .grid-3 .spacescroll .cover .uk-grid  .wrap-input100-grid #bairro").val();
        var cidade = $("#modal-center5 .grid-3 .spacescroll .cover .uk-grid  .wrap-input100-grid #cidade").val();
        var uf = $("#modal-center5 .grid-3 .spacescroll .cover .uk-grid  .wrap-input100-grid #uf").val();
        var num = $("#modal-center5 .grid-3 .spacescroll .cover .uk-grid  .wrap-input100-grid #numero").val();
        var comp = $("#modal-center5 .grid-3 .spacescroll .cover .uk-grid  .wrap-input100-grid #complemento").val();

        //Verifica se os campos tem capo informado
        if (rua != "" && bairro !="" && cidade != "" && uf != "" && num != "" && comp != "") {

                $.getJSON("https://viacep.com.br/ws/"+ uf +"/" + cidade + "/" + rua + "/json/?callback=?", function(dados) {
                
                    if (!("erro" in dados) && (dados.length > 0)) {
                       
                        //faça sem erros;
                        Cookies.remove('latitude');
                        Cookies.remove('longitude');
                        //Cookies.remove('endereco');
                        //Cookies.remove('cep');
                        Cookies.set('endereco',dados[0].logradouro+', '+num+' - '+dados[0].bairro+', '+dados[0].localidade+' - '+dados[0].uf+', '+dados[0].cep);
                        Cookies.set('cep', dados[0].cep);
                        console.log(Cookies.get('cep'));
                        /* console.log(dados);
                        console.log(Cookies.get('endereco')); */
                        location.reload(true);
                    }
                    else if(dados.length == 0){
                        alert('Endereço inválido');
                    }
                    else{
                        alert('Endereço inválido');
                    }
                });
        }
        else{
            alert('Preencha todos os campos');
        }
    });

});