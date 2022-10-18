<?php
include_once('session_start.php');
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
	<link rel="stylesheet" href="../frontend/css/style.css">
  <link rel="stylesheet" href="style.css">
  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
   
</head>
<body>

<body>
 

<div id="offcanvas-push" class="push" uk-offcanvas=" mode:push; overlay: true">
    <div class="uk-offcanvas-bar uk-width-3-5">

        <button class="uk-offcanvas-close" type="button" uk-close></button>

        <?php

        include('functions.php');
          
          if(array_key_exists('visualizar', $_GET)){
            $cod=$_GET['visualizar'];
            echo"
            <script>
            UIkit.offcanvas('.push').show();
            console.log(ferrou);
            </script>
            ";
            visualizarCliente($cod);
           
            
            
          }
         
          if(array_key_exists('editar', $_GET)){
            $cod=$_GET['editar'];
            echo"
            <script>
            UIkit.offcanvas('.push').show();
            </script>
            ";
            // editarCliente($cod);
          }
        /* $_POST['visualizar']=0;
        $_POST['editar']=0; */
        ?>

    </div>
</div>

<div uk-grid>
        <div class="uk-width-1-5@m">
            <div class="uk-position-left ui secondary vertical pointing menu" id="grid">
                    <div class="item " id="avatar">
                        <?php
                        //require "cadastro/doLogin.php";
                        
                        include "../cadastro/conexao.php";
                        mysqli_query($con,"SET NAMES 'utf8'");  
                        mysqli_query($con,'SET character_set_connection=utf8');  
                        mysqli_query($con,'SET character_set_client=utf8');  
                        mysqli_query($con,'SET character_set_results=utf8');

                        $resultado=mysqli_query($con,"select * from tb_usuario_adm where id_usuario_adm='$_SESSION[codusuario]'");
                        if($r = mysqli_fetch_array($resultado)){
                
                            echo"
                                <div class='ui tiny image'>
                                <img src='../trivegano/usuarios/$r[5]'>
                                </div>
                                <br><br>
                                <div class='content'>
                                <div class='header'>$r[1]</div>
                                <div class='description'>
                                    <p></p>
                                </div>
                                </div>
                            ";

                        }
                        ?>           
                    </div>
                    <br><br>
                    <div class="uk-text-large">
                      <form method="POST" action="back1.php">
                      <button id="btn-clientes" type ="submit" class="btn item">
                            Receitas
                      </button>
                      </form>
                      <form method="POST"  action="back1Guia.php">
                        <button id="btn-clientes" type="submit" class="btn item">
                            Guia
                      </button>
                      </form>
                        <button id="btn-clientes" class="btn item active">
                            Clientes
                      </button>
                      <form method="POST" action="back1Validacoes.php">
                        <button id="btn-clientes" type="submit" class="btn item">
                            Validações
                      </button>
                      </form>
                      <form method="POST" action="back1Promocoes.php">
                        <button id="btn-clientes" type="submit" class="btn item">
                            Promoções
                      </button>
                      </form>
                    </div>
            </div>
        </div>
    

<div class="uk-width-4-5@m">
    <div class="uk-margin-medium-top" id="conteudo">
                        
<ul style="font-size: 60px; text-decoration-color:black;" class="uk-subnav uk-subnav-pill uk-flex-center"  uk-switcher="animation: uk-animation-fade">
  <li><a href="#">VISUALIZAR</a></li>
  <li><a href="#">DESEMPENHO</a></li>
</ul>

<ul class="uk-switcher uk-margin">
    <li>
   

      <!-- VISUALIZAR RECEITAS -->
      <?php
        include('visualizar_clientes.php')
      ?>
    </li>


    <li>
      <!-- DESEMPENHO RECEITA -->
      <?php
        include('desempenho_receita.php')
      ?>
    </li>
</ul>

                    
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
					<li><a href="../frontend/sobrenos.html">Visite Nossa Página</a></li>
				</ul>
			</div>

			<!-- 25% -->
			<div class="footer-col">
				<h4>Procure Ajuda</h4>
				<ul>
					<li><a href="../frontend/faq.html">FAQ</a></li>
					<li><a href="../frontend/fale.html">Fale Conosco</a></li>
				</ul>
			</div>

			<!-- 25% -->
			<div class="footer-col">
				<h4>Encontre</h4>
				<ul>
					<li><a href="../frontend/home_receitas.php">Receitas</a></li>
					<li><a href="../frontend/menu.php">Menu</a></li>
					<li><a href="../frontend/guia.html">Guia</a></li>
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

