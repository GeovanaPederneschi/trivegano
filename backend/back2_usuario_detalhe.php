<?php
include_once('session_start.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivegano</title>    <link rel="icon" type="image/png" href="http://localhost/trivegano-main/trivegano/logo3.png"/>
     <link rel="stylesheet" href="style1.css">

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
<style>
    #grid{
    float: left;
    width: 20%;
    background-color: #f1f1f1;
    padding-left: 20px;
    margin:0;
    }
    /*.footer{
        margin-top:80%;
    }*/
    #avatar{
      margin:center;
    }
    #conteudo{
        width:80%;
    }
    .item{
      padding-left: 40px;
    }
</style>
<body>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script> src="../js/jquery-3.5.1.js"</script>
    <script  src="./script.js"></script>
<?php include('metodos_back.php'); ?>

<div id="offcanvas-push" class="push" uk-offcanvas=" mode:push; overlay: true;">
    <div class="uk-offcanvas-bar uk-width-3-5">

        <button class="uk-offcanvas-close" type="button" uk-close></button>

        <?php
        include('functions.php');
          
          if(array_key_exists('visualizar_usuario', $_GET)){
            $cod=$_SESSION['codusuario'];
            echo"
            <script>
            UIkit.offcanvas('.push').show();
            console.log(ferrou);
            </script>
            ";
             visualizarUsuario($cod,'tb_adm_fornecedor','id_adm_fornecedor','6','3');
           
            
            
          }
         
          if(array_key_exists('visualizar_restaurante', $_GET)){
            $cod=$_SESSION['codfornecedor'];
            echo"
            <script>
            UIkit.offcanvas('.push').show();
            </script>
            ";
            // visualizarRestaurante($cod);
          }

          if(array_key_exists('restaurante_config', $_GET)){
            $cod=$_SESSION['codfornecedor'];
            echo"
            <script>
            UIkit.offcanvas('.push').show();
            </script>
            ";
            // configRestaurante($cod);
          }

          if(array_key_exists('usuario_config', $_GET)){
            $cod=$_SESSION['codusuario'];
            echo"
            <script>
            UIkit.offcanvas('.push').show();
            </script>
            ";
            // configUsuario($cod);
          }
        ?>

    </div>
