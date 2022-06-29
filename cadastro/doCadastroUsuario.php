<?php
include "conexao.php";

$email = $_POST['email'];
$conf_Email = $_POST['email1'];
$usuario = $_POST['usuario'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['phone'];
$senha = $_POST['senha'];
$conf_senha = $_POST['senha1'];
$dat_nas = $_POST['data_nascimento'];

$cpf=str_replace(array("#","-","'",".", ";"), '', $cpf);
$telefone=str_replace(array("#","-",".","+"), '', $telefone);
$now=date('Y/m/d H:i');
       

$sql = "INSERT INTO tb_cliente (`id_cliente`, `nome_cliente`, `dat_nasc_cliente`, `cpf_cliente`, 
        `telefone_cliente`, `email_cliente`, `senha_cliente`, `status_cliente`, `dat_cadastro_cliente`, 
        `usuario_cliente`) VALUES (NULL, '$nome', '$dat_nas', '$cpf', '$telefone', 
        '$email', '$senha', 'ativo', $now, '$usuario')";
        $result=mysqli_query($con,$sql);
        $sql="select * from tb_cliente where usuario_cliente='$usuario'";
        $result=mysqli_query($con,$sql);
        if($r=mysqli_fetch_array($result)) {
            $_SESSION['status_cadastro'] = true;
            echo"$r[0]";
           /*  echo"<script language='javascript' type='text/javascript'>
                alert('Usuário cadastrado com sucesso!');window.location.
                href='login.html'</script>"; */
        }

$fechar=mysqli_close($con);
echo "<script> alert('inserido com sucesso');</script>";
?>