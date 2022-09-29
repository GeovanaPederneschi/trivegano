<?php
session_start();

$nomeReceita = $_POST['nome'];
$descrição = $_POST['descrição'];
$ceo = $_POST['ceo'];
$data = $_POST['data_receita'];
$categoria = $_POST['categoria'];
$categoriaDieta = $_POST['categoriaDieta'];
$ingrediente = $_POST['ingreditentes'];
$codu=$_SESSION['codusuario'];

include('validacao.php');


           include("conexao.php");
            $sql = "INSERT INTO tb_receitas (`id_receitas`, `titulo_receita`, `descricao_receita`,`tb_usuario_adm_id_usuario_adm`,`tb_categoria_id_categoria`,`ceo_receita`,`data_receita`,
           `categoria_dieta_receita`,`ingredientes_receita`) VALUES (NULL, '$nomeReceita', '$descrição',$codu, '$categoria', '$ceo', '$data', 
            '$categoriaDieta', '$ingrediente')";
             mysqli_query($con,$sql);
             echo "cadastrado com sucesso";
             $fechar=mysqli_close($con);
    


?>