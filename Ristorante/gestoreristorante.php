<?php
    require 'classes.php';
    include 'connectDB.php';
    
    if($_COOKIE["cellulare"]=="0"){#numero gestore
        $gestoreRistorante= new GestoreRistorante(getMenu($conn));
        $menu=$gestoreRistorante->getMenu();
        
        $piatti=$menu->getPiatti();
        
        
        if(isset($_POST["update"])){
            $menunew= new Menu();
            foreach ($piatti as $piatto) {
            $id = $piatto->getIdPiatto();
            
            $nome = isset($_POST["nome$id"]) ? $_POST["nome$id"] : "";
            $descrizione = isset($_POST["descrizione$id"]) ? $_POST["descrizione$id"] : "";
            $prezzo = isset($_POST["prezzo$id"]) ? $_POST["prezzo$id"] : "";
            $type = isset($_POST["type$id"]) ? $_POST["type$id"] : "";
            
            $piattonew= new Piatto($nome,$descrizione,floatval($prezzo),$type,$id);
            $menunew->addPiatto($piattonew);
            }
            $gestoreRistorante->loadMenu($menunew);
            
            updateMenu($gestoreRistorante,$conn);
            $menu = $gestoreRistorante->getMenu();
            $piatti=$menu->getPiatti();
        }
        if(isset($_POST["add"])){
            $nome = $_POST["nomenew"];
            $descrizione = $_POST["descrizionenew"];
            $prezzo = $_POST["prezzonew"];
            $type = $_POST["typenew"];

            $p=new Piatto($nome,$descrizione,floatval($prezzo),$type,0);
            $gestoreRistorante->addPiatto($p);
            updateMenu($gestoreRistorante,$conn);
            $menu = $gestoreRistorante->getMenu();
            $piatti = $menu->getPiatti();
        }
        if (isset($_POST['delete'])) {
            $gestoreRistorante->removePiatto($_POST['delete']);
            updateMenu($gestoreRistorante,$conn);
            $menu = $gestoreRistorante->getMenu();
            $piatti = $menu->getPiatti();
        }
    
    
    
    
    
        include 'view/gestoreristorante.php';
    }
    else{
        header("Location: index.php");
    }
    
    ?>