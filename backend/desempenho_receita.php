<script src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
</script>
      <?php
        include('../cadastro/conexao.php');
        $all=mysqli_query($con,"SELECT * FROM `tb_receitas` WHERE `tb_usuario_adm_id_usuario_adm` = '1';");
        $ana=0;
        while($todas=mysqli_fetch_row($all)){
            $ana++;
        }
        // echo $ana;
        // echo'<br>';

        $all=mysqli_query($con,"SELECT * FROM `tb_receitas` WHERE `tb_usuario_adm_id_usuario_adm` = '3';");
        $eric=0;
        while($todas=mysqli_fetch_row($all)){
            $eric++;
        }
        // echo $eric;
        // echo'<br>';

        $all=mysqli_query($con,"SELECT * FROM `tb_receitas` WHERE `tb_usuario_adm_id_usuario_adm` = '2';");
        $geovana=0;
        while($todas=mysqli_fetch_row($all)){
            $geovana++;
        }
        // echo $geovana;
        // echo'<br>';

        $all=mysqli_query($con,"SELECT * FROM `tb_receitas` WHERE `tb_usuario_adm_id_usuario_adm` = '4';");
        $melissa=0;
        while($todas=mysqli_fetch_row($all)){
            $melissa++;
        }
        // echo $melissa;
        // echo'<br>';

        $all=mysqli_query($con,"SELECT * FROM `tb_receitas` WHERE `tb_usuario_adm_id_usuario_adm` = '5';");
        $gabriel=0;
        while($todas=mysqli_fetch_row($all)){
            $gabriel++;
        }
        // echo $gabriel;
        // echo'<br>';

      echo"
            <script>
                function graficoUsers() {

                    // Create the data table.
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Topping');
                    data.addColumn('number', 'Slices');
                    data.addRows([
                    ['Ana Julia', $ana],
                    ['Eric', $eric],
                    ['Gabriel', $gabriel],
                    ['Geovana', $geovana],
                    ['Melissa', $melissa]
                    ]);

                    // Set chart options
                    var options = {'title':'CRIAÇÃO PELOS USUÁRIOS',
                                'width':400,
                                'height':300};

                    // Instantiate and draw our chart, passing in some options.
                    var chart = new google.visualization.PieChart(document.getElementById('grafico-users'));
                    chart.draw(data, options);
                }
                
                    google.charts.setOnLoadCallback(graficoUsers);
            </script>
      ";

      $categoria=mysqli_query($con,"SELECT * FROM trivegano.tb_receitas WHERE tb_categoria_id_categoria = 1;");
      $doce=0;
      while($dates=mysqli_fetch_row($categoria)){
          $doce++;
      }

      $categoria=mysqli_query($con,"SELECT * FROM trivegano.tb_receitas WHERE tb_categoria_id_categoria = 2;");
      $salgado=0;
      while($dates=mysqli_fetch_row($categoria)){
          $salgado++;
      }

      $categoria=mysqli_query($con,"SELECT * FROM trivegano.tb_receitas WHERE tb_categoria_id_categoria = 7;");
      $bebida=0;
      while($dates=mysqli_fetch_row($categoria)){
          $bebida++;
      }

      echo"
      <script>
            function graficoCategoria() {

                
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Topping');
                data.addColumn('number', 'Slices');
                data.addRows([
                ['Doce', $doce],
                ['Salgado', $salgado],
                ['Bebida', $bebida]
                ]);

                // Set options for Anthony's pie chart.
                var options = {title:'RECEITA POR CATEGORIA',
                            width:400,
                            height:300};

                // Instantiate and draw the chart for Anthony's pizza.
                var chart = new google.visualization.PieChart(document.getElementById('grafico-categoria'));
                chart.draw(data, options);
            }
            google.charts.setOnLoadCallback(graficoCategoria);
        </script>
      ";

      $datas=mysqli_query($con,"SELECT * FROM trivegano.tb_receitas WHERE data_receita between '2022-07-01' AND '2022-07-31';");
      $julho=0;
      while($dates=mysqli_fetch_row($datas)){
          $julho++;
      }

      $datas=mysqli_query($con,"SELECT * FROM trivegano.tb_receitas WHERE data_receita between '2022-08-01' AND '2022-08-31';");
      $agosto=0;
      while($dates=mysqli_fetch_row($datas)){
          $agosto++;
      }

      $datas=mysqli_query($con,"SELECT * FROM trivegano.tb_receitas WHERE data_receita between '2022-09-01' AND '2022-09-30';");
      $setembro=0;
      while($dates=mysqli_fetch_row($datas)){
          $setembro++;
      }

      $datas=mysqli_query($con,"SELECT * FROM trivegano.tb_receitas WHERE data_receita between '2022-10-01' AND '2022-10-31';");
      $outobro=0;
      while($dates=mysqli_fetch_row($datas)){
          $outobro++;
      }

      $datas=mysqli_query($con,"SELECT * FROM trivegano.tb_receitas WHERE data_receita between '2022-11-01' AND '2022-11-30';");
      $novembro=0;
      while($dates=mysqli_fetch_row($datas)){
          $novembro++;
      }

      $datas=mysqli_query($con,"SELECT * FROM trivegano.tb_receitas WHERE data_receita between '2022-12-01' AND '2022-12-31';");
      $decembro=0;
      while($dates=mysqli_fetch_row($datas)){
          $decembro++;
      }
            
      echo"
            <script>
                function graficoAno() {
                    var data = google.visualization.arrayToDataTable([
                    ['Element', 'Receitas', { role: 'style' } ],
                    ['Julho', $julho, '#b87333'],
                    ['Agosto', $agosto, 'silver'],
                    ['Setembro', $setembro, 'gold'],
                    ['Outubro', $outobro, 'color: #e5e4e2'],
                    ['Novembro', $novembro, 'red'],
                    ['Decembro', $decembro, 'yellow']
                    ]);
            
                    var view = new google.visualization.DataView(data);
                    view.setColumns([0, 1,
                                    { calc: 'stringify',
                                    sourceColumn: 1,
                                    type: 'string',
                                    role: 'annotation' },
                                    2]);
            
                    var options = {
                    title: 'CRIAÇÃO POR MÊS 2022',
                    width: 900,
                    height: 310,
                    bar: {groupWidth: '95%'},
                    legend: { position: 'none' },
                    };
                    var chart = new google.visualization.ColumnChart(document.getElementById('grafico-ano'));
                    chart.draw(view, options);
                }

                google.charts.setOnLoadCallback(graficoAno);
            </script>
      ";
      ?>

    <div uk-grid>
      <div style="margin:auto;">
        <table class="columns">
        <tr>
            <td><div id="grafico-users" style="border: 1px solid #ccc"></div></td>
            <td><div id="grafico-categoria" style="border: 1px solid #ccc"></div></td>
        </tr>
        </table>
      </div>
        
      <div style="margin:auto" id="grafico-ano"></div>

     

    </div>

    