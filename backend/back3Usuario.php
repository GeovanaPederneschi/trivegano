<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivegano</title>
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
    <script src='../js/jquery-3.5.1.min.js'></script>
  
    <!-- SEMANTIC -->
    <link rel="stylesheet" type="text/css" href="../css/semantic/semantic.min.css">
    <script src="../css/semantic/semantic.min.js"></script>
    <!-----  ------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
	<link rel="stylesheet" href="../frontend/css/style.css">
    <link rel="stylesheet" href="style.css">

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

    <script  src="./script.js"></script>

<div uk-grid>
<div class="uk-width-1-5@m">
    <div class="uk-position-left ui secondary vertical pointing menu" id="grid">
            <div class="item " id="avatar">
                <?php
                //require "cadastro/doLogin.php";
                session_start();
                include "../cadastro/conexao.php";
                $resultado=mysqli_query($con,"select * from tb_cliente where id_cliente='$_SESSION[codusuario]'");
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
                    <form method="POST" action="back3.php">
                        <button id="btn-clientes" class=" item btn">
                            Pedidos
                      </button>
                    </form>
                     
                      <form method="POST"  action="back1Guia.php">
                        <button id="btn-clientes" type="submit" class="btn item">
                            Suporte
                      </button>
                      </form>
                    </div>
    </div>
</div>
<div class="uk-width-4-5@m">
    <div class="uk-margin-medium-top" id="conteudo">
                        
    <div class="head transparent">
      <div class="text white" style="padding-left:20%;">Perfil</div>
      <div class="notification">
        <img src="../icones/images/notificationBellW.svg" alt="">
        <span class="digit white">2</span>
    </div>
    </div>     
    <div class="spacescroll">
        <div class="prDetail">
        <?php
        $resultado=mysqli_query($con,"select * from tb_cliente where id_cliente='$_SESSION[codusuario]'");
        if($r = mysqli_fetch_array($resultado)){
            echo"<div class='image'><img src='../trivegano/usuarios/cliente/$r[10]' alt=''>
            <button class='edit filterICN'>Edit</button></div>
            <div class='name'>".ucfirst($r[1])."</div>
            <div class='ep'>$r[5]</div>";
        }
        ?>
        </div>

    <div class="cover">
        <div class="myprofile" >
            <h3>Minha Conta</h3>
            <div class="plk">
                <a class="plink" id='text-profile'><img src="../icones/images/bottomProfile-red.svg" alt="">
                    <form method="GET" action="back3_usuario_detalhe.php">
                        <button id="text-profile" name="visualizar_usuario" class="btn4" type="submit">
                            Dados
                      </button>
                    </form>
                </a>
    </div>
            <h3>Mais</h3>
            <div class="plk">
                <a class="plink" id='text-profile'><img src="../icones/images/pHelp.svg" alt="">
                    <form method="GET" action="back3_usuario_detalhe.php">
                        <button id="text-profile" name="usuario_config" class="btn4" type="submit">
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
					<li><a href="../frontend/sobrenos.php">Visite Nossa Página</a></li>
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
					<li><a href="../frontend/home_receitas.php">Receitas</a></li>
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