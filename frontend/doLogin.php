<?php

include ("../cadastro/conexao.php");
session_start();
$loginx=$_POST['usuario'];
$_SESSION['loginpa']=$loginx;
$senhax=$_POST['senha'];
$path=$_POST['path'];

	$resultado=mysqli_query($con,"select * from tb_cliente where usuario_cliente='$loginx' and senha_cliente='$senhax'");
	if($r=mysqli_fetch_array($resultado)){
		
		$_SESSION['codusuario']=$r[0];
		$_SERVER['usuario']='cliente';
		header('Location:'.$path);
	}
	
	
$fechar=mysqli_close($con);

?>
