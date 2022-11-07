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
                if(isset($_SESSION['adicional'][$produto[1]])){
                    $adicional=$_SESSION['adicional'][$produto[1]];
                    //laço de repetição para cada quantidade
                    for($z=1;$z<=$quantidade_cod[$name];$z++){
                        //no primeiro laço recebe 
                    
                        
                            if($z==1){
                            
                                //$_SESSION['ras']=array($adicional[$produto[0]]);
                                $nome=$name.$z;
                                $_SESSION['adicional'.$produto[0]]=array($nome=>$adicional);
                            }
                            else{
                                $nome=$name.$z;
                                $result=array_merge($_SESSION['adicional'.$produto[0]],array($nome=>$adicional));
                                $_SESSION['adicional'.$produto[0]]=$result;
                            }
                       /*  }
                        else{

                            $nome=$name.$z;
                            $result=array_merge($_SESSION['adicional_quant'],array($nome=>$adicional));
                            $_SESSION['adicional_quant']=$result;

                        }  */


                       /*  if($z==1 && !isset($_SESSION['adicional_item'])){
                            
                            //$_SESSION['ras']=array($adicional[$produto[0]]);
                            $nome=$name.$z;
                            $name_=str_replace(" ","",$name);
                            $result=array($nome=>$adicional);

                            $_SESSION['adicional_quant']=array($name_=>$result);
                        }
                        else{
                            $nome=$name.$z;
                            $name_=str_replace(" ","",$name);
                            

                            if(!isset($_SESSION['adicional_item'][$name])){
                                
                                $result=array_merge($_SESSION['adicional_quant'],array($name_=>array($nome=>$adicional)));
                                $_SESSION['adicional_quant']=$result;
                            }
                            else{
                                $result=array_merge($_SESSION['adicional_quant'],array($name=>array($nome=>$adicional)));
                                echo $result;
                                $_SESSION['adicional_quant']=$result;
                            }
                            
                            
                        } */
                            
                        
                    }
                        
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