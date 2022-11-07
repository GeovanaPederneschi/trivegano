<?php
header('Content-Type: application/json');
session_start();
include "conexao.php";

$loginx=$_POST['usuario'];
$_SESSION['loginpa']=$loginx;
$senhax=$_POST['senha'];
$resultado=mysqli_query($con,"select * from tb_usuario_adm where nome_usuario_adm='$loginx' and senha_usuario_adm='$senhax'");
if($r = mysqli_fetch_array($resultado)){
	$_SESSION['codusuario']=$r[0];
	$_SESSION['usuario']='adm_s';
	
header('Location: ../backend/back1.php');
	//echo "<img src=".$r[3]." width=300 height=300><br>";
	//echo "Codigo Usuario: ".$r[0]."<br>";
	//echo "Login : ".$r[1];

}
else
{	
	$resultado=mysqli_query($con,"select * from tb_cliente where usuario_cliente='$loginx' and senha_cliente='$senhax'");
	if($r=mysqli_fetch_array($resultado)){
		$_SESSION['codusuario']=$r[0];
		$_SESSION['foto_usuario']=$r[10];
		$_SESSION['usuario']='cliente';
		
		
		header('Location:../frontend/menu.php');
	}
	else{
		$resultado=mysqli_query($con,"select * from tb_adm_fornecedor where login_adm_fornecedor='$loginx' and senha_adm_fornecedor='$senhax'");
		if($r=mysqli_fetch_array($resultado)){
			$_SESSION['codusuario']=$r[0];
			$_SESSION['codfornecedor']=$r[5];
			$_SESSION['usuario']='adm_f';
			
			header('Location:../backend/back2.php');
		}
		else{
			echo "<script> alert('login ou senha invalida');</script>";
		header('Location:login.html');
		}
		
	}
	

}
echo"$cpf";
$fechar=mysqli_close($con);
?>
