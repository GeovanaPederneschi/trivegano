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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
	<link rel="stylesheet" href="../style.css">
 <script src="../fuctions.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
<style>
    #grid{
    float: left;
    width: 20%;
    height: auto;
    background-color: #f1f1f1;
    padding-left: 20px;
    margin:0;
    
    }
    .footer{
        margin-top:15px;
    }
    #avatar{
      margin:center;
    }
    #conteudo{
        width:80%;
        margin-left:10%;
    }
    .btn{
      width: 100%;
    }
    
    
</style>
<body>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>
  <script>
    $(document).ready(function(){



    })
    
  </script>
  
<div uk-grid>
        <div class="uk-width-1-5@m">
            <div class="uk-position-left ui secondary vertical pointing menu" id="grid">
                    <div class="item " id="avatar">
                        <?php
                        //require "cadastro/doLogin.php";
                        session_start();
                        include "../cadastro/conexao.php";
                        mysqli_query($con,"SET NAMES 'utf8'");  
                        mysqli_query($con,'SET character_set_connection=utf8');  
                        mysqli_query($con,'SET character_set_client=utf8');  
                        mysqli_query($con,'SET character_set_results=utf8');

                        $resultado=mysqli_query($con,"select * from tb_usuario_adm where id_usuario_adm='$_SESSION[codusuario]'");
                        if($r = mysqli_fetch_array($resultado)){
                
                            echo"
                                <div class='ui tiny image'>
                                <img src='../trivegano/usuarios/$r[5]'>
                                </div>
                                <br><br>
                                <div class='content'>
                                <div class='header'>$r[1]</div>
                                <div class='description'>
                                    <p></p>
                                </div>
                                </div>
                            ";

                        }
                        ?>           
                    </div>
                    <br><br>
                    <div class="uk-text-large">
                      <button id="btn-receitas" class="btn item active">
                            Receitas
                      </button>
                        <button id="btn-guia" class="btn item">
                            Guia
                        </button>
                        <button id="btn-clientes" class="btn item">
                            Clientes
                      </button>
                        <button id="btn-validacoes" class="btn item">
                            Validações
                        </button>
                        <button id="btn-promoções" class="btn item">
                            Promoções
                        </button>
                    </div>
            </div>
        </div>
    

<div class="uk-width-4-5@m" id="visualizar">
    <div class="uk-margin-medium-top" >
        <?php
    
    //SESSION_START();
    include "../cadastro/conexao.php";
    /* puxar o cod da receita e salvar em var */
    $codx=$_GET['txtcod'];

    //echo $codx;
    /* salvar essa var em array de session de usu campo correspondente a CODX */
    // $_SESSION['CODX']=$codx;
    /* selecionar na tab de produtos o produto correspondente ao cod */
    $comando= "SELECT * FROM `tb_receitas` WHERE `id_receitas` = '$codx';";
    $resulta = mysqli_query($con,$comando);
    /* $comando= "select * from tb_imagem_receitas;";
                $resulta = mysqli_query($con,$comando); */
                
    while ($registro = mysqli_fetch_array($resulta))
    {
            $comando="SELECT `descricao_categoria` FROM `tb_categoria` WHERE `id_categoria`='$registro[4]';";
            $categoria = mysqli_query($con,$comando);

            /* while ($row = $categoria->fetch_assoc()) {
                //echo $row['descricao_categoria']."<br>";
            } */
        if($row = mysqli_fetch_array($categoria)){
            //$row1 = $row['descricao_categoria'];
                    
            $titulo = mysqli_query($con,"SELECT * FROM `tb_imagem_receitas` WHERE `tb_receitas_id_receitas`='$codx';");
                if($row2 = mysqli_fetch_array($titulo)){
            
                echo "<div class='uk-child-width-1-2@m uk-grid-small ' uk-grid 
                style='margin-left:3%; margin-right:3%;margin-bottom:2%;'>   ";
                echo"    <div>";
                echo"       <div class ='uk-width-2xlarge'>";
                echo"       <img  widht=825 height=550 src=../$row2[1]>";
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

