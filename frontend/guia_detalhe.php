<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivegano</title>

    <link rel="stylesheet" type="text/css" href="../css/semantic/semantic.min.css">
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
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script> 
<script src="../css/semantic/semantic.min.js"></script>
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
				<li><a href="home_guia.php">Guia</a></li>
				<li><a href="sobrenos.html">Sobre nós</a></li>
				<li><a href="../cadastro/login.html">Login</a></li>
			</ul>
		</div>
	</header>
	<div class="hamburger">
		  <span></span>
		  <span></span>
		  <span></span>
	</div>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="js/script.js"></script>
  
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



    <?php

 
    include "../cadastro/conexao.php";
   
    $codx=$_POST['codx'];

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


<div >
  <div class="ui comments" style="max-width: 100%; margin:1%;">
      <h3 class="ui dividing header">Comentários</h3>
      
      <div class="comment">
        <a class="avatar">
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
        </div>
        <div class="comments">
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
          </div>
        </div>
      </div>
      

      <form class="ui reply form">
        <div class="field" style="margin: 1%;">
          <textarea></textarea>
        </div>
        <div class="ui blue labeled submit icon button" style="margin-left: 1%;">
          <i class="icon edit"></i> Add Reply
        </div>
      </form>
    </div>
</div>
    

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