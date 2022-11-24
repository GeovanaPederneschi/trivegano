<?php
include('../backend/session_start.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivegano</title>    <link rel="icon" type="image/png" href="http://localhost/trivegano-main/trivegano/logo3.png"/>

	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
	<!-- font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Licorice&family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<!---------->
	<!-- UIKIT -->
	
	<link rel="stylesheet" href="../css/uikit.min.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
	<!---------->
    
    <script src='../js/jquery-3.5.1.min.js'></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
	

   

  <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleCarrinho.css">
</head>


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
                include('../cadastro/conexao.php');mysqli_query($con,"SET NAMES 'utf8'");  
                                  mysqli_query($con,'SET character_set_connection=utf8');  
                                  mysqli_query($con,'SET character_set_client=utf8');  
                                  mysqli_query($con,'SET character_set_results=utf8');
               
                    if(isset($_SESSION['codusuario']) && $_SESSION['usuario']='cliente'){

                        echo"<li><a href='../backend/back3.php'><span style='font-size:15px;' uk-icon='icon: user;ratio: 1.5'></span></i></a></li>";
                    }
                    else{
                        echo"<li><a href='../cadastro/login.html'>Login</a></li>";
                    }
                ?>
			</ul>
		</div>
	</header>
	<div class="hamburger">
		  <span></span>
		  <span></span>
		  <span></span>
	</div>
	<script  src="js/script.js"></script>

  
<nav class="uk-navbar-container uk-margin" style="margin-left:15%; margin-right:15%;" uk-navbar>
    <div class="uk-navbar-left">

        <!inico do botão do carrinho-->
        <a class="uk-navbar-item uk-logo" href="#">
            <button class="uk-button uk-button-default" type="button" uk-toggle="target: #offcanvas-flip" style="border: none;"><span uk-icon="bag"></span>
            <?php
                if(isset($_SESSION['quant_prod_cod'])){
                 echo"   <span class='digit'>".array_sum($_SESSION['quant_prod_cod'])."</span>";
                }
            ?></button>

            <div id="offcanvas-flip" class="flip" uk-offcanvas="flip: true; overlay: true">
            <div class="uk-offcanvas-bar uk-width-1-3">

            <button class="uk-offcanvas-close" type="button" uk-close></button>

            <?php
             //var_dump($_POST);
            
            
            include('../cadastro/conexao.php');mysqli_query($con,"SET NAMES 'utf8'");  
                                  mysqli_query($con,'SET character_set_connection=utf8');  
                                  mysqli_query($con,'SET character_set_client=utf8');  
                                  mysqli_query($con,'SET character_set_results=utf8');
            include('carrinho.php');

            if(array_key_exists('compra', $_POST)) {
                carrinho($_POST['compra']);
                

            }

			if(!empty($_SESSION['pedido'])){
               mostrarCarrinho($con);
            }
            else{
            
               ?>
            

                    <div class="grid-6">
                    <div class="forgotIMG">
                        <img src="../icones/images/cartEmpty.svg" alt="">
                    </div>
                    <div class="welcome-head">
                        <h3 class="uk-flex uk-flex-center">Carrrinho Vazio</h3>
                        <span class="caption">Boa comida você encontra aqui! Vá em frente, peça alguma comida gostosa no menu.</span>
                    </div>  
                    <div class="blank"></div>
                    </div>
            <?php
               
                
            }
            
            ?>

            </div>
            </div>
        </a>

       <!final do botão do carrinho-->
       <script>
            $('.uk-navbar-container .uk-navbar-left .uk-navbar-item #offcanvas-flip .uk-offcanvas-bar #list .uk-flex .botao').click(function(){
                console.log('AEEE');
                $('.uk-navbar-container .uk-navbar-left .uk-navbar-item #offcanvas-flip .uk-offcanvas-bar #list #editar').submit();
                var cod = $('.uk-navbar-container .uk-navbar-left .uk-navbar-item #offcanvas-flip .uk-offcanvas-bar #editar #cod').val();
                Cookies.set('editar_cod', true);
            });
           
        </script>

        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="menu.php">Home</a></li>
            <li><a href="produtos.php">Todos</a></li>
        </ul>

    </div>
    <div class="uk-navbar-right">

        <div>
            <a class="uk-navbar-toggle" uk-search-icon href="#"></a>
            <div class="uk-drop" uk-drop="mode: click; pos: left-center; offset: 0">
                <form class="uk-search uk-search-navbar uk-width-1-1">
                    <input class="uk-search-input" type="search" placeholder="Search" autofocus>
                </form>
            </div>
        </div>

    </div>
</nav>

<form method=POST  >
<div uk-grid>

    <?php
    
    
    $codx=$_GET['codx'];
    //echo"$_SESSION[pedido]";
    $comando= "select * from tb_produto where id_produto=$codx";
    $resulta = mysqli_query($con,$comando);
    if ($registro = mysqli_fetch_array($resulta))
    {
            $comando="select descricao_categoria from tb_categoria 
            where id_categoria='$registro[6]';";
            $categoria = mysqli_query($con,$comando);

        if($row = mysqli_fetch_array($categoria)){
                    
                
           
                echo "<div class='uk-width-1-2@m' style='margin:3%;'>";
                echo "";
                echo"    <div>";
                echo"       <div class ='uk-width-2xlarge'>";
                echo"<div class='uk-position-relative uk-visible-toggle uk-light' tabindex='-1' uk-slideshow='min-height: 300; max-height: 600; animation: push'>
                <ul class='uk-slideshow-items'>";


                $titulo = mysqli_query($con,"select * from tb_imagem_produto 
                where tb_produto_id_produto='$registro[0]';");
                while($row2 = mysqli_fetch_array($titulo)){
                echo"
                    <li>
                        <img src='../trivegano/produtos/$row2[1]' alt='' uk-cover>
                    </li>
                ";}
                echo" 
                </ul>
                <a class='uk-position-center-left uk-position-small uk-hidden-hover' href='#' uk-slidenav-previous uk-slideshow-item='previous'></a>
                <a class='uk-position-center-right uk-position-small uk-hidden-hover' href='#' uk-slidenav-next uk-slideshow-item='next'></a>
                </div>
                ";               
                echo"       </div>";
                
               
                
				echo"  </div>";
				echo" <div class='' style=margin-left:4%;margin-bottom:2%;font-size:20px;margin-right:4%;>";
                echo"    <div name=informacoes><div class='uk-grid'><div>";
                echo"        <div>";
                echo"            <h1>$registro[1]</h1>";
                echo"        </div>";
                echo"   	 <div>";
				echo"			    <span class='uk-label uk-text-center uk-label-danger'>";
                echo"            		$row[0]";
				echo"				</span>";
				echo"			    <span class='uk-label uk-text-center uk-label-warning'>";
                echo"            		dieta";
				echo"				</span>";
                echo"     	 </div></div>";
                echo"        <div style='margin-top:3%;margin-left:50%;'>
                          R$   ".number_format($registro[4],2,",",".")."
                            </div></div>";
                echo"    </div><br>";
				echo
								nl2br($registro[3]);
                echo"</div>";


               
                echo"    </div>";
               
               
            
        }
    } 
    		
    $comando="SELECT * FROM `tb_produtos_adicionais` WHERE `tb_produto_id_produto`= '$codx';";
    $query=mysqli_query($con,$comando);
    
    echo "<div class='uk-width-1-3@m uk-grid-column-large' style='margin:2%;padding-left:6%;' ";
    echo"<h2 class='ui center aligned icon header'>
    <i style='font-size:30px'class='circular adjust icon'></i>
    Adicionais
  </h2>";
    echo "";
    echo"<ul uk-accordion='multiple: true' >";
    

    while($adicionais=mysqli_fetch_array($query)){
        echo"
       
                    <li>
                        <a class='uk-accordion-title ' href='#'>$adicionais[1]</a>
                        <div class='uk-accordion-content uk-grid uk-grid-large' >
                        <div class='uk-width-1-2'>
                        <br>
                        <img class='ui avatar image' src='../trivegano/adicionais/$adicionais[8]'>
                        <span>R$ $adicionais[2]</span>
                        </div>
                        
                        <div class='uk-width-1-2' style='padding-left:37%;'>
                        <br>
                            <div style='margin-lft:2%;' class='ui toggle checkbox '>
                            <input type='checkbox' value='$adicionais[0]' name='adicional[$registro[0]][]'>
                            <label></label>
                            </div>
                        </div>
                        

                        </div>
                    </li>
            ";
    }
    
    

    echo"      
                ";
    echo"            
        </ul>
        
        </div>
        ";
        echo "<div style='margin-left: 34%;'>";
        echo"<div class='wrap '>";
        echo"<button class='btn' type='submit' onClick='this.form.submit()' name='compra' value='$registro[0]'>";
        echo"Adicionar ao Carrinho";
        echo"</div>
            </div>";
        echo"</button>";
    
    
    $close = mysqli_close($con);
    
	?>
</div>
</form>
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