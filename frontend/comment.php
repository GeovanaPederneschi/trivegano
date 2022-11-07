<?php
    if(isset($_SESSION['codusuario'])){
       echo"<script>console.log('logado');</script>";
       ?>
       <script>
        $('.uk-light .uk-slider-items #enter').on('click', function(){
            $('.iu.comments #form1').submit(function(e){
                e.prevenntDefault();
                console.log('FOI');
            });
        });
     </script>
       <?php
    }
    else{
        
        ?>
            <script>
            $('.uk-light .uk-slider-items #enter').on('click', function(){
                    //this.form.submit();
                    console.log('EAAAI')
            })
            </script>
        <?php
        
        
    }
  ?> 