<?php
session_start();
session_destroy();
echo"<script>window.location.replace('http://localhost/trivegano-main/cadastro/login.html');</script>";
?>