<?php
 session_start();
 session_destroy();
 echo "sesion destruida";
 header("Location: index.php");
?>