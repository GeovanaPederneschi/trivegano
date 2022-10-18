<?php

include ("../cadastro/conexao.php");
session_start();
$loginx=$_POST['usuario'];
$_SESSION['loginpa']=$loginx;
$senhax=$_POST['senha'];

	$resultado=mysqli_query($con,"select * from tb_cliente where usuario_cliente='$loginx' and senha_cliente='$senhax'");
	if($r=mysqli_fetch_array($resultado)){
		
		$_SESSION['codusuario']=$r[0];
		header('Location:finalizar_compra.php');
        echo"foi <br>";
        echo"$_SESSION[codusuario]";
	}
	
	
$fechar=mysqli_close($con);

?>
