<?php
include('../cadastro/conexao.php');mysqli_query($con,"SET NAMES 'utf8'");  
                                  mysqli_query($con,'SET character_set_connection=utf8');  
                                  mysqli_query($con,'SET character_set_client=utf8');  
                                  mysqli_query($con,'SET character_set_results=utf8');
session_start();
$query9=mysqli_query($con,"SELECT * FROM tb_pedido_venda WHERE (status_venda='enviada' or status_venda='acaminho') and tb_fornecedor_id_fornecedor=$_SESSION[codfornecedor];");
while($venda=mysqli_fetch_row($query9)){
    date_default_timezone_set('Brazil/East');
    $now=date('Y-m-d H:i:s');
    //echo "<br>".$teste = date('Y-m-d H:i:s', strtotime("+ 1 seconds"));
    // "<br>".$now = str_replace("/",'-',$now);
    //echo "<br>".
    $horario=date('Y-m-d H:i:s', strtotime("+1seconds", strtotime($venda[2])));
    //$horario=date('Y-m-d H:i:s', strtotime($venda[2]));
    if($horario==$now){
        echo '<audio autoplay="autoplay" loop>
        <source src="Bell01.mp3" type="audio/mp3" />
        seu navegador não suporta HTML5
        </audio>';
        //echo "sim";
    }
    //  var_dump($query9);

    echo"
        <div class='ui segment uk-transition-toggle'>
        
        <div class='ui cards uk-transition-scale-up uk-transition-opaque'>
        <div class='card' style='width: 100%;'>
        <div class='content'>
        <form method='POST' action='back2_pedido_detalhe.php' id='form2'>
        <input type='hidden' name='cod' value='$venda[0]'>
        </form>
        <div>
    ";
    
    $query6=mysqli_query($con,"SELECT * FROM tb_produto_venda WHERE tb_pedido_venda_id_venda=$venda[0]");
    while($prod_venda= mysqli_fetch_array($query6)){
        
        $query=mysqli_query($con,"SELECT * FROM tb_produto WHERE id_produto=$prod_venda[3]");
        if($produto= mysqli_fetch_array($query)){
              
                $query=mysqli_query($con,"SELECT * FROM tb_imagem_produto WHERE id_imagem_produto=$produto[0]");
                if($foto= mysqli_fetch_array($query)){
                    echo"<img class='right floated mini ui image' src='../trivegano/produtos/$foto[1]'>";
                   
                }
            
            
        }
    }
    echo"</div><div class='header'>Pedido de</div>";
    $query7=mysqli_query($con,"SELECT * FROM tb_produto_venda WHERE tb_pedido_venda_id_venda=$venda[0]");
    while($prod_venda= mysqli_fetch_array($query7)){
        $query=mysqli_query($con,"SELECT * FROM tb_produto WHERE id_produto=$prod_venda[3];");
        if($prod= mysqli_fetch_array($query)){

            $query=mysqli_query($con,"SELECT * FROM tb_item_venda WHERE tb_produto_venda_id_produto_venda=$prod_venda[0];");
            $row=mysqli_num_rows($query);

                echo"<div class='meta'>$row $prod[1]</div>";
            
        }
    }

    echo"<div class='description'>R$ ".number_format($venda[1],2,",",".");
    $query=mysqli_query($con,"SELECT * FROM tb_cliente WHERE id_cliente=$venda[9]");
    while($endereco= mysqli_fetch_array($query)){
       
    }
    echo"</div></div>";

    if($venda[6]=='enviada'){
        echo"   
          <div class='extra content'>
            <div class='ui two buttons'>
              <div class='ui basic green button'style='margin-right:1%;'>
              <input type='hidden' value='$venda[0]'>A CAMINHO</div>
              <div class='ui basic red button'>NÃO ENTREGUE</div>
            </div>
          </div>
        </div>
        </div></div>";
    }
    elseif($venda[6]=='acaminho'){
        echo"<div class='extra content'>
        <h3 class='ui header'>
        <i class='spinner loading icon'></i>
            <div class='content'>A caminho </div>
            </h3>
        </div>
        ";
    }
     

    

    
}
//echo"</div>";

$row = mysqli_num_rows($query9);
//echo $row;
if($row<1){
   ?>
        <div class="ui segment" style='cursor:auto;'>
                        <div class="grid-6" style='padding:10%;'>
                          <div class="uk-flex uk-flex-center forgotIMG" style="padding: 5%;">
                          <i class='massive icons'>
                            <i class="shopping cart icon"></i>
                            <i class="inverted corner shopping cart arrow down icon"></i>
                          </i> 
                          </div>
                          <div class="welcome-head">
                              <h3 class="uk-flex uk-flex-center">Nenhum Pedido</h3>
                              <span class="caption">Você não possui pedidos em aberto no momento!</span>
                              <span class="caption">Explore promoções e alcance mais clientes</span>
                              <div class="ifield bottomPOP">
                                <button style='cursor:pointer;' onClick="window.location.replace('http://localhost/trivegano-main/backend/back2Promocoes.php');" class="btn3"><span>PROMOÇÕES</span></button>
                            </div>
                          </div>  
                          <div class="blank"></div>
                        </div>
        </div>
            
   <?php
}

?>

<script>
   $(document).ready(function(){
         $('#conteudo ul li .ui.segment .ui.cards .card .content').click(function(){
        $(this).children().first().submit();
        //UIkit.modal('#modal-center1').show();
        });
        $('#conteudo ul li .ui.segment .ui.cards .card .extra .two .green').click(function(){
            var cod = $(this).children().first().val();
            $.ajax({url:'caminho.php', method:'POST', data:{codi:cod}});
            console.log('ae');
        })
    });
</script>



