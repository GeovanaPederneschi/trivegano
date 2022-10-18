<?php

include('conexao.php');
/* 
$email = $_POST['email'];
$conf_Email = $_POST['email1'];
$usuario = $_POST['usuario'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['phone'];
$senha = $_POST['senha'];
$conf_senha = $_POST['senha1'];
$dat_nas = $_POST['data_nascimento']; */
/* $cep = mysqli_real_escape_string($con, trim($_POST['cep'])); */
$SEESION['erro']=false;


function validaNome($nome)
{

	if (empty($nome)) 
	{
		return false;
	}
	

	elseif (strlen($nome) <= 2) 
	{
		return false;
	}

	elseif (strlen($nome) >= 50) 
	{
		return false;
	}
	/* echo"foi"; */
	return true;
	die();
}
function validaNomeFantasia($nome)
{

	include('conexao.php');
	$sql = "select count(*) as total from tb_fornecedor where nome_fantasia_fornecedor = '$nome'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
	$SEESION['erro']=false;
	
	if (empty($nome)||strlen($nome) <= 2 || strlen($nome) >= 50) 
	{
		return false;
	}
	
	elseif($row[0] == 1){

		$SEESION['erro'] = true;
		return false;
	}
	else{
	return true;
	}
}



function validaUsuario($usuario)
{


	if(strlen($usuario) <= 2)
	{
		return false;
	}

	elseif(strlen($usuario) >= 20)
	{

		return false;
	}
	return true;
	die();
}



function validaCpf($cpf) : bool
{
	include('conexao.php');
	$result = mysqli_query($con, "select count(*) as total from tb_cliente where cpf_cliente = '$cpf'");
	$row = mysqli_fetch_array($result);
	$SEESION['erro']=false;

	if($row[0]==1)
    {
        $SESSION['usuario_existe'] = true;
        $SEESION['erro']=true;
		/* window.location.href='
        cadastroUsuario.html'; */
		return false;
	}
	elseif (!is_numeric($cpf)) 
	{
		return false;
	}
	elseif (strlen($cpf) != 11 ){ 
		return false;
	}
	return true;
	die();
}

function validaPhone($phone) : bool
{

	if (is_numeric($phone) && strlen($phone) <= 16) 
	{
		return true;
	}
	else{
		return false;
		die();
	}
	
}

function validaCnpj($cnpj) : bool
{
	include('conexao.php');
	$result = mysqli_query($con, "select count(*) as total from tb_fornecedor where cnpj_fornecedor = '$cnpj'");
	$row = mysqli_fetch_array($result);
	$SEESION['erro']=false;

	if($row[0]==1)
    {
        $SESSION['fornecedor_existe'] = true;
        $SEESION['erro']=true;
		/* window.location.href='
        cadastroUsuario.html'; */
		return false;
	}
	elseif (!is_numeric($cnpj)) 
	{
		return false;
	}
	elseif (strlen($cnpj) != 18 ){
	
		return false;
	}
	return true;
	//echo"foi";
	die();
}

function validaSenha($senha,$conf_senha) : bool

{
	if($senha == $conf_senha && strlen($senha) >= 8 && strlen($senha) <= 20)
	{
		return true;
	}
	return false;
	die();
}

function validaEmailRest($email,$conf_email) :bool
{	
	include('conexao.php');
	$sql = "select count(*) as total from tb_fornecedor where email_fornecedor = '$email'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
	$SEESION['erro']=false;

	
	if($row[0] == 1){

		$SEESION['erro'] = true;
		return false;
	}
	elseif($email == $conf_email && strlen($email)>7 && $row[0] != 1){
		return true;
	}
	else{
		return false;
	}
	
}

function validaEmailCli($email,$conf_email) :bool
{	
	include('conexao.php');
	$sql = "select count(*) as total from tb_cliente where email_cliente = '$email'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
	$SEESION['erro']=false;

	
	if($row[0] == 1){

		$SEESION['erro'] = true;
		return false;
	}
	elseif($email == $conf_email && strlen($email)>7 && $row[0] != 1){
		return true;
	}
	else{
		return false;
	}
}
?>
