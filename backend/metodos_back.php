<?php
include "../cadastro/conexao.php";


    if(isset($_POST['email'])){

        $email=$_POST['email'];

        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $resultado=mysqli_query($con,"UPDATE `tb_adm_fornecedor` SET `email_adm_fornecedor`='$email' 
            WHERE `id_adm_fornecedor` = '$_SESSION[codusuario]';");
           
           $quant=mysqli_affected_rows($con);  
            //pega a quantidade de registros     alterados

            if ($quant>=0) {
                echo"
                <script>
                UIkit.notification({message: '<span uk-icon=\'icon: check\'></span> Alteração Efetuada', status: 'success'})
                </script>
                ";
            }
            else
            {     echo "erro na alteração de dados ou foto";

            }
        }

    }