</div>



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
                $resultado=mysqli_query($con,"select * from tb_adm_fornecedor where id_adm_fornecedor='$_SESSION[codusuario]'");
                if($r = mysqli_fetch_array($resultado)){
                
                    echo"
                    <form method='POST' action='back2Usuario.php'>
                    <button id='btn-clientes' type='submit' class='btn item'>
                         <div class='ui tiny image'>
                        <img src='../trivegano/usuarios/$r[6]'>
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
                     <form method="POST" action="back2.php">
                      <button id="btn-clientes" type ="submit" class="btn item">
                            Produtos
                      </button>
                      </form>
                      <form method="POST" action="back2Pedidos.php">
                        <button id="btn-clientes" type="submit" class="btn item">
                            Pedidos
                      </button>
                      </form>
                      <form method="POST"  action="back2Vendas.php">
                        <button id="btn-clientes" type="submit" class="btn item">
                            Vendas
                      </button>
                      </form>
                      <form method="POST" action="back2Clientes.php">
                        <button id="btn-clientes" type="submit" class="btn item">
                            Clientes
                      </button>
                      </form>
                      <form method="POST" action="back2Suporte.php">
                        <button id="btn-clientes" type="submit" class="btn item">
                            Suporte
                      </button>
                      </form>
                      <form method="POST" action="back2Promocoes.php">
                        <button id="btn-clientes" type="submit" class="btn item">
                            Promoções
                      </button>
                      </form>
                    </div>
    </div>

    <nav class="uk-navbar" id='menu' uk-navbar>
              <div class="uk-navbar-left">
                  <a class="uk-navbar-toggle uk-navbar-toggle-animate" uk-navbar-toggle-icon href="#"></a>
                  <div class="uk-navbar-dropdown">
                      <ul class="uk-nav uk-navbar-dropdown-nav">
                          <li style='margin:4%;'><a id="ativo">
                                <form method='POST' action='back2Usuario.php'>
                                  <button id='btn-clientes' type='submit' class='btn6'>
                                <?php
                              
                              
                                  include "../cadastro/conexao.php";mysqli_query($con,"SET NAMES 'utf8'");  
                                  mysqli_query($con,'SET character_set_connection=utf8');  
                                  mysqli_query($con,'SET character_set_client=utf8');  
                                  mysqli_query($con,'SET character_set_results=utf8');

                                  $resultado=mysqli_query($con,"SELECT * FROM tb_adm_fornecedor WHERE id_adm_fornecedor='$_SESSION[codusuario]';");
                                  if($r = mysqli_fetch_array($resultado)){
                          
                                      
                                      echo"
                                      <img class='ui avatar image' src='../trivegano/usuarios/$r[6]'>
                                      <span>".ucfirst($r[1])."</span>
                                      ";

                                  }
                              ?>    
                                </button>
                                  </form>
                          </a></li>
                         
                          <li style='margin:4%;'><a >
                          <form method="POST" action="back2.php">
                            <button id="btn-clientes" type='submit' class="btn6">
                                    Produtos
                            </button>
                            </form>
                          </a></li>
                          
                          <li style='margin:4%;'><a >
                            <form method="POST" action="back2Pedidos.php">
                            <button class="btn6">
                                    Pedidos
                            </button>
                            </form>
                          </a></li>

                          <li style='margin:4%;'><a>
                          <form method="POST"  action="back2Vendas.php">
                                <button type="submit" class="btn6">
                                    Vendas
                            </button>
                            </form>
                           </a></li>

                           <li style='margin:4%;'><a>
                           <form method="POST" action="back2Clientes.php">
                                <button type="submit" class="btn6">
                                    Clientes
                            </button>
                            </form>
                           </a></li>

                           <li style='margin:4%;'><a>
                           <form method="POST" action="back2Suporte.php">
                                <button type="submit" class="btn6">
                                    Suporte
                            </button>
                            </form>
                           </a></li>

                           <li style='margin:4%;'><a>
                           <form method="POST" action="back2Promocoes.php">
                                <button type="submit" class="btn6">
                                    Promoções
                            </button>
                            </form>
                           </a></li>
                      </ul>
                  </div>
              </div>
            </nav>
</div>
<div class="uk-width-4-5@m">
    <div class="uk-margin-medium-top" id="conteudo">
                        
    <div class="head transparent">
      <!--<div class="text white" style="padding-left:20%;">Perfil</div>-->
      <div class="notification">
        <img src="../icones/images/notificationBellW.svg" alt="">
        <span class="digit white">2</span>
    </div>
    </div>     
    <div class="spacescroll">
        <img src="images/accessBase.svg" alt="" class="base">
        <img src="images/clipart.svg" alt="" class="clipart">
        <div class="prDetail">
        <?php
        $resultado=mysqli_query($con,"select * from tb_adm_fornecedor where id_adm_fornecedor='$_SESSION[codusuario]'");
        if($r = mysqli_fetch_array($resultado)){
            echo"<div class='image'><img src='../trivegano/usuarios/$r[6]' alt=''>
            <button class='edit filterICN'>Edit</button></div>
            <div class='name'>".ucfirst($r[1])."</div>
            <div class='ep'>$r[3]</div>";
            $comando="SELECT `nome_fantasia_fornecedor`FROM `tb_fornecedor` WHERE `id_fornecedor`='$r[5]';";
            $query=mysqli_query($con,$comando);
            if($fornecedor=mysqli_fetch_row($query)){
                echo"<div class='ad'>".ucfirst($fornecedor[0])."</div>";
            }
        }
        ?>
        </div>

    <div class="cover">
        <div class="myprofile" >
            <h3>Minha Conta</h3>
            <div class="plk">
                <a class="plink" id='text-profile'><img src="../icones/images/bottomProfile-red.svg" alt="">
                    <form method="GET" action="back2_usuario_detalhe.php">
                        <button id="text-profile" name="visualizar_usuario" class="btn4" type="submit">
                            Dados
                      </button>
                    </form>
                </a>
            </div>
            <h3>Restaurante</h3>
            <div class="plk">
                <a class="plink" id='text-profile'><img src="../icones/images/pBell.svg" alt="">
                    <form method="GET" action="back2_usuario_detalhe.php">
                        <button id="text-profile" name="visualizar_restaurante" class="btn4" type="submit">
                        Meu Estabelecimento
                      </button>
                    </form>
                </a>
                <a class="plink" id='text-profile'><img src="../icones/images/pBell.svg" alt="">
                <form method="GET" action="back2_usuario_detalhe.php">
                        <button id="text-profile" name="restaurante_configuracao" class="btn4" type="submit">
                            Configurações
                      </button>
                    </form>
                </a>
                
            </div>
            <h3>Mais</h3>
            <div class="plk">
                <a class="plink" id='text-profile'><img src="../icones/images/pHelp.svg" alt="">
                    <form method="GET" action="back2_usuario_detalhe.php">
                        <button id="text-profile" name="usuario_configuracao" class="btn4" type="submit">
                            Configurações
                      </button>
                    </form>
                </a>
                <a class="plink sair" id='text-profile'><img src="../icones/images/pLogout.svg" alt="">
                        <button id="text-profile" class="btn4" type="button">
                            Sair
                      </button>
                </a>
                
            </div>
        </div>
    </div> 
    </div>

                    
    </div>
</div>
</div>
<script>
    $('#conteudo .spacescroll .cover .myprofile .plk .sair ').click(function(){
        console.log('pegou');
        window.location.replace('http://localhost/trivegano-main/backend/sair.php');
    })
</script>


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
					<li><a href="sobrenos.php">Visite Nossa Página</a></li>
				</ul>
			</div>

			<!-- 25% -->
			<div class="footer-col">
				<h4>Procure Ajuda</h4>
				<ul>
					<li><a href="../frontend/faq.php">FAQ</a></li>
					<li><a href="fale.html">Fale Conosco</a></li>
				</ul>
			</div>

			<!-- 25% -->
			<div class="footer-col">
				<h4>Encontre</h4>
				<ul>
					<li><a href="home_receitas.php">Receitas</a></li>
					<li><a href="../frontend/menu.php">Menu</a></li>
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