


   <?php
    
    //echo"<script>console.log($_POSt)</script>";
    // if(array_key_exists('data',$_POST)){
    //     $_SESSION['coords'] = json_decode($_POST['data'],true);
    // }
    
    // $array = filter_input(INPUT_POST, 'array', FILTER_SANITIZE_SPECIAL_CHARS);
    // $array = explode(',', $array);
    //$_SESSION['coords'] = $array;

    echo $_SESSION['endereco'];

    var_dump($_COOKIE);

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
<!-- <script src="get_directions.php"></script> -->