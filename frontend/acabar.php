<?php

session_start();
session_destroy();
setcookie('latitude','',time()-3600);
setcookie('longitude','',time()-3600);
echo'<script>console.log("'.var_dump($_COOKIE).'")</script>';

?>