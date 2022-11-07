<style>
    .segment{
        cursor:pointer;
    }
</style>
<?php

$query=mysqli_query($con,"SELECT * FROM tb_pedido_venda WHERE status_venda='enviada' and tb_fornecedor_id_fornecedor=$_SESSION[codfornecedor];");
if($venda=mysqli_fetch_array($query)){

    echo"
        <div class='ui segment uk-transition-toggle'>
        
        <div class='ui cards uk-transition-scale-up uk-transition-opaque'>
        <div class='card' style='width: 100%;'>
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

    echo"<div class='description'>R$ ".number_format($venda[1],2,",",".");
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
        </div>";

    
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
            
          