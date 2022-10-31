<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivegano</title>
	<link rel="stylesheet" href="css/style.css">
	
	<!-- UIKIT -->
	<link rel="stylesheet" href="../css/uikit.min.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
	<!---------->
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">

</head>
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
				<li><a href="home_guia.php">Guia</a></li>
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

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="autoplay: true; autoplay-interval: 4000; ratio: 1280:300" style="z-index: 1;">

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


<!-- <ul uk-tab>
    <li class="uk-active"><a href="#">Salgado</a></li>
    <li><a href="#">Doce</a></li>
    <li>
        <a href="#">More <span uk-icon="icon: triangle-down"></span></a>
        <div uk-dropdown="mode: click">
            <ul class="uk-nav uk-dropdown-nav">
                <li class="uk-active"><a href="#">Active</a></li>
                <li><a href="#">Item</a></li>
                <li class="uk-nav-header">Header</li>
                <li><a href="#">Item</a></li>
                <li><a href="#">Item</a></li>
                <li class="uk-nav-divider"></li>
                <li><a href="#">Item</a></li>
            </ul>
        </div>
    </li>
</ul> -->

<nav class="uk-navbar-container uk-margin" style="margin-left:15%; margin-right:15%;" uk-navbar>
    <div class="uk-navbar-left">

        <a class="uk-navbar-item uk-logo" href="#"><span uk-icon="bag"></span></a>

        <ul class="uk-navbar-nav">
            <li ><a href="home_receitas.php">Home</a></li>
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





            <div uk-filter="target: .js-filter">

                    <div class="uk-grid-small uk-grid-divider uk-child-width-auto uk-flex-center" uk-grid uk-sticky>
                        <div>
                            <ul class="uk-subnav uk-subnav-pill" uk-margin>
                                <li class="uk-active" uk-filter-control><a href="#">Sem filtro</a></li>
                            </ul>
                        </div>
                        <div>
                            <ul class="uk-subnav uk-subnav-pill" uk-margin>
                                <li uk-filter-control="filter: [data-type='salgado']; group: type"><a href="#">Salgado</a></li>
                                <li uk-filter-control="filter: [data-type='doce']; group: type"><a href="#">Doce</a></li>
                                <li uk-filter-control="filter: [data-type='bebida']; group: type"><a href="#">Bebida</a></li>
                            </ul>
                        </div>
                        <div>
                            <ul class="uk-subnav uk-subnav-pill" uk-margin>
                                <li uk-filter-control="filter: [data-dieta='vegan']; group: dieta"><a href="#">Vegetariano</a></li>
                                <li uk-filter-control="filter: [data-dieta='ovolact']; group: dieta"><a href="#">Ovolactovegetariano</a></li>
                            </ul>
                        </div>
                    </div>


                

                <?php


                include "../cadastro/conexao.php";
                mysqli_query($con,"SET NAMES 'utf8'");  
                mysqli_query($con,'SET character_set_connection=utf8');  
                mysqli_query($con,'SET character_set_client=utf8');  
                mysqli_query($con,'SET character_set_results=utf8'); 
                $comando= "select * from tb_imagem_receitas;";
                $resulta = mysqli_query($con,$comando);
                //$p=0;



                //$cont=0;

                echo "<ul class='js-filter uk-child-width-1-2 uk-child-width-1-3@m uk-text-center' style='margin-top:4%; 
                            margin-left: 0.2%; margin-right: 0.7%; margin-bottom: 4%;' uk-grid='masonry: true'>";
            
                while ($registro = mysqli_fetch_array($resulta))
                {
                        $comando="select descricao_categoria from tb_categoria 
                        where id_categoria='$registro[4]';";
                        $categoria = mysqli_query($con,$comando);

                        /* while ($row = $categoria->fetch_assoc()) {
                            //echo $row['descricao_categoria']."<br>";
                        } */
                    if($row = mysqli_fetch_array($categoria)){
                        //$row1 = $row['descricao_categoria'];
                                
                        $titulo = mysqli_query($con,"select * from tb_receitas 
                            where id_receitas='$registro[2]';");
                            if($row2 = mysqli_fetch_array($titulo)){
                            echo"<li data-type=$row[0] data-dieta=$row2[7]>";
                            echo "<form name=fox action=receita_detalhe.php  method=POST >";
                            echo"<button type=subbmit name=bot2  style='border: none;'";  
                            echo" <li class='uk-transition-toggle'>"; 
                           
                            echo"      <div class='uk-inline uk-transition-scale-up uk-transition-opaque' id=bt >";
                           
                            echo"      <img style='height: 440px; min-wight: 660px;' src='../trivegano/receitas/$registro[1]'>";
                            echo "      <input name=codx id=codx  type=hidden value=$row2[0]>";
                            echo"       <div class='uk-overlay uk-overlay-primary uk-position-bottom'>";
                            echo"           <p>$row2[1]</p>"; 
                            echo"       </div>";
                            echo"       </div>";
                           echo"</li>";
                            echo"</button>";
                            echo"</form>";
                            echo"</li>";
                            
                            } 

                        
                        }
                        
                    
                /*  echo "<form name=fox action=comprar.php  method=POST>"; 
                    echo "<img src=./img_produtos/$registro[4] width=200 heigth=200> <br>" ;

                    echo "<input name=codx id=codx  type=hidden value=$registro[0]>  <br>";
                    // imprime na tela o nome do produto
                    echo " $registro[1] <br>  " ;
                    // cria um botão submit
                    echo "<input type=submit name=bot2  value='comprar'>"; 
                    //fecha o form,
                    echo "</form>";
                    //fecha a tag td de coluna
                    echo "</td>";*/
                } 
                echo"</ul>";
                $close = mysqli_close($con);
                ?>
                
            </div>






<footer class="footer" style="bottom: 0;">
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