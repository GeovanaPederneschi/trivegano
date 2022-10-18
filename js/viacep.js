$(document).ready(function() {

     function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
       /*  $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val(""); */
        $('#cep').val('');
    } 
    
    //Quando o campo cep perde o foco.
    $("#rua #bairro #cidade #uf").blur(function() {

        //Nova variável "cep" somente com dígitos.
        //var cep = $(this).val().replace(/\D/g, '');
        var rua = $('#rua').val();
        var bairro = $("#bairro").val();
        var cidade = $("#cidade").val();
        var uf = $("#uf").val();

        //Verifica se campo cep possui valor informado.
        if (rua != "" && bairro !="" && cidade != "" && uf != "") {

            //Expressão regular para validar o CEP.
            //var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            //if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                /* $("#rua").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#uf").val("...");
                $("#ibge").val("..."); */
                $('#cep').val('...');

                //Consulta o webservice viacep.com.br/
                // $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                $.getJSON("https://viacep.com.br/ws/"+ uf +"/" + cidade + "/" + rua + "/json/?callback=?", function(dados) {


                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                       /*  $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                        $("#ibge").val(dados.ibge); */
                        $("#cep").val(dados.cep);
                        
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("Local não encontrado.");
                    }
                });
            /* } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            } */
        } //end if.
        else{
            //cep sem valor, limpa formulário.
            if(rua != "" && bairro == "" && cidade != "" && uf != ""){

                $('#cep').val('...');
                $('#bairro').val('...');

                $.getJSON("https://viacep.com.br/ws/"+ uf +"/" + cidade + "/" + rua + "/json/?callback=?", function(dados) {


                    if (!("erro" in dados)) {
                        $("#cep").val(dados.cep);
                        $('#bairro').val(dados.bairro);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("Local não encontrado.");
                    }
                });
                
            }
            limpa_formulário_cep();
        }
    });
});