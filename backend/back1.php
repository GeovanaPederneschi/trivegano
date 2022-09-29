<?php
include_once('session_start.php');
?>
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
    height: 120%;
    background-color: #f1f1f1;
    padding-left: 20px;
    margin:0;
    
    }
    .footer{
        margin-top:3px;
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
    .uk-placeholder{
      width: 500px;
      height: 300px;
      padding-left: 30%;
    }
    .cube{
      position: relative;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%) rotate(0deg);
      animation: anim 2s infinite ease-out;
      box-shadow: 0 1px rgba(0, 0, 0, 0.12), 0 2px 2px rgba(0, 0, 0, 0.12), 0 4px 4px rgba(0, 0, 0, 0.12),
      0 8px 8px rgba(0, 0, 0, 0.12), 0 16px 16px rgba(0, 0, 0, 0.12);
    }
    .outercube{
      width: 20vw;
      height: 20vw;
      background-color: #9B87FE;
    }
    .innerCube{
      width: 10vw;
      height: 10vw;
      background-color: #C2BEDB;
    }
    .innerCube2{
      width: 5vw;
      height: 5vw;
      background-color: #FFB870;
    }
    @keyframes anim {
      0%{
        transform: translate(-50%,-50%) rotate(0deg);
      }
      100%{
        transform: translate(-50%,-50%) rotate(98deg);
      }
    }
    
    
</style>
<body>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>
  <script>
    $(document).ready(function(){



    })
    
  </script>
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
<div id="offcanvas-push" uk-offcanvas=" mode:push; overlay: true">
    <div class="uk-offcanvas-bar uk-width-2-5">

        <button class="uk-offcanvas-close" type="button" uk-close></button>

        <?php

        function visualizar($cod){
                echo '<div class="uk-margin-medium-top" >';
        
    
                //SESSION_START();
                include "../cadastro/conexao.php";
                /* puxar o cod da receita e salvar em var */
                $codx=$cod;

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
                            echo"       <img  widht=825 height=550 src=../$row2[1]> <br><br>";
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
                            echo"$cod";
                        }
                    }
                } 
                
                
                
                $close = mysqli_close($con);
              
                echo"</div>";
        }

        function editar($cod){
          echo'<div class="uk-margin-medium-top" id="conteudo">';

          include("../cadastro/conexao.php");

          $codx=$cod;

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
          echo"</div>";
        }
          
          if(array_key_exists('visualizar', $_POST)){
            visualizar($_POST['visualizar']);
          }
          if(array_key_exists('editar', $_POST)){
            editar($_POST['editar']);
          }
        /* $_POST['visualizar']=0;
        $_POST['editar']=0; */
        ?>

    </div>
</div>

<div uk-grid>
        <div class="uk-width-1-5@m">
            <div class="uk-position-left ui secondary vertical pointing menu" id="grid">
                    <div class="item " id="avatar">
                        <?php
                        //require "cadastro/doLogin.php";
                        
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
    

<div class="uk-width-4-5@m">
    <div class="uk-margin-medium-top" id="conteudo">
                        
<ul style="font-size: 60px; text-decoration-color:black;" class="uk-subnav uk-subnav-pill uk-flex-center"  uk-switcher="animation: uk-animation-fade">
  <li><a href="#">VISUALIZAR</a></li>
  <li><a href="#">INSERIR</a></li>
  <li><a href="#">DESEMPENHO</a></li>
</ul>

