<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivegano</title>
	
    <link rel="stylesheet" type="text/css" href="../css/semantic/semantic.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
	rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
	crossorigin="anonymous">
	
	<!-- UIKIT -->
	<link rel="stylesheet" href="../css/uikit.min.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
	<!---------->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">

    


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

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="js/script.js"></script>

<!-- CARROSEL -->

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="autoplay: true; autoplay-interval: 4000; ratio: 1280:300" style="z-index: 1;">

	<ul class="uk-slideshow-items">
		<li>
			<img src="../trivegano/banner_comprarPratos.png" alt="" uk-cover>
		</li>
		<li>
			<img src="../trivegano/banner_cozinheReceita.png" alt="" uk-cover>
		</li>
		<li>
			<img src="../trivegano/banner_chamarGuia.png" alt="" uk-cover>
		</li>
	</ul>

	<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
	<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

</div>

<!-- NAVBAR -->

<nav class="uk-navbar-container uk-margin" style="margin-left:15%; margin-right:15%;" uk-navbar>
    <div class="uk-navbar-left">

        <a class="uk-navbar-item uk-logo" href="#">
            <button class="uk-button uk-button-default" type="button" uk-tooltip="Carrinho de Compra" uk-toggle="target: #offcanvas-flip" style="border: none;"><span uk-icon="bag"></span></button>

            <div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
            <div class="uk-offcanvas-bar">

            <button class="uk-offcanvas-close" type="button" uk-close></button>

            <ul class="uk-nav uk-nav-default">
                <li class="uk-active"><a href="#">Active</a></li>
                <li class="uk-parent">
                    <a href="#">Parent</a>
                    <ul class="uk-nav-sub">
                        <li><a href="#">Sub item</a></li>
                        <li><a href="#">Sub item</a></li>
                    </ul>
                </li>
                <li class="uk-nav-header">Header</li>
                <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: table"></span> Item</a></li>
                <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: thumbnails"></span> Item</a></li>
                <li class="uk-nav-divider"></li>
                <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: trash"></span> Item</a></li>
            </ul>


            </div>
            </div>
        </a>

        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="#">Home</a></li>
            <li><a href="receitas.php">Todos</a></li>
        </ul>

        <button class="uk-button uk-button-default" style='border:none;' type="button">Categoria</button>
        <div uk-dropdown="animation: reveal-top; animate-out: true; duration: 700">
            <ul class="uk-nav uk-dropdown-nav">
                <!-- <li class="uk-active"><a href="#">Active</a></li>
                <li><a href="#">Item</a></li> -->
                <li class="uk-nav-header">Conteúdo</li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Notícias</a></li>
                <li class="uk-nav-divider"></li>
                <li><a href="#">Do It Yourself</a></li>
            </ul>
        </div>

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

