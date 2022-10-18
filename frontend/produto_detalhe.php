<?php
include('../backend/session_start.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivegano</title>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>

    
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleCarrinho.css">

  
</head>


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
				<li><a href="guia.html">Guia</a></li>
				<li><a href="sobrenos.html">Sobre nós</a></li>
				<li><a href="../cadastro/login.html">Login</a></li>
			</ul>
		</div>
	</header>
	<div class="hamburger">
		  <span></span>
		  <span></span>
		  <span></span>
	</div>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="js/script.js"></script>
    <script src='https://code.jquery.com/jquery-3.6.1.min.js' integrity='sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=' crossorigin='anonymous'></script>

  
<nav class="uk-navbar-container uk-margin" style="margin-left:15%; margin-right:15%;" uk-navbar>
    <div class="uk-navbar-left">

        <!inico do botão do carrinho-->
        <a class="uk-navbar-item uk-logo" href="#">
            <button class="uk-button uk-button-default" type="button" uk-toggle="target: #offcanvas-flip" style="border: none;"><span uk-icon="bag"></span></button>

            <div id="offcanvas-flip" class="flip" uk-offcanvas="flip: true; overlay: true">
            <div class="uk-offcanvas-bar uk-width-1-3">

            <button class="uk-offcanvas-close" type="button" uk-close></button>

            <?php
            
            
            
            include('../cadastro/conexao.php');
            include('carrinho.php');

            if(array_key_exists('compra', $_POST)) {
                carrinho($_POST['compra']);
                

            }

			if(!empty($_SESSION['pedido'])){
               mostrarCarrinho($con);
            }
            else{
                echo"Não há produtos no carrinho";
                
            }

            ?>

            </div>
            </div>
        </a>

       <!final do botão do carrinho-->

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
                    
                
           
                echo "<div class='uk-width-1-2@m' style='margin:2%;'>";
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
                echo"    <div name=informacoes>";
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
                echo"     	 </div>";
                echo"        <div>
                                $registro[4]
                            </div>";
                echo"    </div><br>";
				echo
								nl2br($registro[3]);
                echo"</div>";


                echo "<div class='uk-flex uk-flex-center'>";
                echo"<div class='wrap '>";
                echo"<button class='btn' type='submit' onClick='this.form.submit()' name='compra' value='$registro[0]'>";
                echo"Adicionar ao Carrinho";
                echo"</div>
                    </div>";
                echo"</button>";
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
                            <input type='checkbox' value='$adicionais[0]' name='adicional[]'>
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
					<li><a href="guia.html">Guia</a></li>
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