<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivegano</title>

  
  <link rel="stylesheet" href="../cadastro/style.css">
	<link rel="stylesheet" href="../frontend/css/style.css">
<!--============================================================================-->	
 <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/fonts/iconic/css/material-design-iconic-font.min.css">
<!--=============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../cadastro/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/semantic/semantic.min.css">
	<!-- font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Licorice&family=Shadows+Into+Light&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../cadastro/css/util.css">
	<!---------->

<script src="../js/jquery-3.5.1.min.js"></script>

	<!-- UIKIT -->
	<link rel="stylesheet" href="../css/uikit.min.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.12/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.12/dist/js/uikit-icons.min.js"></script>
	<!---------->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<script src="../css/semantic/semantic.min.js"></script>
	<header>
		<div class="logo">
			 <a href="../index.php"><img src="../trivegano/logo1.png"></a>
		</div>
		<div class="catalogo">
			<ul class="items">
				<li><a href="../index.php">Home</a></li>
				<li><a href="faq.php">FAQ</a></li>
				<li><a href="menu.php">Menu</a></li>
				<li><a href="home_receitas.php">Receitas</a></li>
				<li><a href="home_guia.php">Guia</a></li>
				<li><a href="sobrenos.php">Sobre nós</a></li>
				<?php 
                include('../cadastro/conexao.php');session_start();
                    if(isset($_SESSION['codusuario']) && $_SESSION['usuario']='cliente'){
                    //     $cod = $_SESSION['cod_fornecedor'][0];
                    // $query=mysqli_query($con,"SELECT * FROM tb_usa WHERE id_fornecedor = $cod");
                    // if($fornecedor=mysqli_fetch_array($query)){
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

	<script  src="js/script.js"></script>
  
  
<nav class="uk-navbar-container uk-margin" style="margin-left:15%; margin-right:15%;" uk-navbar>
    <div class="uk-navbar-left">

        <a class="uk-navbar-item uk-logo" href="#"><span uk-icon="bag"></span></a>

        <ul class="uk-navbar-nav">
            <li ><a href="home_guia.php">Home</a></li>
            <li ><a href="#">Todos</a></li>
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


<div id="modal-center11" class="uk-flex-top" uk-modal="esc-close:false;bg-close:false;">
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <div class="">
		<div class="container-login100" >
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" style="height: 700px;">
				<form class="login100-form validate-form" name="loginUsuario" method="post" action="doLogin.php">
					<span class="login100-form-title p-b-49">
						<i class="fa fa-user-circle-o"></i>
					 </span>
          <input type="hidden" name='path' value="guia_detalhe.php">
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
								Entrar
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

						<a href="../cadastro/cadastro.html" class="txt2">
							Cadastre-se
						</a>
					</div>
				</form>
			</div>
		</div>
	    </div>

  </div>
</div>
    <!-- <script>$('.')</script> -->

    <?php
 
    include "../cadastro/conexao.php";
	mysqli_query($con,"SET NAMES 'utf8'");  
	mysqli_query($con,'SET character_set_connection=utf8');  
	mysqli_query($con,'SET character_set_client=utf8');  
	mysqli_query($con,'SET character_set_results=utf8'); 
   
    $codx=$_POST['codx'];
    //var_dump($_SESSION);

    $comando= "select * from tb_guia where id_guia=$codx";
    $resulta = mysqli_query($con,$comando);
   

    if ($registro = mysqli_fetch_array($resulta))
    {
            $comando="select descricao_categoria from tb_categoria 
            where id_categoria='$registro[7]';";
            $categoria = mysqli_query($con,$comando);

          
        if($row = mysqli_fetch_array($categoria)){
            //$row1 = $row['descricao_categoria'];
                    
            $titulo = mysqli_query($con,"select * from tb_imagem_guia 
                where tb_guia_id_guia='$codx';");
                if($row2 = mysqli_fetch_array($titulo)){
           
                echo "<div class='uk-child-width-1-2@m uk-grid-small ' uk-grid 
				style='margin-left:3%; margin-right:3%;margin-bottom:2%;'>   ";
                echo"    <div>";
                echo"       <div class ='uk-width-2xlarge'>";
                echo"       <img  widht=825 height=550 src=../trivegano/guia/$row2[1]>";
                echo"       </div>";
                echo"    </div>";
                echo"    <div class=''>";
                echo"
                
                <article class='uk-article'>

                <h1 class='uk-article-title'><a class='uk-link-reset'>$registro[5]</a></h1>
            
                <p class='uk-article-meta'>Escrito por <a href='#'>Super User</a> no $registro[1]. Postado em<a href='#'> $row[0]</a></p>
            
                <p class='uk-text-lead'>$registro[8]</p>
            
                </article>

                ";
                echo"    </div>";
				echo"  </div>";
				echo" <div class='' style=margin-left:4%;margin-bottom:2%;font-size:20px;margin-right:4%;>";
				echo
								nl2br($registro[2]);
                echo'</div>';
            }
        }
    } 
   
    
    
    $close = mysqli_close($con);
	?>


<div class="div">
  <div class="ui comments" style="max-width: 100%; margin:1%;">
      <h3 class="ui dividing header">Comentários</h3>
      
     <div class="comment">
        <!-- <a class="avatar">
           <img src="/images/avatar/small/elliot.jpg"> 
        </a>
        <div class="content">
           <a class="author">Elliot Fu</a> 
          <div class="metadata">
             <span class="date">Yesterday at 12:30AM</span> 
          </div>
          <div class="text">
             <p>This has been very useful for my research. Thanks as well!</p> 
          </div>
          <div class="actions">
             <a class="reply">Reply</a> 
          </div>
        </div> -->
       <!--  <div class="comments">
          <div class="comment">
            <a class="avatar">
              <img src="/images/avatar/small/jenny.jpg">
            </a>
            <div class="content">
              <a class="author">Jenny Hess</a>
              <div class="metadata">
                <span class="date">Just now</span>
              </div>
              <div class="text">
                Elliot you are always so right :)
              </div>
              <div class="actions">
                <a class="reply">Reply</a>
              </div>
            </div>
          </div>-->
        </div> 

      
        
      <form class="ui form" id="form1" style="margin-top: 0.5%;">
        <div class="field" style="margin: 0.5%;">
          <textarea  rows="3" name="comment" id="comment"></textarea>
          <input type="hidden" name='cod' id="cod" value=<?php echo $_POST['codx'];?>>
        </div>
        <button for='form1' type="submit" style="border: none; background-color:transparent;">
        <div class="ui blue labeled submit icon button" style="margin-left: 2%;">
          <i class="icon edit"></i>
            Comentar
        </div> 
      </button> 
      </form>
    </div>
</div>


      <?php 
      
        if(!isset($_SESSION['codusuario'])){

          ?><script> $('.div .ui.comments #form1 button').click(function(){
            $('.div .ui.comments #form1').submit(function(e){
              e.preventDefault();
               UIkit.modal('#modal-center11').show();
            });
           
          });</script>
          
          <?php
        }
      
      ?>
    </script>
    

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

<script src="comment.js"></script>
</body>

</html>