<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivegano - Login</title>
	

    <!-- UIKIT -->
	
	<link rel="stylesheet" href="../css/uikit.min.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
	<!---------->

	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/css/util.css">

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

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="js/script.js"></script>
    <script>
       
        
    </script>
	<?php
        session_start();
        
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
                                        <button class="login100-form-btn" type="submit" name="submit">
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
    ?>
	

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