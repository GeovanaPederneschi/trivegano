<style>
    .segment{
        cursor:pointer;
    }
</style>
<?php

$query9=mysqli_query($con,"SELECT * FROM tb_pedido_venda WHERE status_venda='enviada' and tb_fornecedor_id_fornecedor=$_SESSION[codfornecedor];");
while($venda=mysqli_fetch_row($query9)){
    //  var_dump($query9);

    echo"
        <div class='ui segment uk-transition-toggle' style='padding:2%;'>
        
        <div class='ui cards uk-transition-scale-up uk-transition-opaque'>
        <div class='card' style='width: 100%; padding:1%;'>
        <div class='content'>
        <input type='hidden' value='$venda[0]'>
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

    echo"<div class='description' style='padding:1%;'>R$ ".number_format($venda[1],2,",",".");
    $query=mysqli_query($con,"SELECT * FROM tb_cliente WHERE id_cliente=$venda[9]");
    while($endereco= mysqli_fetch_array($query)){
       
    }
    echo"</div>";

     echo"   </div>
          <div class='extra content'>
            <div class='ui two buttons'>
              <div class='ui basic green button'style='margin-right:1%;'>A CAMINHO</div>
              <div class='ui basic red button'>NÃO ENTREGUE</div>
            </div>
          </div>
        </div>
        </div></div>";

    
}
//echo"</div>";

$row = mysqli_num_rows($query9);
//echo $row;
if($row<1){
   ?>
        <div class="ui segment">
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
        </div>
            
   <?php
}

?>

<div id="modal-center1" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        

    </div>
</div>

<script>
    $('#conteudo ul li .ui.segment .ui.cards .card .content').click(function(){
        var cod = $(this).children().first().val();
        UIkit.modal('#modal-center1').show();
        console.log(cod);
    })
</script>
            
          