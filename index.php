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
	
	<link rel="stylesheet" href="css/uikit.min.css" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
	<!---------->
	<link rel="stylesheet" href="frontend/css/style.css">
</head>
<body>
	<header>
		<div class="logo">
			 <a href="index.php"><img src="trivegano/logo1.png"></a>
		</div>
		<div class="catalogo">
			<ul class='items'>
				<li><a href="index.php">Home</a></li>
				<li><a href="frontend/faq.php">FAQ</a></li>
				<li><a href="frontend/menu.php">Menu</a></li>
				<li><a href="frontend/home_receitas.php">Receitas</a></li>
				<li><a href="frontend/home_guia.php">Guia</a></li>
				<li><a href="frontend/sobrenos.php">Sobre nós</a></li>
				<?php 
                include('cadastro/conexao.php');
                session_start();
                    if(isset($_SESSION['codusuario']) && $_SESSION['usuario']='cliente'){

                        echo"<li><a href='backend/back3.php'><span style='font-size:15px;' uk-icon='icon: user;ratio: 1.5'></span></a></li>";
                    }
                    else{
                        echo"<li><a href='cadastro/login.html'>Login</a></li>";
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
	<script src='js/jquery-3.5.1.min.js'></script>
	<script  src="frontend/js/script.js"></script>


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

	<!-- Iconesinhos -->

	<div class="alinhamento" style="height: 400px;">
		<div class="iconezinhos">
			<div class="icones">
				<img src="icones/Azul_Petroleo/cozinha_solido_azul.svg">
				<img src="icones/Azul_Petroleo/cenoura_solido_azul.svg">
				<img src="icones/Azul_Petroleo/vaca_solido_azul.svg">
			</div>
			<div class="column">
				<p><b>ALIMENTAÇÃO</b></p><br>
				<p>Pilar base que garante sua nutrição e o desenvolvimento econômico do país</p>
			</div>
			<div class="column">
				<p><b>SAÚDE</b></p><br>
				<p>Pilar onde nos comprometemos com o bem estar dos nossos consumidores</p>
			</div>
			<div class="column">
				<p><b>SUSTENTABILIDADE</b></p><br>
				<p>Pilar onde nos comprometemos com o bem-estar do meio ambiente, afim de um desenvolvimento sustentavel</p>
			</div>
		</div>
	</div>

	<div>
		<!-- welcome -->
		<hr class="uk-divider-icon" style="margin-left:2%; margin-right: 2%;">
		<div class="welcome">
			<div class="welcome-img" uk-scrollspy="cls: uk-animation-slide-left; repeat: true">
				<img src="carrossel/imagem1.jpg">
			</div>
			<div>
			<div class="welcome-titulo" uk-scrollspy="cls: uk-animation-slide-right; repeat: true">
				Como chegamos aqui?
			</div>
			<div class="welcome-txt" uk-scrollspy="cls: uk-animation-slide-right; repeat: true">
				<p>Nós somos 5 estudantes que juntamos nossas idealizações e objetivos para concluir com exito o nosso curso tecnico, tendo como objetivo abordar todos os conhecimentos adquiridos e soft skills desenvolvidas nesses três anos.</p>
				<p>	Dentro dos nossos objetivos estão a qualidade do software e o compromisso social de tornar essa aplicação uma prestadora de serviço essencial para a sociedade e o mercado vegetariano.
				</p>
			</div>
			<div class="welcome-assinatura" uk-scrollspy="cls: uk-animation-slide-right; repeat: true">
				<p> A equipe Trivegano te deseja uma boa experiencia na aplicação.</p>
			</div>
			<div class="welcome-txtinho" uk-scrollspy="cls: uk-animation-slide-right; repeat: true">
				<p><i>O fantástico time Trivegano</i></p>
			</div>
			</div>
			
		</div>
		
	</div>
	

    <div id="box_promocao" uk-slider style="margin: 1%;" autoplay attoplay-interval="3500" style='cursor:auto;'>

    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" >

        <ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@m uk-height-small uk-grid-small">
            <?php

            include('cadastro/conexao.php');
            mysqli_query($con,"SET NAMES 'utf8'");  
            mysqli_query($con,'SET character_set_connection=utf8');  
            mysqli_query($con,'SET character_set_client=utf8');  
            mysqli_query($con,'SET character_set_results=utf8'); 
            $query=mysqli_query($con,"SELECT * FROM tb_promocao WHERE status_promocao='ativo';");

            while($promocao = mysqli_fetch_array($query)){
                echo"<li class='uk-transition-toggle'>
                <input type='hidden' name='token' id='token' value='$promocao[1]'>
                    <img  class='uk-transition-scale-up uk-transition-opaque' src='trivegano/promocao/$promocao[11]' width='400' alt=''>
                </li>";
            }

            ?>
            
        </ul>

        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

    </div>
    
   <script>$(' #box_promocao .uk-position-relative .uk-slider-items .uk-transition-toggle').click(function(){
        console.log('aii');
        var token = $(this).children().first().val();
        console.log(token);
        //token.setSelectionRange(0,99999)
        navigator.clipboard.writeText(token);
        UIkit.notification({message: '<span uk-icon=\'icon: copy\'></span> Token Copiado', status: 'danger',pos: 'top-right'});
   })</script>

</div>

	<div class="uk-height-large uk-background-cover uk-overflow-hidden uk-light uk-flex" style="background-image: url('trivegano/flower-7252179_1920.png'); margin-bottom:1%; width: 100%; opacity: 0.9;text-shadow: black 0.1em 0.1em 0.2em;">
		<div class="uk-width-1-2@m uk-text-center uk-margin-auto uk-margin-auto-vertical">
			<h1 uk-parallax="opacity: 0,1; y: -100,0; scale: 2,1; end: 50vh + 50%;" style="font-size: 60px;color: rgba(240, 162, 126, 0.884);">TriVegano</h1>
			<p uk-parallax="opacity: 0,1; y: 100,0; scale: 0.5,1; end: 50vh + 50%;" style="font-size: 35px; font-weight:bold;color: white;">Desenvolvimento, Disposição e Sustentabilidade</p>
		</div>
	</div>  

	<br>
	<!-- green life -->
	<div class="green">
		<div class="green-img" uk-scrollspy="cls: uk-animation-slide-right; repeat: true">
			<img src="trivegano/cook.png">
		</div>
		
		<div class="green-titulo" uk-scrollspy="cls: uk-animation-slide-left; repeat: true">
			RECEITAS
		</div>
		<div class="green-txt" uk-scrollspy="cls: uk-animation-slide-left; repeat: true">
			<p>Criamos na nossa plataforma um espaço em que disponibilizamos receitas de diversos tipos, com enfoque no Vegetarianismo e o Veganismo, para que assim nossos usuários e clientes possam ter um melhor acesso de conhecimento independente dos recursos financeiros possuidos.
				</p>
			<br>
			<p>Na área de receitas são inclusas bebidas, lanches, refeições do dia a dia e sobremesa de mais variados tipos, todas práticas e fáceis de fazer por conta própria, tendo em mente o bem estar do usuário e a praticidade de cozinhar em sua própria casa. Venha cozinhar conosco! </p>
			<a href="frontend/home_receitas.php">
			<button class="green-btn" type="button" onclick="">Cozinhe Conosco</button>
			</a>
		</div>
		
	<br>
	</div>

	<div class="uk-height-large uk-background-cover uk-light uk-flex" uk-parallax="bgy: -200" style="background-image: url('trivegano/plants-6650595_1920.jpg'); margin-bottom:1%; width: 100%;">
		<div class="uk-width-1-2@m uk-text-center uk-margin-auto uk-margin-auto-vertical">
			<h1>TriVegano</h1>
			<p>Desenvolvimento, Disposição e Sustentabilidade</p>
		</div>
	</div>  

	<br>
	<!-- expectation -->
	<div class="expectation">
		<div class="espectation-img">
			<img style="width: 550;" src="trivegano/eficiencia2.png" >
		</div>
		<div class="expectation-titulo" >
			Objetivos
		</div>
		<div class="exp-icn">
			<div class="expectation-icn">
				<li><img src="icones/Azul_Petroleo/hamburger_solido_azul.svg"></li>
			</div>
			<div class="expectation-column">
				<li>
				<p><b>Diversidade e Acessibilidade</b></p>
				<p>Preço justo e acessíveis em nossos produtos!</p>
				</li>
			</div>
		</div>
		<div class="exp-icn">
			<div class="expectation-icn">
				<li><img src="icones/Azul_Petroleo/mobile_solido_azul.svg"></li>
			</div>
			<div class="expectation-column">
				<li>
				<p><b>Tecnologia e Disposição</b></p>
				<p>Tecnologia atual e eficaz com foco em nossos usuários.</p>
				</li>
			</div>
		</div>
		<div class="exp-icn">
			<div class="expectation-icn">
				<li><img src="icones/Azul_Petroleo/entrega_solido_azul.svg"></li>
			</div>
			<div class="expectation-column">
				<li>
				<p><b>Eficiencia e Qualidade</b></p>
				<p>Mias de x clientes atenditos e satifeitos</p>
				</li>
			</div>
		</div>
		<a href="frontend/menu.php">
			<button class="expectation-btn" type="button" onclick="">CONHEÇA-NOS</button>
		</a>
	</div>



	<!-- <div class="textoTela1">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel viverra dolor. Donec eu pulvinar odio. Aenean quis metus vel justo iaculis maximus. Cras facilisis facilisis magna, id ullamcorper ante fringilla ut. Ut libero enim, blandit eget tortor vitae, cursus ultricies dui. Etiam eu metus consequat, vehicula nibh vitae, euismod magna. Aenean suscipit quam ipsum, quis fermentum nibh rutrum vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus rutrum urna eu elit porta, condimentum rutrum metus accumsan. Sed lacinia, quam non vehicula vehicula, nisl neque egestas ligula, blandit sodales eros dolor eget dui. Etiam ullamcorper quis metus et porta. Curabitur pulvinar turpis non dolor laoreet, ac condimentum metus efficitur. Nunc vehicula a purus accumsan congue. Etiam semper purus metus, vitae aliquet ante ornare sit amet. Nullam in massa id magna sollicitudin vestibulum.
	</div> -->
	
<footer class="footer">
	<div class="container">
		<div class="row">

			<!-- 25% -->
			<div class="footer-col">
				<h4>Quem Somos</h4>
				<ul>
					<li><a href="frontend/sobrenos.php">Visite Nossa Página</a></li>
				</ul>
			</div>

			<!-- 25% -->
			<div class="footer-col">
				<h4>Procure Ajuda</h4>
				<ul>
					<li><a href="frontend/faq.php">FAQ</a></li>
					<li><a href="frontend/fale.html">Fale Conosco</a></li>
				</ul>
			</div>

			<!-- 25% -->
			<div class="footer-col">
				<h4>Encontre</h4>
				<ul>
					<li><a href="frontend/home_receitas.php">Receitas</a></li>
					<li><a href="frontend/menu.php">Menu</a></li>
					<li><a href="frontend/home_guia.php">Guia</a></li>
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