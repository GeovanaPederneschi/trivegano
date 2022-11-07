<?php
include('../backend/session_start.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivegano</title>

    <link rel="stylesheet" href="../cadastro/style.css">
	<link rel="stylesheet" href="../frontend/css/style.css">
<!--============================================================================-->	
<!-- 	 <link rel="icon" type="image/png" href="images/icons/favicon.ico"/> -->

<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/fonts/iconic/css/material-design-iconic-font.min.css">
<!--=============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../cadastro/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/css/util.css">
	
    
    <script src='../js/jquery-3.5.1.min.js'></script>

    <!-- UIKIT -->
	
	<link rel="stylesheet" href="../css/uikit.min.css" />
    

    <!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.12/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.12/dist/js/uikit-icons.min.js"></script>
	<!---------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">

	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/css/util.css">

    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>

    

    <link rel="stylesheet" type="text/css" href="../css/semantic/semantic.min.css">
    <script src="../css/semantic/semantic.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
    <!-- <link rel='stylesheet' href="css/styleCarrinho.css"> -->
    <link rel="stylesheet" href="../backend/style1.css">
	<link rel="stylesheet" href="css/style.css">
    
    
</head>
<style>
    
</style>
<body>
	<header>
		<div class="logo">
			 <a href="../index.php"><img src="../trivegano/logo1.png"></a>
		</div>
		<div class="catalogo">
			<ul class='items'>
				<li><a href="../index.php">Home</a></li>
				<li><a href="faq.php">FAQ</a></li>
				<li><a href="menu.php">Menu</a></li>
				<li><a href="home_receitas.php">Receitas</a></li>
				<li><a href="home_guia.php">Guia</a></li>
				<li><a href="sobrenos.php">Sobre nós</a></li>
                <?php 
                include('../cadastro/conexao.php');
                    if(isset($_SESSION['codusuario']) && $_SESSION['usuario']='cliente'){
                    //     $cod = $_SESSION['cod_fornecedor'][0];
                    // $query=mysqli_query($con,"SELECT * FROM tb_usa WHERE id_fornecedor = $cod");
                    // if($fornecedor=mysqli_fetch_array($query)){
                        echo"<li><a href='../backend/back3.php'><span style='font-size:15px;' uk-icon='icon: user;ratio: 1.5'></span></i></a></li>";
                    }
                    else{
                        echo"<li><a href='../cadastro/login.html'>Login</a></li>";
                    }
                ?>
				
			</ul>
		</div>
		<div class="hamburger">
		  <span></span>
		  <span></span>
		  <span></span>
		</div>
	</header>




 <script  src="js/script.js"></script>
 


        <div id="modal-center8" class="uk-flex-top" uk-modal="esc-close:false;bg-close:false;">
            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

                <!-- <button class="uk-modal-close-default" type="button" uk-close></button> -->

                <div class="head" style="position: relative;">
                    <a href="menu.php"><img src="../icones/images/back-black.svg" class="back" alt=""></a>
                    <div class="text">
                        Detalhes Pedido
                    </div>
                </div>
            
           <div class="spacescroll">
                
                <div class="cart">
                    <div class="oBreif">
                        <?php include('../cadastro/conexao.php'); $query=mysqli_query($con,"SELECT MAX(id_venda) FROM tb_pedido_venda;");
                        if($id=mysqli_fetch_array($query)){ $num=$id[0]+1; echo "#".$num;}?>
                        <!-- BOTAR EM PT DEPOIS -->
                        <span class="caption"><?php date_default_timezone_set('Brazil/East'); $today = date("j F \à\s g:i a"); echo $today;?></span>
                        <span class="status done">DELIVER</span>
                    </div>
                    <div class="ui accordion">
                    <form method="POST" id="editar_pedido">
                            <ul>
                            
                                <?php  //var_dump($_SESSION);
                                
                                $carrinho=$_SESSION['idcarrinho'];
                                $quant_prod=$_SESSION['quant_prod_cod'];
                            
                               //passa por todos os produtos
                                for($i=0;$i<count($carrinho); $i++){
                                    echo"<li>";
                                    echo"<div class='title uk-transition-toggle'><div class='uk-transition-scale-up uk-transition-opaque'>
                                    <div class='cartlisting'>";
                                        $query = mysqli_query($con,"SELECT imagem_produto FROM tb_imagem_produto WHERE tb_produto_id_produto='$carrinho[$i]';");
                                        if($img = mysqli_fetch_array($query)){
                                            echo"<div class='fl' style='float:left;'>
                                            <div uk-grid>
                                                <img style='padding-left:0;' src='../trivegano/produtos/$img[0]' class='dishimage' style='' alt=''>";
                                        }
                                        $query = mysqli_query($con,"SELECT * FROM tb_produto WHERE id_produto= '$carrinho[$i]';");
                                        if($produto = mysqli_fetch_array($query)){
                                            $name=$produto[1];
                                            $valor_item = $produto[4]*$quant_prod[$name];
                                            if(!empty($_SESSION['adicional'][$produto[1]])){
                                                $quant=count($_SESSION['adicional'][$produto[1]]);
                                            $adicional=$_SESSION['adicional'][$produto[1]];
                                            for($a=0;$a<$quant;$a++){
                                                $query=mysqli_query($con,"SELECT * FROM tb_produtos_adicionais WHERE id_adicional='$adicional[$a]';");
                                                if($adicionais = mysqli_fetch_array($query)){
                                                
                                                    $valor_item += $adicionais[2]*$quant_prod[$name];
                                                }

                                            }
                                            }
                                            
                                            echo"
                                                    <div>
                                                        <div class='dishname'>$produto[1]</div>
                                                        <div class='ten'>$quant_prod[$name] X</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=''>
                                            <div class='fr'>
                                            <div>";
                                            $comando="SELECT `nome_fantasia_fornecedor`FROM `tb_fornecedor` WHERE `id_fornecedor`='$produto[8]';";
                                            $query=mysqli_query($con,$comando);
                                            $quantidade_cod = $_SESSION['quant_prod_cod'];
                                            if($fornecedor=mysqli_fetch_row($query)){
                                                 echo"    <p class='' >
                                                                        $fornecedor[0]
                                                                    </p>
                                                                    </div>";
                                            }
                                            if(isset($_SESSION['adicional'][$produto[1]]) xor isset($_SESSION['adicional'.$produto[0]][$name])){

                                                echo"<div style='padding-top:10px;'><span>";

                        
                                                    //VER DEPOIS QUANDO FOREM DIFERENTES E SE O USUARIO CONSEGUE CHEGAR AQUI
                                                    $quant=count($_SESSION['adicional'][$produto[1]]);
                                                    $adicional=$_SESSION['adicional'][$produto[1]];
                                                    for($a=0;$a<$quant;$a++){
                                                        
                                                        $comando="SELECT * FROM `tb_produtos_adicionais` WHERE `id_adicional`= '$adicional[$a]';";
                                                        $query=mysqli_query($con,$comando);
                                                        while($adicionais=mysqli_fetch_array($query)){
                                                            echo"<img class='ui avatar mini image' src='../trivegano/adicionais/$adicionais[8]'>";
                                                        }
                                                        
                                                        $query=mysqli_query($con,"SELECT * FROM tb_produtos_adicionais WHERE id_adicional='$adicional[$a]';");
                                                        if($adicionais = mysqli_fetch_array($query)){
                                                            //echo $adicionais[2].'<br>';
                                                            //$teste =  $adicionais[2]*$quantidade_cod[$name];
                                                            //echo $teste.'<br>';
                                                            //echo $quantidade_cod[$name].'<br>';
                                                            //$_SESSION['valorcompra'] += $adicionais[2]*$quant_prod[$name];
                                                        }

                                                    }echo"";
                                                    echo"</span>
                                                </div>";
                                            }
                                                          echo"  </div>
                                                            </div>
                                                            <div class='clr'></div>";
                                                            
                                                    echo"</div>
                                                    </div>
                                                    </div>
                                                    
                                                    <div class='content' id='$produto[0]'>
                                                        <p class='transition hidden'>";
                                                    
                                                        if($quant_prod[$name]>1){
                                                            for($c=1;$c<=$quant_prod[$name];$c++){
                                                                echo"<div class='accordion transition visible fluid ' style='display: block !important;'>
                                                                        <div class='title ui raised segment' style='font-size:17px; '><i class='dropdown icon'></i> $c º $name </div>
                                                                            <div class='content  ui tall stacked red segment' style='padding=0;'>
                                                                                <p class='transition hidden'>";
                                                                                $comando="SELECT * FROM `tb_produtos_adicionais` WHERE `tb_produto_id_produto`= '$produto[0]';";
                                                                                $query=mysqli_query($con,$comando);
                                                                                $tr = mysqli_num_rows($query);
                                                                                if($tr>0){
                                                                                     echo"<div class='uk-flex uk-flex-center' style='padding-top:2%;'>
                                                                                        <span>   <i style='font-size:15px'class='circular adjust icon'></i> <span>
                                                                                    <span style='font-size:15px' class=' ui icon orange inverted header'> Editar Adicionais </span>
                                                                                        </div>
                                                                                    ";
                                                                                }
                                                                                   
                                                                                $nome=$name.$c;
                                                                                    if(isset($_SESSION['adicional'.$produto[0]][$nome])){
                                                                                         $quant_=count($_SESSION['adicional'.$produto[0]][$nome]);
                                                                                        $adicional=$_SESSION['adicional'.$produto[0]][$nome];
                                                                                        for($q=0;$q<$quant_;$q++){
                                                                                            
                                                                                                if($adicionais[0]==$adicional[$q]){
                                                                                                        $check='checked=""';
                                                                                                        $active='uk-open';
                                                                                                }
                                                                                                elseif(!isset($check)){
                                                                                                        $check='';
                                                                                                        $active='';
                                                                                                }

                                                                                            
                                                                                        
                                                                                        } 
                                                                                    }
                                                                                    else{
                                                                                         $check='';
                                                                                        $active='';
                                                                                    }
                                                                                echo"<div><ul uk-accordion='multiple: true' style='margin-bottom:6%'>";
                                                                                while($adicionail=mysqli_fetch_array($query)){
                                                                                    
                                                                                     
                                                                                    echo"
                                                                                                <li class=$active>
                                                                                                    <a class='uk-accordion-title ' style='font-size:15px;'href='#'>$adicionail[1]</a>
                                                                                                    <div class='uk-accordion-content uk-grid uk-grid-medium' >
                                                                                                    <div class='uk-width-1-2'>
                                                                                                    <br>
                                                                                                    <img class='ui avatar image' src='../trivegano/adicionais/$adicionail[8]'>
                                                                                                    <span style='font-size:12px;'>R$ $adicionail[2]</span>
                                                                                                    </div>
                                                                                                    
                                                                                                    <div class='uk-width-1-2' style='padding-left:37%;'>
                                                                                                    <br>";
                                                                                                    
                                                                                                    echo"   <div style='padding-left:2%;' class='ui checked slider  checkbox '>";
                                                                                                    $nome=$name.$c;
                                                                                                    if(isset($_SESSION['adicional'.$produto[0]][$nome])){
                                                                                                        //$quant=count($_SESSION['adicional'.$produto[0]]);
                                                                                                       
                                                                                                                
                                                                                                            $adicional=$_SESSION['adicional'.$produto[0]][$nome];
                                                                                                            $quant=count($adicional);
                                                                                                        for($q=0;$q<$quant;$q++){
                                                                                                            
                                                                                                                if($adicional[$q]==$adicionail[0]){
                                                                                                                    //$id2=$name.$q;
                                                                                                                echo"<input type='checkbox' value='$adicionail[0]' $check name='adicional[$nome][$adicionail[0]]'>";
                                                                                                                }
                                                                                                                
                                                                                                            
                                                                                                            
                                                                                                        
                                                                                                        } 
                                                                                                        
                                                                                                            
                                                                                                    }
                                                                                                    else{
                                                                                                        //$id=$name.($c-1);
                                                                                                        echo"<input type='checkbox' value='$adicionail[0]' name='adicional[$nome][$adicionail[0]]'>";
                                                                                                    }
                                                                                                          
                                                                                                    echo"
                                                                                                        <label></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    
                                    
                                                                                                    </div>
                                                                                                </li>
                                                                                        ";
                                                                                }
                                                                                echo"</ul>";
                                                                                if($tr>0){
                                                                                      echo"   <hr class='uk-divider-icon'>";
                                                                                }
                                                                                 
                                                                               echo" </div>
                                                                                <div class=' ui segment'><div class='ui form' >
                                                                                <div class='field'>
                                                                                <label><h6 class='ui header'>
                                                                                <i class='pencil alternate icon'></i>
                                                                                <div class='content'>Adicionar Observação Sobre o Item<div class='sub header'>Agora é a hora de falar</div>
                                                                                </div>
                                                                              </h6></label>";
                                                                                    $nome=str_replace(" ","",$name);
                                                                                        $indice=$nome.$c;
                                                                                        
                                                                                        echo"<textarea name=observacao[$indice] rows='2'></textarea>";
                                                                                
                                                                                echo"  
                                                                                </div>
                                                                            </div>
                                                                                </div>";
                                                                        echo"  </p>
                                                                            </div> 
                                                                        </div>";
                                                            }
                                                            
                                                                    

                                                            /* if(!empty($_SESSION['adicional'][$produto[0]])){
                                                                $quant=count($_SESSION['adicional'][$produto[0]]);
                                                                $adicional=$_SESSION['adicional'][$produto[0]];
                                                                    for($a=0;$a<$quant;$a++){
                                                                        $query=mysqli_query($con,"SELECT * FROM tb_produtos_adicionail WHERE id_adicional='$adicional[$a]';");
                                                                        if($adicionais = mysqli_fetch_array($query)){
                                                                        
                                                                            $valor_item += $adicionais[2]*$quant_prod[$name];
                                                                            
                                                                        }

                                                                    }
                                                            } */
                                                        }
                                                        else{
                                                        echo"<div class='ui tall stacked red segment'>";
                                                           
                                                            $comando="SELECT * FROM `tb_produtos_adicionais` WHERE `tb_produto_id_produto`= '$produto[0]';";
                                                            $query=mysqli_query($con,$comando);
                                                            $tr = mysqli_num_rows($query);
                                                            if($tr>=1){
                                                                echo"<div class='uk-flex uk-flex-center'>
                                                                    <span>   <i style='font-size:15px'class='circular adjust icon'></i> <span>
                                                                <span style='font-size:15px' class='ui icon orange header'> Editar Adicionais </span>
                                                                    </div>
                                                                ";
                                                            }
                                                            echo"<div><ul uk-accordion='multiple: true' style='margin-bottom:6%'>";
                                                            while($adicionais=mysqli_fetch_array($query)){
                                                                if(isset($_SESSION['adicional'][$produto[1]])){
                                                                    $adicional=$_SESSION['adicional'][$produto[1]];
                                                                    $quant=count($adicional);
                                                                    for($f=0;$f<$quant;$f++){
                                                                    if($adicionais[0]==$adicional[$f]){
                                                                            $check='checked=""';
                                                                            $active='uk-open';
                                                                    }
                                                                    elseif(!isset($check)){
                                                                            $check='';
                                                                            $active='';
                                                                    }
                                                                    } 
                                                                }
                                                                else{
                                                                    $check='';
                                                                    $active='';

                                                                }

                                                                 
                                                                echo"
                                                                            <li class=$active>
                                                                                <a class='uk-accordion-title ' style='font-size:15px;'href='#'>$adicionais[1]</a>
                                                                                <div class='uk-accordion-content uk-grid uk-grid-medium' >
                                                                                <div class='uk-width-1-2'>
                                                                                <br>
                                                                                <img class='ui avatar image' src='../trivegano/adicionais/$adicionais[8]'>
                                                                                <span style='font-size:12px;'>R$ $adicionais[2]</span>
                                                                                </div>
                                                                                
                                                                                <div class='uk-width-1-2' style='padding-left:37%;'>
                                                                                <br>";
                                                                                
                                                                                echo"   <div style='padding-left:2%;' class='ui checked slider  checkbox '>";
                                                                                if(isset($_SESSION['adicional'][$produto[1]])){
                                                                                    $quant=count($_SESSION['adicional'][$produto[1]]);
                                                                                    $adicional=$_SESSION['adicional'][$produto[1]];
                                                                                    for($m=0;$m<$quant;$m++){
                                                                                       
                                                                                        
                                                                                            if($adicional[$m]==$adicionais[0]){
                                                                                                
                                                                                                echo"<input type='checkbox' value='$adicionais[0]' $check name='adicional[$name][$adicionais[0]]'>";
                                                                                            }
                                                                                           
                                                                                        
                                                                                    }
                                                                                    
                                                                                    
                                                                                }
                                                                                else{
                                                                                    $nome=$name."1";
                                                                                    echo"<input type='checkbox' value='$adicionais[0]' name='adicional[$nome][$adicionais[0]]'>";
                                                                                }
                                                                                            
                                                                                       
                                                                                echo"  <label></label>
                                                                                    </div>
                                                                                </div>
                                                                                

                                                                                </div>
                                                                            </li>
                                                                    ";
                                                            }
                                                            echo"</ul>";
                                                            if($tr>0){
                                                                echo"   <hr class='uk-divider-icon'>";
                                                            }
                                                            
                                                            $nome=str_replace(" ","",$name);
                                                            $indice=$nome.'1';
                                                            echo"</div>
                                                            <div class=' ui segment'><div class='ui form' >
                                                            <div class='field'>
                                                            <label><h6 class='ui header'>
                                                            <i class='pencil alternate icon'></i>
                                                            <div class='content'>Adicionar Observação Sobre o Item<div class='sub header'>Agora é a hora de falar</div>
                                                            </div>
                                                          </h6></label>
                                                            <textarea rows='2' name=observacao[$indice]></textarea>
                                                            </div>
                                                        </div>
                                                            </div>
                                                        </div>";
                                                        }
                                                            
                                                    echo"</p>
                                                    </div>
                                                    
                                                    </li>
                                                    ";
                                        }
                                    
                                }
                                ?>
                                
                                
                            </ul>

                            <div class="ui left action input" style="padding-left:13%;padding-right:15%; border:none;margin-top:7%;">
                            <div class="ui teal labeled icon button" style='cursor:auto;'><i class="cart icon"></i>Cupon de Desconto</div>
                            <input type="text" name='token' id='token' placeholder="TOKEN">
                            </div>
                    </form>
                    
                    </div>
                    
                    
                    

                    <script>$('#modal-center8 .uk-modal-dialog .spacescroll .cart .ui #editar_pedido .ui input').blur(function(){
                        var input = $(this).val();
                        console.log('bora ver');
                        console.log(input);
                        $.ajax({
                            url:'http://localhost/www/Oficial/frontend/token.php',
                            method:'POST',
                            data:{token:input},
                            dataType:'json'
                        }).done(function(result){

                        if(result!='Nenhuma promoção correspondente'){
                            
                             if(!typeof(result[0].valor_promocao)){
                                 $('#modal-center8 .uk-modal-dialog .spacescroll  .cart .ui #editar_pedido .ui #token')
                                 .popup({
                                position: 'top center',
                                boundary: ' #modal-center8 .uk-modal-dialog .spacescroll  .cart .ui #editar_pedido .ui #token',
                                lastResort:true,
                                html   : '<h5><i class="check icon"></i>'+result[0].token_promocao+'</h5><br>'+result[0].descricao+' Oferece:R$ '+result[0].valor_promocao+' de desconto.<br><br>Continue pedido para fazer validação do cupon!',
                                }).popup('show');
                                
                            }
                            else{
                                $('#modal-center8 .uk-modal-dialog .spacescroll .cart .ui #editar_pedido .ui #token')
                                 .popup({
                                position: 'top center',
                                boundary: ' #modal-center8 .uk-modal-dialog .spacescroll .cart .ui #editar_pedido .ui #token',
                                lastResort:true,
                                html   : '<h5><i class="check icon"></i>'+result[0].token_promocao+'</h5><br>'+result[0].descricao+' Oferece:'+result[0].porcentagem_promocao+'% de desconto.<br><br>Continue pedido para fazer validação do cupon!',
                                }).popup('show');
                            }
                            
                        }
                        else
                        if(input!=''){
                            $('#modal-center8 .uk-modal-dialog .spacescroll .cart .ui #editar_pedido .ui #token')
                            .popup({
                                position: 'top center',
                                boundary: ' #modal-center8 .uk-modal-dialog .spacescroll .cart .ui #editar_pedido .ui #token',
                                lastResort:true,
                                html   : '<h5><i class="times circle icon"></i> Nenhuma promoção correspondente<h5><br> Navege nosso site e conheça as nossas varias opções de cupons.',
                                
                            }).popup('show');
                            $('#modal-center8 .uk-modal-dialog .spacescroll .cart .ui #editar_pedido .ui #token').val('');
                        }
        
                        });
                    });
                    
                    </script>

                    <div class="blank"></div>
                <div class="ifield MR">
                    <button class="btn3" id="btn-editar-pedido" type="button"><span>CONTINUAR PEDIDO</span></button>
                </div> 
                </div>
                
           </div>

            </div>
        </div>

        <div id="modal-center10" class="uk-flex-top" uk-modal="esc-close:false;bg-close:false;">
            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

              
                    <?php //var_dump($_POST);var_dump($_SESSION);

                        

                        
                        
                        
                    ?>
                    <div class="head" style="position: relative;">
                        <a uk-toggle="target: #modal-center8"><img src="../icones/images/back-black.svg" class="back" alt=""></a>
                        <div class="text">
                            Detalhes do Pedido
                        </div>
                        
                    </div>


                        <?php 
                        
                            $_SESSION['valorcompra'] = 0;

                        ?>

                            
                        <div class="spacescroll" style='padding:0;'>
                        <img style="z-index: -1;" src="../icones/images/accessBase.svg" alt="" class="base">
                <img src="../icones/images/clipart.svg" alt="" class="clipart">
                                
                                <div class="ui piled segment cart">
                                <div class="oBreif">
                                    <?php include('../cadastro/conexao.php'); $query=mysqli_query($con,"SELECT MAX(id_venda) FROM tb_pedido_venda;");
                                    if($id=mysqli_fetch_array($query)){ $num=$id[0]+1; echo "#".$num;}?>
                                    <!-- BOTAR EM PT DEPOIS -->
                                    <span class="caption"><?php date_default_timezone_set('Brazil/East'); $today = date("j F \à\s g:i a"); echo $today;?></span>
                                    <span class="status done">DELIVERY</span>
                                </div>
                                <?php
                                $carrinho=$_SESSION['idcarrinho'];
                                
                                for($i=0;$i<count($carrinho); $i++){
                                   
                                       //pegando dados do bd
                                        $query = mysqli_query($con,"SELECT * FROM tb_produto WHERE id_produto= '$carrinho[$i]';");
                                        if($produto = mysqli_fetch_array($query)){
                                            $name=$produto[1];
                                            $nomeSemE=str_replace(" ","",$name);
                                            $quant_prod=$_SESSION['quant_prod_cod'][$name];
                                            
                                           
                                           
                                        
                                            //pegando o numero de item do respectivo produto
                                        
                                            for($q=1;$q<=$quant_prod;$q++){ 
                                                //atribuindo valor para o item
                                                $valor_item = $produto[4];
                                                //echo $nomeSemE.$q;

                                                //verificando se o produto tem adicional e atribuindo eles ao valor final
                                                if(!empty($_POST['adicional'][$nomeSemE.$q]) && $quant_prod>1){
                                                    $quant=count($_POST['adicional'][$nomeSemE.$q]);
                                                    //echo $quant;
                                                    $adicional=$_POST['adicional'][$nomeSemE.$q];
                                                    foreach($adicional as $a){
                                                    $query=mysqli_query($con,"SELECT * FROM tb_produtos_adicionais WHERE id_adicional='$a';");
                                                        if($adicionais = mysqli_fetch_array($query)){
                                                        
                                                            $valor_item += $adicionais[2];
                                                        }
                                                    }
                                                }

                                                //verifica quais pertencem ao desconto
                                                if(isset($_POST['token']) && $_POST['token']!='FIRST'){
                                                    $token = $_POST['token'];
                                                    $query=mysqli_query($con,"SELECT * FROM tb_promocao WHERE token_promocao = '$token';");
                                                    if($promocao=mysqli_fetch_array($query)){
        
                                                        
        
                                                        
                                                            $query=mysqli_query($con,"SELECT tb_categoria_id_categoria FROM tb_produto WHERE id_produto = $produto[0]");
                                                            if($categoria = mysqli_fetch_array($query)){
                                                                if($categoria[0]==$promocao[10]){
                                                                   $cat[$nomeSemE.$q]=$valor_item;
                                                                }
                                                                else{
                                                                    $neg[$nomeSemE.$q]=$valor_item;
                                                                }
                                                                
                                                            }
                                                        
                                                    
                                                            
                                                    }
                                                }
                                                    
                                                   
                                                

                                                

                                                //pegando a foto do produto
                                                $query = mysqli_query($con,"SELECT imagem_produto FROM tb_imagem_produto WHERE tb_produto_id_produto='$carrinho[$i]';");
                                                if($img = mysqli_fetch_array($query)){
                                                echo"<li>";

                                                echo"
                                                <div class='cartlisting' style='padding: 30px 35px 30px 50px';>";
                                                echo"<div class='fl'>
                                                    <div uk-grid>
                                                        <img style='padding-left:0;' src='../trivegano/produtos/$img[0]' class='dishimage' style='' alt=''>";
                                                }

                                                    echo"
                                                        <div>  
                                                                <div class='dishname'>$produto[1]</div>";

                                                                //se o produto item tiver adicinais cadastrado na escolha

                                                                //produto com mais de um item (array diferentes)
                                                                if(isset($_POST['adicional'][$nomeSemE.$q]) && $quant_prod>1){

                                                                    echo"<div style='padding-top:10px;'><span>";

                                            
                                                                        //passa um laço por todos e mostra a foto

                                                                        
                                                                        $quant=count($_POST['adicional'][$nomeSemE.$q]);
                                                                        $adicional=$_POST['adicional'][$nomeSemE.$q];
                                                                        foreach($adicional as $a){
                                                                            
                                                                            $comando="SELECT * FROM `tb_produtos_adicionais` WHERE `id_adicional`= '$a';";
                                                                            $query=mysqli_query($con,$comando);
                                                                            while($adicionais=mysqli_fetch_array($query)){
                                                                                echo"<img class='ui avatar mini image' src='../trivegano/adicionais/$adicionais[8]'>";
                                                                                
                                                                            }
                                                                            
                                                                        }
                                                                        
                                                                        
                                                                        echo"</span>
                                                                    </div>";
                                                                }
                                                                elseif(isset($_POST['adicional'][$nomeSemE])){
                                                                    $quant=count($_POST['adicional'][$nomeSemE]);
                                                                    $adicional=$_POST['adicional'][$nomeSemE];
                                                                    foreach($adicional as $a){
                                                                        
                                                                        $comando="SELECT * FROM `tb_produtos_adicionais` WHERE `id_adicional`= '$a';";
                                                                        $query=mysqli_query($con,$comando);
                                                                        while($adicionais=mysqli_fetch_array($query)){
                                                                            echo"<img class='ui avatar mini image' src='../trivegano/adicionais/$adicionais[8]'>";
                                                                            
                                                                        }
                                                                        
                                                                    }
                                                                }

                                                echo"       
                                                        </div>
                                                    </div>
                                                </div>";
                                                //segunda coluna
                                                echo"
                                                <div class=''>
                                                <div class='fr'>
                                                <div>";
                                                    //mostrando o nome do fornecedor
                                                    $comando="SELECT `nome_fantasia_fornecedor`FROM `tb_fornecedor` WHERE `id_fornecedor`='$produto[8]';";
                                                    $query=mysqli_query($con,$comando);
                                                    if($fornecedor=mysqli_fetch_row($query)){
                                                        echo"    <p>$fornecedor[0]</p>";

                                                                 echo"<p>R$ ".number_format($valor_item,2,",",".")."</p>
                                                    </div>";
                                                        $_SESSION['valorcompra'] += $valor_item;
                                                                            
                                                    }

                                                
                                                echo"  </div>
                                                        </div>
                                                    <div class='clr'></div>
                                                </div></li>";

                                            }
                                        
                                        
                                           
                                            
                                           
                                                    
                                        }
                                }

                                ?>
                                       


                                    <div class="summary">
                                         <div>
                                            Valor Total<span class="fr">R$ <?php echo number_format($_SESSION['valorcompra'],2,",",".");?></span>
                                        </div>

                                        <?php 
                                            if(isset($_POST['token'])&& $_POST['token']!='FIRST'){
                                               
                                                    $token = $_POST['token'];
                                                    $query=mysqli_query($con,"SELECT * FROM tb_promocao WHERE token_promocao = '$token';");
                                                    if($promocao=mysqli_fetch_array($query)){
        
                                                        
                                                            if($promocao[13]=='valor' && $_SESSION['valorcompra']>$promocao[14]){
        
                                                                if(verificarCat($promocao,$con,$poduto)){
                                                                    if(isset($cat)){
                                                                        $soma=array_sum($cat);
                                                                        $_SESSION['desconto']=($promocao[9]*$soma)/100;
                                                                        $novo=$soma - (($promocao[9]*$soma)/100);
                                                                        if(isset($neg)){
                                                                            $soma_n=array_sum($neg);
                                                                            $_SESSION['valorcompra'] =$novo+ $soma_n;
                                                                        }else{
                                                                            $_SESSION['valorcompra'] =$novo;
                                                                        }
                                                                    }
                                                                    elseif(isset($neg)){
                                                                        $soma_n=array_sum($neg);
                                                                        $_SESSION['valorcompra'] = $soma_n;
                                                                    }
                                                                    
                                                                    $_SESSION['id_promocao']=$promocao[0];

                                                                    echo"<div>
                                                                        Discount<span class='fr'> R$ ".number_format($_SESSION['desconto'],2,",",".")."</span>
                                                                    </div>";
                                                                }
                                                                
                                                            }
        
                                                            if($promocao[13]=='periodo'){

                                                                $dt_atual		= date("Y-m-d"); 
                                                                $timestamp_dt_atual 	= strtotime($dt_atual);
                                                                
                                                                $dt_expira		= $promocao[2]; 
                                                                $timestamp_dt_expira	= strtotime($dt_expira);
                                                                
                                                               
                                                                if ($timestamp_dt_atual < $timestamp_dt_expira){
                                                                    if(isset($cat)){
                                                                        $soma=array_sum($cat);
                                                                        $_SESSION['desconto']=($promocao[9]*$soma)/100;
                                                                        $novo=$soma-(($promocao[9]*$soma)/100);
                                                                        if(isset($neg)){
                                                                            $soma_n=array_sum($neg);
                                                                            $_SESSION['valorcompra'] =$novo+ $soma_n;
                                                                        }else{
                                                                            $_SESSION['valorcompra'] =$novo;
                                                                        }
                                                                    }
                                                                    elseif(isset($neg)){
                                                                        $soma_n=array_sum($neg);
                                                                        $_SESSION['valorcompra'] = $soma_n;
                                                                    }

                                                                    
                                                                        $_SESSION['id_promocao']=$promocao[0];
                                                                    

                                                                    echo"<div>
                                                                        Discount<span class='fr'> R$ ".number_format($_SESSION['desconto'],2,",",".")."</span>
                                                                    </div>";

                                                                }
                                                               
                                                               
        
                                                            }

                                                            if($promocao[13]=='itens' && count($cat)>$promocao[12]){

                                                                if(isset($cat)){
                                                                    $soma=array_sum($cat);
                                                                    $_SESSION['desconto']=($promocao[9]*$soma)/100;
                                                                    $novo=$soma - (($promocao[9]*$soma)/100);
                                                                    if(isset($neg)){
                                                                        $soma_n=array_sum($neg);
                                                                        $_SESSION['valorcompra'] =$novo+ $soma_n;
                                                                    }else{
                                                                        $_SESSION['valorcompra'] =$novo;
                                                                    }
                                                                }
                                                                elseif(isset($neg)){
                                                                    $soma_n=array_sum($neg);
                                                                    $_SESSION['valorcompra'] = $soma_n;
                                                                }

                                                                $_SESSION['id_promocao']=$promocao[0];

                                                                 echo"<div>
                                                                     Discount<span class='fr'>R$ ".number_format($_SESSION['desconto'],2,",",".")."</span>
                                                                 </div>";
                                                            }
                                                    }
                                                
                                            }
                                            if(isset($_POST['adicional'])){
                                                 $_SESSION['adicional'] = $_POST['adicional'];
                                            }
                                           
                                            if(isset($_POST['observacao'])){
                                                $_SESSION['observacao'] =$_POST['observacao'];
                                            }
                                            

                                            //var_dump($_SESSION);
                                        ?>

                                       
                                        

                                        <div class="Green">
                                            Delivery Fee<span class="fr">FREE</span>
                                        </div>
                                        </div>
                                        <div class="total">
                                        Preço<span class="fr">R$ <?php echo number_format($_SESSION['valorcompra'],2,",",".");?></span>
                                        </div>
                                        <div class="blank"></div>
                                        <div class="">
                                        <form class='uk-flex uk-flex-center' action='finalizar_compra.php'>
                                        <button class='botao third ' style='color:black;' type='button'>CONTINUAR A COMPRA</button>
                                        </form>
                                        </div>
                                </div>
                                
                        </div>

                            </div>
                        </div>

                        <script>$('#modal-center10 .uk-modal-dialog .spacescroll .ui .uk-flex .botao').click(function(){
                            console.log('bora');
                            Cookies.remove('passo');
                            UIkit.modal('#modal-center10').hide();
                        });</script>
</div>


    <div class='ui segment' style="margin:3%;">
        <div class="head left" style='position:relative;z-index:1;'>
            <img src="../icones/images/back-black.svg" class="back" alt="">
            <div class="text">
                Total da Conta : R$ <?php echo number_format($_SESSION['valorcompra'],2,",",".");?>
            </div>
            <div class="notification">
                <img src="../icones/images/bottomCart.svg" alt="">
                <span class="digit"><?php echo array_sum($_SESSION['quant_prod_cod']);?></span>
            </div>
        </div>
            <div class="spacescroll">
                <div class="paymentMethod">
                    <div class="sumPro">
                        <img src="../icones/images/sumPro.svg" alt="">
                        <?php //var_dump($_SESSION);
                        $cod = $_SESSION['cod_fornecedor'][0];
                        $query=mysqli_query($con,"SELECT * FROM tb_fornecedor WHERE id_fornecedor = $cod");
                        if($fornecedor=mysqli_fetch_array($query)){

                            $quantidade = array_sum($_SESSION['quant_prod_cod']);
                            echo" <div>
                                $fornecedor[7]";

                                if(isset($_COOKIE['cep'])&& isset($_COOKIE['endereco'])){
                                    $apiKey = 'AIzaSyBzQCRKSKFi7AwHMynJuFb_aa4NH7l6-qM';
                                
                
                                        $address = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$fornecedor[12].'&destinations='.$_COOKIE['cep'].'&departure_time=now&key='.$apiKey);
                                        $distance = json_decode($address);
                                        if($distance->status == 'OK'  && $distance->rows[0]->elements[0]->status == 'OK'){
                                           
                                            $dist = $distance->rows[0]->elements[0]->duration_in_traffic->value;
                                            $dist_mins = $dist/60+30;
                                            $_SESSION['dist_seg']=$dist;
                                            echo" <span>$quantidade Itens | Tempo de Entrega ".round($dist_mins)." mins</span>
                                            </div>";
                                        }

                                        echo"<div>
                                        Endereço de Entrega
                                        <span>".utf8_encode ($_COOKIE['endereco'])."</span>
                                    </div>";
                                    
                                }

                        
                        }
                        ?>
                        
                    
                        
                    </div>
                    <div class="paymentMethodHeading">
                        Credit/Debit Cards
                    </div>
                    <div class="addNewCard">
                        <a uk-toggle="target: #modal-center12">Add New Card</a>
                    </div>
                    <div class="savedCards">
                        <ul>
                            <?php
                            if(isset($_SESSION['codusuario'])){
                                $query=mysqli_query($con,"SELECT * FROM tb_cartao WHERE tb_cliente_id_cliente=$_SESSION[codusuario]");
                                while($cartao=mysqli_fetch_array($query)){
                                    //$search=array('1','2','3','4','5','6','7','8','9','0');
                                    echo"<li style='cursor:pointer;'>
                                    <input type='hidden' value='$cartao[0]'>
                                    <img src='../icones/images/payCard.svg' alt=''>
                                    ".substr_replace($cartao[1], '**** **** ****', 0,14)."
                                    <span> $cartao[2] $cartao[3] Debit Card</span>
                                    </li>";
                                }
                            }
                            else{
                                echo'<li>
                                <img src="../icones/images/payCard.svg" alt="">
                                0000 0000 0000 0000
                                <span>Nome do Titular Bandeira Debit Card</span>
                                </li>';
                            }
                            
                            ?>
                        </ul>
                    </div>
                    <div class="CD">
                        <img src="../icones/images/CD.svg" alt="">
                    </div>
                    <div class="paymentMethodHeading">
                        Wallet Method
                    </div>
                    
                    <div class="paymentMethodsList">
                        <ul>
                            <li><img src="../icones/images/Paypal-icon.svg" alt="">Paypal</li>
                            <li><img src="../icones/images/amazon-pay-icon.svg" alt="">Amazon Pay</li>
                            <li><img src="../icones/images/apple-pay-icon.svg" alt="">Apple Pay</li>
                        </ul>
                    </div>
                    <div class="blank"></div>
                    <div class="ifield NM NP">
                        <button class="btn3"><span>PAY NOW</span></button>
                    </div>
                </div>
        </div>
    </div>

            

       <script>
       

        $('.ui .spacescroll .paymentMethod .savedCards ul li').on('click',function(){
            $(this).toggleClass('uk-section uk-section-secondary uk-light');
            var cod = $(this).children().first().val();
            console.log(cod);
            Cookies.set('cod',cod);
        });
        </script>
        <?php include('modal.php');?>

        <script>
        $('.ui .spacescroll .paymentMethod .ifield .btn3').click(function(){
            UIkit.modal('#modal-center13').show();
            console.log('FOI');
        });


        $('.limiter .container-login100 .wrap-login100 .login100form .contain-login100-form-btn .wrap-login100-form-btn #btn-form').on('click',function(){
            console.log('bosta');
        })
        if(Cookies.get('editar_cod')){
            console.log('não vai ir');
            UIkit.modal('#modal-center8').show();
            Cookies.remove('passo');
            var cod = Cookies.get('editar_cod');
            //$('#modal-center8 .uk-modal-dialog .spacescroll .cart .ui #editar_pedido ul li #'+ cod).addClass('active').console.log('boraaa');
        };

        if(Cookies.get('passo')==1){
            console.log('cabaça');
            UIkit.modal('#modal-center10').show();
            //Cookies.remove('passo');
        };

        
        
        $('.ui.accordion').accordion();
        $('#modal-center8 .uk-modal-dialog .spacescroll .cart .ifield #btn-editar-pedido').on('click',function(){
            console.log('cansei disso');
            Cookies.set('passo','1');
            Cookies.remove('editar_cod');
            $('#modal-center8 .uk-modal-dialog .spacescroll .cart .ui #editar_pedido').submit();
        });

       </script>
        <?php if(!isset($_SESSION['codusuario'])){
            echo"<script>console.log('acarca mane');</script>";
          echo" <script>UIkit.modal('#modal-center11').show();</script>";
        }
         ?>
         <?php
        // if($_COOKIE['passo1']==3){
        //     echo"<script>Ulkit.modal('#modal-center14').show();console.log('eai');</script>";
        //     //echo'oq';
        // }
    ?>

	<footer class="footer">
		<div class="container">
			<div class="row">

				<!-- 25% -->
				<div class="footer-col">
					<h4>Quem Somos</h4>
					<ul>
						<li><a href="sobrenos.php">Visite Nossa Página</a></li>
					</ul>
				</div>

				<!-- 25% -->
				<div class="footer-col">
					<h4>Procure Ajuda</h4>
					<ul>
						<li><a href="faq.php">FAQ</a></li>
						<li><a href="fale.html">Fale Conosco</a></li>
					</ul>
				</div>

				<!-- 25% -->
				<div class="footer-col">
					<h4>Encontre</h4>
					<ul>
						<li><a href="home_receitas.php">Receitas</a></li>
						<li><a href="menu.php">Menu</a></li>
						<li><a href="home_guia.php">Guia</a></li>
					</ul>
				</div>

				<!-- 25% -->
				<div class="footer-col">
					<h4>Nossas Redes</h4>
					<div class="social-links">
						<a href="#"><i class="fab fa-facebook-f"></i></a>
						<a href="#"><i class="fab fa-twitter"></i></a>
						<a href="#"><i class="fab fa-instagram"></i></a>
						<a href="#"><i class="fab fa-whatsapp"></i></a>
					</div>

			</div>
		</div>
	</footer>
    
</body>
</html>