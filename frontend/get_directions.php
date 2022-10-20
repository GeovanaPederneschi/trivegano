<?php

getAddress();



function getAddress(){

    if(isset($_COOKIE['latitude'])&&isset($_COOKIE['longitude'])){
        $apiKey = 'AIzaSyBzQCRKSKFi7AwHMynJuFb_aa4NH7l6-qM';

            $address = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$_COOKIE['latitude'].','.$_COOKIE['longitude'].'&key='.$apiKey);
            $outputAddress = json_decode($address);
            if(!empty($outputAddress->erro_message)){
                return $outputAddress->erro_message;
            }
            
            $_COOKIE['endereco']= $outputAddress->results[0]->formatted_address;
            //echo $outputAddress->results[0]->formatted_address;
            var_dump($_SESSION);
             echo" <span> $_SESSION[endereco] </span>";
             echo'console.log("AEEEE")';
    }

    
}

?>