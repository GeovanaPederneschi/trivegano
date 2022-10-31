<?php
session_start();
inclued("conexao.php");

$email = mysql_real_escape_string($conexao, trim($_POST['email']));
$nome = mysql_real_escape_string($conexao, trim($_POST['nome']));
$cpf = mysql_real_escape_string($conexao, trim($_POST['cpf']));
$telefone = mysql_real_escape_string($conexao, trim($_POST['tel']));
$senha = mysql_real_escape_string($conexao, trim(md5($_POST['senha'])));

$sql = "select count(*) as total from usuario where usuario = '$usuario'";
$result = mysql_query($conexao, $sql);
$row = mysqli_fetch($result);

if($row['total'] == 1){
	$SESSION['usuario_existe'] = true;
	header('Location: cadastro.php');
	exit;
}

$sql = "INSERT INTO site (email, nome, cpf, telefone, senha) VALUES ('$nome', '$email', '$cpf', '$telefone', '$senha', NOW())";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;

}

$conexao->close();
header('Location: cadastro.php');
exit;
?>


