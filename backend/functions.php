<?php
        function visualizar($cod){
            echo '<div class="uk-margin-medium-top" >';


            //SESSION_START();
            include "../cadastro/conexao.php";
            /* puxar o cod da receita e salvar em var */
            $codx=$cod;

            //echo $codx;
            /* salvar essa var em array de session de usu campo correspondente a CODX */
            // $_SESSION['CODX']=$codx;
            /* selecionar na tab de produtos o produto correspondente ao cod */
            $comando= "SELECT * FROM `tb_receitas` WHERE `id_receitas` = '$codx';";
            $resulta = mysqli_query($con,$comando);
            /* $comando= "select * from tb_imagem_receitas;";
                        $resulta = mysqli_query($con,$comando); */
                        
            while ($registro = mysqli_fetch_array($resulta))
            {
                    $comando="SELECT `descricao_categoria` FROM `tb_categoria` WHERE `id_categoria`='$registro[4]';";
                    $categoria = mysqli_query($con,$comando);

                    /* while ($row = $categoria->fetch_assoc()) {
                        //echo $row['descricao_categoria']."<br>";
                    } */
                if($row = mysqli_fetch_array($categoria)){
                    //$row1 = $row['descricao_categoria'];
                            
                    $titulo = mysqli_query($con,"SELECT * FROM `tb_imagem_receitas` WHERE `tb_receitas_id_receitas`='$codx';");
                        if($row2 = mysqli_fetch_array($titulo)){
                    
                        echo "<div class='uk-child-width-1-2@m uk-grid-small ' uk-grid 
                        style='margin-left:3%; margin-right:3%;margin-bottom:2%;'>   ";
                        echo"    <div>";
                        echo"       <div class ='uk-width-2xlarge'>";
                        echo"       <img  widht=825 height=550 src=../trivegano/receitas/$row2[1]> <br><br>";
                        echo"       </div>";
                        echo"    </div>";
                        echo"    <div class=''>";
                        echo"        <div>";
                        echo"            <h1>$registro[1]</h1>";
                        echo"        </div>";
                        echo"   	 <div class=''>";
                        echo"			    <span class='uk-label uk-text-center uk-label-danger'>";
                        echo"            		$row[0]";
                        echo"				</span>";
                        echo"			    <span class='uk-label uk-text-center uk-label-warning'>";
                        echo"            		$registro[7]";
                        echo"				</span>";
                        echo"     	 </div>";
                        echo"    </div>";
                        echo"  </div>";
                        echo" <div class='' style=margin-left:4%;margin-bottom:2%;font-size:20px;margin-right:4%;>";
                        echo"			Ingredientes: <br><br>".
                                        nl2br($registro[8]);
                            
                        echo"			<br><br> Modo de Preparo:<br><br>".
                                        nl2br($registro[2]);
                        echo"</div>";
                        
                    }
                }
            } 
            
            
            
            $close = mysqli_close($con);
          
            echo"</div>";
    }

    function editar($cod){
      echo'<div class="uk-margin-medium-top" id="conteudo">';

      include("../cadastro/conexao.php");

      $_SESSION['editarcod']=$cod;

      $query=mysqli_query($con,"SELECT * FROM `tb_receitas` WHERE `id_receitas` = '$_SESSION[editarcod]'");
      while($produto=mysqli_fetch_array($query)){
          $query=mysqli_query($con,"SELECT * FROM `tb_imagem_receitas` WHERE `tb_receitas_id_receitas`='$produto[0]';");
          if($foto=mysqli_fetch_array($query)){

          
      ?>
          
      
              <form class="ui form" name=editarReceita method="POST" action="alterar_receita.php" enctype="multipart/form-data">
                  <div class="field">
                  FOTO <input type="hidden" name="txtfoto" value = <?php echo "'$foto[1]'"; ?>><br>
                  <?php $fotox="../trivegano/receitas/"."$foto[1]"; ?>
                  Escolher nova foto <input type="file" accept="image/*" onchange="loadFile(event)" id=arq name=arq >
                  <?php
                  echo "<div class='uk-placeholder'><img id=foto  width=200 heigth=200 src="."$fotox"."></div>";
                  ?>
                  </div>
              <h4 style="font-size: 25px; color:white;" class=" ui dividing header uk-text-center ">Informações Principais</h4>
              <div class="field">
              <label style="color: white;">Titulo da Receita</label>
              <input type="text" name="titulo" value="<?php echo $produto[1];?>">
              </div>
              <div class="field">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit; color: white;">Ingredientes Receitas</font></font></label>
              <textarea type="text" name="ingredientes"> <?php echo $produto[8];?> </textarea>
              </div>
              <div class="field">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit; color: white;">Descrição</font></font></label>
              <textarea type="text" name="descricao"><?php echo$produto[2];?></textarea>
              </div>
              <div class="field">
              <label style="color: white;">Ceo da Receita</label>
              <input type="text" name="ceo" value="<?php echo $produto[5];?>">
              </div>
                  <input type="submit"  value="Editar">
                  <input type="reset" value="limpar">
              </form>
      <?php

          }
      }
      $fechar=mysqli_close($con);
      echo"</div>";
    }

    function visualizarCliente($cod){
        echo '<div class="uk-margin-medium-top" >';


        //SESSION_START();
        include "../cadastro/conexao.php";
        /* puxar o cod do clinete e salvar em var */
        $codx=$cod;

        //echo $codx;
        /* salvar essa var em array de session de usu campo correspondente a CODX */
        // $_SESSION['CODX']=$codx;
        /* selecionar na tab de produtos o produto correspondente ao cod */
        $comando= "SELECT * FROM `tb_cliente` WHERE `id_cliente` = '$codx';";
        $resulta = mysqli_query($con,$comando);
        /* $comando= "select * from tb_imagem_receitas;";
                    $resulta = mysqli_query($con,$comando); */
                    
        while ($registro = mysqli_fetch_array($resulta))
        {
               
                        
               
                    echo "<div class='uk-child-width-1-2@m uk-grid-small ' uk-grid 
                    style='margin-left:3%; margin-right:3%;margin-bottom:2%;'>   ";
                    echo"    <div>";
                    echo"       <div class ='uk-width-2xlarge'>";
                    echo"       <img  widht=825 height=550 src=../trivegano/usuarios/cliente/$registro[10]> <br><br>";
                    echo"       </div>";
                    echo"    </div>";
                    echo"    <div class=''>";
                    echo"        <div>";
                    echo"            <h1>$registro[1]</h1>";
                    echo"        </div>";
                    echo"   	 <div class=''>";
                    echo"			    <span class='uk-label uk-text-center uk-label-danger'>";
                    echo"            		LABEL";
                    echo"				</span>";
                    echo"			    <span class='uk-label uk-text-center uk-label-warning'>";
                    echo"            		LABEL";
                    echo"				</span>";
                    echo"     	 </div>";
                    echo"    </div>";
                    echo"  </div>";
                    echo" <div class='' style=margin-left:4%;margin-bottom:2%;font-size:20px;margin-right:4%;>";
                    echo"			CPF: <br><br>".
                                    $registro[3];
                        
                    echo"			<br><br><br> Telefone:<br><br>".
                                    $registro[4];
                    echo"			<br><br><br> Email:<br><br>".
                                    $registro[5];
                    echo"			<br><br><br> Data de Nascimento:<br><br>".
                                    $registro[2];
                    echo"</div>";
                    
                
            
        } 

        $close = mysqli_close($con);
      
        echo"</div>";
    }

    function visualizarProdutos($cod){
        echo '<div class="uk-margin-medium-top" >';


        //SESSION_START();
        include "../cadastro/conexao.php";
        /* puxar o cod do clinete e salvar em var */
        $codx=$cod;

        //echo $codx;
        /* salvar essa var em array de session de usu campo correspondente a CODX */
        // $_SESSION['CODX']=$codx;
        /* selecionar na tab de produtos o produto correspondente ao cod */
        $comando= "SELECT * FROM `tb_produto` WHERE `id_produto` = '$codx';";
        $resulta = mysqli_query($con,$comando);
        /* $comando= "select * from tb_imagem_receitas;";
                    $resulta = mysqli_query($con,$comando); */
                    
        while ($produto = mysqli_fetch_array($resulta))
        {
            
                        
            
                    echo "<div class='uk-child-width-1-2@m uk-grid-small ' uk-grid 
                    style='margin-left:3%; margin-right:3%;margin-bottom:2%;'>   ";
                    $query=mysqli_query($con,"SELECT `imagem_produto` FROM `tb_imagem_produto` WHERE `tb_produto_id_produto`='$produto[0]';");
                    if($foto=mysqli_fetch_array($query)){
                        echo"    <div>";
                        echo"       <div class ='uk-width-2xlarge'>";
                        echo"       <img  widht=825 height=550 src=../trivegano/produtos/$foto[0]> <br><br>";
                        echo"       </div>";
                        echo"    </div>";
                    }
                
                    echo"    <div class=''>";
                    echo"        <div>";
                    echo"            <h1>$produto[1]</h1>";
                    echo"        </div>";
                    echo"   	 <div class=''>";
                    echo"			    <span class='uk-label uk-text-center uk-label-danger'>";
                    echo"            		LABEL";
                    echo"				</span>";
                    echo"			    <span class='uk-label uk-text-center uk-label-warning'>";
                    echo"            		LABEL";
                    echo"				</span>";
                    echo"     	 </div>";
                    echo"    </div>";
                    echo"  </div>";
                    echo" <div class='' style=margin-left:4%;margin-bottom:2%;font-size:20px;margin-right:4%;>";
                    echo"			Valor: <br><br>".
                                    $produto[2];
                        
                    echo"			<br><br><br> Descrição:<br><br>".
                                    $produto[3];
                    echo"</div>";

                    $comando="SELECT * FROM `tb_produtos_adicionais` WHERE `tb_produto_id_produto`= '$codx';";
                    if($query=mysqli_query($con,$comando)){
                        echo "<div class='uk-width-1-3@m uk-grid-column-large' style='margin:2%;padding-left:6%;' ";
                    echo"<h2 class='ui center aligned icon header'>
                    <i style='font-size:30px'class='circular adjust icon'></i>
                    Adicionais
                    </h2>";
                    echo "";
                    echo"<ul  uk-accordion='multiple: true' >";
                    }
                    
                    
                    while($adicionais=mysqli_fetch_array($query)){
                        echo"
                                    <li>
                                        <a class='uk-accordion-title ' href='#'>$adicionais[1]</a>
                                        <div class='uk-accordion-content uk-grid uk-grid-large' >
                                        <div class='uk-width-1-2'>
                                        <br>
                                        <img class='ui avatar image' src='../trivegano/adicionais/$adicionais[8]'>
                                        <span>R$ $adicionais[2]</span>
                                        </div>
                                        
                                        <div class='uk-width-1-2' style='padding-left:37%;'>
                                        <br>
                                            <div style='margin-lft:2%;' class='ui toggle checkbox '>
                                            <input type='checkbox' value='$adicionais[0]' name='adicional[]'>
                                            <label></label>
                                            </div>
                                        </div>
                                        

                                        </div>
                                    </li>
                            ";
                    }

                    echo"            
                    </ul>
                    
                    </div>
                    ";
                
            
        } 
        
        
        
        $close = mysqli_close($con);
    
        echo"</div>";
    }

    function editarProdutos($cod){
        echo'<div class="uk-margin-medium-top" id="conteudo">';
  
        include("../cadastro/conexao.php");
  
        $_SESSION['editarcod']=$cod;
  
        $query=mysqli_query($con,"SELECT * FROM `tb_produto` WHERE `id_produto` = '$_SESSION[editarcod]'");
        if($produto=mysqli_fetch_array($query)){
            $query=mysqli_query($con,"SELECT * FROM `tb_imagem_produto` WHERE `tb_produto_id_produto`='$produto[0]';");
            if($foto=mysqli_fetch_array($query)){
  
            
        ?>
            
        
                <form class="ui form" name=editarReceita method="POST" action="alterar_receita.php" enctype="multipart/form-data">
                    <div class="field">
                    FOTO <input type="hidden" name="txtfoto" value = <?php echo "'$foto[1]'"; ?>><br>
                    <?php $fotox="../trivegano/produtos/"."$foto[1]"; ?>
                    Escolher nova foto <input type="file" accept="image/*" onchange="loadFile(event)" id=arq name=arq >
                    <?php
                    echo "<div class='uk-placeholder'><img id=foto  width=200 heigth=200 src="."$fotox"."></div>";
                    ?>
                    </div>
                <h4 style="font-size: 25px; color:white;" class=" ui dividing header uk-text-center ">Informações Principais</h4>
                <div class="field">
                <label style="color: white;">Nome do Produto</label>
                <input type="text" name="nome" value="<?php echo $produto[1];?>">
                </div>
                <div class="field">
                <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit; color: white;">Descrição Produto</font></font></label>
                <textarea type="text" name="ingredientes"> <?php echo $produto[3];?> </textarea>
                </div>
                    <input type="submit"  value="Editar">
                    <input type="reset" value="limpar">
                </form>
        <?php
  
            }
        }

        $fechar=mysqli_close($con);
        echo"</div>";
    }

    function visualizarUsuario($cod){

        echo '<div class="uk-margin-medium-top" >';


        //SESSION_START();
        include "../cadastro/conexao.php";
        /* puxar o cod do clinete e salvar em var */
        //$codx=$cod;

        //echo $codx;
        /* salvar essa var em array de session de usu campo correspondente a CODX */
        // $_SESSION['CODX']=$codx;
        /* selecionar na tab de produtos o produto correspondente ao cod */
        $comando= "SELECT * FROM `tb_adm_fornecedor` WHERE `id_adm_fornecedor` = '$cod';";
        $resulta = mysqli_query($con,$comando);
        /* $comando= "select * from tb_imagem_receitas;";
                    $resulta = mysqli_query($con,$comando); */
                    
        while ($registro = mysqli_fetch_array($resulta))
        {
               
                   
               
                    echo "<div class='uk-child-width-1-2@m uk-grid-small ' uk-grid 
                    style='margin-left:3%; margin-right:3%;margin-bottom:2%;'>   ";
                    echo"    <div>";
                    echo"       <div class ='uk-width-2xlarge'>";
                    echo"       <img  widht=825 height=550 src=../trivegano/usuarios/$registro[6]> <br><br>";
                    echo"       </div>";
                    echo"    </div>";
                    echo"    <div class=''>";
                    echo"        <div>";
                    echo"            <h1>".ucfirst($registro[1])."</h1>";
                    echo"        </div>";
                    echo"   	 <div class=''>";
                    echo"			    <span class='uk-label uk-text-center uk-label-danger'>";
                    echo"            		ADIMINISTRADOR";
                    echo"				</span>";
                    echo"			    <span class='uk-label uk-text-center uk-label-warning'>";
                    echo"            		FORNECEDOR";
                    echo"				</span>";
                    echo"     	 </div>";
                    echo"    </div>";
                    echo"  </div>";
                    echo" <div class='' style=margin-left:4%;margin-bottom:2%;font-size:20px;margin-right:4%;>";
                    echo"			Email: <br><br>
                            <div uk-grid>
                                    <div class='uk-widht-1-2' style='padding-top:2%;'>
                                    $registro[3]
                                    </div>
                                    <div class='uk-widht-1-2'>
                                        <button uk-toggle='target: #modal-center' style='border:none;' id='editar'  type='button'>
                                        <label for='codxv' id='editar'><i style='font-size:25px'class='circular pencil alternate icon'></i></label>
                                        </button>
                                    </div>
                            </div>       
                                    
                                    ";
                    $comando="SELECT `nome_fantasia_fornecedor`FROM `tb_fornecedor` WHERE `id_fornecedor`='$registro[5]';";
                    $query=mysqli_query($con,$comando);
                    if($fornecedor=mysqli_fetch_row($query)){
                        echo"			<br><br><br> Estabelecimento:<br><br>".
                                    $fornecedor[0];
                    }
                    
                    echo"</div>";

                    /*<form name='form2'  method='GET' action='' > 
                    if(array_key_exists('editar_email', $_GET)){
                        $cod=$_SESSION['codfornecedor'];
                        echo"
                        <script>
                        UIkit.modal('#modal-center').show();
                        console.log('lascou');
                        </script>
                        ";
                        // visualizarRestaurante($cod);
                    } */

            echo"  <div id='modal-center' class='uk-flex-top push' uk-modal>
                       
                        <div class='uk-modal-dialog uk-modal-body uk-margin-auto-vertical'>

                            <button class='uk-modal-close-default' type='button' uk-close></button>

                            <div class='uk-modal-header'>
                                <h2 class='uk-modal-title'>Editar</h2>
                            </div>
                            <form method='POST' action='back2_usuario_detalhe'>
                            <div class='uk-margin'>
                                <label class='uk-form-label' for='form-stacked-text'>Email</label>
                                <div class='uk-form-controls'>
                                    <input class='uk-input' name='email' value='$registro[3]' id='form-stacked-text' type='text' >
                                </div>
                            </div>

                            <div class='uk-modal-footer uk-text-right'>
                           
                                <button class='uk-button uk-button-default uk-modal-close' type='button'>Cancel</button>
                                <button class='uk-button uk-button-primary' id='btn-editar-submit' type='submit'>Save</button>
                            
                            </div>
                            </form>
                        </div>
                    </div>";
                    
                
            
        } 

        $close = mysqli_close($con);
      
        echo"</div>";
    
    }
?>


