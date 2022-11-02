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
          <th>Titulo</th>
          <th>Efficacy</th>
          <th>Data</th>
          <th> Ver mais </th>
          <th> Editar </th>
          <th> Deletar </th>
        </tr></thead>
        <tbody>
        
        <?php
       
          mysqli_query($con,"SET NAMES 'utf8'");  
          mysqli_query($con,'SET character_set_connection=utf8');  
          mysqli_query($con,'SET character_set_client=utf8');  
          mysqli_query($con,'SET character_set_results=utf8'); 
          //$comando=mysqli_query($con,"select * from tb_receitas;");
          $busca="select * from tb_receitas";
          $total_reg = "8";
          if(isset($_GET['pagina'])){
              $pagina=$_GET['pagina'];
              $pc = $pagina;
          }
          elseif (!isset($_GET['pagina'])) {
          $pc = "1";
          }
          $inicio = $pc - 1;
          $inicio = $inicio * $total_reg;

          $limite = mysqli_query($con,"$busca LIMIT $inicio,$total_reg");
          $todos = mysqli_query($con,$busca);

          $tr = mysqli_num_rows($todos);
          
          //echo$tr;
          // verifica o número total de registros
          $tp = $tr / $total_reg; // verifica o número total de páginas

          //ADICIONAR UM NO NUM DE PAG CASO RESGISTROS NÃO COMPLENTEM UMA PAG TODA
          $resto= fmod($tr,$total_reg);
          
          if(!empty($resto)){
            $tp=intval($tp)+1;
          }
          //echo $pc;
          //echo $tp;
          //echo $tr;
          while($receita = mysqli_fetch_array($limite))
          {
            
            
                /* echo "<form name=fox action=backReceita_detalhe.php  method=POST >";
                echo"<button type=subbmit name=bot2  style='border: none;'"; */

                /* $comando=mysqli_query($con,"SELECT * FROM `tb_imagem_receitas` WHERE `tb_receitas_id_receitas`= $receita[0];");
                if ($foto= mysqli_fetch_array($comando)){ */
                  echo"
                    <tr>";
                    
                
                    echo"
                    <td class='single line'>
                      $receita[1]
                    </td>
                    <td>
                      <div class='ui star rating' data-rating='3' data-max-rating='3'></div>
                    </td>
                    <td class='right aligned'>
                      $receita[6]
                    </td>

                    <td>
                    <form name='form1' action='receita_detalhe.php' method='GET'>
                   
                    <button style='border:none;' name='visualizar' id='visualizar'  type='submit' 
                      value='$receita[0]'>
                      <label for='codxv'><i class='big circular external alternate icon'></i></label>
                    </button>
                    </form>
                    </td>

                    <td>
                    <form name='form2'  method='GET' action='receita_detalhe.php' >
                    <input type='hidden' value='$pc]' name='pagina'>
                        <button name='editar' style='border:none;' id='editar'  type='submit' 
                        value='$receita[0]'>
                          <label for='codxv'><i class='big circular pencil alternate icon'></i></label>
                        </button>
                    </form>
                    </td>
                    <td>
                    <form name='form3' action='doDeletar_receita.php'  method='GET'>
                      

                      <button type='submit' name='deletar' id='deletar' style='border:none;' value='$receita[0]'>

                          <label for=''><i class='big circular trash alternate icon'></i></label>

                          </button>
                    </form>
                    </td>

                  </tr>";
                  /*echo"</button>";
                  echo"</form>"; */
                  
                      
            
                                       
                                            
         } 
                echo" </tbody>"; 
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
                        //echo$pc;
                        //echo'<br>'.$tp;
                        if ($pc>1) {
                          echo " <a class='icon item' href='?pagina=$anterior'>
                          <i class='left chevron icon'></i>
                                </a>";
                        }if($tp>1){
                          for($p=1;$p<=$tp;$p++){
                            if($p==$pc){
                              echo"<a class='item active' style='' href='?pagina=$p'>$p</a>";
                            }
                            else{
                              echo"<a class='item' href='?pagina=$p'>$p</a>";
                            }
                           
                          }
                        }
                        //echo $tp;
                        if ($pc<$tp) {
                          echo " <a class='icon item' href='?pagina=$proximo'>
                          <i class='right chevron icon'></i>
                                </a>";
                          }

                        ?>
                        
                      </div>
                    </th>
                  </tr></tfoot>
      </table>