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
	
	<link rel="stylesheet" href="css/uikit.min.css" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
	<!---------->
	<link rel="stylesheet" href="style.css">
</head>
<body>
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
	</header>
	<div class="hamburger">
		  <span></span>
		  <span></span>
		  <span></span>
	</div>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>
  
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



    <?php
  
    //SESSION_START();
    include "cadastro/conexao.php";
    /* puxar o cod da receita e salvar em var */
    $codx=$_POST['codx'];

	//echo $codx;
    /* salvar essa var em array de session de usu campo correspondente a CODX */
    // $_SESSION['CODX']=$codx;
    /* selecionar na tab de produtos o produto correspondente ao cod */
    $comando= "select * from tb_receitas where id_receitas=$codx";
    $resulta = mysqli_query($con,$comando);
    /* $comando= "select * from tb_imagem_receitas;";
                $resulta = mysqli_query($con,$comando); */
    if ($registro = mysqli_fetch_array($resulta))
    {
            $comando="select descricao_categoria from tb_categoria 
            where id_categoria='$registro[4]';";
            $categoria = mysqli_query($con,$comando);

            /* while ($row = $categoria->fetch_assoc()) {
                //echo $row['descricao_categoria']."<br>";
            } */
        if($row = mysqli_fetch_array($categoria)){
            //$row1 = $row['descricao_categoria'];
                    
            $titulo = mysqli_query($con,"select * from tb_imagem_receitas 
                where tb_receitas_id_receitas='$codx';");
                if($row2 = mysqli_fetch_array($titulo)){
           
                echo "<div class='uk-child-width-1-2@m uk-grid-small ' uk-grid 
				style='margin-left:3%; margin-right:3%;margin-bottom:2%;'>   ";
                echo"    <div>";
                echo"       <div class ='uk-width-2xlarge'>";
                echo"       <img  widht=825 height=550 src=$row2[1]>";
                echo"       </div>";
                echo"    </div>";
                echo"    <div class=''>";
                echo"        <div>";
                echo"            <h1>$registro[1]</h1>";
                echo"        </div>";
                echo"   	 <div class=''>";
				echo"			    <span class='uk-label uk-text-center uk-label-danger'>";
                echo"            		$row[0]";
				echo"				</span>";
				echo"			    <span class='uk-label uk-text-center uk-label-warning'>";
                echo"            		$registro[7]";
				echo"				</span>";
                echo"     	 </div>";
                echo"    </div>";
				echo"  </div>";
				echo" <div class='' style=margin-left:4%;margin-bottom:2%;font-size:20px;margin-right:4%;>";
				echo"			Ingredientes: <br><br>".
								nl2br($registro[8]);
					
				echo"			<br><br> Modo de Preparo:<br><br>".
								nl2br($registro[2]);
				echo"</div>";
            }
        }
    } 
    
    
    
    $close = mysqli_close($con);
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