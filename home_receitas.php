<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivegano</title>
	

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
	rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
	crossorigin="anonymous">
	
	<!-- UIKIT -->
	<link rel="stylesheet" href="css/uikit.min.css" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
	<!---------->
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">

</head>
<body>
	<header>
		<div class="logo">
			 <a href="index.html"><img src="trivegano/logo1.png"></a>
		</div>
		<div class="catalogo">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="faq.html">FAQ</a></li>
				<li><a href="menu.html">Menu</a></li>
				<li><a href="home_receitas.php">Receitas</a></li>
				<li><a href="guia.html">Guia</a></li>
				<li><a href="sobrenos.html">Sobre nós</a></li>
				<li><a href="cadastro/login.html">Login</a></li>
			</ul>
		</div>
		<div class="hamburger">
		  <span></span>
		  <span></span>
		  <span></span>
		</div>
	</header>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="./script.js"></script>

<!-- CARROSEL -->

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="autoplay: true; autoplay-interval: 4000; ratio: 1280:300" style="z-index: 1;">

	<ul class="uk-slideshow-items">
		<li>
			<img src="trivegano/banner_comprarPratos.png" alt="" uk-cover>
		</li>
		<li>
			<img src="trivegano/banner_cozinheReceita.png" alt="" uk-cover>
		</li>
		<li>
			<img src="trivegano/banner_chamarGuia.png" alt="" uk-cover>
		</li>
	</ul>

	<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
	<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

</div>

<!-- NAVBAR -->

<nav class="uk-navbar-container uk-margin" style="margin-left:15%; margin-right:15%;" uk-navbar>
    <div class="uk-navbar-left">

        <a class="uk-navbar-item uk-logo" href="#"><span uk-icon="bag"></span></a>

        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="#">Home</a></li>
            <li><a href="receitas.php">Todos</a></li>
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

<!-- ROLAGEM COM RECEITAS RECENTES -->
<!-- falta fazer a programacao com a funcionalidade de data -->

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider style="margin-left: 4%; margin-right:4%; margin-bottom:4%;" autoplay autoplay-interval="3500">
    <h1 class="uk-heading-line uk-text-center"><span>Adiconados Recentemente</span></h1>
    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@m uk-grid">
            <?php
                include "cadastro/conexao.php";
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

                        /* while ($row = $categoria->fetch_assoc()) {
                            //echo $row['descricao_categoria']."<br>";
                        } */
                    if($row = mysqli_fetch_array($categoria)){
                        //$row1 = $row['descricao_categoria'];
                                
                        $titulo = mysqli_query($con,"select * from tb_receitas 
                            where id_receitas='$registro[2]';");
                            if($row2 = mysqli_fetch_array($titulo)){
                            
                            /* echo"<li>";
                            echo"<div class='uk-inline uk-animation-toggle'>";
                            echo"       <img src='$registro[1]'>";
                            echo"       <div class='uk-overlay uk-overlay-primary uk-position-bottom'>";
                            echo"           <p>$row2[1]</p>";
                            echo"       </div>";
                            echo"</div>";
                            echo"</li>"; */
                            
                            echo "<form name=fox action=receita_detalhe.php  method=POST >";
                            echo"<button type=subbmit name=bot2  style='border: none;'"; 
                            echo"<li>"; 
                            echo"<div class='uk-inline uk-animation-toggle'>";
                            echo"       <img src='$registro[1]'>";
                            echo "      <input name='codx' id=codx  type=hidden value=$row2[0]>";
                            echo"       <div class='uk-overlay uk-overlay-primary uk-position-bottom'>";
                            echo"           <p>$row2[1]</p>";
                            echo"       </div>";
                            echo"</div>";
                            echo"</li>";
                            echo"</button>";
                            echo"</form>";
                            } 
                            
                            
                            
                        
                        }
                        
                    
                    
                        /* echo "<form name=fox action=comprar.php  method=POST>"; 
                        echo "<img src=./img_produtos/$registro[4] width=200 heigth=200> <br>" ;

                        echo "<input name=codx id=codx  type=hidden value=$registro[0]>  <br>";
                        // imprime na tela o nome do produto
                        echo " $registro[1] <br>  " ;
                        // cria um botão submit
                        echo "<input type=submit name=bot2  value='comprar'>"; 
                        //fecha o form,
                        echo "</form>";
                        //fecha a tag td de coluna
                        echo "</td>"; */
                } 
                $close = mysqli_close($con);
            ?>
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

</div>

<!-- IMAGEM COM INFORMACOES -->

