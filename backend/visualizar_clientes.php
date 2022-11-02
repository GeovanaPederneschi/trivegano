<div class="ui pointing menu">
  <div class="right menu">
    <div class="item">
      <div class="ui transparent icon input">
        
        <input type="search" placeholder="Search..." name="search" autofocus>
        <i class="search link icon"></i>
        
      </div>
    </div>
  </div>
</div> 
      <table class="ui celled padded table" id="visualizarLista">
        <thead>
          <tr>
          <th>Nome</th>
          <th> Ver mais </th>
          <th> Editar </th>
        </tr></thead>
        <tbody>
        
        <?php
       
          mysqli_query($con,"SET NAMES 'utf8'");  
          mysqli_query($con,'SET character_set_connection=utf8');  
          mysqli_query($con,'SET character_set_client=utf8');  
          mysqli_query($con,'SET character_set_results=utf8');
          $total_reg = "10";
          if(isset($_GET['pagina'])){
              $pagina=$_GET['pagina'];
              $pc = $pagina;
          }
          elseif (!isset($_GET['pagina'])) {
          $pc = "1";
          }
          $inicio = $pc - 1;
          $inicio = $inicio * $total_reg;
          $busca="select * from tb_cliente";
          $limite = mysqli_query($con,"$busca LIMIT $inicio,$total_reg"); 
          $comando=mysqli_query($con,"select * from tb_cliente;");
          

          $tr = mysqli_num_rows($comando); 
          //echo$tr;
          // verifica o número total de registros
          $tp = $tr / $total_reg; // verifica o número total de páginas
          //echo $tp;
          //echo$tr;
          // verifica o número total de registros
          $tp = $tr / $total_reg; // verifica o número total de páginas

          //ADICIONAR UM NO NUM DE PAG CASO RESGISTROS NÃO COMPLENTEM UMA PAG TODA
          $resto= fmod($tr,$total_reg);
          
          if(!empty($resto)){
            $tp=intval($tp)+1;
          }
          

          while($cliente = mysqli_fetch_array($limite))
          {
            
           
                /* echo "<form name=fox action=backReceita_detalhe.php  method=POST >";
                echo"<button type=subbmit name=bot2  style='border: none;'"; */

                /* $comando=mysqli_query($con,"SELECT * FROM `tb_imagem_receitas` WHERE `tb_receitas_id_receitas`= $receita[0];");
                if ($foto= mysqli_fetch_array($comando)){ */
                  echo"
                    <tr>";
                    
                
                    echo"
                    <td class='single line'>
                      $cliente[1]
                    </td>

                    <td>
                    <form name='form1' action='cliente_detalhe.php' method='GET'>
                    <button style='border:none;' name='visualizar' id='visualizar'  type='submit' 
                      value='$cliente[0]'>
                      <label for='codxv' id='visualizar'><i class='big circular external alternate icon'></i></label>
                    </button>
                    </form>
                    </td>

                    <td>
                    <form name='form2'  method='GET' action='cliente_detalhe.php' >
                        <button name='editar' style='border:none;' id='editar'  type='submit' 
                        value='$cliente[0]'>
                          <label for='codxv' id='editar'><i class='big circular pencil alternate icon'></i></label>
                        </button>
                    </form>
                    </td>
                   

                  </tr>";
                  /*echo"</button>";
                  echo"</form>"; */
                  
           
                                        
               echo" </tbody>";                             
         } 
                
           $close = mysqli_close($con);

        ?>
                          
                          
                    <?php

                    // agora vamos criar os botões "Anterior e próximo"
                    $anterior = $pc -1;
                    $proximo = $pc +1;
                    ?>                     
                          <tfoot>
                            <tr><th colspan="10">
                              <div class="ui right floated pagination menu">
                                <?php
                                
                                if ($pc>1) {
                                  echo " <a class='icon item' href='?pagina=$anterior'>
                                  <i class='left chevron icon'></i>
                                        </a>";
                                }
                                if($tp>1 && $tp!=1){
                                  for($p=1;$p<=$tp;$p++){
                                    
                                      echo"<a class='item active' style='' href='?pagina=$p'>$p</a>";
                                    
                                  }
                                }
                                
                                if ($pc!=$tp) {
                                  echo " <a class='icon item' href='?pagina=$proximo'>
                                  <i class='right chevron icon'></i>
                                        </a>";
                                  }

                                ?>
                                
                              </div>
                            </th>
                          </tr></tfoot>
      </table>