<ul class="uk-switcher uk-margin">
    <li>
   

      <!-- VISUALIZAR RECEITAS -->

      <div class="ui pointing menu">
                     <div class="right menu">
                       <div class="item">
                         <div class="ui transparent icon input">
                           
                           <input type="search" placeholder="Search..." name="search" autofocus>
                           <i class="search link icon"></i>
                           
                         </div>
                       </div>
                     </div>
      </div> 
      <table class="ui celled padded table" id="visualizarLista">
                            <thead>
                              <tr>
                              <th>Titulo</th>
                              <th>Efficacy</th>
                              <th>Data</th>
                              <th> Ver mais </th>
                              <th> Editar </th>
                              <th> Deletar </th>
                            </tr></thead>
                            <tbody>
                            
                            <?php
                            /* $comando=mysqli_query($con,"SELECT * FROM `tb_imagem_receitas` WHERE `tb_receitas_id_receitas`= $receita[0];");
                                            if ($foto= mysqli_fetch_array($comando)){ */
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
                                                <tr>";
                                                
                                            
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
                                                <form name='fox' method='POST' uk-toggle='target: #offcanvas-push'>
                                                  <input name='visualizar' id='codx'  type='hidden'
                                                  value='$receita[0];' >

                                                  <button id=btn2 type='button' name='visualizar' style='border:none; ' 
                                                      > <i class='big circular external alternate icon'></i></button>
                                                </form>
                                                </td>
                                                <td>
                                                <form name='fox'  method='POST' uk-toggle='target: #offcanvas-push'>
                                                  <input name='editar' id='codx'  type='hidden' 
                                                  value='$receita[0]' >

                                                  <button type='button' name='editar' style='border:none;'
                                                      ><i class=' big circular pencil alternate icon'></i></button>
                                                </form>
                                                </td>
                                                <td>
                                                <form name='fox' action='backReceita_deletar.php'  method='POST'>
                                                  <input name='txtcod' id='codx'  type='hidden' 
                                                  value='$receita[0]' >

                                                  <button type='button' style='border:none;' 
                                                      onClick='this.form.submit()'> <i class='big circular trash alternate icon'></i> </button>
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
    
        
    </li>

    <li>
      <!-- INSERIR RECEITA -->
      
      <form class="ui form" method="POST" action="inserirReceita.php" enctype="multipart/form-data">
      <div class="two fields">
        <div class="field">
        <div class="image"><img src="../trivegano/onboard1.svg" alt="" class="img"></div>

        </div>
        <div class="field">
          FOTO <input type="file" accept="image/*" onchange="loadFile(event)" id='arq' name='arq'>
        <div class="uk-placeholder"><img  id="foto" width=200 heigth=200/></div>
        </div>
      </div>
        <h4 style="font-size: 25px;" class=" ui dividing header uk-text-center ">Informações Principais</h4>
        <div class="field">
          <label>Titulo da Receita</label>
          <input type="text" name="titulo" placeholder="Digite um titulo objetivo">
        </div>
        <div class="field">
          <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ingredientes Receitas</font></font></label>
          <!-- <input name="ingredientes"> -->
          <textarea type="text" name="ingredientes" placeholder="Liste todos os ingredientes" ></textarea>
        </div>
        <div class="field">
          <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Descrição</font></font></label>
          <textarea type="text" name="descricao" placeholder="Digite o modo de preparo" ></textarea>
        </div>
        <h4 style="font-size: 25px;" class=" ui dividing header uk-text-center ">Informações Adicionais</h4>
        <div class="two fields">
          <div class="field">
              <label>Categoria da Receita</label>
            
              <select name="cat" class="ui fluid dropdown">
                <option value="">Selecione</option>
            <option  value="1">Doce</option>
            <option  value="2">Salgado</option>
              </select>
          </div>
          <div class="field">
              <label>Dieta da Receita</label>
              <select name="dieta" class="ui fluid dropdown">
                <option  value="">Selecione</option>
            <option  value="vegan">Vegana</option>
            <option  value="ovolac">Ovolactogevetariana</option>
              </select>
          </div>
        </div>
        <div class="field">
          <label>Ceo da Receita</label>
          <input type="text" name="ceo" placeholder="#ramo;#ramo2">
        </div>
        <button class="uk-button uk-button-secondary uk-width-1-1" name="submit" type="submit">Submit</button>
      </form>            
    </li>


    <li>Bazinga!</li>
</ul>

                    
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
					<li><a href="../sobrenos.html">Visite Nossa Página</a></li>
				</ul>
			</div>

			<!-- 25% -->
			<div class="footer-col">
				<h4>Procure Ajuda</h4>
				<ul>
					<li><a href="../faq.html">FAQ</a></li>
					<li><a href="../fale.html">Fale Conosco</a></li>
				</ul>
			</div>

			<!-- 25% -->
			<div class="footer-col">
				<h4>Encontre</h4>
				<ul>
					<li><a href="../home_receitas.php">Receitas</a></li>
					<li><a href="../menu.php">Menu</a></li>
					<li><a href="../guia.html">Guia</a></li>
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

