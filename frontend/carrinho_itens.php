<?php

header('Content-Type:application/json');


    if(isset($_SESSION['quant_prod_cod'])){
        echo json_encode(array_sum($_SESSION['quant_prod_cod']));
    }

?>