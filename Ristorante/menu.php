<?php
   require 'classes.php';
   include 'connectDB.php';
   
   $menu=getMenu($conn);
   $piatti=$menu->getPiatti();
   if(isset($_COOKIE["id"])){
        if (!isset($_SESSION['carrello'])) {
            $_SESSION["carrello"] = new Carrello($_COOKIE["id"]);
        }
        if(isset($_POST["add"]))
            $_SESSION["carrello"]->addPiatto($_POST["add"]);
    }
    if(!isset($_COOKIE["id"]) && isset($_POST["add"]))
        header("Location:index.php");
   #var_dump($_SESSION["carrello"]);
   include 'view/menu.php';
   ?>
