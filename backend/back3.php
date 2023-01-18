<?php
include_once('session_start.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivegano</title>    <link rel="icon" type="image/png" href="http://localhost/trivegano-main/trivegano/logo3.png"/>

	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
	<!-- font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Licorice&family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<!---------->
  
  <script src='../js/jquery-3.5.1.min.js'></script>
	<!-- UIKIT -->
	
	<link rel="stylesheet" href="../css/uikit.min.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
	<!---------->
  
  

  
  
  <!-- SEMANTIC -->
  <link rel="stylesheet" type="text/css" href="../css/semantic/semantic.min.css">
  <script src="../css/semantic/semantic.min.js"></script>
  <!-----  ------->

	<link rel="stylesheet" href="../frontend/css/style.css">
  <link rel="stylesheet" href="style1.css">
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
                        
                        include "../cadastro/conexao.php";mysqli_query($con,"SET NAMES 'utf8'");  
                                  mysqli_query($con,'SET character_set_connection=utf8');  
                                  mysqli_query($con,'SET character_set_client=utf8');  
                                  mysqli_query($con,'SET character_set_results=utf8');
                        mysqli_query($con,"SET NAMES 'utf8'");  
                        mysqli_query($con,'SET character_set_connection=utf8');  
                        mysqli_query($con,'SET character_set_client=utf8');  
                        mysqli_query($con,'SET character_set_results=utf8');

                        $resultado=mysqli_query($con,"SELECT * FROM tb_cliente WHERE id_cliente='$_SESSION[codusuario]';");
                        if($r = mysqli_fetch_array($resultado)){
                
                            
                            echo"
                            <form method='POST' action='back3Usuario.php'>
                            <button id='btn-clientes' type='submit' class='btn item'>
                                <div class='ui tiny image'>
                                <img src='../trivegano/usuarios/cliente/$r[10]'>
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
                            Pedidos
                      </button>
                      <form method="POST"  action="back1Guia.php">
                        <button id="btn-clientes" type="submit" class="btn item">
                            Suporte
                      </button>
                      </form>
                    </div>
            </div>
            <nav class="uk-navbar" id='menu' uk-navbar>
              <div class="uk-navbar-left">
                  <a class="uk-navbar-toggle uk-navbar-toggle-animate" uk-navbar-toggle-icon href="#"></a>
                  <div class="uk-navbar-dropdown">
                      <ul class="uk-nav uk-navbar-dropdown-nav">
                          <li style='margin:4%;'><a>
                                <form method='POST' action='back3Usuario.php'>
                                  <button id='btn-clientes' type='submit' class='btn6'>
                                <?php
                              
                              
                                  include "../cadastro/conexao.php";mysqli_query($con,"SET NAMES 'utf8'");  
                                  mysqli_query($con,'SET character_set_connection=utf8');  
                                  mysqli_query($con,'SET character_set_client=utf8');  
                                  mysqli_query($con,'SET character_set_results=utf8');

                                  $resultado=mysqli_query($con,"SELECT * FROM tb_cliente WHERE id_cliente='$_SESSION[codusuario]';");
                                  if($r = mysqli_fetch_array($resultado)){
                          
                                      
                                      echo"
                                      <img class='ui avatar image' src='../trivegano/usuarios/cliente/$r[10]'>
                                      <span>".ucfirst($r[1])."</span>
                                      ";

                                  }
                              ?>    
                                </button>
                                  </form>
                          </a></li>
                         
                          <li style='margin:4%;'><a id="ativo" >
                            <form method="POST" action="back3.php">
                            <button class="btn6">
                              Pedidos
                            </button>
                            </form>
                          </a></li>
                          
                          <li style='margin:4%;'><a>
                            <form method="POST"  action="back1Guia.php">
                            <button type="submit" class="btn6">
                              Suporte
                            </button>
                            </form>
                          </a></li>
                      </ul>
                  </div>
              </div>
            </nav>
            
        </div>
    

<div class="uk-width-4-5@m" id='cont'>
    <div class="uk-margin-medium-top" id="conteudo">
    
                        
<ul style="font-size: 60px; text-decoration-color:black;" class="uk-subnav uk-subnav-pill uk-flex-center"  uk-switcher="animation: uk-animation-fade">
        

  <li><a href="#">ABERTOS</a></li>
  <li><a href="#">FECHADOS</a></li>
</ul>

<ul class="uk-switcher uk-margin">
  <!-- ACOMPANHAR PEDIDO -->
    <li class='ui segment acompanhar'>
    <div class="ui loading segment" style='height:686px;'>
  <p></p>
  <p></p>
</div>     
    </li>

    <li>
      <!-- INSERIR RECEITA -->
      <?php
        //include('inserir_receita.php')
      ?>
    </li>



</ul>

                    
            </div>
        </div>
</div>

<script>
  $('.ui.rating')
  .rating()
;

    var cont = setInterval(function(){
        $('#conteudo ul .acompanhar').load('visualizar_pedidos_cliente.php');
    },500);
    

</script>

<footer class="footer" uk-sticky="position: bottom">
	<div class="container">
		<div class="row">

			<!-- 25% -->
			<div class="footer-col">
				<h4>Quem Somos</h4>
				<ul>
					<li><a href="../frontend/sobrenos.php">Visite Nossa Página</a></li>
				</ul>
			</div>

			<!-- 25% -->
			<div class="footer-col">
				<h4>Procure Ajuda</h4>
				<ul>
					<li><a href="../frontend/faq.php">FAQ</a></li>
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
