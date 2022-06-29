<?php
include "conexao.php";

$nome=$_POST["nome"];
$razao=$_POST["razao"];
$email=$_POST["email"];
$conf_email=$_POST["email1"];
$cnpj=$_POST["cnpj"];
$telefone=$_POST["phone"];
$campo['tabela']="tb_fornecedor";
$campo['colunaemail']="email_fornecedor";

include_once('validacao.php');
$result = mysqli_query($con, "select count(*) as total from tb_fornecedor where email_fornecedor = '$email'");
$row = mysqli_fetch_array($result);

if(validaNomeFantasia($nome) && validaCnpj($cnpj) && validaEmailRest($email,$conf_email)&& validaNome($razao) && validaPhone($telefone)){
    $resultado=mysqli_query($con,"INSERT INTO `$campo[tabela]` (`id_fornecedor`, `razao_fornecedor`, `endereco_fornecedor`, 
    `cnpj_fornecedor`, `email_fornecedor`, `telefone_fornecedor`, `site_fornecedor`, `nome_fantasia_fornecedor`, 
    `status_fornecedor`) VALUES (NULL, '$razao', NULL, '$cnpj', '$email', '$telefone', NULL, '$nome', 'avaliando')");
    header('Location: acompanhe.html');
}
else{
    if($SEESION['erro']=true){
        echo"CNPJ ou email já tem cadastro";
    }
    else{
        echo"$SEESION[erro]";
        echo"<script>window.location.href='
        cadastroRestaurante.html';</script>";
    }
    
}

$fechar=mysqli_close($con);
?>