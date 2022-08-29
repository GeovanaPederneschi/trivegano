<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivegano</title>
	
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">

	<!-- UIKIT -->
	
	<link rel="stylesheet" href="css/uikit.min.css" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
	<!---------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
	<link rel="stylesheet" href="style.css">

    


</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
	<header>
		<div class="logo">
			 <a href="index.html"><img src="trivegano/logo1.png"></a>
		</div>
		<div class="catalogo">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="faq.html">FAQ</a></li>
				<li><a href="menu.php">Menu</a></li>
				<li><a href="home_receitas.php">Receitas</a></li>
				<li><a href="guia.html">Guia</a></li>
				<li><a href="sobrenos.html">Sobre nós</a></li>
				<li><a href="cadastro/login.html">Login</a></li>
				
			</ul>
		</div>
		<div class="hamburger">
		  <span></span>
		  <span></span>
		  <span></span>
		</div>
	</header>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

<nav class="uk-navbar-container uk-margin" style="margin-left:15%; margin-right:15%;" uk-navbar>
    <div class="uk-navbar-left">

        <a class="uk-navbar-item uk-logo" href="#">
            <button class="uk-button uk-button-default" type="button" uk-toggle="target: #offcanvas-flip" style="border: none;"><span uk-icon="bag"></span></button>

            <div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
            <div class="uk-offcanvas-bar">

            <button class="uk-offcanvas-close" type="button" uk-close></button>

            <ul class="uk-nav uk-nav-default">
                <li class="uk-active"><a href="#">Active</a></li>
                <li class="uk-parent">
                    <a href="#">Parent</a>
                    <ul class="uk-nav-sub">
                        <li><a href="#">Sub item</a></li>
                        <li><a href="#">Sub item</a></li>
                    </ul>
                </li>
                <li class="uk-nav-header">Header</li>
                <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: table"></span> Item</a></li>
                <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: thumbnails"></span> Item</a></li>
                <li class="uk-nav-divider"></li>
                <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: trash"></span> Item</a></li>
            </ul>


            </div>
            </div>
        </a>

        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="menu.php">Home</a></li>
            <li><a href="produtos.php">Todos</a></li>
        </ul>

    </div>
    <div class="uk-navbar-right">

        <div>
            <a class="uk-navbar-toggle" uk-search-icon href="#"></a>
            <div class="uk-drop" uk-drop="mode: click; pos: left-center; offset: 0">
                <form class="uk-search uk-search-navbar uk-width-1-1" action="produtos.php" method="POST">
                    <input class="uk-search-input" type="search" placeholder="Search" name="search" autofocus>
                </form>
            </div>
        </div>

    </div>
</nav>

<!-- <img class="ui medium circular image" src="trivegano/background-7171509_1920.jpg"> -->

