<script>  
        var loadFile = function(event) {
          var foto = document.getElementById('foto');
        foto.src = URL.createObjectURL(event.target.files[0]);
          //  Chama a função quando carregada a imagem que revoga a URL para o caminho.
          foto.onload = function() {
            URL.revokeObjectURL(foto.src) 
          }
        };

        function mandar(){
          document.getElementById('codxv').submit();
        }
</script>
<form class="ui form" method="POST" action="doInserir_receita.php" enctype="multipart/form-data">
      <div class="two fields">
        <div class="field">
        <div class="image"><img src="../trivegano/onboard1.svg" alt="" class="img"></div>
        </div>
        <div class="field">
          FOTO <input type="file" accept="image/*" onchange="loadFile(event)" id='arq' name='arq'>
        <div class="uk-placeholder"><img  id="foto" width=200 heigth=200/></div>
        </div>
      </div>
        <h4 style="font-size: 25px;" class=" ui dividing header uk-text-center ">Informações Principais</h4>
        <div class="field">
          <label>Titulo da Receita</label>
          <input type="text" name="titulo" placeholder="Digite um titulo objetivo">
        </div>
        <div class="field">
          <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ingredientes Receitas</font></font></label>
          <!-- <input name="ingredientes"> -->
          <textarea type="text" name="ingredientes" placeholder="Liste todos os ingredientes" ></textarea>
        </div>
        <div class="field">
          <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Descrição</font></font></label>
          <textarea type="text" name="descricao" placeholder="Digite o modo de preparo" ></textarea>
        </div>
        <h4 style="font-size: 25px;" class=" ui dividing header uk-text-center ">Informações Adicionais</h4>
        <div class="two fields">
          <div class="field">
              <label>Categoria da Receita</label>
            
              <select name="cat" class="ui fluid dropdown">
                <option value="">Selecione</option>
            <option  value="1">Doce</option>
            <option  value="2">Salgado</option>
              </select>
          </div>
          <div class="field">
              <label>Dieta da Receita</label>
              <select name="dieta" class="ui fluid dropdown">
                <option  value="">Selecione</option>
            <option  value="vegan">Vegana</option>
            <option  value="ovolac">Ovolactogevetariana</option>
              </select>
          </div>
        </div>
        <div class="field">
          <label>Ceo da Receita</label>
          <input type="text" name="ceo" placeholder="#ramo;#ramo2">
        </div>
        <button class="uk-button uk-button-secondary uk-width-1-1" name="submit" type="submit">Submit</button>
</form>

<script>
  //$('#grid').css('height','170%');
</script>