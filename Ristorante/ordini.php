<?php
   require 'classes.php';
   include 'connectDB.php';
   if(isset($_COOKIE["id"]))
      $idCliente = $_COOKIE["id"];
   else
      header("Location: index.php");
   if(isset($_POST["order"]) && isset($_SESSION["carrello"])){
       $carrello = $_SESSION["carrello"];
       $idPiattiArray = $carrello->getIdPiatti();
       $idPiatti="";
       foreach($idPiattiArray as $Piatto){
           $idPiatti=$idPiatti.$Piatto.",";
       }
       $idPiatti = implode(",", $idPiattiArray);
       insertOrdineDB($idPiatti,$idCliente,$conn);
       unset($_SESSION["carrello"]);
   }
   $ordini =getOrdini($idCliente, $conn);
   include 'view/ordini.php';
   ?>
