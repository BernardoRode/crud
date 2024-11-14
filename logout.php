<?php
setcookie("usuario_logado","", time() -3600,"/");
header("location:login.php");
?>