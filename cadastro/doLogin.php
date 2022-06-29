<?php
session_start();
include "conexao.php";

$loginx=$_POST['usuario'];
$_SESSION['loginpa']=$loginx;
$senhax=$_POST['senha'];
$resultado=mysqli_query($con,"select * from tb_usuario_adm where nome_usuario_adm='$loginx' and senha_usuario_adm='$senhax'");
if($r = mysqli_fetch_array($resultado)){
	$_SESSION['codusuario']=$r[0];
header('Location: ../menu.html');
	//echo "<img src=".$r[3]." width=300 height=300><br>";
	//echo "Codigo Usuario: ".$r[0]."<br>";
	//echo "Login : ".$r[1];

}
else
{	
	$resultado=mysqli_query($con,"select * from tb_cliente where nome_cliente='$loginx' and senha_cliente='$senhax'");
	if($r=mysqli_fetch_array($resultado)){
		$_SESSION['codusuario']=$r[0];
		header('Location:../menu.html');
	}
	else{
		$resultado=mysqli_query($con,"select * from tb_adm_fornecedor where login_adm_fornecedor='$loginx' and senha_adm_fornecedor='$senhax'");
		if($r=mysqli_fetch_array($resultado)){
			$_SESSION['codusuario']=$r[0];
			header('Location:../menu.html');
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
