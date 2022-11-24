<?php
include "../cadastro/conexao.php";mysqli_query($con,"SET NAMES 'utf8'");  
                                  mysqli_query($con,'SET character_set_connection=utf8');  
                                  mysqli_query($con,'SET character_set_client=utf8');  
                                  mysqli_query($con,'SET character_set_results=utf8');

$codx = $_GET['deletar'];
$target_dir='../trivegano/receitas/';

//seleciona no bd dados a receita respectiva
$resultado=mysqli_query($con,"SELECT * FROM `tb_imagem_receitas` WHERE `tb_receitas_id_receitas`= '$codx';");
//apaga foto antiga do servidor
if($r = mysqli_fetch_array($resultado)){
    $target_file=$target_dir.$r[1];
    unlink($target_file);
}
$resultado=mysqli_query($con,"DELETE FROM `trivegano`.`tb_imagem_receitas` 
WHERE (`tb_receitas_id_receitas` = '$codx');");
$resultado=mysqli_query($con,"DELETE FROM `tb_receitas` WHERE `id_receitas` = '$codx';");
$fechar=mysqli_close($con);
echo "<script> alert('deletado com sucesso');</script>";
header("Location: back1.php")
?>