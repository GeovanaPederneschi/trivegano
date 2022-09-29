<?php
include "cadastro/conexao.php";
			
session_start();

if(!empty($_POST['submit'])){
    	if(empty($_SESSION['idcarrinho'])){
    	    $_SESSION['idcarrinho'] = array('1' => $_POST['submit'] );
    	    $_SESSION['carr_quant_prod']=1;
    	}
    	elseif(!empty($_SESSION['idcarrinho'])){
    			
            for($i=1;$i<=$_SESSION['carr_quant_prod'];$i++){
                $carrinho=$_SESSION['idcarrinho'];
                if($carrinho[$i]!= $_POST['submit']){
                    $_SESSION['carr_quant_prod']++;
    		        $_SESSION['idcarrinho'] = array($_SESSION['carr_quant_prod'] => $_POST['subit'] );
                }
            
            }
    	}
}

if(!empty($_SESSION['carr_quant_prod'])){
    for ($i = 1; $i <= $_SESSION['carr_quant_prod']; $i++) { 
    $carrinho=$_SESSION['idcarrinho'];
    $comando= "select * from tb_produto where id_produto=$carrinho[$i];";
    $resulta = mysqli_query($con,$comando);
    //echo"$carrinho[$i]";
    if ($registro = mysqli_fetch_array($resulta))
    {		
            $valor=$registro[4];
            if(empty($_SESSION['idpedido'])){
    
                //Criar pedido se usuário não estiver com um aberto
                
                $now=date('Y/m/d H:i');
                $comando="INSERT INTO `tb_pedido_venda`(`id_venda`, `valor_venda`, `data_venda`, `endereco_venda`, `condicao_venda`, 
                `desconto_venda`, `status_venda`, `valor_frete_venda`, `empresa_entrega_venda`, `tb_cliente_id_cliente`, 
                `id_promocao`) 
                VALUES ( NULL,'$valor','$now','pendente','pendente', NULL,'processando', NULL, 'pendente','$_SESSION[codusuario]', 
                NULL);";
                $resulta = mysqli_query($con,$comando);
                $resultado= mysqli_query($con, "SELECT `id_venda` FROM `tb_pedido_venda` WHERE `tb_cliente_id_cliente` = $_SESSION[codusuario] and 
                `status_venda` = 'processando';");

                if($id=mysqli_fetch_array($resultado)){
                    $_SESSION['idpedido'] = $id[0];
                //echo"$_SESSION[idpedido]";
                }
                
            }
            
            $resulta = mysqli_query($con,"SELECT * FROM `tb_pedido_venda` WHERE `id_venda`= $_SESSION[idpedido];");
            if($pedido = mysqli_fetch_array($resulta)){
                if($carrinho[$i]!= $registro[0]){
                    
                        $comando= mysqli_query($con,"INSERT INTO `tb_item_venda`(`id_item_venda`, `n_item_produto`, `quant_item_produto`, 
                        `valor_item_produto`, `tb_pedido_venda_id_venda`, `tb_pedido_venda_tb_cliente_id_cliente`, `tb_produto_id_produto`,
                        `tb_produto_tb_categoria_id_categoria`, `tb_produto_tb_adm_fornecedor_id_adm_fornecedor`, 
                        `tb_produto_tb_adm_fornecedor_tb_fornecedor_id_fornecedor`, `desconto_venda`, `compra_venda`, `id_promocao`) 
                        VALUES ( NULL,'$i','1','$valor','$pedido[0]','$_SESSION[codusuario]','$registro[0]','$registro[6]','$registro[7]', '$registro[8]', NULL,'$registro[2]', NULL);");
                    
                } 
                else{
                    $comando = mysqli_query($con,"UPDATE `tb_item_venda` SET `quant_item_produto` = '$pedido[2]+1 WHERE `tb_pedido_venda_id_venda` = $_SESSION[pedido];");
                }
            }
            
    }
    }
}
elseif(empty($_SESSION['carr_quant_prod'])){
    echo"Não há produtos no carrinho";
}


?>