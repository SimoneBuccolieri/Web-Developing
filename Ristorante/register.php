<?php
require 'classes.php';
include 'connectDB.php';

if(isset($_POST["nome"]) && isset($_POST["indirizzo"]) && isset($_POST["cellulare"])){
    $cliente = new Cliente($_POST["nome"],$_POST["indirizzo"],$_POST["cellulare"]);
    if(registerUser($cliente,$conn)){
        $cliente->idClienteFromDB($conn->insert_id);
        var_dump($cliente);
        setLoginCookie($cliente);
        header("Location:index.php");
        exit;
    }
    echo "gia registrato";
    header("Location:login.php?=giar");
    exit;
}
if(isset($_GET["reason"]))
   $unt=true;
else
    $unt=false;
include 'view/register.php';
include 'view/footer.html';
?>