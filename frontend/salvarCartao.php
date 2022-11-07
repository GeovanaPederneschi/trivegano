<?php

include ("../cadastro/conexao.php");
session_start();
$nome=$_POST['cname'];
$num=$_POST['cnum'];
$val=$_POST['cval'];
$cvc=$_POST['cvc'];
$bandeira=$_POST['bandeira'];

	$query=mysqli_query($con,"INSERT INTO `tb_cartao`(`id_cartao`, `numero_cartao`, `nome_cartao`, `bandeira_cartao`, `cvv_cartao`, `validade_cartao`, `tb_cliente_id_cliente`) 
    VALUES (NULL,'$num','$nome', '$bandeira','$cvc','$val','$_SESSION[codusuario]')");
	
		
		header('Location: finalizar_compra.php');
	
	
	
$fechar=mysqli_close($con);

?>