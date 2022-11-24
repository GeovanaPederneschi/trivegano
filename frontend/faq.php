<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivegano</title>    <link rel="icon" type="image/png" href="http://localhost/trivegano-main/trivegano/logo3.png"/>
	<link rel="icon" type="image/png" href="http://localhost/trivegano-main/trivegano/logo3.png"/>

    <script src='../js/jquery-3.5.1.min.js'></script>
    <link rel="stylesheet" type="text/css" href="../css/semantic/semantic.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
	
	<!-- UIKIT -->
	
	<link rel="stylesheet" href="../css/uikit.min.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
	<!---------->
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
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
	</header>
	<div class="hamburger">
		  <span></span>
		  <span></span>
		  <span></span>
	</div>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script  src="js/script.js"></script>
	

    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="autoplay: true; autoplay-interval: 6000; ratio: 1280:300" style="padding-top: 0px;">

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
    
    <h1 class="uk-heading-line uk-text-center" style=" color:black; font-size: 50px; padding-bottom: 2px;">Perguntas Frequentes</h1>

    <hr style="margin: 25px;">

    <ul uk-accordion="multiple: true" class="uk-background-default uk-padding uk-panel" style="margin: 30px;">
        <li>
            <a class="uk-accordion-title uk-heading-bullet" href="#">Como posso começar a ofertar os produtos do meu restaurante?</a>
            <div class="uk-accordion-content">
                <p>Em <a href="../cadastro/cadastroRestaurante.html">cadastro fornecedor</a> você pode cadastrar os dados da sua empresa, assim seu pedido entrará em pedido de análise
                    para entramos em contanto com você.</p>
            </div>
        </li>
        <li>
            <a class="uk-accordion-title uk-heading-bullet" href="#">Como funcionar o processo de análise do cadastro?</a>
            <div class="uk-accordion-content">
                <p>Para garantir confiabilidade e segurança seus dados serão revisados e conferidos, isso pode levar até 30 dias últeis. 
				Logo depois, nossa equipe entrará em contao com  você através das formas de contatos cadastradas, para discussão e envio do contrato 
				de prestação de serviço. Asim asseguramos as suas necessidades e seus direitos se comprometendo desde o começo a manter um relacionamento de conversa com os fornecedores.</p>
            </div>
        </li>
        <li>
            <a class="uk-accordion-title uk-heading-bullet" href="#">O que acontece depois da análise do cadastro?</a>
            <div class="uk-accordion-content">
                <p>Entraremos em contato com o dono da empresa para discussão de contrato de serviço, se dispondo a atender suas necessidades e sanear suas dúvidas.</p>
            </div>
        </li>
        <li>
            <a class="uk-accordion-title uk-heading-bullet" href="#">Tem um número para fazer o pedido de cadastro?</a>
            <div class="uk-accordion-content">
                <p>Não os pedidos de solicitação são feitos exclusivamente através do nosso site oficial <a href="../cadastro/cadastroRestaurante.html">aqui</a>, a demanda de pedidos é muito extensa, a forma mais dinamica
				e justa é através do site. Porém depois do período de análise nossa equipe entra em contato com o dono da empresa.</p>
            </div>
        </li>
        <li>
            <a class="uk-accordion-title uk-heading-bullet" href="#">Onde posso reclamar ou elogiar um atendimento ou serviço?</a>
            <div class="uk-accordion-content">
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat proident.</p>
            </div>
        </li>
    </ul>

    <hr class="uk-divider-icon">
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