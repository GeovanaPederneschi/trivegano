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
  
  <script src='../js/jquery-3.5.1.min.js'></script>
  
  <!-- SEMANTIC -->
  <link rel="stylesheet" type="text/css" href="../css/semantic/semantic.min.css">
  <script src="../css/semantic/semantic.min.js"></script>
  <!-----  ------->

	<link rel="stylesheet" href="../frontend/css/style.css">
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="style.css">
  <!-- AJAX API PARA PDF -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    
   
</head>
<body>

<body>
	<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script> -->

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

                        $resultado=mysqli_query($con,"SELECT * FROM tb_cliente WHERE id_cliente='$_SESSION[codusuario]';");
                        if($r = mysqli_fetch_array($resultado)){
                
                            
                            echo"
                            <form method='POST' action='back1Usuario.php'>
                            <button id='btn-clientes' type='submit' class='btn item'>
                                <div class='ui tiny image'>
                                <img src='../trivegano/usuarios/cliente/$r[10]'>
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
                      <button id="btn-clientes" class=" item active btn">
                            Pedidos
                      </button>
                      <form method="POST"  action="back1Guia.php">
                        <button id="btn-clientes" type="submit" class="btn item">
                            Suporte
                      </button>
                      </form>
                    </div>
            </div>
        </div>
    

<div class="uk-width-4-5@m">
    <div class="uk-margin-medium-top" id="conteudo">
                        
<ul style="font-size: 60px; text-decoration-color:black;" class="uk-subnav uk-subnav-pill uk-flex-center"  uk-switcher="animation: uk-animation-fade">
  <li><a href="#">ABERTOS</a></li>
  <li><a href="#">FECHADOS</a></li>
</ul>

<ul class="uk-switcher uk-margin">
    <li>

      <!-- VISUALIZAR RECEITAS -->
      <?php
      mysqli_query($con,"SET NAMES 'utf8'");  
      mysqli_query($con,'SET character_set_connection=utf8');  
      mysqli_query($con,'SET character_set_client=utf8');  
      mysqli_query($con,'SET character_set_results=utf8'); 
        //include('visualizar_receita.php')
        
      ?>



    <div class='ui segment'>
    <div class="head" style="position: relative;">
        <!-- <a href="orderList.html"><img src="../icones/images/back-black.svg" class="back" alt=""></a> -->
        <div class="text">
            Pedido Status
        </div>
        <!-- <div class="notification">
            <img src="../icones/images/notificationBell.svg" alt="">
            <span class="digit">2</span>
        </div> -->
    </div>
        <div class="spacescroll">
            <div class="orderStatus">
                <div class="oBreif">
                  <?php $query=mysqli_query($con,"SELECT * FROM tb_pedido_venda WHERE status_venda='enviada' and tb_cliente_id_cliente=$_SESSION[codusuario]");
                    if($pedido=mysqli_fetch_array($query)){
                      
                     echo"#".$pedido[0];
                      echo'<span class="caption">'.date('Y/m/d H:i', strtotime($pedido[2])).'</span>';
                  ?>
                    
                    
                </div>
                <div class="blankShort"></div>
                <div class="steps pr active">
                    <img src="../icones/images/O1.svg" class="normal" alt="">
                    <img src="../icones/images/AO1.svg" class="active" alt="">
                    Pedido Recebido
                    <span><?php echo date('H:i', strtotime($pedido[2]));?></span>
                </div>
                <div class="steps pr">
                    <img src="../icones/images/O2.svg" class="normal" alt="">
                    <img src="../icones/images/AO2.svg" class="active" alt="">
                    A caminho
                    <span><?php $duracao='00:30:00'; $v = explode(':', $duracao); 
                    echo $caminho = date('H:i', strtotime("{$pedido[2]} + {$v[0]} hours  {$v[1]} minutes  {$v[2]} seconds"));?></span>
                </div>
                <div class="steps NM">
                    <img src="../icones/images/O3.svg" class="normal" alt="">
                    <img src="../icones/images/AO3.svg" class="active" alt="">
                    Entregue
                    <span><?php $duracao=gmdate("H:i:s", $_SESSION['dist_seg']); $v = explode(':', $duracao); 
                    echo date('H:i', strtotime("{$caminho} + {$v[0]} hours  {$v[1]} minutes  {$v[2]} seconds"));?></span>
                </div>
            </div>
            <div class="blank"></div>
            <div class="centerLinker">
                <a id='modal-4'>Acompanhar Pedido</a>
            </div>
            <div class="ifield PD">
                <button class="btn3" ><span>CONFIRMAR ENTREGA</span></button>
            </div>
        </div>
    </div>

              <?php }?>
              
              <div id="modal-center14" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <div class="head">
        <!-- <a href="orderStatus.html"><img src="../icones/images/back-black.svg" class="back" alt=""></a> -->
        <div class="text">
            Acompanhar Seu Pedido
        </div>
        
    </div>


        <img src="../icones/images/mapbase.svg" class="mapbase" alt="">
        <div class="spacescroll trackingOrder">
           <div class="trackOImg">
               <img src="../icones/images/TrackingB.svg" alt="">
           </div>
           <div class="delP">
            <div class="delPin">
                <div class="calls fl">
                    <img src="../icones/images/cTime.svg" alt="">
                    <?php $duracao=gmdate("H:i:s", $_SESSION['dist_seg']); $v = explode(':', $duracao); 
                    echo date('H:i', strtotime("{$caminho} + {$v[0]} hours  {$v[1]} minutes  {$v[2]} seconds"));?> <span>Hora da Entrega</span>
                </div>
                <div class="calls fl">
                    <img src="../icones/images/cAddress.svg" alt="">
                    <?php echo utf8_encode ($_COOKIE['endereco']);?><span>Lugar da Entrega</span>
                </div>
                <div class="clr"></div>
                <div class="pdetail uk-transition-toggle">
                  
                    <img src="../icones/images/dp.svg" class="person" alt="">
                    
                    <?php $query=mysqli_query($con,"SELECT * FROM tb_pedido_venda WHERE status_venda='enviada' and tb_cliente_id_cliente=$_SESSION[codusuario]");
                    if($pedido=mysqli_fetch_array($query)){
                      $query=mysqli_query($con,"SELECT * FROM tb_fornecedor WHERE id_fornecedor=$pedido[11]");
                        if($fornecedor=mysqli_fetch_array($query)){
                          echo"<img uk-tooltip='$fornecedor[5]' style='cursor:pointer;' src='../icones/images/callIcon.svg' class='call' alt=''>";
                          echo"$fornecedor[7] <span>Estabelecimento</span>";
                          echo"<input type='hidden' value=$fornecedor[5]>";
                        }
                    }?>
                    
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<script>
                $('#conteudo ul li .ui .spacescroll .centerLinker #modal-4').click(function(){
                  UIkit.modal("#modal-center14").show();
                  console.log('FOI');
                });
                $('#modal-center14 .uk-modal-dialog .spacescroll .delPin .pdetail .call').click(function(){
                  console.log('foi');
                  var  num = $('#modal-center14 .uk-modal-dialog .spacescroll .delPin .pdetail input').val();
                  navigator.clipboard.writeText(num);
                  UIkit.notification({message: '<span uk-icon=\'icon: copy\'></span> Numero de Telefone Copiado', status: 'danger',pos: 'top-right'});
                })
              </script>
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
					<li><a href="../frontend/sobrenos.php">Visite Nossa Página</a></li>
				</ul>
			</div>

			<!-- 25% -->
			<div class="footer-col">
				<h4>Procure Ajuda</h4>
				<ul>
					<li><a href="../frontend/faq.php">FAQ</a></li>
					<li><a href="../frontend/fale.html">Fale Conosco</a></li>
				</ul>
			</div>

			<!-- 25% -->
			<div class="footer-col">
				<h4>Encontre</h4>
				<ul>
					<li><a href="../frontend/home_receitas.php">Receitas</a></li>
					<li><a href="../frontend/menu.php">Menu</a></li>
					<li><a href="../frontend/home_guia.php">Guia</a></li>
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

