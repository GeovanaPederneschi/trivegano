<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>

<?php
//echo $_COOKIE['cod'];

if(isset($_COOKIE['cod'])){
    echo"<script>Cookies.remove('cod');
    Cookies.set('passo1',3);</script>";
    $status=true;
}

if($status==true){
    //header('Location: finalizar_compra.php');
    

    include('../cadastro/conexao.php');mysqli_query($con,"SET NAMES 'utf8'");  
                                  mysqli_query($con,'SET character_set_connection=utf8');  
                                  mysqli_query($con,'SET character_set_client=utf8');  
                                  mysqli_query($con,'SET character_set_results=utf8');
    session_start();
    $cod=$_SESSION['cod_fornecedor'][0];
        date_default_timezone_set('Brazil/East');
        $now=date('Y-m-d H:i:s');
    
    if(isset($_SESSION['id_promocao']) && isset($_SESSION['desconto'])){
        
        
        $comando="INSERT INTO `tb_pedido_venda`(`id_venda`, `valor_venda`, `data_venda`, `endereco_venda`, `condicao_venda`, `desconto_venda`, `status_venda`, 
        `valor_frete_venda`, `empresa_entrega_venda`, `tb_cliente_id_cliente`, `id_promocao`, `tb_fornecedor_id_fornecedor`, `cep_venda`) 
        VALUES (NULL, $_SESSION[valorcompra], '$now', '".utf8_encode($_COOKIE['endereco'])."','debito',$_SESSION[desconto],'enviada',
        '0.00','propia','$_SESSION[codusuario]','$_SESSION[id_promocao]','$cod','$_COOKIE[cep]');";
        $query=mysqli_query($con,$comando);
        // echo $now;
        // echo'<br>';
        // echo utf8_encode($_COOKIE['endereco']);
        // echo'<br>';
        // echo $_SESSION['desconto'];
        // echo'<br>';
        // echo $_SESSION['codusuario'];
        // echo'<br>';
        // echo $_SESSION['id_promocao'];
        // echo'<br>';
        // echo $cod;
        // echo'<br>';
        // echo $_COOKIE['cep'];
        // echo'<br>';
        
    }
    else{
        $comando="INSERT INTO `tb_pedido_venda`(`id_venda`, `valor_venda`, `data_venda`, 
        `endereco_venda`, `condicao_venda`, `status_venda`, `valor_frete_venda`, `empresa_entrega_venda`, 
        `tb_cliente_id_cliente`, `tb_fornecedor_id_fornecedor`,`cep_venda`) 
        VALUES (NULL, $_SESSION[valorcompra], '$now', '".utf8_encode($_COOKIE['endereco'])."','debito','enviada',
        '0.00','propia','$_SESSION[codusuario]','$cod','$_COOKIE[cep]');";
        $query=mysqli_query($con,$comando);
    }

    //SE INSERÇÃO FOI FEITA
    if($query) {
        $now = str_replace("/",'-',$now);
        $query=mysqli_query($con,"SELECT * FROM tb_pedido_venda WHERE status_venda='enviada' and tb_cliente_id_cliente=$_SESSION[codusuario] and data_venda='$now';");
        if($venda=mysqli_fetch_array($query)){
                $carrinho=$_SESSION['idcarrinho'];
                                            
                for($i=0;$i<count($carrinho); $i++){
    
                    $query = mysqli_query($con,"SELECT * FROM tb_produto WHERE id_produto= '$carrinho[$i]';");
                    if($produto = mysqli_fetch_array($query)){
    
                        //INSERINDO PRODUTO NO BD
    
                        $query=mysqli_query($con,"INSERT INTO `tb_produto_venda`(`id_produto_venda`, `tb_pedido_venda_id_venda`, `tb_pedido_venda_tb_cliente_id_cliente`, 
                        `tb_produto_id_produto`, `tb_produto_tb_categoria_id_categoria`, `tb_produto_tb_adm_fornecedor_id_adm_fornecedor`, 
                        `tb_produto_tb_adm_fornecedor_tb_fornecedor_id_fornecedor`) 
                        VALUES ( NULL, $venda[0],'$_SESSION[codusuario]','$carrinho[$i]','$produto[6]','$produto[7]','$produto[8]');");
    
    
                        $name=$produto[1];
                        $nomeSemE=str_replace(" ","",$name);
                        $quant_prod=$_SESSION['quant_prod_cod'][$name];
                        
                        //pegando o numero de item do respectivo produto
    
                        $query=mysqli_query($con,"SELECT * FROM tb_produto_venda WHERE tb_pedido_venda_id_venda=$venda[0] and tb_produto_id_produto=$carrinho[$i];");
                        if($prod_venda= mysqli_fetch_array($query)){
    
                            for($q=1;$q<=$quant_prod;$q++){
    
                            //INSERINDO ITEM VENDA
                            if(isset($_SESSION['observacao'][$nomeSemE.$q])){
                                $observacao=$_SESSION['observacao'][$nomeSemE.$q];
                                $query=mysqli_query($con,"INSERT INTO `tb_item_venda`(`id_item_venda`, `tb_produto_venda_id_produto_venda`, `n_item_produto`,`observacao`) 
                                VALUES ( NULL,'$prod_venda[0]','$q','$observacao');");
                            }
                            else{
                                $query=mysqli_query($con,"INSERT INTO `tb_item_venda`(`id_item_venda`, `tb_produto_venda_id_produto_venda`, `n_item_produto`) 
                                VALUES ( NULL,'$prod_venda[0]','$q');");
                            }
                           
    
                                $query=mysqli_query($con,"SELECT * FROM tb_item_venda WHERE tb_produto_venda_id_produto_venda=$prod_venda[0] and n_item_produto=$q;");
                                if($item_venda= mysqli_fetch_array($query)){
                                    
                                    //verificando se o produto tem adicional e atribuindo eles ao valor final
                                    if(!empty($_SESSION['adicional_pedido'][$nomeSemE.$q])){
                                        $quant=count($_SESSION['adicional_pedido'][$nomeSemE.$q]);
                                        $adicional=$_SESSION['adicional_pedido'][$nomeSemE.$q];
                                        
                                        foreach($adicional as $a){
                                            $query=mysqli_query($con,"INSERT INTO `tb_adicional_item_venda`(`id_adicional_venda`, `tb_item_venda_id_item_venda`, `tb_produtos_adicionais_id_adicionais`) 
                                            VALUES ( NULL,'$item_venda[0]','$a');");
                                           
                                            
                                        }
                                    }
        
                                }
                            }
                        }
                        
                    }
                }
        }

    } else {
        echo 'lascou';
        var_dump($query);
    }
   
            
   
    
    
    unset($_SESSION['idcarrinho']); unset($_SESSION['carr_quant_prod']);unset($_SESSION['adicional']);
    unset($_SESSION['valorcompra']);unset($_SESSION['quant_prod_cod']);unset($_SESSION['codfornecedor']);
    unset($_SESSION['pedido']);
    
    
    echo"<script>window.location.replace('http://localhost/trivegano-main/frontend/menu.php');</script>";
}


?>