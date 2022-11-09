<?php

require ('vendor\autoload.php');

include('config\email.php');

$email= new Email();

$email->add(
    "Olá Mundo Esse é o Meu Primeiro E-mail!",
    "<h1>Estou Apenas Testando</h1>Espero que tenha dado certo!",
    "Trivegano",
    "tccnavegano@gmail.com"
);

// subject:"Olá Mundo Esse é o Meu Primeiro E-mail!",
// body:"<h1>Estou Apenas Testando</h1>Espero que tenha dado certo!",
// recipient_name:"Trivegano",
// recipient_email:"tccnavegano@gmail.com"

var_dump($email);
?>