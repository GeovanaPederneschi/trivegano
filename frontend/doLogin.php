<script src="../js/jquery-3.5.1.min.js"></script>
<?php

include ("../cadastro/conexao.php");
session_start();
$loginx=$_POST['usuario'];
$_SESSION['loginpa']=$loginx;
$senhax=$_POST['senha'];
if(isset($_POST['cod'])){
	$cod=$_POST['cod'];
}
$path=$_POST['path'];
//var_dump($_POST);
//echo $path;

	$resultado=mysqli_query($con,"select * from tb_cliente where usuario_cliente='$loginx' and senha_cliente='$senhax'");
	//var_dump($resultado);
	if($row=mysqli_num_rows($resultado)>0){
		if($r=mysqli_fetch_row($resultado)){
			$_SESSION['codusuario']=$r[0];
			$_SESSION['foto_usuario']=$r[10];
			$_SERVER['usuario']='cliente';
		}
		if($path=='guia_detalhe.php'){
			echo"<form id='form3' action='$path' method='POST'>
				<input type='hidden' value='$cod' name='codx'>
				</form>
				<script>$('#form3').submit();</script>";
				//echo'ala';
		}
		else{
			header('Location:'.$path);

		}
		//echo "mano";
	}
	else{
		echo"<script>window.location.replace('http://localhost/trivegano-main/cadastro/login.html');</script>";
		echo 'foi';
	}
	
	
$fechar=mysqli_close($con);

?>
