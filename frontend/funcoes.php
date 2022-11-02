<html>
    
</html>


<?php 
  
        
        
        if(isset($_POST['plus'])){
            $postBtn=$_POST['plus'];
           

            if(isset($postBtn[$produto[0]])){
                $quantidade_cod=$_SESSION['quant_prod_cod'];
                $array= array($produto[1] => $quantidade_cod[$name]+1);
                $quantidade_cod = array_replace($_SESSION['quant_prod_cod'], $array);
                $_SESSION['quant_prod_cod']= $quantidade_cod;
                $quantidade_cod = $_SESSION['quant_prod_cod'];
                //verifica se o produto tem adicional cadastrado
                if(isset($_SESSION['adicional'][$produto[0]])){
                    $adicional=$_SESSION['adicional'];
                    //laço de repetição para cada quantidade
                    for($z=1;$z<=$quantidade_cod[$name];$z++){
                        //no primeiro laço recebe 
                    
                        if($z==1){
                            
                            $_SESSION['ras']=array($adicional[$produto[0]]);
                        }
                        else{
                            $result=array_merge($_SESSION['ras'],array($z=>$adicional[$produto[0]]));
                            $_SESSION['ras']=$result;
                        }
                        
                    }
                        //var_dump($_SESSION['ras']);
                         $adicional_quant = array($name => $_SESSION['ras']);
                         $_SESSION['adicional_quant'] = $adicional_quant;
                         unset($_SESSION["ras"]);
                }
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