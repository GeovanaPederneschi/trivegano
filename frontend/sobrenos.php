<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivegano</title>    <link rel="icon" type="image/png" href="http://localhost/trivegano-main/trivegano/logo3.png"/>
	<script src='../js/jquery-3.5.1.min.js'></script>
    <link rel="stylesheet" type="text/css" href="../css/semantic/semantic.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">

<!-- UIKIT -->
<link rel="stylesheet" href="../css/uikit.min.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
<!---------->
    

	
<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
</head>
<body>
	
	<header>
		<div class="logo">
			 <a href="../index.php"><img src="../trivegano/logo1.png"></a>
		</div>
		<div class="catalogo">
			<ul>
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
                session_start();
                    if(isset($_SESSION['codusuario']) && $_SESSION['usuario']='cliente'){

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
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="js/script.js"></script>

<!-- Sobre nós -->
<div class="">
	<div class="uk-child-width-1-2@s uk-grid-match uk-grid" id="grid" uk-scrollspy="cls: uk-animation-slide-bottom; target: .fade; delay: 300; repeat: true" uk-parallax="bgy: -200" style="background-image: url('../trivegano/moody-green-vine-wall-texture.jpg'); padding: 5%;">
		
			<!-- <div class="uk-card uk-card-hover uk-card-body " uk-scrollspy="cls: uk-animation-slide-left; repeat: true; delay:100" style="font-size: 20px; text-align: center; font-weight: bold; margin-bottom: 7px;">
				<h3 class="uk-card-title" style="font-weight: bold;">Integrantes</h3>
				<p>Ana Julia<br>
				Melissa Nani<br>
				Mateus Assis<br>
				Eric Papi<br>
				Gabriel Rodrigues<br>
				Geovana Pederneschi</p>
			</div> -->
			<div class="uk-card uk-card-houver uk-card-body "  style="align-items: center;" >
				<img style="width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
			src="../trivegano/logo1.png" >
			</div>
		
			<div class="uk-card uk-card-houver uk-card-body fade"  style="align-items: center;" uk-scrollspy-class="uk-animation-slide-top">
				<img style="width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
			src="../trivegano/banner_Receitas.jpg" >
			</div>
			
			<!-- <div class="uk-card uk-card-houver uk-card-body fade"  style="align-items: center;" uk-scrollspy-class="uk-animation-slide-bottom">
				<img style="width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
			src="../trivegano/undraw_Team_up_re_84ok-removebg-preview.png" >
			</div> -->
			<div class="uk-card uk-card-default uk-card-hover uk-card-body fade" uk-scrollspy-class="uk-animation-slide-bottom">
				<h3 class="uk-card-title">Objetivos</h3>
			<p>Pesquisar e produzir um guia que conecte clientes e restaurantes com opções veganas;<br><br>
			Coletar dados e apresentar um banco de dados de receitas veganas facilitando o cotidiano dos usuários;<br><br>
			Reunir informações de interesse do público-alvo;<br><br>
			Conseguir alto desempenho com  a aplicação, garantido usabilidade, praticiade, responsabilidade e eficiência.
			</p>
			</div>
			
	
			<div>
				<div class="uk-card uk-card-secondary uk-card-hover uk-card-body uk-light " uk-scrollspy="cls: uk-animation-slide-right; repeat: true; delay:100" style="text-align: center; ">
					<h3 class="uk-card-title">Síntese</h3>
				<p style="font-size: 24px;">Criar e alimentar um site que informe pessoas veganas, vegetarianas ou interessados no assunto, com foco em aplicar uma solução prática e funcional  para atender esse mercado em crescimento, auxiliando a inserção de novos adeptos e a manutenção de veteranos.</p>
				</div>
			</div>
		
	</div>

	<div >
		<div class="uk-height-large uk-background-cover uk-light uk-flex" uk-parallax="bgy: -200" style="background-image: url('../trivegano/vegetables-752153.jpg');width: 100%;">
			<div class="uk-width-1-2@m uk-text-center uk-margin-auto uk-margin-auto-vertical">
				<h1>TriVegano</h1>
				<p>Desenvolvimento, Disposição e Sustentabilidade</p>
			</div>
		</div>  	
	</div>
	
</div>
<footer class="footer" >
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