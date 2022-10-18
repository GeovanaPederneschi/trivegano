
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
          <th>Produto</th>
          <th>Efficacy</th>
          <th>Data</th>
          <th>Categoria</th>
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
          $comando=mysqli_query($con,"SELECT * FROM `tb_produto` WHERE `tb_adm_fornecedor_tb_fornecedor_id_fornecedor` = 
          '$_SESSION[codfornecedor]';");
          $i=0;

          while($produto = mysqli_fetch_array($comando))
          {
            
            if($i<11)
            {
                /* echo "<form name=fox action=backReceita_detalhe.php  method=POST >";
                echo"<button type=subbmit name=bot2  style='border: none;'"; */

                /* $comando=mysqli_query($con,"SELECT * FROM `tb_imagem_receitas` WHERE `tb_receitas_id_receitas`= $receita[0];");
                if ($foto= mysqli_fetch_array($comando)){ */
                  echo"
                    <tr>";
                    
                
                    echo"
                    <td class='single line'>
                      $produto[1]
                    </td>
                    <td>
                      <div class='ui star rating' data-rating='3' data-max-rating='3'></div>
                    </td>
                    <td class='right aligned'>
                      DATA
                    </td>";
                    $query=mysqli_query($con,"SELECT `descricao_categoria` FROM `tb_categoria` WHERE `id_categoria`='$produto[6]';");
                    if($categoria=mysqli_fetch_row($query)){
                      echo"<td class='right aligned'>".
                              ucfirst($categoria[0])
                            ."</td>";
                    }
                    echo"
                    

                    <td>
                    <form name='form1' action='produto_detalhe.php' method='GET'>
                    
                    <button style='border:none;' name='visualizar' id='visualizar'  type='submit' 
                      value='$produto[0]'>
                      <label for='codxv'><i class='big circular external alternate icon'></i></label>
                    </button>
                    </form>
                    </td>

                    <td>
                    <form name='form2'  method='GET' action='produto_detalhe.php' >
                        <button name='editar' style='border:none;' id='editar'  type='submit' 
                        value='$produto[0]'>
                          <label for='codxv'><i class='big circular pencil alternate icon'></i></label>
                        </button>
                    </form>
                    </td>
                    <td>
                    <form name='form3' action='doDeletar_produto.php'  method='GET'>
                      

                      <button type='submit' name='deletar' id='deletar' style='border:none;' value='$produto[0]'>

                          <label for=''><i class='big circular trash alternate icon'></i></label>

                          </button>
                    </form>
                    </td>

                  </tr>";
                  /*echo"</button>";
                  echo"</form>"; */
                  $i++;
                      
            }
            else{
                 echo" </tbody>";
                                
            }
                                        
                                            
         } 
                
           $close = mysqli_close($con);

        ?>
                          
                          
                              

                          
        
                 <tfoot>
                   <tr><th colspan="5">
                     <div class="ui right floated pagination menu">
                       <a class="icon item">
                         <i class="left chevron icon"></i>
                       </a>
                       <a class="item">1</a>
                       <a class="item">2</a>
                       <a class="item">3</a>
                       <a class="item">4</a>
                       <a class="icon item">
                         <i class="right chevron icon"></i>
                       </a>
                     </div>
                   </th>
                 </tr></tfoot>
      </table>