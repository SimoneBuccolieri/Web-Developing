<?php 
   require 'classes.php';
   include 'connectDB.php';
   if (!isset($_SESSION['carrello']))
       $_SESSION["carrello"] = new Carrello($_COOKIE["id"]); // Assicurati che l'ID sia corretto
   if(isset($_POST["rem"]))
       $_SESSION["carrello"]->remPiatto($_POST["rem"]);
   
   if(isset($_SESSION["carrello"])){
       $piatti = [];
       $carrello = $_SESSION["carrello"];
       $idPiatti = $carrello->getIdPiatti();
       #var_dump($idPiatti);
       foreach($idPiatti as $idPiatto){
           $piatti[] = getPiattoFromId($idPiatto,$conn);
       }
   }
   include 'view/carrello.php';
   ?>
