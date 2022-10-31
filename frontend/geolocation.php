<script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>


   <?php
  
    if(isset($_SESSION['codusuario'])){
       echo"<script>console.log('logado');</script>";
       echo"<script>$('#message').css('display','none');</script>";
       ?>
       <script>
        $('.uk-light .uk-slider-items #enter')
        .on('click', function(){this.form.submit();})
     </script>
       <?php
    }
    else{
        if(isset($_COOKIE['latitude'])&&isset($_COOKIE['longitude']))
        {
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
              <script src='js/geolocation.js'></script>";
             
            ?>
            <script>
            $('.uk-light .uk-slider-items  #enter').on('click', function(){
                UIkit.modal('#modal-center2').show();
                 getLocation();
            })
            /* $('#modal-center5 .grid-3 .signupstag .a_modal').on('click', function(){
                UIkit.modal('#modal-center2').show();
                 getLocation();
            }) */
            </script><?php
            
        }
    }
  ?> 
