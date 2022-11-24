<?php
include('../cadastro/conexao.php');mysqli_query($con,"SET NAMES 'utf8'");  
                                  mysqli_query($con,'SET character_set_connection=utf8');  
                                  mysqli_query($con,'SET character_set_client=utf8');  
                                  mysqli_query($con,'SET character_set_results=utf8');
$query=mysqli_query($con,"UPDATE `tb_pedido_venda` SET `status_venda`='finalizada' WHERE `id_venda`= $_POST[codi]")

?>