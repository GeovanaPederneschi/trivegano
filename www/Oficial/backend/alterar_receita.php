

<?php

include('../cadastro/conexao.php');

$fotox="";
$uploadOk = 0;
$target_dir = "../trivegano/receitas/";
$target_file_new = $target_dir . basename($_FILES["arq"]["name"]);

if (basename( $_FILES["arq"]["name"]!="")){
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file_new,PATHINFO_EXTENSION));


if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["arq"]["tmp_name"]);
  if($check !== false) {
    echo "ARQUIVO É IMAGEM - " ;
    $uploadOk = 1;
  } else {
    echo "ARQUIVO NÃO EXISTE.";
    $uploadOk = 0;
  }
}


if (file_exists($target_file_new)) {
  echo "ARQUIVO EXISTE.";
  $uploadOk = 0;
}

// CHECA TAMANHO
if ($_FILES["arq"]["size"] > 500000) {
  echo "ARQUIVO MUITO GRANDE.";
  $uploadOk = 0;
}

// CERTIFICA FORMATO
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "SOMENTE JPG, JPEG, PNG & GIF .";
  $uploadOk = 0;
}

function imagem($uploadOk,$target_dir,$target_file_new,$con){

    // ChECA SE TEM ERRO
    if ($uploadOk == 0) {
        //echo "ARQUIVO NÃO PODE SER ENVIADO.";
        return false;
    
    } else {
        if (move_uploaded_file($_FILES["arq"]["tmp_name"], $target_file_new)) {
    
        //seleciona no bd dados do respectivo usuário
        $resultado=mysqli_query($con,"select * from usuario where codusuario=$_SESSION[codusuario]");
            //apaga foto antiga do servidor
            if($r = mysqli_fetch_array($resultado)){
                $target_file=$target_dir.$r[3];
                unlink($target_file);
            }
        
        $target_file=$target_file_new;
        $fotox=htmlspecialchars( basename( $_FILES["arq"]["name"]));
        } else {
        return false;
        }
    
    }

    }


}
?>






<?php
include "../cadastro/conexao.php";
include "validacao.php";
session_start();



  $ceo=$_POST['ceo'];
  $titulo=$_POST['titulo'];
  $descricao=$_POST['descricao'];
  $ingredientes=$_POST['ingredientes'];

  if ($fotox==""){
    $fotox=$_POST["txtfoto"];
    }


if(validaCeo($ceo))
{

$resultado=mysqli_query($con,"UPDATE `tb_receitas` SET `titulo_receita`='$titulo',
`descricao_receita`='$descricao',`ceo_receita`='$ceo',
`ingredientes_receita`='$ingredientes' WHERE `id_receitas`='$_SESSION[editarcod]';");




    $mudarFoto=mysqli_query($con,"UPDATE `tb_imagem_receitas` SET `imagem_receita`='$fotox' 
    WHERE `tb_receitas_id_receitas`='$_SESSION[editarcod]';");

        $quant=mysqli_affected_rows($con);  
        //pega a quantidade de registros     alterados

        if ($quant>=0) {
        /* echo "registro alterado <br>";
        echo $_SESSION['editarcod']; */
            header('Location: back1.php');
        }
        else
        {     echo "erro na alteração de dados ou foto";

        }
    


$fechar=mysqli_close($con);
}
else{
    echo"bau bau";
}



?>