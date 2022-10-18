<?php
  $usuario = $_POST['data'];

  $dados = json_decode($usuario, true);

  var_dump($dados);
?>