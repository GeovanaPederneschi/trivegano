<?php
include('../backend/session_start.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivegano - Login</title>
	
    <link rel="stylesheet" href="../backend/style1.css">

    <!-- UIKIT -->
	
	<link rel="stylesheet" href="../css/uikit.min.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
	<!---------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">

	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/css/util.css">

    
    <script src='../js/jquery-3.5.1.min.js'></script>

    <link rel="stylesheet" type="text/css" href="../css/semantic/semantic.min.css">
    <script src="../css/semantic/semantic.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>

	<link rel="stylesheet" href="css/style.css">   
	<link rel="stylesheet" href="../cadastro/style.css">

</head>
</style>
<body>
	<header>
		<div class="logo">
			 <a href="../index.html"><img src="../trivegano/logo1.png"></a>
		</div>
		<div class="catalogo">
			<ul>
				<li><a href="../index.html">Home</a></li>
				<li><a href="faq.html">FAQ</a></li>
				<li><a href="menu.php">Menu</a></li>
				<li><a href="home_receitas.php">Receitas</a></li>
				<li><a href="home_guia.php">Guia</a></li>
				<li><a href="sobrenos.html">Sobre nós</a></li>
				<li><a href="../cadastro/login.html">Login</a></li>
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

                <button class="uk-modal-close-default" type="button" uk-close></button>

                <div class="head" style="position: relative;">
                    <a href="orderList.html"><img src="../icones/images/back-black.svg" class="back" alt=""></a>
                    <div class="text">
                        Detalhes do Pedido
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
                    
                            <ul>
                            
                                <?php  //var_dump($_SESSION);
                                
                                $carrinho=$_SESSION['idcarrinho'];
                                $quant_prod=$_SESSION['quant_prod_cod'];
                            
                            
                                for($i=0;$i<count($carrinho); $i++){
                                    echo"<li>";
                                    echo"<div class='title'>  
                                    <div class='cartlisting'>";
                                        $query = mysqli_query($con,"SELECT imagem_produto FROM tb_imagem_produto WHERE tb_produto_id_produto='$carrinho[$i]';");
                                        if($img = mysqli_fetch_array($query)){
                                            echo"<div class='fl'>
                                            <div uk-grid><img style='padding-left:0;' src='../trivegano/produtos/$img[0]' class='dishimage' style='' alt=''>";
                                        }
                                        $query = mysqli_query($con,"SELECT * FROM tb_produto WHERE id_produto= '$carrinho[$i]';");
                                        if($produto = mysqli_fetch_array($query)){
                                            $name=$produto[1];
                                            $valor_item = $produto[4]*$quant_prod[$name];
                                            echo"
                                            <div>
                                                <div class='dishname'>$produto[1]</div>
                                                <div class='ten'>$quant_prod[$name] X</div></div></div>
                                            </div>
                                            <div class='fr'>
                                                <div class='cost'>
                                                    $$valor_item
                                                </div>
                                            </div>
                                            <div class='clr'></div>
                                            
                                    </div>
                                    </div>
                                    <div class='content'>
                                        <p class='transition hidden'>TESTE
                                        </p>
                                    </div>
                                    </li>
                                    ";
                                    }
                                    
                                }
                                ?>
                                
                                
                            </ul>
                    
                    </div>
                    
                    
                    <div class="summary">
                        <div>
                            Item Total<span class="fr">$49.00</span>
                        </div>
                        <div>
                            Discount<span class="fr">$10.00</span>
                        </div>
                        <div class="Green">
                            Delivery Fee<span class="fr">FREE</span>
                        </div>
                    </div>
                    <div class="total">
                        Paid <span class="fr">$39.00</span>
                    </div>
                    <div class="blank"></div>
                    <div class="centerLinker">
                        <a href="#">Give your Review</a>
                    </div>
                </div>
                
           </div>

                

            </div>
        </div>
    
	<?php

        
        if(empty($_SESSION['codusuario'])){
           
            echo'
                        <div class="limiter" style="margin-top: 1%;">
                    <div class="container-login100" style="background-color: #dfc4a6;">
                        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" style="min-width: 650px;">
                        <form class="login100-form validate-form" name="loginUsuario" method="post" action="doLogin.php">
                                <span class="login100-form-title p-b-49" style="font-size: 40px;">
                                    FALTA POUCO PARA VOCÊ MATAR SUA FOME!
                                </span>
                                <div class="txt1 text-center">
                                    <span>
                                        PRIMEIRO FAÇA SEU LOGIN
                                    </span>
                                </div>
                                <br>
                                <span class="login100-form-title p-b-49">
                                    <i class="fa fa-user-circle-o"></i>
                                </span>

                                <div class="wrap-input100 validate-input m-b-23" data-validate = "E-mail Institucional ou RA inválido">
                                    <span class="label-input100">Usuário</span>
                                    <input class="input100" type="text" name="usuario" placeholder="Digite seu Usuário" required>
                                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                                </div>

                                <div class="wrap-input100 validate-input" data-validate="Senha inválida.">
                                    <span class="label-input100">Senha</span>
                                    <input class="input100" type="password" name="senha" placeholder="Digite sua senha" required>
                                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                                </div>
                                
                                <div class="text-right p-t-8 p-b-31 m-b-23">
                                    <a href="#" style="text-decoration: underline;">
                                        Esqueceu sua senha?
                                    </a>
                                </div>
                                
                                <div class="contain-login100-form-btn">
                                    <div class="wrap-login100-form-btn">
                                        <div class="login100-form-bgbtn"></div>
                                        <button class="login100-form-btn" id="btn-form" type="button" name="submit">
                                            CONTINUAR
                                        </button>
                                    </div>
                                </div>

                                <div class="txt1 text-center p-t-54 p-b-20">
                                    <span>
                                        SIGA-NOS NAS REDES SOCIAIS
                                    </span>
                                </div>

                                <div class="flex-c-m">
                                    <a href="#" class="login100-social-item bg1">
                                        <i class="fa fa-facebook"></i>
                                    </a>

                                    <a href="#" class="login100-social-item bg2">
                                        <i class="fa fa-twitter"></i>
                                    </a>

                                    <a href="#" class="login100-social-item bg3">
                                        <i class="fa fa-google"></i>
                                    </a>
                                </div>

                                <div class="flex-col-c p-t-10">

                                    <a href="cadastro/cadastroUsuario.html" class="txt2">
                                        Crie um cadastro
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            ';
        }
        elseif(!empty($_SESSION['codusuario']))
        {
            echo"Continuar <br><BR>";
            echo" BEM VINDA: ".$_SESSION['loginpa'];
            
        }


        //EDITAR
        //var_dump($_POST);
    if(isset($_POST['codigo'])){
       /*  $comando="SELECT * FROM `tb_produto` WHERE `id_produto` = '$_POST[codigo]';";
        $resultado= mysqli_query($con,$comando); 
        if($produto= mysqli_fetch_array($resultado)){
            echo"<div class='edit'>";
            echo"EDITAR<br>";

            //var_dump($_SESSION['adicional_quant']);
            
            for($l=1; $l<=$quantidade_cod[$name]; $l++){
                echo'ALA <br>';
                   
                    
                    if($quantidade_cod[$produto[1]]==1){

                    }
                    elseif($quantidade_cod[$produto[1]]>1){
                        //mostrar um produto por quantidade escolhida
                        for($y=0;$y<=$quantidade_cod[$produto[1]];$y++){
                            include('funcoesEditar.php');           
                            echo"<br><div id='prod' class='uk-card uk-card-default'>";
                            echo"<div class='uk-grid-large'>";
                            echo"<span>$produto[1]</span>";
                            echo"<span>$fornecedor[0]</span>";
                            ECHO"</div><br>";
                            echo"<div class='uk-grid'>";
                            if(isset($_SESSION['adicional_quant'][$produto[1]])){
                                echo"<div>$produto[4]</div><div style='margin-left: 9%;'>";
                                //var_dump($_SESSION['adicional']);
                                $comando="SELECT * FROM `tb_produtos_adicionais` WHERE `tb_produto_id_produto`= '$produto[0]';";
                                $query=mysqli_query($con,$comando);
                                while($adicionais=mysqli_fetch_array($query)){
                                    echo"<span><img class='ui avatar mini image' src='../trivegano/adicionais/$adicionais[8]'></span>";
                                }
                                echo"</div>";
                                echo"
                                                    <div class='unit uk-flex uk-flex-right' style='margin-left:4%;'>
                                                        <form method=POST>
                                                        <button name='minus[$produto[0]]' class='fl minus'>-</button>
                                                        <input type='text'  value='$quantidade_cod[$name]' class='fl'>
                                                        <button name='plus[$produto[0]]' type='' id='plus' class='fl plus'>+</button>
                                                        </form>
                                                        <div class='clr'></div>
                                                    </div>
                                ";
                            }
                            else{
                                echo"<div>$produto[4]</div><div>";
                                echo"</div>";
                                echo"
                                                    <div class='unit uk-flex uk-flex-right' style='margin-left:33%;'>
                                                        <form method=POST>
                                                        <button name='minus[$produto[0]]' class='fl minus'>-</button>
                                                        <input type='text'  value='$quantidade_cod[$name]' class='fl'>
                                                        <div>$produto[0]</div>
                                                        <button name='plus[$produto[0]]' type='button' id='plus' class='fl plus'>+</button>
                                                        </form>
                                                        <div class='clr'></div>
                                                    </div>
                                ";
                            }
                        }
                        
                    }

                    
                
                echo"</div></div></div>";
                echo"<br><br>";
                
            }
            echo"</div>";
        } */ echo"<script>console.log('bosta');</script>";
        ?>
       
        
        <?php
        //echo'TESTE';
    }
    ?>
	
       <script>
        $('.limiter .container-login100 .wrap-login100 .login100form .contain-login100-form-btn .wrap-login100-form-btn #btn-form').on('click',function(){
            console.log('bosta');
        })
        if(Cookies.get('editar_cod')){
            console.log('não vai ir');
            UIkit.modal('#modal-center8').show();
        }
        $('#modal-center8 .uk-modal-dialog .spacescroll .cart .ui.accordion')
        .accordion()
        ;
       </script>

	<footer class="footer">
		<div class="container">
			<div class="row">

				<!-- 25% -->
				<div class="footer-col">
					<h4>Quem Somos</h4>
					<ul>
						<li><a href="sobrenos.html">Visite Nossa Página</a></li>
					</ul>
				</div>

				<!-- 25% -->
				<div class="footer-col">
					<h4>Procure Ajuda</h4>
					<ul>
						<li><a href="faq.html">FAQ</a></li>
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