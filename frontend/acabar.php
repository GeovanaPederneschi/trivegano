<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
<script src="acabar.js"></script>
<?php

session_start();
session_destroy();
header('Location: menu.php');
?>