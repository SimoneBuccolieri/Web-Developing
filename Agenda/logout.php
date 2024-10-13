<?php 
    setcookie("sessionid","",time() - 3600,"/");
    setcookie("sessionuser","",time() - 3600,"/");
    header("Location: login.php");
    exit;
?>