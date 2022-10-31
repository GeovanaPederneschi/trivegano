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
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
	<link rel="stylesheet" href="../frontend/css/style.css">
  <link rel="stylesheet" href="style.css">
  <!-- AJAX API PARA PDF -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    
   
</head>
<body>

<body>
	<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script> -->

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
                            <form method='POST' action='back1Usuario.php'>
                            <button id='btn-clientes' type='submit' class='btn item'>
                                <div class='ui tiny image'>
                                <img src='../trivegano/usuarios/$r[5]'>
                                </div>
                                <br><br>
                                <div class='content'>
                                <div class='header'>".ucfirst($r[1]); 
                                echo "</div>
                                <div class='description'>
                                    <p></p>
                                </div>
                                </div>
                            </button>
                            </form>
                              
                            ";

                        }
                        ?>           
                    </div>
                    <br><br>
                    <div class="uk-text-large">
                      <button id="btn-clientes" class=" item active btn">
                            Receitas
                      </button>
                      <form method="POST"  action="back1Guia.php">
                        <button id="btn-clientes" type="submit" class="btn item">
                            Guia
                      </button>
                      </form>
                      <form method="POST" action="back1Clientes.php">
                        <button id="btn-clientes" type="submit" class="btn item">
                            Clientes
                      </button>
                      </form>
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
  <li><a href="#">INSERIR</a></li>
  <li><a href="#">DESEMPENHO</a></li>
</ul>

<ul class="uk-switcher uk-margin">
    <li>

      <!-- VISUALIZAR RECEITAS -->
      <?php
      mysqli_query($con,"SET NAMES 'utf8'");  
      mysqli_query($con,'SET character_set_connection=utf8');  
      mysqli_query($con,'SET character_set_client=utf8');  
      mysqli_query($con,'SET character_set_results=utf8'); 
        include('visualizar_receita.php')
      ?>

    </li>

    <li>
      <!-- INSERIR RECEITA -->
      <?php
        include('inserir_receita.php')
      ?>
    </li>


    <li>
   <!--  <div class="outercube cube">
            <div class="innerCube cube">
              <div class="innerCube2 cube"></div>
            </div>
    </div> -->
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
					<li><a href="../frontend/home_guia.php">Guia</a></li>
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

