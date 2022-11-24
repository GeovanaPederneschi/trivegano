<?php include('../cadastro/conexao.php');mysqli_query($con,"SET NAMES 'utf8'");  
                                  mysqli_query($con,'SET character_set_connection=utf8');  
                                  mysqli_query($con,'SET character_set_client=utf8');  
                                  mysqli_query($con,'SET character_set_results=utf8');
session_start();?>
<div class='ui segment' style='margin-bottom:2%;'>
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
                          <?php

                          $query=mysqli_query($con,"SELECT * FROM tb_pedido_venda WHERE (status_venda='enviada' or status_venda='acaminho' or status_venda='entregue') and tb_cliente_id_cliente=$_SESSION[codusuario]");
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
                        <?php if($pedido[6]=='acaminho'){
                            echo' <div class="steps pr active">';
                        }
                        else{
                            echo'<div class="steps pr">';
                        }?>
                        
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
                            <span><?php
                    $query=mysqli_query($con,"SELECT * FROM tb_fornecedor WHERE id_fornecedor = $pedido[11]");
                    if($fornecedor=mysqli_fetch_array($query)){
                                      
                     $apiKey = 'AIzaSyBzQCRKSKFi7AwHMynJuFb_aa4NH7l6-qM';
                 
 
                         $address = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$fornecedor[12].'&destinations='.rawurlencode($pedido[12]).'&departure_time=now&key='.$apiKey);
                         $distance = json_decode($address); //echo rawurlencode($pedido[3]);
                         if($distance->status == 'OK'  && $distance->rows[0]->elements[0]->status == 'OK'){
                            
                             $dist = $distance->rows[0]->elements[0]->duration_in_traffic->value;
                            
                         }
                    }                                       
                                                          
                             $duracao=gmdate("H:i:s", $dist); $v = explode(':', $duracao); 
                            echo date('H:i', strtotime("{$caminho} + {$v[0]} hours  {$v[1]} minutes  {$v[2]} seconds"));?></span>
                        </div>
                    </div>
                    <div class="blank"></div>
                    <div class="centerLinker">
                        <a id='modal-4'>Acompanhar Pedido</a>
                    </div>
                    <div class="ifield PD">
                     
                        
                        <button class="btn3" > <?php echo"<input type='hidden' value='$pedido[0]'>";?><span>CONFIRMAR ENTREGA</span></button>
                    </div>
                </div>
            </div>

                      <?php }
                      else{
                          ?>


                          <div class="grid-6">
                          <div class="uk-flex uk-flex-center forgotIMG" style="padding: 10%;">
                          <i class='massive icons'>
                            <i class="shopping cart icon"></i>
                            <i class="inverted corner shopping cart arrow down icon"></i>
                          </i> 
                          </div>
                          <div class="welcome-head">
                              <h3 class="uk-flex uk-flex-center">Nenhum Pedido</h3>
                              <span class="caption">Você não possui pedidos em aberto no momento!</span>
                          </div>  
                          <div class="blank"></div>
                        </div>
                              <?php
                        
                      }?>
                      
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
                            <?php $duracao=gmdate("H:i:s", $dist); $v = explode(':', $duracao); 
                            echo date('H:i', strtotime("{$caminho} + {$v[0]} hours  {$v[1]} minutes  {$v[2]} seconds"));?> <span>Hora da Entrega</span>
                        </div>
                        <div class="calls fl">
                            <img src="../icones/images/cAddress.svg" alt="">
                            <?php echo utf8_encode ($_COOKIE['endereco']);?><span>Lugar da Entrega</span>
                        </div>
                        <div class="clr"></div>
                        <div class="pdetail uk-transition-toggle">
                          
                            <img src="../icones/images/dp.svg" class="person" alt="">
                            
                            <?php $query=mysqli_query($con,"SELECT * FROM tb_pedido_venda WHERE (status_venda='enviada' or status_venda='acaminho') and tb_cliente_id_cliente=$_SESSION[codusuario]");
                            if($pedido=mysqli_fetch_array($query)){
                              $query=mysqli_query($con,"SELECT * FROM tb_fornecedor WHERE id_fornecedor=$pedido[11]");
                                if($fornecedor=mysqli_fetch_array($query)){
                                  echo"<img uk-tooltip='$fornecedor[5]' style='cursor:pointer;' src='../icones/images/callIcon.svg' class='call'>";
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
                        $('#modal-center14 .uk-modal-dialog .spacescroll .delP .delPin .pdetail .call').click(function(){
                            if ( $('.uk-notification').length == 0) { 
                            console.log('foi');
                            var  num = $('#modal-center14 .uk-modal-dialog .spacescroll .delPin .pdetail input').val();
                            navigator.clipboard.writeText(num);
                            UIkit.notification({message: '<span uk-icon=\'icon: copy\'></span> Numero de Telefone Copiado', status: 'danger',pos: 'top-right'});
                            }
                           
                        });
                        $('#conteudo ul li .ui .spacescroll .ifield .btn3').click(function(){
                            var cod = $(this).children().first().val();
                            $.ajax({url:'finalizada.php', method:'POST', data:{codi:cod}});
                            console.log(cod);
                            
                        });
                      </script>