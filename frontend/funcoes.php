<?php 
  
        
        
        if(isset($_POST['plus'])){
            $postBtn=$_POST['plus'];
           

            if(isset($postBtn[$produto[0]])){
                $quantidade_cod=$_SESSION['quant_prod_cod'];
                $array= array($produto[1] => $quantidade_cod[$name]+1);
                $quantidade_cod = array_replace($_SESSION['quant_prod_cod'], $array);
                $_SESSION['quant_prod_cod']= $quantidade_cod;
                $quantidade_cod = $_SESSION['quant_prod_cod'];
                echo"
                <script>
                UIkit.offcanvas('.flip').show();
                </script>
                "; 
                
                
            }

        }

        
 

        if(isset($_POST['minus'])){
            $postBtn=$_POST['minus'];

            if(isset($postBtn[$produto[0]])){
                $quantidade_cod=$_SESSION['quant_prod_cod'];
                $array= array($produto[1] => $quantidade_cod[$name]-1);
                $quantidade_cod = array_replace($_SESSION['quant_prod_cod'], $array);
                $_SESSION['quant_prod_cod']= $quantidade_cod;
                $quantidade_cod = $_SESSION['quant_prod_cod'];
                echo"
                <script>
                UIkit.offcanvas('.flip').show();
                </script>
                ";
                
            }

        }

       /*  if(array_key_exists('value',$_POST)){
            $postBtn=$_POST['value'];

            if(isset($postBtn[$produto[0]])){
                $quantidade_cod=$_SESSION['quant_prod_cod'];
                $array= array($produto[1] => intval($postBtn[$produto[0]]));
                $quantidade_cod = array_replace($_SESSION['quant_prod_cod'], $array);
                $_SESSION['quant_prod_cod']= $quantidade_cod;
                $quantidade_cod = $_SESSION['quant_prod_cod'];
            }

        }  */
        
 
?>