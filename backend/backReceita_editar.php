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
    
    <script>
    var loadFile = function(event) {
        var foto = document.getElementById('foto');
    foto.src = URL.createObjectURL(event.target.files[0]);
        //  Chama a função quando carregada a imagem que revoga a URL para o caminho.
        foto.onload = function() {
        URL.revokeObjectURL(foto.src)
        
        }

    };
    </script>
    <div class="uk-width-4-5@m">
    <div class="uk-margin-medium-top" id="conteudo">

        <?php
        include("../cadastro/conexao.php");

        $codx=$_GET['txtcod'];

        $query=mysqli_query($con,"SELECT * FROM `tb_receitas` WHERE `id_receitas` = '$codx'");
        while($produto=mysqli_fetch_array($query)){
            $query=mysqli_query($con,"SELECT * FROM `tb_imagem_receitas` WHERE `tb_receitas_id_receitas`='$produto[0]';");
            if($foto=mysqli_fetch_array($query)){

            
        ?>
            
         
                <form class="ui form" name=editarReceita method="POST" action="alterarReceita.php" enctype="multipart/form-data">
                    <div class="field">
                    FOTO <input type="hidden" name="txtfoto" value = <?php echo "'$foto[1]'"; ?>><br>
                    <?php $fotox="./uploads/"."$r[3]"; ?>
                    Escolher nova foto <input type="file" accept="image/*" onchange="loadFile(event)" id=arq name=arq >
                    <?php
                    echo "<div class='uk-placeholder'><img id=foto  width=200 heigth=200 src="."$fotox"."></div>";
                    ?>
                    </div>
                <h4 style="font-size: 25px;" class=" ui dividing header uk-text-center ">Informações Principais</h4>
                <div class="field">
                <label>Titulo da Receita</label>
                <input type="text" name="titulo" value="<?php echo $produto[1];?>">
                </div>
                <div class="field">
                <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ingredientes Receitas</font></font></label>
                <textarea type="text" name="ingredientes"> <?php echo $produto[8];?> </textarea>
                </div>
                <div class="field">
                <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Descrição</font></font></label>
                <textarea type="text" name="descricao"><?php echo$produto[2];?></textarea>
                </div>
                <div class="field">
                <label>Ceo da Receita</label>
                <input type="text" name="ceo" value="<?php echo $produto[5];?>">
                </div>
                    <input type="submit"  value="Editar">
                    <input type="reset" value="limpar">
                </form>
        <?php

            }
        }
        $fechar=mysqli_close($con);

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