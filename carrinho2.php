<?php
include "cadastro/conexao.php";
			
session_start();

if(isset($_POST['submit'])){
    	if(empty($_SESSION['idcarrinho'])){
    	    $_SESSION['idcarrinho'] = array('1' => $_POST['submit'] );
    	    $_SESSION['carr_quant_prod']=1;
            $_SESSION['pedido']='true';
    	}
    	elseif(!empty($_SESSION['idcarrinho'])){
            for($i=1;$i<=$_SESSION['carr_quant_prod'];$i++){
                $carrinho=$_SESSION['idcarrinho'];
                if($carrinho[$i]!= $_POST['submit']){
                    $_SESSION['carr_quant_prod']++;
    		        $_SESSION['idcarrinho'] = array($_SESSION['carr_quant_prod'] => $_POST['submit'] );
                    
                }
                /*else{
                    echo "Configure no carrinho mais de uma refeição";
                } */
            }
    	}
        //header('Location:produto_detalhe.php');
}



?>