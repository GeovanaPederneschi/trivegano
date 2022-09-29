<?php
//salvando caminho
$target_dir = "../trivegano/receitas/";
$target_file = $target_dir. basename($_FILES["arq"]["name"]);
$uploadOk = 1;
/* Obtendo a extensão do arquivo que está sendo carregado. */
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


/* Checando se o arquivo é uma imagem. */
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["arq"]["tmp_name"]);
  if($check !== false) {
    //echo "ARQUIVO É IMAGEM - " ;
    $uploadOk = 1;
  } else {
    //echo "ARQUIVO NÃO EXISTE.";
    $uploadOk = 0;
  }
}


/* Chechando se o arquivo existe. */
if (file_exists($target_file)) {
  //echo "ARQUIVO EXISTE.";
  $uploadOk = 1;
}


/* Checando se o tamanho do aequivo é maior que 500000 bytes. */
if ($_FILES["arq"]["size"] > 500000000000) {
  //echo "ARQUIVO MUITO GRANDE.";
  $uploadOk = 0;
}

/* Checando se o aequivo é jpg, png, jpeg or gif. */
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  //echo "SOMENTE JPG, JPEG, PNG & GIF .";
  $uploadOk = 0;
}

/* Checa se o arquivo pode ser enviado. */
function validaImagem($uploadOk,$target_file){
    if ($uploadOk == 0) {
    //echo "ARQUIVO NÃO PODE SER ENVIADO.";
    return false;
    } 

    /* Verificando se o arquivo foi carregado e se foi,
    salva o nome do arquivo na variável . */
    else {
    if (move_uploaded_file($_FILES["arq"]["tmp_name"], $target_file)) {
         $foto=htmlspecialchars( basename( $_FILES["arq"]["name"]));
        //echo "O ARQUIVO ". htmlspecialchars( basename( $_FILES["arq"]["name"])). " ENVIO OK.";
        return true;
    } else {
        //echo "ERRO DE ENVIO.";
        return false;
    }
    }
}
    


?>

<?php

include "../cadastro/conexao.php";
include "validacao.php";
session_start();



  $ceo=$_POST['ceo'];
  $cat=$_POST['cat'];
  $dieta=$_POST['dieta'];
  $titulo=$_POST['titulo'];
  $descricao=$_POST['descricao'];
  $ingredientes=$_POST['ingredientes'];


if(validaImagem($uploadOk,$target_file) && validaCeo($ceo))
{
$now=date('Y/m/d H:i');
$foto=htmlspecialchars( basename( $_FILES["arq"]["name"]));
$resultado=mysqli_query($con,"INSERT INTO `tb_receitas`(`id_receitas`, `titulo_receita`, `descricao_receita`, `tb_usuario_adm_id_usuario_adm`, `tb_categoria_id_categoria`, `ceo_receita`, `data_receita`, `categoria_dieta_receita`, `ingredientes_receita`) 
VALUES (NULL, '$_POST[titulo]', '$_POST[descricao]','$_SESSION[codusuario]','$cat','$ceo','$now','$dieta','$_POST[ingredientes]');");

$resulta=mysqli_query($con,"SELECT `id_receitas` FROM `tb_receitas` WHERE `data_receita`= date(now()) and `tb_usuario_adm_id_usuario_adm`='$_SESSION[codusuario]' and `titulo_receita`='$_POST[titulo]';");
  if($receita=mysqli_fetch_array($resulta)){
    
    $foto=mysqli_query($con,"INSERT INTO `tb_imagem_receitas`(`id_imagem_receitas`, `imagem_receita`, `tb_receitas_id_receitas`, `tb_receitas_tb_usuario_adm_id_usuario_adm`, `tb_receitas_tb_categoria_id_categoria`) 
    VALUES (NULL, 'trivegano/receitas/$foto','$receita[0]', '$_SESSION[codusuario]', '$cat');");
  }


$fechar=mysqli_close($con);
}
else{
    echo"bau bau";
}

header('Location: back1.php');

?>