<script>
    $('.uk-navbar-container .uk-navbar-left .uk-navbar-item #offcanvas-flip .uk-offcanvas-bar .ui.basic.modal')
    .modal({
        closable  : false,
        onDeny    : function(){
            $('.uk-navbar-container .uk-navbar-left .uk-navbar-item #offcanvas-flip .uk-offcanvas-bar .ui.basic.modal').hide();
            
                      
        },
        onApprove : function() {
           $.ajax({
            url:'mata.php'
           }).done(function(){
            console.log('foi');
            document.querySelector('.uk-navbar-container .uk-navbar-left .uk-navbar-item #offcanvas-flip .uk-offcanvas-bar #list').innerHTML = '<div class="grid-6"<div class="forgotIMG"><img src="../icones/images/cartEmpty.svg" alt=""></div><div class="welcome-head"><h3 class="uk-flex uk-flex-center">Carrrinho Vazio</h3><span class="caption">Boa comida você encontra aqui! Vá em frente, peça alguma comida gostosa no menu.</span></div><div class="blank"></div></div>';
           });
        }
        })
        .modal('show');
                    
</script>