<div uk-grid>
    <div class="uk-width-4-5@m">

        <!-- ROLAGEM COM GUIAS RECENTES -->

        <div class="uk-slider-container-offset"   style="margin-left:3%; margin-right:3%; margin-bottom:4%;" uk-slider autoplay="autoplay-interval:4000;">
            <h1 class="uk-heading-line uk-text-center"><span>Adicionados Recentementes</span></h1>
            <div class="uk-position-relative uk-visible-toggle uk-light " tabindex="-1">

            <ul class="uk-slider-items uk-child-width-1-2@s uk-grid">
                    <?php
                        include "../cadastro/conexao.php";
                        mysqli_query($con,"SET NAMES 'utf8'");  
                        mysqli_query($con,'SET character_set_connection=utf8');  
                        mysqli_query($con,'SET character_set_client=utf8');  
                        mysqli_query($con,'SET character_set_results=utf8'); 
                        
                        $titulo = mysqli_query($con,"select * from tb_guia 
                                                    where id_guia order by data_guia desc;");

                        while ($row2 = mysqli_fetch_array($titulo))
                        {
                                $comando="select descricao_categoria from tb_categoria 
                                where id_categoria='$row2[7]';";
                                $categoria = mysqli_query($con,$comando);

                            
                            if($row = mysqli_fetch_array($categoria)){

                                $comando= "select * from tb_imagem_guia where tb_guia_id_guia = $row2[0];";
                                $resulta = mysqli_query($con,$comando);
                                        
                                
                                    if($registro = mysqli_fetch_array($resulta)){
                                    
                                    
                                    echo "<form name=fox action=guia_detalhe.php  method=POST >";
                                    echo"<button type=subbmit name=bot2  style='border: none;'"; 
                                    echo"

                                    <li class='uk-transition-toggle '>
                                    <div class='uk-card uk-card-default uk-transition-scale-up uk-transition-opaque'>
                                    <input name='codx' id=codx  type=hidden value=$row2[0]>
                                        <div class='uk-card-media-top uk-height-medium '>
                                            <img class='uk-height-medium ' src='../trivegano/guia/$registro[1]'  width='1000' height='600' alt=''>
                                        </div>
                                        <div class='uk-card-body'>
                                            <h3 class='uk-card-title'>$row2[5]</h3>
                                            <p>$row2[8]</p>
                                        </div>
                                    </div>
                                    </li>

                                    ";
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

            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

        </div>

        <!-- IMAGEM COM INFORMACOES -->

        <div class="uk-height-large uk-background-cover uk-overflow-hidden uk-dark uk-flex" style="background-image: url('../trivegano/leaves-4754980_1920.jpg'); margin-bottom:4%;">
            <div class="uk-width-1-2@m uk-text-center uk-margin-auto uk-margin-auto-vertical">
                <h1 uk-parallax="opacity: 0,1; y: -100,0; scale: 2,1; end: 50vh + 50%;">Headline</h1>
                <p uk-parallax="opacity: 0,1; y: 100,0; scale: 0.5,1; end: 50vh + 50%;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div> 

        <!-- ROLAGEM COM GUIAS MAIS VISTAS -->

        <div class="uk-slider-container-offset"   style="margin-left:3%; margin-right:3%; margin-bottom:4%;" uk-slider autoplay="autoplay-interval:4000;">
            <h1 class="uk-heading-line uk-text-center"><span>Guias Bem Avaliadas</span></h1>
            <div class="uk-position-relative uk-visible-toggle uk-light " tabindex="-1">

            <ul class="uk-slider-items uk-child-width-1-2@s uk-grid">
                    <?php
                        include "../cadastro/conexao.php";
                        mysqli_query($con,"SET NAMES 'utf8'");  
                        mysqli_query($con,'SET character_set_connection=utf8');  
                        mysqli_query($con,'SET character_set_client=utf8');  
                        mysqli_query($con,'SET character_set_results=utf8'); 
                        
                        $titulo = mysqli_query($con,"select * from tb_guia 
                                                    where id_guia;");

                        while ($row2 = mysqli_fetch_array($titulo))
                        {
                                $comando="select descricao_categoria from tb_categoria 
                                where id_categoria='$row2[7]';";
                                $categoria = mysqli_query($con,$comando);

                            
                            if($row = mysqli_fetch_array($categoria)){

                                $comando= "select * from tb_imagem_guia where tb_guia_id_guia = $row2[0];";
                                $resulta = mysqli_query($con,$comando);
                                        
                                
                                    if($registro = mysqli_fetch_array($resulta)){
                                    
                                    
                                    echo "<form name=fox action=guia_detalhe.php  method=POST >";
                                    echo"<button type=subbmit name=bot2  style='border: none;'"; 
                                    echo"

                                    <li class='uk-transition-toggle '>
                                    <div class='uk-card uk-card-default uk-transition-scale-up uk-transition-opaque'>
                                    <input name='codx' id=codx  type=hidden value=$row2[0]>
                                        <div class='uk-card-media-top uk-height-medium '>
                                            <img class='uk-height-medium ' src='../trivegano/guia/$registro[1]'  width='1000' height='600' alt=''>
                                        </div>
                                        <div class='uk-card-body'>
                                            <h3 class='uk-card-title'>$row2[5]</h3>
                                            <p>$row2[8]</p>
                                        </div>
                                    </div>
                                    </li>

                                    ";
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

            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

        </div>
        <!-- RECEITAS -->

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
                                    echo"<li class= 'ui medium circular image uk-transition-toggle'>"; 
                                    echo"<div class='uk-transition-scale-up uk-transition-opaque ui medium circular image '>";
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

    </div>

    <div class="uk-width-1-5@m" style="padding-left: 0;">
        <div class="uk-section uk-dark" style="padding-bottom:0;">
            <div class="uk-container" style="padding-left: 7%;" uk-grid>

                <h3>Nossas Guias</h3>

                <div>
                    <p>Um dos compromissos do trivegano é a acessibilidade dos nossos consumidores.
                        
                    </p>
                </div>
                <div>
                    <p>A criação de uma plataforma que tivesse o preço justo estava intrínseca a disponibilidade de 
                        conteúdos de baixo custo que pudesse ajudar os mais diversos tipos de consumidores.</p>
                </div>
                <div>
                    <p> A criação de uma comunidade unidade é a nossa maior meta.</p>
                </div>
                <!--<div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                </div> -->
            </div>
            <br>
            
           
        </div>
         <!-- ROLAGEM DE PROMOCOES -->
 
         <div id="promocao" uk-slider  autoplay attoplay-interval="3500">

            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" >

                <ul class="uk-slider-items uk-child-width-1-1@m uk-child-width-1-2@s">
                    <li>
                        <img src="../trivegano/first_promocao.png" width="500" alt="">
                    </li>
                    <li>
                        <img src="../trivegano/acima4_promocao.png" width="500" alt="">
                    </li>
                    <li>
                        <img src="../trivegano/acima50_promocao.png" width="500" alt="">
                    </li>
                    <li>
                        <img src="../trivegano/verao_st_promocao.png" width="500" alt="">
                    </li>
                    <li>
                        <img src="../trivegano/molde_imagem_promocao.jpg" width="500" alt="">
                    </li>
                    <li>
                        <img src="../trivegano/molde_imagem_promocao.jpg" width="500" alt="">
                    </li>
                    
                </ul>

                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

            </div>

        </div>
        <div  class="uk-flex uk-flex-center">
            <img style="margin-top:10%;margin-bottom:10%;" src="../trivegano/Foodies_-_Food_Delivery_1-removebg-preview.png" alt="">
        </div>
    </div>
</div>



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