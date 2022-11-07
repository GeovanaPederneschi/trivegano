<?php

header('Content-Type:application/json');

$token = $_POST['token'];


$pdo = new PDO('mysql:host=localhost; dbname=trivegano;', 'root', '20050213');

    $stmt = $pdo->prepare("SELECT * FROM tb_promocao WHERE token_promocao = :token AND status_promocao = 'ativo';");
    $stmt -> bindValue(':token',$token);
    // $stmt -> bindValue(':ati',"'ativo'");
    $stmt->execute();

    

    if ($stmt->rowCount() == 1) {
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
      

    } else {
        echo json_encode('Nenhuma promoção correspondente');
    } 

?>