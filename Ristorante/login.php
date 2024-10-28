<?php
require 'classes.php';
include 'connectDB.php';

if(isset($_POST["cellulare"])){
    if($cliente=loginUser($_POST["cellulare"],$conn)){
        setLoginCookie($cliente);
        header("Location:index.php");
        exit;
    }
    else{
        echo "user not found";
        header("Location:register.php?reason=unf");
        #exit;
    }
    
}
include 'view/login.html';
include 'view/footer.html';
?>


