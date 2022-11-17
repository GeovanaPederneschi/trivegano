<?php
include('../cadastro/conexao.php');
$query=mysqli_query($con,"UPDATE `tb_pedido_venda` SET `status_venda`='finalizada' WHERE `id_venda`= $_POST[codi]")

?>