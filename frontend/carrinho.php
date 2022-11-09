<div class="ui basic modal">
  <div class="ui icon header">
    <i class="shopping cart icon"></i>
    Choque nos registros!
  </div>
  <div class="content">
    <p>Você possui outros produtos de estabaleciomento diferente. Deseja apagar os registros?</p>
  </div>
  <div class="actions">
    <div class="ui red basic cancel inverted button">
      <i class="remove icon"></i>
      Não
    </div>
    <div class="ui blue ok inverted button">
      <i class="checkmark icon"></i>
      Sim
    </div>
  </div>
</div>

<?php

function carrinho($cod){
   
    
            
    if(isset($cod)){
            if(empty($_SESSION['idcarrinho'])){
                $_SESSION['idcarrinho'] = array($cod);
                $_SESSION['carr_quant_prod']=1;
                $_SESSION['pedido']='true';
                

                include('../cadastro/conexao.php');
                $query= mysqli_query($con,"SELECT `nome_produto`,tb_adm_fornecedor_tb_fornecedor_id_fornecedor FROM `tb_produto` WHERE `id_produto` = '$cod';");
                if($nome = mysqli_fetch_row($query)){

                    $quantidade_cod= array($nome[0] => 1);
                    $_SESSION['quant_prod_cod']= $quantidade_cod;

                    
                    $_SESSION['cod_fornecedor']=array($nome[1]);
                
                    //salvando adicionais
                    if(!empty($_POST['adicional'])){
                        //salva em variavel local para manipulação

                        $array=$_POST['adicional'][$cod];
                        //salva o primeiro adicional
                        $adicional= array($array[0]);
                        $c=count($_POST['adicional'][$cod]);
                        //se tiver mais salve os outros adicionais
                        if($c!=1){
                            for($i=1; $i<$c; $i++){
                            array_push($adicional, $array[$i]);
                            /* salva adicionais em variavel global que tem como indice o cod do prod que diz
                            respeito*/
                            $adicional_prod= array($nome[0] => $adicional);
                            
                            } $_SESSION['adicional']=$adicional_prod;
                        }
                        else{
                            $adicional_prod = array($nome[0] => $adicional);
                            $_SESSION['adicional'] = $adicional_prod;
                        }
                        
                    }
                }
            }
            elseif(!empty($_SESSION['idcarrinho'])){
               

            function fornecedor($cod){
                include('../cadastro/conexao.php');
                 $query=mysqli_query($con,"SELECT tb_adm_fornecedor_tb_fornecedor_id_fornecedor FROM tb_produto WHERE id_produto = $cod;");
                if($fornecedor=mysqli_fetch_array($query)){
                    $for=$_SESSION['cod_fornecedor'];
                    foreach($for as $value){
                        if($fornecedor[0]!=$value){
                            return false;
                        }
                        else{
                            return true;
                        }
                    }
                }
            }
               if(fornecedor($cod)){
                    // garante que os produtos não se repitam
                    $carrinho=$_SESSION['idcarrinho'];
                        if(!in_array($cod, $carrinho)){
                            $_SESSION['carr_quant_prod']++;
                            array_push($carrinho,$cod);
                            $_SESSION['idcarrinho']=$carrinho;

                            include('../cadastro/conexao.php');
                            $query= mysqli_query($con,"SELECT `nome_produto`,tb_adm_fornecedor_tb_fornecedor_id_fornecedor FROM `tb_produto` WHERE `id_produto` = '$cod';");
                            if($nome = mysqli_fetch_row($query)){

                                $array = array($nome[0] => 1);
                                $quantidade_cod = array_merge($_SESSION['quant_prod_cod'], $array);
                                $_SESSION['quant_prod_cod'] = $quantidade_cod;
                                array_push($_SESSION['cod_fornecedor'],$nome[1]);
                            }

                        

                            if(!empty($_POST['adicional'])){
                                $array=$_POST['adicional'][$cod];
                                $adicional= array($array[0]);
                                $c=count($_POST['adicional'][$cod]);
                                //echo $c;
                                if(isset($_SESSION['adicional'])){
                                    for($i=1; $i<$c; $i++){
                                        array_push($adicional, $array[$i]);
                                        $query= mysqli_query($con,"SELECT `nome_produto` FROM `tb_produto` WHERE `id_produto` = '$cod';");
                                        if($nome = mysqli_fetch_row($query)){
                                        $adicional_prod= array($nome[0] => $adicional);
                                        }
                                    
                                    } $_SESSION['adicional']=array_merge($_SESSION['adicional'],$adicional_prod);
                                }
                                else{
                                    for($i=1; $i<$c; $i++){
                                        array_push($adicional, $array[$i]);
                                        $query= mysqli_query($con,"SELECT `nome_produto` FROM `tb_produto` WHERE `id_produto` = '$cod';");
                                        if($nome = mysqli_fetch_row($query)){
                                        $adicional= array($nome[0] => $adicional);
                                        }
                                        
                                        $_SESSION['adicional']=$adicional;
                                    }
                                }
                            }
                            

                        }
               }
               else{
                include('metodoRestaurante.php');
                $_SESSION['cod']=$cod;
               }     
                    
                    
            }
    }
}