<div class="uk-height-large uk-background-cover uk-overflow-hidden uk-light uk-flex" style="background-image: url('trivegano/flowers-6199691_1920'); margin-bottom:4%;">
    <div class="uk-width-1-2@m uk-text-center uk-margin-auto uk-margin-auto-vertical">
        <h1 uk-parallax="opacity: 0,1; y: -100,0; scale: 2,1; end: 50vh + 50%;">Headline</h1>
        <p uk-parallax="opacity: 0,1; y: 100,0; scale: 0.5,1; end: 50vh + 50%;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
</div> 

<!-- ROLAGEM COM RECEITAS MAIS VISTAS -->

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider style="margin-left: 4%; margin-right:4%; margin-bottom:4%;" autoplay autoplay-interval="3500">
    <h1 class="uk-heading-line uk-text-center"><span>Mais Vistos</span></h1>
    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@m uk-grid">
            <?php
                include "cadastro/conexao.php";
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

                        /* while ($row = $categoria->fetch_assoc()) {
                            //echo $row['descricao_categoria']."<br>";
                        } */
                    if($row = mysqli_fetch_array($categoria)){
                        //$row1 = $row['descricao_categoria'];
                                
                        $titulo = mysqli_query($con,"select * from tb_receitas 
                            where id_receitas='$registro[2]';");
                            if($row2 = mysqli_fetch_array($titulo)){
                            
                                echo "<form name=fox action=receita_detalhe.php  method=POST >";
                                echo"<button type=subbmit name=bot2  style='border: none;'"; 
                                echo"<li>"; 
                                echo"<div class='uk-inline uk-animation-toggle'>";
                                echo"       <img src='$registro[1]'>";
                                echo"       <div class='uk-overlay uk-overlay-primary uk-position-bottom'>";
                                echo"           <p>$row2[1]</p>";
                                echo"       </div>";
                                echo"</div>";
                                echo"</li>";
                                echo"</button>";
                                echo"</form>";
                            } 

                        
                        }
                        
                    
                    
                        /* echo "<form name=fox action=comprar.php  method=POST>"; 
                        echo "<img src=./img_produtos/$registro[4] width=200 heigth=200> <br>" ;

                        echo "<input name=codx id=codx  type=hidden value=$registro[0]>  <br>";
                        // imprime na tela o nome do produto
                        echo " $registro[1] <br>  " ;
                        // cria um botão submit
                        echo "<input type=submit name=bot2  value='comprar'>"; 
                        //fecha o form,
                        echo "</form>";
                        //fecha a tag td de coluna
                        echo "</td>"; */
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
                        <img class="uk-height-medium" src="trivegano/broccoli-pieces-on-green-surface.jpg"  width="1000" height="600" alt="">
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
                        <img class="uk-height-medium" src="trivegano/broccoli-pieces-on-green-surface.jpg"  width="1000" height="600" alt="">
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

<!-- ROLAGEM DE PROMOCOES -->
 
<div id="promocao" uk-slider style="margin: 2%;" autoplay attoplay-interval="3500">

    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" >

        <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-height-small">
            <li>
                <img src="trivegano/first_promocao.png" width="400" alt="">
            </li>
            <li>
                <img src="trivegano/acima4_promocao.png" width="400" alt="">
            </li>
            <li>
                <img src="trivegano/acima50_promocao.png" width="400" alt="">
            </li>
            <li>
                <img src="trivegano/verao_st_promocao.png" width="400" alt="">
            </li>
            <li>
                <img src="trivegano/molde_imagem_promocao.jpg" width="400" alt="">
            </li>
            <li>
                <img src="trivegano/molde_imagem_promocao.jpg" width="400" alt="">
            </li>
            
        </ul>

        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

    </div>

    <!-- <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul> -->

</div>

<footer class="footer">
	<div class="container">
		<div class="row">

			<!-- 25% -->
			<div class="footer-col">
				<h4>Quem Somos</h4>
				<ul>
					<li><a href="../sobrenos.html">Visite Nossa Página</a></li>
				</ul>
			</div>

			<!-- 25% -->
			<div class="footer-col">
				<h4>Procure Ajuda</h4>
				<ul>
					<li><a href="../faq.html">FAQ</a></li>
					<li><a href="../fale.html">Fale Conosco</a></li>
				</ul>
			</div>

			<!-- 25% -->
			<div class="footer-col">
				<h4>Encontre</h4>
				<ul>
					<li><a href="../home_receitas.php">Receitas</a></li>
					<li><a href="../menu.html">Menu</a></li>
					<li><a href="../guia.html">Guia</a></li>
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