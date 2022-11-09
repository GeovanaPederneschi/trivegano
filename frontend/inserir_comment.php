<?php
    header('Content-Type: application/json');

   $comment = $_POST['comment'];
   $cod = $_POST['cod'];
   $now=date('Y/m/d H:i');

  

   $pdo = new PDO('mysql:host=localhost; dbname=trivegano;','root','');

   $smt = $pdo->prepare("INSERT INTO tb_comentario (comentario, tb_guia_id_guia, tb_cliente_id_cliente, data_coment, foto_usuario, nome_usuario)
    VALUES (':co', ':id_g', ':id_c', ':dat', ':fot', ':nome');");

   session_start();
   $smt->bindValue(':co',$comment);
   $smt->bindValue(':id_g',$cod);
   $smt->bindValue(':id_c',$_SESSION['codusuario']);
   $smt->bindValue(':dat',$now);
   $smt->bindValue(':fot',$_SESSION['foto_usuario']);
   $smt->bindValue(':nome',$_SESSION['loginpa']);
   $smt->execute();

   

   if ($smt->rowCount() >= 1) {
    echo json_encode('Comentário Salvo com Sucesso');
       
    } else {
    echo json_encode('Falha ao salvar comentário');
    }


?>