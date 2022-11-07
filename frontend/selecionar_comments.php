<?php
  
    
    header('Content-Type: application/json');
    
    $cod=$_POST['cod'];

    $pdo = new PDO('mysql:host=localhost; dbname=trivegano;', 'root', '20050213');

    $stmt = $pdo->prepare("SELECT * FROM tb_comentario WHERE tb_guia_id_guia= :co");
    $stmt -> bindValue(':co',$cod);
    $stmt->execute();

    
   



    if ($stmt->rowCount() >= 1) {
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
      

    } else {
        echo json_encode('Nenhum comentário encontrado');
    } 

    

?>