


   <?php
    
    //echo"<script>console.log($_POSt)</script>";
    $_SESSION['coords'] = json_decode($_POST['data'],true);

    var_dump($_SESSION);

    if(isset($_SESSION['codusuario'])){
       echo"<script>console.log('logado');</script>";
       echo"<script>$('#message').css('display','none');</script>";
       ?>
       <script>$('.uk-light .uk-slider-items #enter')
        .on('click', function(){this.form.submit();})
     </script>
       <?php
    }
    else{
        if(isset($_SESSION['latitude']) && isset($_SESSION['longitude'])){
        ?>
            <script>
            $('.uk-light .uk-slider-items #enter').on('click', function(){
                    this.form.submit();
                    console.log('EAAAI')
            })
            </script>
        <?php
        }
        else{
            echo"
            <script src='js/geolocation.js'></script>
            <script>
            $('.uk-light .uk-slider-items #enter').on('click', function(){
                UIkit.modal('#modal-center2').show()
                getLocation();
            })
            </script>";
        }
    }
    

   
  ?> 