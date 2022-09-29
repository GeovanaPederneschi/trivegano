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
<style>
    .wrap {
  height: 100%;
  display: flex;
  align-items: left;
  justify-content: left;
  margin-left: 7%;
}

.btn {
  min-width: 300px;
  min-height: 60px;
  font-family: 'Nunito', sans-serif;
  font-size: 22px;
  text-transform: uppercase;
  letter-spacing: 1.3px;
  font-weight: 700;
  color: #313133;
  background: #4FD1C5;
background: linear-gradient(90deg, rgba(205,133,63,1) 0%, rgba(160,82,45,1) 100%);
  border: none;
  border-radius: 1000px;
  box-shadow: 12px 12px 24px rgba(160,82,45,1);
  transition: all 0.3s ease-in-out 0s;
  cursor: pointer;
  outline: none;
  position: relative;
  padding: 10px;
  }

.btn::before{
content: '';
  border-radius: 1000px;
  min-width: calc(300px + 12px);
  min-height: calc(60px + 12px);
  border: 6px solid #A0522D;
  box-shadow: 0 0 60px rgba(160,82,45,1);
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  opacity: 0;
  transition: all .3s ease-in-out 0s;
}

.btn:hover, .btn:focus {
  color: #313133;
  transform: translateY(-6px);
}

.btn:hover::before, btn:focus::before {
  opacity: 1;
}

.btn::after {
  content: '';
  width: 30px; height: 30px;
  border-radius: 100%;
  border: 6px solid #A0522D;
  position: absolute;
  z-index: -1;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  animation: ring 1.5s infinite;
}

btn:hover::after, btn:focus::after {
  animation: none;
  display: none;
}

@keyframes ring {
  0% {
    width: 30px;
    height: 30px;
    opacity: 1;
  }
  100% {
    width: 300px;
    height: 300px;
    opacity: 0;
  }
}
.footer{
    margin-top: 1.5%;
}
</style>

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

        <!inico do botão do carrinho-->
        <a class="uk-navbar-item uk-logo" href="#">
            <button class="uk-button uk-button-default" type="button" uk-toggle="target: #offcanvas-flip" style="border: none;"><span uk-icon="bag"></span></button>

            <div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
            <div class="uk-offcanvas-bar">

            <button class="uk-offcanvas-close" type="button" uk-close></button>

            <?php
            
            include "cadastro/conexao.php";
            session_start();

            function carrinho($cod){
            
                if(isset($cod)){
                        if(empty($_SESSION['idcarrinho'])){
                            $_SESSION['idcarrinho'] = array($cod);
                            $_SESSION['carr_quant_prod']=1;
                            $_SESSION['pedido']='true';
                        }
                        elseif(!empty($_SESSION['idcarrinho'])){
                            $carrinho=$_SESSION['idcarrinho'];
                            // foreach($carrinho as $idproduto){
                                if(!in_array($cod, $carrinho)){
                                    $_SESSION['carr_quant_prod']++;
                                    // $_SESSION['idcarrinho'] = array($_SESSION['carr_quant_prod'] => $cod);
                                    array_push($carrinho,$cod);
                                    $_SESSION['idcarrinho']=$carrinho;
                                    
                                }
                                
                            // }
                        }
                }
            }

            if(array_key_exists('compra', $_POST)) {
                carrinho($_POST['compra']);

            }

			if(!empty($_SESSION['pedido'])){
                $_SESSION['valorcompra']=0;
                $carrinho=$_SESSION['idcarrinho'];
                for($i=0;$i<count($carrinho);$i++){
                    $comando="SELECT * FROM `tb_produto` WHERE `id_produto` = '$carrinho[$i]';";
                    $resultado= mysqli_query($con,$comando); 
                    if($produto= mysqli_fetch_array($resultado)){
                        echo"$produto[1] <br>";
                        echo"$produto[4] <br>";
                        echo"$carrinho[$i] <br>";
                        echo"$_SESSION[carr_quant_prod] <br><br>";
                        $_SESSION['valorcompra']+= $produto[4];
                        
                    }
                }
                echo"VALOR:<br>".$_SESSION['valorcompra'];
            }
            else{
                echo"Não há produtos no carrinho";
            }

            ?>

            </div>
            </div>
        </a>

       <!final do botão do carrinho-->

        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="menu.php">Home</a></li>
            <li><a href="produtos.php">Todos</a></li>
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
    
    include "cadastro/conexao.php";
    $codx=$_GET['codx'];
    //echo"$_SESSION[pedido]";
    $comando= "select * from tb_produto where id_produto=$codx";
    $resulta = mysqli_query($con,$comando);
    if ($registro = mysqli_fetch_array($resulta))
    {
            $comando="select descricao_categoria from tb_categoria 
            where id_categoria='$registro[6]';";
            $categoria = mysqli_query($con,$comando);

        if($row = mysqli_fetch_array($categoria)){
                    
            
           
                echo "<div class='uk-child-width-1-2@m uk-grid-small ' uk-grid 
				style='margin-left:3%; margin-right:3%;margin-bottom:2%;'>   ";
                echo"    <div>";
                echo"       <div class ='uk-width-2xlarge'>";
                echo"<div class='uk-position-relative uk-visible-toggle uk-light' tabindex='-1' uk-slideshow='min-height: 300; max-height: 600; animation: push'>
                <ul class='uk-slideshow-items'>";

                $titulo = mysqli_query($con,"select * from tb_imagem_produto 
                where tb_produto_id_produto='$registro[0]';");
                while($row2 = mysqli_fetch_array($titulo)){
                echo"
                    <li>
                        <img src='trivegano/produtos/$row2[1]' alt='' uk-cover>
                    </li>
                ";}
                echo" 
                </ul>
                <a class='uk-position-center-left uk-position-small uk-hidden-hover' href='#' uk-slidenav-previous uk-slideshow-item='previous'></a>
                <a class='uk-position-center-right uk-position-small uk-hidden-hover' href='#' uk-slidenav-next uk-slideshow-item='next'></a>
                </div>
                ";               
                echo"       </div>";
                echo"    </div>";
                echo"    <div name=informacoes>";
                echo"        <div>";
                echo"            <h1>$registro[1]</h1>";
                echo"        </div>";
                echo"   	 <div>";
				echo"			    <span class='uk-label uk-text-center uk-label-danger'>";
                echo"            		$row[0]";
				echo"				</span>";
				echo"			    <span class='uk-label uk-text-center uk-label-warning'>";
                echo"            		dieta";
				echo"				</span>";
                echo"     	 </div>";
                echo"        <div>
                                $registro[4]
                            </div>";
                echo"    </div>";
                
				echo"  </div>";
				echo" <div class='' style=margin-left:4%;margin-bottom:2%;font-size:20px;margin-right:4%;>";
				echo
								nl2br($registro[3]);
                echo"</div>";


                echo "<div>";
                
                echo "<form method=POST  >";
                echo"<div class='wrap'>";
                echo"<button class='btn' type='submit' name='compra' value='$registro[0]'>";
                echo"Adicionar ao Carrinho";
                echo"</div>
                    </div>";
                echo"</button>";
                echo "</form>";
                echo "</div>";
                echo'';
            
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