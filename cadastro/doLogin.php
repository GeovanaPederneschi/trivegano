<?php
session_start();
include "conexao.php";

$loginx=$_POST['usuario'];
$senhax=$_POST['senha'];
$resultado=mysqli_query($con,"select * from usuario_adm where nomeAdm='$loginx' and senha='$senhax'");
if($r = mysqli_fetch_array($resultado)){
//header('Location: lista.php');
//header('Location: menu.php');
header('Location: ../menu.html');
	//echo "<img src=".$r[3]." width=300 height=300><br>";
	//echo "Codigo Usuario: ".$r[0]."<br>";
	//echo "Login : ".$r[1];

}
else
{echo "<script> alert('login ou senha invalida');</script>";
	header('login.html');

}

$fechar=mysqli_close($con);
?>
