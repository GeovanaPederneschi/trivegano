<?php
include "../cadastro/conexao.php";

$codx = $_POST['txtcod'];

//seleciona no bd dados a receita respectiva
$resultado=mysqli_query($con,"SELECT * FROM `tb_imagem_receitas` WHERE `tb_receitas_id_receitas`= '$codx';");
//apaga foto antiga do servidor
if($r = mysqli_fetch_array($resultado)){
    $target_file=$target_dir.$r[1];
    unlink($target_file);
}

$resultado=mysqli_query($con,"DELETE FROM `tb_receitas` WHERE `id_receitas` = '$codx';");
$fechar=mysqli_close($con);
echo "<script> alert('deletado com sucesso');</script>";
header("Location: back1.php")
?>