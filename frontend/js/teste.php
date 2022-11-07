
<?php
   $cod='2';

   $pdo = new PDO('mysql:host=localhost; dbname=trivegano;','root','20050213');

   $stmt = $pdo->prepare("SELECT * FROM tb_comentario WHERE tb_guia_id_guia = $cod ");
   $stmt->execute();

  

   if ($stmt->rowCount() >= 1) {
       

       echo'<br><br>';

       if($com = $stmt->fetch(PDO::FETCH_OBJ)){
        $smt = $pdo->prepare("SELECT foto, nome_cliente FROM tb_cliente WHERE id_cliente = $com->tb_cliente_id_cliente ");
        $smt->execute();

        echo json_encode($smt->fetchAll(PDO::FETCH_ASSOC));
       }
       

        

    //     var_dump($smt->fetchALL(PDO::FETCH_ASSOC));
   } 
   else {
      var_dump('Nenhum comentário encontrado');
   }
?>