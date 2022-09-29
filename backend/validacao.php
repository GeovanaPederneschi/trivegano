<?php

function validaCeo($ceo) 
{      $v=str_replace(array('#',';',''), "s", $ceo);
    if(!is_string($v)){
        return false;
    }
    return true;
}

function validaNulo($string){
    if(empty($string)){
        return false;
    }
    return true;
}
    


function validaCategoria($num)
{
    if($num !== "1"){
       return false;
    }
    elseif($num !== "2"){
        return false;
    }
    return true;
}

function validaDieta($string) :bool
{
    if($string !== "vegan"){
       return false;
    }
    elseif($string !== "ovolac"){
        return false;
    }
    return true;
}

?>