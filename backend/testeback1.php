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
</head>
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
        margin-top:5px;
    }
    #avatar{
      margin:center;
    }
    #conteudo{
        width:80%;
        margin-left:10%;
    }
    #btn{
      width: 100%;
    }
</style>
<body>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

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
                      <button id="btn" class="item active">
                            Receitas
                      </button>
                        <button id="btn" class="item">
                            Guia
                        </button>
                        <button id="btn" class="item">
                            Clientes
                      </button>
                        <button id="btn" class="item">
                            Validações
                        </button>
                        <button id="btn" class="item">
                            Promoções
                        </button>
                    </div>
            </div>
        </div>

        <div class="uk-width-4-5@m">
            <div class="uk-margin-medium-top " id="conteudo">
                 <form method="POST">       
                    <div class="ui pointing menu">
                     
                      <a class="item active">
                        Cadastradas
                      </a>
                      <a class="item">
                        Inserir
                      </a>
                      <a class="item">
                        Desempenho
                      </a>
                    
                      <div class="right menu">
                        <div class="item">
                          <div class="ui transparent icon input">
                            
                            <input type="search" placeholder="Search..." name="search" autofocus>
                            <i class="search link icon"></i>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    </form>
                    <div class="ui segment">
                    <p>
                    <!-- VISUALIZAR RECEITAS -->
                      <table class="ui celled padded table">
                          <thead>
                            <tr><th class="single line">Imagem</th>
                            <th>Titulo</th>
                            <th>Efficacy</th>
                            <th>Data</th>
                            <th> Ver mais </th>
                            <th> Editar </th>
                            <th> Deletar </th>
                          </tr></thead>
                          <tbody>
                          <?php

                          $comando=mysqli_query($con,"select * from tb_receitas;");
                          $i=0;

                          while($receita = mysqli_fetch_array($comando))
                          {
                            
                              if($i<10){
                                          /* echo "<form name=fox action=backReceita_detalhe.php  method=POST >";
                                          echo"<button type=subbmit name=bot2  style='border: none;'"; */

                                          /* $comando=mysqli_query($con,"SELECT * FROM `tb_imagem_receitas` WHERE `tb_receitas_id_receitas`= $receita[0];");
                                          if ($foto= mysqli_fetch_array($comando)){ */
                                            echo"
                                              <tr>
                                              <td>
                                                <h2 class='ui center aligned header'><img src='../'></h2>
                                              </td>";
                                          
                                              echo"
                                              <td class='single line'>
                                                $receita[1]
                                              </td>
                                              <td>
                                                <div class='ui star rating' data-rating='3' data-max-rating='3'></div>
                                              </td>
                                              <td class='right aligned'>
                                                $receita[6]
                                              </td>
                                              <td>
                                              <form name='fox' action='backReceita_detalhe.php'  method='POST'>
                                                <input name='txtcod' id='codx'  type='hidden' 
                                                 value='<?php echo $receita[0];?>' >

                                                <input type='image' src='deletar.png' 
                                                    onClick='this.form.submit()'>
                                              </form>
                                              </td>
                                              <td>
                                              <form name='fox' action='backReceita_editar.php'  method='POST'>
                                                <input name='txtcod' id='codx'  type='hidden' 
                                                 value='<?php echo $receita[0];?>' >

                                                <input type='image' src='editar.png' 
                                                    onClick='this.form.submit()'>
                                              </form>
                                              </td>
                                              <td>
                                              <form name='fox' action='backReceita_deletar.php'  method='POST'>
                                                <input name='txtcod' id='codx'  type='hidden' 
                                                 value='<?php echo $receita[0];?>' >

                                                <input type='image' src='deletar.png' 
                                                    onClick='this.form.submit()'>
                                              </form>
                                              </td>

                                            </tr>";
                                            /*echo"</button>";
                                            echo"</form>"; */
                                            $i++;
                                                
                              }
                              else{
                                echo" </tbody>";
                              
                              }
                                      
                                          
                          } 
               
                            $close = mysqli_close($con);

                          ?>
                        
                         
                            

                        
       
                          <tfoot>
                            <tr><th colspan="5">
                              <div class="ui right floated pagination menu">
                                <a class="icon item">
                                  <i class="left chevron icon"></i>
                                </a>
                                <a class="item">1</a>
                                <a class="item">2</a>
                                <a class="item">3</a>
                                <a class="item">4</a>
                                <a class="icon item">
                                  <i class="right chevron icon"></i>
                                </a>
                              </div>
                            </th>
                          </tr></tfoot>
                        </table>
                    </div>
                    </p>

                    <p id="inserir" style="display:none;" >
                    alla
                    </p>
            </div>
        </div>
</div>



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