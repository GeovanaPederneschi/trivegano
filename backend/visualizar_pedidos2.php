<style>
    .segment{
        cursor:pointer;
    }
</style>

<div class="pedidos" style='height:600px;'>
    <div class="ui segment" style='border:none;background-color:transparent;height:600px;'>
  <div class="ui active massive loader"></div>
 </div>
</div>


<div id="modal-center1" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        

    </div>
</div>

<script>
    var cont = setInterval(function(){
        $('#conteudo ul li .pedidos').load('selecionar_pedidos.php');
    },1500);
    

    // $('#conteudo ul li .pedidos .ui.segment .ui.cards .card .content').click(function(){
    //     var cod = $(this).children().first().val();
    //     UIkit.modal('#modal-center1').show();
    //     console.log(cod);
    // })
</script>

