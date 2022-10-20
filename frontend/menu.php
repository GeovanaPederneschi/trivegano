<?php
include('../backend/session_start.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivegano</title>
    <link rel="stylesheet" href="../backend/style1.css">
	
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">

	<!-- UIKIT -->
	
	<link rel="stylesheet" href="../css/uikit.min.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
	<!---------->
    <link rel="stylesheet" type="text/css" href="../css/semantic/semantic.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleCarrinho.css">


    


</head>
<body>
 <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script> 
<script src="../css/semantic/semantic.min.js"></script>

    

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
		<div class="hamburger">
		  <span></span>
		  <span></span>
		  <span></span>
		</div>
	</header>

<script src='../js/jquery-3.5.1.min.js'></script>
<script  src="js/script.js"></script>




<div id='message' class="ui icon orange large message" uk-sticky="start: 200; animation: uk-animation-slide-top; offset: 1;" >
  <i class="close icon"></i>
  <div class="content">
    <div class="header"><i class="map marker icon"></i>
      Precisamos da Sua Localização
    </div>
    <p>Para melhorar sua experiência faça o login na sua conta ou ative a sua localização atual</p>
  </div>
</div>


<div id="modal-center2" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <div>
            <div class="welcome-head uk-animation-toggle">
            <div class="header">
                <span class="welcome-head-head">Localização</span>
            </div>
                <span style='margin-top:10%;' class="caption ">Habilite sua localização e encontre um restaurante perto de você</span>
            </div> 
            <div class="locationfinderIMG ">
                
                    <img  src="../icones/images/locationfinder.svg" alt="">
                
            </div>
            <div class="signupstag">
                <a href="javascript:void(0)" class="setMan">SET MANNUALLY</a>
            </div>
        </div>

    </div>
</div>



<div id="modal-center4" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <div class="grid-3">
            <div class="welcome-head">
                <div class="header">
                <span class="welcome-head-head">Awesome!</span>
                <span class="caption">We just found your location, click confirm button to continue!</span>
                </div>  
            </div> 
                
            <div class="locationfinderIMG">
                <img src="../icones/images/locationfinderconfirm.svg" alt="">
            </div>
            <div class="locationblock">
                <img src="../icones/images/location-marker.svg" alt="">
               <?php echo" <span> $_SESSION[endereco] </span>";?>
                
            </div>
            <div class="ifield PD bottom" style=" margin-right:3%">
            <form method='GET'action='geolocation.php'>
                <button style='width:90%;' type="submit" class="btn3"><span>Confirm</span></button>
            <form>
            </div>
            </div>
        </div>

    </div>
</div>
  
<nav class="uk-navbar-container uk-margin" style="margin-left:15%; margin-right:15%;" uk-navbar>
    <div class="uk-navbar-left">

        <a class="uk-navbar-item uk-logo" href="#">
            <button class="uk-button uk-button-default" type="button" uk-toggle="target: #offcanvas-flip" style="border: none;"><span uk-icon="bag"></span></button>

            <div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
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
                //var_dump($_SESSION);
            }

            ?>


            </div>
            </div>
        </a>

        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="#">Home</a></li>
            <li><a href="produtos.php">Todos</a></li>
        </ul>

    </div>
    <div class="uk-navbar-right">

        <div>
            <a class="uk-navbar-toggle" uk-search-icon href="#"></a>
            <div class="uk-drop" uk-drop="mode: click; pos: left-center; offset: 0">
                <form class="uk-search uk-search-navbar uk-width-1-1" action="produtos.php" method="POST">
                    <input class="uk-search-input" type="search" placeholder="Search" name="search" autofocus>
                </form>
            </div>
        </div>

    </div>
</nav>

<!-- <img class="ui medium circular image" src="trivegano/background-7171509_1920.jpg"> -->





<!-- Filtros -->

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider style="margin-left: 4%; margin-right:4%; margin-bottom:4%;" autoplay autoplay-interval="3500">
    <h1 class="uk-heading-line uk-text-center"><span>FILTROS</span></h1>
    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@m uk-child-width-1-4@m uk-child-width-1-5@m uk-child-width-1-6@m uk-grid">
            <?php
                include('../cadastro/conexao.php');
                mysqli_query($con,"SET NAMES 'utf8'");  
                mysqli_query($con,'SET character_set_connection=utf8');  
                mysqli_query($con,'SET character_set_client=utf8');  
                mysqli_query($con,'SET character_set_results=utf8'); 
                $comando= "select * from tb_categoria where ramo_categoria='produto';";
                $resulta = mysqli_query($con,$comando);


                while ($registro = mysqli_fetch_array($resulta))
                {
                            
                                echo "<form name=enter action=produtos.php  method=POST >";
                                echo"<button type=button id='enter' name=bot2 style='border: none;'"; 
                                echo"<li class='ui medium circular image' >"; 
                                echo"<div class=' ui medium circular image uk-animation-toggle' id=bt >";
                                echo"       <img src='../trivegano/filtro/$registro[3]'>";
                                echo "  <input name='cat' id=codx  type=hidden value=$registro[0]>";
                               /*   echo"       <div class='uk-overlay uk-overlay-primary uk-position-bottom '>";
                                echo"           <p>$row2[1]</p>";
                                echo"       </div>";  */
                                echo"</div>";
                                echo"</li>";
                                echo"</button>";
                                echo"</form>";
                
                } 
                $close = mysqli_close($con);
            ?>
    </ul>
   <!--  <script>
     console.log(latitude+longitude)</script> -->

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