<div  uk-grid>
    <div class="uk-width-1-4@m">
        <div class="ui vertical menu" style="margin-left: 2%; width:100%; font-size:large; margin-bottom: 2%;">
        <form method="POST">
        <div class="item">
            <div class="header">Dieta</div>
            <div class="menu">
            <a class="item">
                <div class="ui toggle checkbox">
                    <input type="checkbox" value="vegan" name="dieta">
                    <label>Vegana</label>
                </div>
            </a>
            <a class="item">
                <div class="ui toggle checkbox">
                    <input type="checkbox" value="ovolact">
                    <label>Ovolactovegetariana</label>
                </div>
            </a>
            </div>
        </div>
        <div class="item">
            <div class="header">Categoria</div>
            <div class="menu">
            <a class="item">
                <div class="ui toggle checkbox">
                    <input type="checkbox" value="5" name="categoria">
                    <label>Refeição</label>
                </div>
            </a>
            <a class="item">
                <div class="ui toggle checkbox">
                    <input type="checkbox" value="3" name="categoria">
                    <label>Pizza</label>
                </div>
            </a>
            <a class="item active">
                <div class="ui toggle checkbox">
                    <input type="checkbox" value="5" name="categoria">
                    <label>Bebida</label>
                </div>
            </a>
            <a class="item active">
                <div class="ui toggle checkbox">
                    <input type="checkbox" value="6" name="categoria">
                    <label>Sobremesa</label>
                </div>
            </a>
            <a class="item active">
                <div class="ui toggle checkbox">
                    <input type="checkbox" value="8" name="categoria">
                    <label>Burguer</label>
                </div>
            </a>
            </div>
        </div>
        <div class="item">
            <div class="header">Hosting</div>
            <div class="menu">
            <a class="item">Shared</a>
            <a class="item">Dedicated</a>
            </div>
        </div>
        <div class="item">
            <div class="header">Support</div>
            <div class="menu">
            <a class="item">E-mail Support</a>
            <a class="item">FAQs</a>
            </div>
        </div>
        <div class="item">
            <div class="header">Support</div>
            <div class="menu">
            <a class="item">E-mail Support</a>
            <a class="item">FAQs</a>
            </div>
        </div>
        <div class="item">
            <div class="header">Support</div>
            <div class="menu">
            <a class="item">E-mail Support</a>
            <a class="item">FAQs</a>
            </div>
        </div>
        <div uk-grid style="width: 100%; margin-left:6%; margin-bottom:1%;">
        <input type="submit" value="Filtrar" class="ui green button" style="width:42.5%;">
        <input type="submit" value="Limpar" class="ui brown button" style="width:42.5%;">
        </div>
        </div>
    </form>
    </div>

    
    <div class="uk-width-3-4@m" style="margin-top: 1%;">
        <div class="ui link cards uk-grid-row-large uk-grid-column-small  
        uk-child-width-1-2 uk-child-width-1-3@m uk-child-width-1-4@m" uk grid>
        <?php
            include "cadastro/conexao.php";
            mysqli_query($con,"SET NAMES 'utf8'");  
            mysqli_query($con,'SET character_set_connection=utf8');  
            mysqli_query($con,'SET character_set_client=utf8');  
            mysqli_query($con,'SET character_set_results=utf8');

           

            
            if(!empty($_POST['cat'])){
                $categoria=$_POST['cat'];
                $resulta = mysqli_query($con,"select * from tb_produto 
                where tb_categoria_id_categoria='$categoria';");    
            }
             elseif(!empty($_POST['categoria'])){ 
                $cat=$_POST['categoria'];
                $resulta = mysqli_query($con,"select * from tb_produto 
                where tb_categoria_id_categoria='$cat';");
            }
            elseif(!empty($_POST['search'])){
                $resulta = mysqli_query($con,"SELECT * from tb_produto where 
                locate('$_POST[search]',`nome_produto`)>0 order by `nome_produto` asc;");
            }
            else{
            $comando= "select * from tb_produto;";
            $resulta = mysqli_query($con,$comando);
            }
            while ($registro = mysqli_fetch_array($resulta))
            {
                
                    $comando="select descricao_categoria from tb_categoria 
                    where id_categoria='$registro[6]';";
                    $categoria = mysqli_query($con,$comando);

                   
                if($row = mysqli_fetch_array($categoria)){
                    //$row1 = $row['descricao_categoria']; data-type=$row[0] data-dieta=$row2[7]
                            
                    $titulo = mysqli_query($con,"select * from tb_imagem_produto 
                    where tb_produto_id_produto='$registro[0]';");
                        if($row2 = mysqli_fetch_array($titulo)){
                        echo "<form name=fox action=produto_detalhe.php  method=POST >";
                        echo"<button type=subbmit name=bot2  style='border: none;margin-bottom:3%;'";  
                        echo"
                        <div class='card' style=''>
                        <div class='image'>
                        <img src='trivegano/produtos/$row2[1]'>
                        <input name=codx id=codx  type=hidden value=$row2[0]>
                        </div>
                        <div class='content'>
                        <div class='header'>$registro[1]</div>
                        <div class='right floated' >
                            <a class='ui orange label'>$row[0]</a>
                        </div>
                        <div class='description'>
                            teste
                        </div>
                        </div>
                        <div class='extra content'>
                        <span class='right floated'>
                             $registro[4]
                        </span>
                        </div>
                        
                        ";
                        echo"</button>";
                        echo"</form>";
                        
                        } 

                    
                }
            } 
            echo"</div>";
            $close = mysqli_close($con);
            ?> <!-- <span>
                            <i class='user icon'></i>
                                75 Friends
                            </span>
                        </div>  -->
            
        </div>
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