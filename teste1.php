<!DOCTYPE html>
<html>
<head>
    <title>Escondendo a div no HTML</title>
    <meta charset="utf-8">
</head>
<style>
    .container{
        display: none;
    }
    .campo{
        display: none;
    }
    .ala{
        display: none;
    }
</style>
<body>
<form method="post">
    <div class="container">
    <p>Esta div não será exibida1</p>
</div>
<button id='btn-div' name="btn" value="container">Ocultar/mostrar div</button>

<div class="campo">
    <p>Esta div não será exibida2</p>
</div>
<button id='btn-campo' name="btn" value="campo">Ocultar/mostrar div</button>

<div class="ala">
    <p>Esta div não será exibida</p>
</div>
<button id='btn-ala' name="btn" value="ala">Ocultar/mostrar div</button>
</form>

<?php
if($_POST['btn'] == "container"){
    echo"<script>
            var btn = document.getElementById('btn-div');
        var div = document.querySelector('.container');

        btn.addEventListener('click', function() {
            
        if(div.style.display === 'block') {
            div.style.display = 'none';
        } else {
            div.style.display = 'block';
        }
        });
         </script>";
}
elseif($_POST['btn']== "campo"){
    echo"<script>
    var campo = document.getElementById('btn-campo');
    var div = document.querySelector('.campo');

    campo.addEventListener('click', function() {
        
    if(div.style.display === 'block') {
        div.style.display = 'none';
    } else {
        div.style.display = 'block';
    }
    });
    </script>";
}
?>


</body>
</html>