</div>


<!-- Reataurantes -->

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" style="margin-left: 4%; margin-right:4%; margin-bottom:4%;">
    <h1 class="uk-heading-line uk-text-center"><span>Restaurantes</span></h1>
    
            <?php
                include('../cadastro/conexao.php');
                $comando= "select * from tb_fornecedor;";
                $resulta = mysqli_query($con,$comando);
                echo"<ul class=' uk-grid-column-small uk-grid-row-large uk-child-width-1-2 uk-child-width-1-3@m uk-child-width-1-4@m uk-child-width-1-5@m' uk-grid>";
                $i=0;

                
                while ($registro = mysqli_fetch_array($resulta))
                {
                    if($i<20){
                        
                                echo "<form name=fox action=restaurante_detalhe.php  method=POST >";
                                echo"<button type=subbmit name=bot2  style='border: none;'"; 
                                echo"<li>"; 
                                echo"<div class=''>";
                                echo"       <img src='../trivegano/$registro[9]'>";
                                echo "      <input name='rest' id=codx  type=hidden value=$registro[0]>";
                                echo"</div>";
                                echo"</li>";
                                echo"</button>";
                                echo"</form>";
                                $i++;
                    }
                    else{
                       echo" </ul>";
                    }
                            
                                
                } 
            
                $close = mysqli_close($con);
            ?>




</div>



<!-- ROLAGEM DE PROMOCOES -->
 
<div id="promocao" uk-slider style="margin: 1%;" autoplay attoplay-interval="3500">

    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" >

        <ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@m uk-height-small uk-grid-small">
            <li>
                <img src="../trivegano/first_promocao.png" width="400" alt="">
            </li>
            <li>
                <img src="../trivegano/acima4_promocao.png" width="400" alt="">
            </li>
            <li>
                <img src="../trivegano/acima50_promocao.png" width="400" alt="">
            </li>
            <li>
                <img src="../trivegano/verao_st_promocao.png" width="400" alt="">
            </li>
            <li>
                <img src="../trivegano/molde_imagem_promocao.jpg" width="400" alt="">
            </li>
            <li>
                <img src="../trivegano/molde_imagem_promocao.jpg" width="400" alt="">
            </li>
            
        </ul>

        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

    </div>

    <!-- <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul> -->

</div>
<!-- RECEITAS -->
<!-- falta fazer a programacao com a funcionalidade de data -->

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider style="margin-left: 4%; margin-right:4%; margin-bottom:4%;" autoplay autoplay-interval="3500">
    <h1 class="uk-heading-line uk-text-center"><span>Nossas Receitas</span></h1>
    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@m uk-child-width-1-4@m uk-child-width-1-5@m  uk-child-width-1-6@m uk-child-width-1-7@m uk-grid">
            <?php
                include('../cadastro/conexao.php');
                mysqli_query($con,"SET NAMES 'utf8'");  
                mysqli_query($con,'SET character_set_connection=utf8');  
                mysqli_query($con,'SET character_set_client=utf8');  
                mysqli_query($con,'SET character_set_results=utf8'); 
                $comando= "select * from tb_imagem_receitas;";
                $resulta = mysqli_query($con,$comando);


                while ($registro = mysqli_fetch_array($resulta))
                {
                        $comando="select descricao_categoria from tb_categoria 
                        where id_categoria='$registro[4]';";
                        $categoria = mysqli_query($con,$comando);

                    if($row = mysqli_fetch_array($categoria)){
                                
                        $titulo = mysqli_query($con,"select * from tb_receitas 
                            where id_receitas='$registro[2]';");
                            if($row2 = mysqli_fetch_array($titulo)){
                    
                            
                            echo "<form name=fox action=receita_detalhe.php  method=POST >";
                            echo"<button type=subbmit name=bot2  style='border: none;'"; 
                            echo"<li class= 'ui medium circular image'>"; 
                            echo"<div class='uk-animation-toggle ui medium circular image'>";
                            echo"       <img src='../trivegano/receitas/$registro[1]' >";
                            echo "      <input name='codx' id=codx  type=hidden value=$row2[0]>";
                            echo"</div>";
                            echo"</li>";
                            echo"</button>";
                            echo"</form>";
                            } 
                            
                            
                            
                        
                        }
                } 
                $close = mysqli_close($con);
            ?>
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

</div>

<!-- GUIAS MAIS VISTOS -->

<div class="uk-slider-container-offset "   style="margin-left:3%; margin-right:3%; margin-bottom:4%;" uk-slider autoplay="autoplay-interval:4000;">
    <h1 class="uk-heading-line uk-text-center"><span>Guias Mais Vistos</span></h1>
    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

        <ul class="uk-slider-items uk-child-width-1-2@s uk-grid">
            <li>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top uk-height-medium">
                        <img class="uk-height-medium" src="../trivegano/broccoli-pieces-on-green-surface.jpg"  width="1000" height="600" alt="">
                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title">Headline</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top uk-height-medium">
                        <img class="uk-height-medium" src="../trivegano/broccoli-pieces-on-green-surface.jpg"  width="1000" height="600" alt="">
                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title">Headline</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                    </div>
                </div>
            </li>
            
            
            

        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

    </div>

    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

</div>
<?php include('geolocation.php');?>

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