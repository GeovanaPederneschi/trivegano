
<?php

function carrinho($cod){
    
            
    if(isset($cod)){
            if(empty($_SESSION['idcarrinho'])){
                $_SESSION['idcarrinho'] = array($cod);
                $_SESSION['carr_quant_prod']=1;
                $_SESSION['pedido']='true';

                include('../cadastro/conexao.php');
                $query= mysqli_query($con,"SELECT `nome_produto` FROM `tb_produto` WHERE `id_produto` = '$cod';");
                if($nome = mysqli_fetch_row($query)){

                    $quantidade_cod= array($nome[0] => 1);
                    $_SESSION['quant_prod_cod']= $quantidade_cod;

                }

                
                //salvando adicionais
                if(!empty($_POST['adicional'])){
                    //salva em variavel local para manipulação
                    $array=$_POST['adicional'];
                    //salva o primeiro adicional
                    $adicional= array($array[0]);
                    $c=count($_POST['adicional']);
                    //se tiver mais salve os outros adicionais
                    if($c!=1){
                        for($i=1; $i<$c; $i++){
                        array_push($adicional, $array[$i]);
                        /* salva adicionais em variavel global que tem como indice o cod do prod que diz
                        respeito*/
                        $adicional_prod= array($cod => $adicional);
                        $_SESSION['adicional']=$adicional_prod;
                        } 
                    }
                    else{
                        $adicional_prod = array($cod => $adicional);
                        $_SESSION['adicional'] = $adicional_prod;
                    }
                     
                }
            }
            elseif(!empty($_SESSION['idcarrinho'])){
                $carrinho=$_SESSION['idcarrinho'];
                    // garante que os produtos não se repitam
                    if(!in_array($cod, $carrinho)){
                        $_SESSION['carr_quant_prod']++;
                        array_push($carrinho,$cod);
                        $_SESSION['idcarrinho']=$carrinho;

                        include('../cadastro/conexao.php');
                        $query= mysqli_query($con,"SELECT `nome_produto` FROM `tb_produto` WHERE `id_produto` = '$cod';");
                        if($nome = mysqli_fetch_row($query)){

                            $array = array($nome[0] => 1);
                            $quantidade_cod = array_merge($_SESSION['quant_prod_cod'], $array);
                            $_SESSION['quant_prod_cod'] = $quantidade_cod;
                        }

                       

                        if(!empty($_POST['adicional'])){
                            $array=$_POST['adicional'];
                            $adicional= array($array[0]);
                            $c=count($_POST['adicional']);
                            for($i=1; $i<$c; $i++){
                                array_push($adicional, $array[$i]);
                                $adicional_prod= array($cod => $adicional);
                                $_SESSION['adicional']=$adicional_prod;
                            } 
                           
                        }
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
                    echo"<br><div id='prod' class='uk-card uk-card-default uk-transition-scale-up uk-transition-opaque' style='cursor:pointer;'>";
                    echo"<div class='uk-grid-large'>";
                    echo"<span>$produto[1]</span>";
                    echo"<span>$fornecedor[0]</span>";
                    ECHO"</div><br>";
                    echo"<div class='uk-grid'>";
                    
                    
                    if(!empty($_SESSION['adicional'][$produto[0]])){

                        echo"<div>$produto[4]</div><div style='margin-left: 9%;'>";
                        //var_dump($_SESSION['adicional']);
                        $comando="SELECT * FROM `tb_produtos_adicionais` WHERE `tb_produto_id_produto`= '$produto[0]';";
                        $query=mysqli_query($con,$comando);
                        while($adicionais=mysqli_fetch_array($query)){
                            echo"<span><img class='ui avatar mini image' src='../trivegano/adicionais/$adicionais[8]'></span>";
                        }
                        echo"</div>";
                        echo"
                                            <div class='unit uk-flex uk-flex-right' style='margin-left:4%;'>
                                                <form method=POST>
                                                <button name='minus[$produto[0]]' class='fl minus'>-</button>
                                                <input type='text'  value='$quantidade_cod[$name]' class='fl'>
                                                <button name='plus[$produto[0]]' type='' id='plus' class='fl plus'>+</button>
                                                </form>
                                                <div class='clr'></div>
                                            </div>
                        ";
                        //VER DEPOIS QUANDO FOREM DIFERENTES E SE O USUARIO CONSEGUE CHEGAR AQUI
                        $quant=count($_SESSION['adicional'][$produto[0]]);
                        $adicional=$_SESSION['adicional'][$produto[0]];
                        for($a=0;$a<$quant;$a++){
                            $query=mysqli_query($con,"SELECT * FROM tb_produtos_adicionais WHERE id_adicional='$adicional[$a]';");
                            if($adicionais = mysqli_fetch_array($query)){
                                //echo $adicionais[2].'<br>';
                                //$teste =  $adicionais[2]*$quantidade_cod[$name];
                                //echo $teste.'<br>';
                                //echo $quantidade_cod[$name].'<br>';
                                $_SESSION['valorcompra'] += $adicionais[2]*$quantidade_cod[$name];
                            }

                        }
                        //$_SESSION['valorcompra'] += $produto[4]*$quantidade_cod[$name];
                    }
                    else{
                        echo"<div>$produto[4]</div><div>";
                        echo"</div>";
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
                    }
                    
                
                echo"</div></div></div>";
                echo"<br><br>";
                }
                else{
                    
                    unset($carrinho[$i]);
                    $_SESSION['idcarrinho']=$carrinho;
                    $_SESSION['carr_quant_prod']--;
                    if(!empty($_POST['adicional'])){
                    $adicional=$_SESSION['adicional'];
                    unset($adicional[$produto[0]]);
                    $_SESSION['adicional']=$adicional;
                    }
                    
                }
                
            }
           
            $_SESSION['valorcompra'] += $produto[4]*$quantidade_cod[$name];

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
            <button class='botao third ' type='submit'>FINALIZAR CARRINHO</button>
            </form>

            ";
            echo"</div>";
            echo"<br>";
            //var_dump($_SESSION['idcarrinho']);
            //echo $_SESSION['carr_quant_prod'];
    
            
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