function mostrarCarrinho($con){
    
    echo"<div id='list' >";
    $_SESSION['valorcompra']=0;
    $carrinho=$_SESSION['idcarrinho'];
    //var_dump($_SESSION['adicional']);


    for($i=0;$i<count($carrinho); $i++){
        $comando="SELECT * FROM `tb_produto` WHERE `id_produto` = '$carrinho[$i]';";
        $resultado= mysqli_query($con,$comando); 
        if($produto= mysqli_fetch_array($resultado)){
            //$_SESSION['valorcompra']+= $produto[4];

            $comando="SELECT `nome_fantasia_fornecedor`FROM `tb_fornecedor` WHERE `id_fornecedor`='$produto[8]';";
            $query=mysqli_query($con,$comando);
            $quantidade_cod = $_SESSION['quant_prod_cod'];
            if($fornecedor=mysqli_fetch_row($query)){
                $name=$produto[1];
                
                if($quantidade_cod[$name] > 0){
                    include('funcoes.php');           
                    echo"<div class='uk-transition-toggle' id='mano'>";
                        echo"<br><div id='prod' class='uk-card uk-card-default uk-transition-scale-up uk-transition-opaque $carrinho[$i]' >";
                        echo"<div class='uk-grid-large'>";
                        echo"<span>$produto[1]</span>";
                        echo"<span>$fornecedor[0]</span>";
                        ECHO"</div><br>";
                    echo"<div class='uk-grid'>";
                    echo"<div>$produto[4]</div>";
                    
                   
                    if(!empty($_SESSION['adicional'][$produto[1]])){
                         echo"<div style='margin-left: 9%;'><span>";

                        
                        //VER DEPOIS QUANDO FOREM DIFERENTES E SE O USUARIO CONSEGUE CHEGAR AQUI
                        $quant=count($_SESSION['adicional'][$produto[1]]);
                        $adicional=$_SESSION['adicional'][$produto[1]];
                        for($a=0;$a<$quant;$a++){
                            
                            $comando="SELECT * FROM `tb_produtos_adicionais` WHERE `id_adicional`= '$adicional[$a]';";
                            $query=mysqli_query($con,$comando);
                            while($adicionais=mysqli_fetch_array($query)){
                                echo"<img class='ui avatar mini image' src='../trivegano/adicionais/$adicionais[8]'>";
                            }
                            
                            $query=mysqli_query($con,"SELECT * FROM tb_produtos_adicionais WHERE id_adicional='$adicional[$a]';");
                            if($adicionais = mysqli_fetch_array($query)){
                                //echo $adicionais[2].'<br>';
                                //$teste =  $adicionais[2]*$quantidade_cod[$name];
                                //echo $teste.'<br>';
                                //echo $quantidade_cod[$name].'<br>';
                                $_SESSION['valorcompra'] += $adicionais[2]*$quantidade_cod[$name];
                            }

                        }echo"</div>";
                        echo"</span>";
                        echo"
                                                <div class='unit uk-flex uk-flex-right' style='margin-left:3%;'>
                                                    <form method=POST>
                                                    <button name='minus[$produto[0]]' class='fl minus'>-</button>
                                                    <input type='text'  value='$quantidade_cod[$name]' class='fl'>
                                                    <button name='plus[$produto[0]]' type='' id='plus' class='fl plus'>+</button>
                                                    </form>
                                                    <div class='clr'></div>
                                                </div>
                                                
                        ";
                        echo"</div></div></div>";
                        $_SESSION['valorcompra'] += $produto[4]*$quantidade_cod[$name];
                        echo"<br><br>";
                    }
                    else{
                       
                        echo"
                                            <div class='unit uk-flex uk-flex-right' style='margin-left:33%;'>
                                                <form method=POST>
                                                <button name='minus[$produto[0]]' class='fl minus'>-</button>
                                                <input type='text'  value='$quantidade_cod[$name]' class='fl'>
                                                <button name='plus[$produto[0]]' type='' id='plus' class='fl plus'>+</button>
                                                </form>
                                                <div class='clr'></div>
                                            </div>
                        ";
                        $_SESSION['valorcompra'] += $produto[4]*$quantidade_cod[$name]; 
                        echo"</div></div></div>";
                        echo"<br><br>";
                    }
                    
                
                
                }
                else{
                   
                    
                    unset($carrinho[$i]);
                    $_SESSION['idcarrinho']=$carrinho;
                    $_SESSION['carr_quant_prod']--;
                    if(!empty($_POST['adicional'])){
                    $adicional=$_SESSION['adicional'];
                    unset($adicional[$produto[1]]);
                    $_SESSION['adicional']=$adicional;
                    }
                    
                }
                
            }
           
            

           echo" <form method='POST' id='editar' action='finalizar_compra.php'>
            <input type='hidden' id='cod' name='codigo' value='$produto[0]'> 
            </form>";
            
            
           
        }
        
    } 
    //var_dump($_SESSION['quant_prod_cod']);
    if($_SESSION['carr_quant_prod']>0){
         echo"R$: ".$_SESSION['valorcompra'];
        echo"
            <form class='uk-flex uk-flex-center' action='finalizar_compra.php'>
            <button class='botao third ' type='button'>CONTINUAR A COMPRA</button>
            </form>

            ";
            echo"</div>";
            echo"<br>";
            //var_dump($_SESSION['idcarrinho']);
            //var_dump( $_SESSION);
    
            
    }
    else{echo"</div>";
            echo"<br>";
        //echo"Não há produtos no carriho";
        
        //var_dump($_SESSION['idcarrinho']);
        ?>


        <div class="grid-6">
        <div class="forgotIMG">
            <img src="../icones/images/cartEmpty.svg" alt="">
        </div>
        <div class="welcome-head">
            <h3 class="uk-flex uk-flex-center">Carrrinho Vazio</h3>
            <span class="caption">Boa comida você encontra aqui! Vá em frente, peça alguma comida gostosa no menu.</span>
        </div>  
        <div class="blank"></div>
       </div>
            <?php
       
    }
    
   
           
}

?>


