<?php
include('../backend/session_start.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trivegano</title>    <link rel="icon" type="image/png" href="http://localhost/trivegano-main/trivegano/logo3.png"/>
  <link rel="stylesheet" href="style1.css">


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

  <script src='../js/jquery-3.5.1.min.js'></script>

  <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>


   <!-- SEMANTIC -->
   <link rel="stylesheet" type="text/css" href="../css/semantic/semantic.min.css">
  <script src="../css/semantic/semantic.min.js"></script>
  <!-----  ------->
	<link rel="stylesheet" href="../frontend/css/style.css">
    <link rel="stylesheet" href="style.css">

    
</head>
<style>
    #grid{
    float: left;
    width: 20%;
    background-color: #f1f1f1;
    padding-left: 20px;
    margin:0;
    }
    /* .footer{
        margin-top:80%;
    } */
    #avatar{
      margin:center;
    }
    #conteudo{
        width:80%;
    }
</style>
<body>
	<script  src="./script.js"></script>

<div id="modal-center1" uk-modal >
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical"style="margin-top: 4%!important;">

        <button class="uk-modal-close-default" type="button" uk-close></button>
        
        <div class="spacescroll" style='padding:0;'>
                        <img style="z-index: -1;" src="../icones/images/accessBase.svg" alt="" class="base">
                        <img src="../icones/images/clipart.svg" alt="" class="clipart">
                                
                                <div class="ui piled segment cart">
                                <div class="oBreif">
                                  
                                    <!-- BOTAR EM PT DEPOIS -->
                                <?php 
                                include('../cadastro/conexao.php');mysqli_query($con,"SET NAMES 'utf8'");  
                                  mysqli_query($con,'SET character_set_connection=utf8');  
                                  mysqli_query($con,'SET character_set_client=utf8');  
                                  mysqli_query($con,'SET character_set_results=utf8');
                                $query10=mysqli_query($con,"SELECT * FROM tb_pedido_venda WHERE (status_venda='enviada' or status_venda='acaminho') and 
                                    tb_fornecedor_id_fornecedor=$_SESSION[codfornecedor] and id_venda=$_POST[cod];");
                                    if($venda=mysqli_fetch_array($query10)){
                                        echo"<span class='caption'>".$horario=date('Y/m/d H:i:s', strtotime($venda[2]))."</span>";
                                        ?>
                                    <span class="status done">DETALHES PEDIDO</span>
                                    </div>

                                    <?php


                                        $query6=mysqli_query($con,"SELECT * FROM tb_produto_venda WHERE tb_pedido_venda_id_venda=$venda[0]");
                                        while($prod_venda= mysqli_fetch_array($query6)){
                                            
                                            $query11=mysqli_query($con,"SELECT * FROM tb_produto WHERE id_produto=$prod_venda[3]");
                                            if($produto= mysqli_fetch_array($query11)){
                                                
                                                $query18=mysqli_query($con,"SELECT * FROM tb_item_venda WHERE tb_produto_venda_id_produto_venda=$prod_venda[0];");
                                                while($item=mysqli_fetch_array($query18)){
                                                    
                                                    //pegando a foto do produto
                                                        $query90 = mysqli_query($con,"SELECT imagem_produto FROM tb_imagem_produto WHERE tb_produto_id_produto='$prod_venda[3]';");
                                                        if($img = mysqli_fetch_array($query90)){
                                                        echo"<div>";

                                                        echo"
                                                        <div class='cartlisting' style='padding: 30px 35px 30px 50px';>";
                                                        echo"<div class='fl'>
                                                            <div uk-grid>
                                                                <img style='padding-left:0;' src='../trivegano/produtos/$img[0]' class='dishimage' style='' alt=''>";
                                                        }

                                                            echo"
                                                                <div>  
                                                                        <div class='dishname'>$produto[1]</div>
                                                                        <div>$item[2]°</div>
                                                                </div>";

                                                                        

                                                        echo" 
                                                        </div>
                                                        </div>
                                                                
                                                        ";
                                                        
                                                        //segunda coluna
                                                        echo"
                                                        <div class=''>
                                                        <div class='fr'>
                                                            <div>";
                                                            //mostrando o nome do cliente
                                                            $comando="SELECT `nome_cliente` FROM `tb_cliente` WHERE `id_cliente`='$venda[9]';";
                                                            $query=mysqli_query($con,$comando);
                                                            if($cliente=mysqli_fetch_row($query)){
                                                                echo"    <p>$cliente[0]</p>";

                                                                        echo"
                                                            </div>";
                                                                
                                                                                    
                                                            }
                                                            //se o produto item tiver adicinais cadastrado
                                                            echo"<div style='padding-top:10px;'><span>";
                                                            $query67=mysqli_query($con,"SELECT * FROM tb_adicional_item_venda WHERE tb_item_venda_id_item_venda=$item[0]");
                                                            while($adi=mysqli_fetch_array($query67)){
                                                                        $comando="SELECT * FROM `tb_produtos_adicionais` WHERE `id_adicional`= '$adi[2]';";
                                                                        $query=mysqli_query($con,$comando);
                                                                        if($adicionais=mysqli_fetch_array($query)){
                                                                            echo"<img class='ui avatar mini image' src='../trivegano/adicionais/$adicionais[8]'>";
                                                                            
                                                                        }
                                                                        
                                                                  
                                                            }echo"</span>
                                                                </div>";

                                                        
                                                        echo"  </div>
                                                                </div>
                                                            <div class='clr'></div>
                                                        </div>";
                                                        if(!empty($item[3])){
                                                            echo" <div class='ui tall stacked segment'>
                                                        <h6 class='ui header'>
                                                        <i class='pencil icon'></i>
                                                        <div class='content'>Observação</div>
                                                        </h6>
                                                            $item[3]
                                                        </div>";
                                                        }
                                                       
                                                       echo" </div>";
                                                }
                                                
                                                
                                                
                                            }
                                        }
                                        ?> 
                                        <div class="summary">
                                        
                                        <div>
                                        <h5 class="ui header">
                                        <i class="address card outline icon"></i>
                                        <div class="content">Endereço do Pedido
                                        </div>
                                        </h5>
                                        <?php echo $venda[3];?>
                                        </div> 
                                        <div style='margin-top:2%;'>
                                            Valor Total<span class="fr">R$ <?php echo number_format($venda[1],2,",",".");?></span>
                                        </div>

                                    </div>
                                        <?php
                                        
                                    }
                                    

                                ?> 
                                    
                                    
                                
                                <?php //echo $_COOKIE['cod']?>
                                <!-- <script>Cookies.remove('cod')</script> -->
                                  


                                   
                                       
                            </div>
                           
                                
        </div>

    </div>
</div>
<?php 
    if(isset($_POST['cod'])){
        ?>
            <script>UIkit.modal('#modal-center1').show();</script>
        <?php
    }
?>

<div uk-grid>
<div class="uk-width-1-5@m">
<div class="uk-position-left ui secondary vertical pointing menu" id="grid">
            <div class="item " id="avatar">
                <?php
                include "../cadastro/conexao.php";mysqli_query($con,"SET NAMES 'utf8'");  
                                  mysqli_query($con,'SET character_set_connection=utf8');  
                                  mysqli_query($con,'SET character_set_client=utf8');  
                                  mysqli_query($con,'SET character_set_results=utf8');
                $resultado=mysqli_query($con,"select * from tb_adm_fornecedor where id_adm_fornecedor='$_SESSION[codusuario]'");
                if($r = mysqli_fetch_array($resultado)){
                
                    echo"
                    <form method='POST' action='back2Usuario.php'>
                    <button id='btn-clientes' type='submit' class='btn item'>
                         <div class='ui tiny image'>
                        <img src='../trivegano/usuarios/$r[6]'>
                        </div>
                        <br><br>
                        <div class='content'>
                        <div class='header'>".ucfirst($r[1]); 
                        echo "</div>
                        <div class='description'>
                            <p></p>
                        </div>
                        </div>
                    </button>
                    </form>
                       
                    ";

                }
                ?>
                
            </div>
            <br><br>
            <div class="uk-text-large">
                      <form method="POST" action="back2.php">
                        <button id="btn-clientes" type="submit" class="btn item">
                            Produtos
                      </button>
                      <button id="btn-clientes" class="btn item active">
                            Pedidos
                      </button>
                      </form>
                      <form method="POST"  action="back2Vendas.php">
                        <button id="btn-clientes" type="submit" class="btn item">
                            Vendas
                      </button>
                      </form>
                      <form method="POST" action="back2Clientes.php">
                        <button id="btn-clientes" type="submit" class="btn item">
                            Clientes
                      </button>
                      </form>
                      <form method="POST" action="back2Suporte.php">
                        <button id="btn-clientes" type="submit" class="btn item">
                            Suporte
                      </button>
                      </form>
                      <form method="POST" action="back2Promocoes.php">
                        <button id="btn-clientes" type="submit" class="btn item">
                            Promoções
                      </button>
                      </form>
                    </div>
    </div>
            <nav class="uk-navbar" id='menu' uk-navbar>
              <div class="uk-navbar-left">
                  <a class="uk-navbar-toggle uk-navbar-toggle-animate" uk-navbar-toggle-icon href="#"></a>
                  <div class="uk-navbar-dropdown">
                      <ul class="uk-nav uk-navbar-dropdown-nav">
                          <li style='margin:4%;'><a>
                                <form method='POST' action='back2Usuario.php'>
                                  <button id='btn-clientes' type='submit' class='btn6'>
                                <?php
                              
                              
                                  include "../cadastro/conexao.php";mysqli_query($con,"SET NAMES 'utf8'");  
                                  mysqli_query($con,'SET character_set_connection=utf8');  
                                  mysqli_query($con,'SET character_set_client=utf8');  
                                  mysqli_query($con,'SET character_set_results=utf8');

                                  $resultado=mysqli_query($con,"SELECT * FROM tb_adm_fornecedor WHERE id_adm_fornecedor='$_SESSION[codusuario]';");
                                  if($r = mysqli_fetch_array($resultado)){
                          
                                      
                                      echo"
                                      <img class='ui avatar image' src='../trivegano/usuarios/$r[6]'>
                                      <span>".ucfirst($r[1])."</span>
                                      ";

                                  }
                              ?>    
                                </button>
                                  </form>
                          </a></li>
                         
                          
                          
                          
                          <li style='margin:4%;'><a id="ativo" >
                            <form method="POST" action="back2Pedidos.php">
                            <button class="btn6">
                                    Produtos
                            </button>
                            </form>
                          </a></li>
                          
                          <li style='margin:4%;'><a >
                          <form method="POST" action="back2.php">
                            <button type='submit' class="btn6">
                                  Pedidos
                            </button>
                            </form>
                          </a></li>

                          <li style='margin:4%;'><a>
                          <form method="POST"  action="back2Vendas.php">
                                <button type="submit" class="btn6">
                                    Vendas
                            </button>
                            </form>
                           </a></li>

                           <li style='margin:4%;'><a>
                           <form method="POST" action="back2Clientes.php">
                                <button type="submit" class="btn6">
                                    Clientes
                            </button>
                            </form>
                           </a></li>

                           <li style='margin:4%;'><a>
                           <form method="POST" action="back2Suporte.php">
                                <button type="submit" class="btn6">
                                    Suporte
                            </button>
                            </form>
                           </a></li>

                           <li style='margin:4%;'><a>
                           <form method="POST" action="back2Promocoes.php">
                                <button type="submit" class="btn6">
                                    Promoções
                            </button>
                            </form>
                           </a></li>
                      </ul>
                  </div>
              </div>
            </nav>
</div>
<div class="uk-width-4-5@m" id="cont">
    <div class="uk-margin-medium-top" id="conteudo">
                        
<ul style="font-size: 60px; text-decoration-color:black;" class="uk-subnav uk-subnav-pill uk-flex-center"  uk-switcher="animation: uk-animation-fade">
  <li><a href="#">ACOMPANHAR</a></li>
  <li><a href="#">LOJA</a></li>
  
</ul>

<ul class="uk-switcher uk-margin">
    <li>

      <!-- VISUALIZAR RECEITAS -->
      <?php
      mysqli_query($con,"SET NAMES 'utf8'");  
      mysqli_query($con,'SET character_set_connection=utf8');  
      mysqli_query($con,'SET character_set_client=utf8');  
      mysqli_query($con,'SET character_set_results=utf8'); 
        include('visualizar_pedidos2.php')
      ?>
      

    </li>

    <li>
      <!-- INSERIR RECEITA -->
      <?php
        //include('inserir_receita.php')
      ?>
    </li>


    <li>
   <!--  <div class="outercube cube">
            <div class="innerCube cube">
              <div class="innerCube2 cube"></div>
            </div>
    </div> -->
        <?php
        //include('desempenho_receita.php')
        ?>
    </li>
</ul>

                    
            </div>
        </div>
</div>

<script>
  $('.ui.rating')
  .rating()
;
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
</body>

</html>