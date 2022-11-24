<?php
                                        include('../cadastro/conexao.php');mysqli_query($con,"SET NAMES 'utf8'");  
                                  mysqli_query($con,'SET character_set_connection=utf8');  
                                  mysqli_query($con,'SET character_set_client=utf8');  
                                  mysqli_query($con,'SET character_set_results=utf8');

                                        
                                        function verificarCat($promocao,$con,$produto){
                                            if($promocao[10]!=0){

                                                
                                                    $query=mysqli_query($con,"SELECT tb_categoria_id_categoria FROM tb_produto WHERE id_produto = $produto[0]");
                                                    if($categoria = mysqli_fetch_array($query)){
                                                        if($categoria[0]==$promocao[10]){
                                                            $cat[$produto[0]]=$categoria[0];
                                                            return $cat ;
                                                        }
                                                        
                                                    }
                                                
                                            }
                                           
                                        }

                                        function desconto($promocao){
                                            if($_SESSION['valorcompra']>=$promocao[13]){

                                                

                                                if(!empty($promocao[3])){
                                                   $_SESSION['valorcompra']=$_SESSION['valorcompra'] - $promocao[3];
                                                   echo"<div>
                                                            Discount<span class='fr'>".number_format($promocao[3],2,",",".")."</span>
                                                        </div>";
                                                }
                                                elseif(!empty($promocao[9])){

                                                    $desconto=($promocao[9]*$_SESSION['valorcompra'])/100;
                                                    $_SESSION['valorcompra'] = $_SESSION['valorcompra'] - $desconto;

                                                    echo"<div>
                                                        Discount<span class='fr'>".number_format($desconto,2,",",".")."</span>
                                                    </div>";

                                                }

                                            }
                                        }
                                        

                                        if(isset($_POST['token'])){
                                            $token = $_POST['token'];
                                            $query=mysqli_query($con,"SELECT * FROM tb_promocao WHERE token_promocao = $token;");
                                            if($promocao=mysqli_fetch_array($query)){

                                                
                                                    if($promocao[13]=='valor'){

                                                        if(verificarCat($promocao,$con,$poduto)){
                                                            foreach($cat as $value){
                                                                if($value == $promocao[10]){

                                                                }
                                                            }
                                                        }
                                                        
                                                    }

                                                    if($promocao[13]=='compra'){

                                                    }
                                            }
                                        }
                                           
                                        
                                        ?>