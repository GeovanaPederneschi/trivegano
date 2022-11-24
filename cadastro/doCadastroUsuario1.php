<?php
session_start();

$email = $_POST['email'];
$conf_Email = $_POST['email1'];
$usuario = $_POST['usuario'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['phone'];
$senha = $_POST['senha'];
$conf_senha = $_POST['senha1'];
$dat_nas = $_POST['data_nascimento'];
$campo['tabela']="tb_cliente";
$campo['colunaemail']="email_cliente";

include('validacao.php');


$cpf=str_replace(array("#","-","'",".", ";"), '', $cpf);
$telefone=str_replace(array("#","-",".","+"), '', $telefone);



/* echo "$email,$nome, $dat_nas, $cpf, $telefone, 
$email, $senha,$usuario,";  if(validaNome($nome) && validaEmailCli($email,$conf_Email) && 
validaSenha($senha,$conf_senha) &&validaUsuario($usuario) && validaCpf($cpf))*/
 

if(validaNome($nome) && validaEmailCli($email,$conf_Email) && 
validaSenha($senha,$conf_senha) &&validaUsuario($usuario) && validaCpf($cpf))
{           include("conexao.php");
            $now=date('Y/m/d H:i');
            //$formato = 'Y/m/d';
            //$data = DateTime::createFromFormat($formato, $dat_nas);
            //echo"$data";
            $sql = "INSERT INTO tb_cliente (`id_cliente`, `nome_cliente`, `dat_nasc_cliente`, `cpf_cliente`, 
            `telefone_cliente`, `email_cliente`, `senha_cliente`, `status_cliente`, `dat_cadastro_cliente`, 
            `usuario_cliente`,`foto`) VALUES (NULL, '$nome', '$dat_nas', '$cpf', '$telefone', 
            '$email', '$senha', 'ativo', '$now', '$usuario','usuario.png')";
            $result=mysqli_query($con,$sql);
            $sql="select * from tb_cliente where cpf_cliente='$cpf'";
            $result=mysqli_query($con,$sql);
            $r=mysqli_fetch_array($result);
            if(!empty($r)) {
                $_SESSION['status_cadastro'] = true;
                echo"<script>
                    alert('Usuário cadastrado com sucesso!');window.location.
                    href='login.html'</script>";
            }
            else{
                /* echo"<script>
                    alert('Não foi possível cadastrar esse usuário');window.location
                    .href='cadastro.html'</script>"; */
                    echo "$email,$nome, $dat_nas, $cpf, $telefone, 
                $email, $senha,$usuario,$now";
            }

            $fechar=mysqli_close($con);
            
            if(!empty($_SESSION['pedido'])){
                header('Location:../finalizar_compra.php');
            }
            else{
                header('Location:login.html');
            }
    
}
else{
    
}
?>