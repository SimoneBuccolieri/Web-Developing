<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'dbdata.php';
if(isset($_SESSION['carrello'])){
    $itemsCart = count($_SESSION['carrello']->getIdPiatti());
} else {
    $itemsCart = 0;
}

session_start();
$conn=new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

function registerUser($cliente,$conn){
    $sqlclienti="SELECT * from clienti WHERE cellulare='".$cliente->getCellulareCliente()."'";
    $resultclienti = $conn->query($sqlclienti);
    
    if($resultclienti->num_rows==0){
        $sqlregistercliente="INSERT INTO clienti (nome,indirizzo,cellulare) VALUES ('".$cliente->getNomeCliente()."','".$cliente->getIndirizzoCliente()."','".$cliente->getCellulareCliente()."')";
        if ($conn->query($sqlregistercliente) === TRUE) {
            echo "Registrazione effettuata";
            return 1;
        }
        
    }
    return 0;
}
function loginUser($cell,$conn){
    $sqlclienti="SELECT * from clienti WHERE cellulare='".$cell."'";
    $resultclienti = $conn->query($sqlclienti);
    if($user=$resultclienti->fetch_assoc()){
        $cliente = new Cliente($user["nome"],$user["indirizzo"],$user["cellulare"]);
        $cliente->idClienteFromDB($user["idCliente"]);
        return $cliente;
    }
    return 0;
}

function getMenu($conn){
    $sqlpiatti="SELECT * FROM piatti";
    $resultpiatti = $conn->query($sqlpiatti);
    $menu = new Menu();
    if($resultpiatti->num_rows>0){
    while($rowpiatto=$resultpiatti->fetch_assoc()){
        $menu->addPiatto(new Piatto($rowpiatto["nome"],$rowpiatto["descrizione"],$rowpiatto["prezzo"],$rowpiatto["type"],$rowpiatto["idPiatto"]));
    }
    
    }
    return $menu;
}
function getPiattoFromId($id,$conn){
    $sqlpiatto="SELECT * FROM piatti WHERE idPiatto='".$id."'";
    $result=$conn->query($sqlpiatto);
    if($piattosql=$result->fetch_assoc()){
        $piatto=new Piatto($piattosql["nome"],$piattosql["descrizione"],$piattosql["prezzo"],$piattosql["type"],$piattosql["idPiatto"]);
        return $piatto;
    }
    
}
function insertOrdineDB($idPiatti,$idCliente,$conn){
    $sqlordine="INSERT INTO ordini (idCliente,idPiatti) VALUES ('".$idCliente."','".$idPiatti."')";
    $conn->query($sqlordine);
}
function getOrdini($idCliente, $conn) {
    $sqlordini = "SELECT * FROM ordini WHERE idCliente = '".$idCliente."'";
    $result = $conn->query($sqlordini);
    $ordini = [];
    while ($row = $result->fetch_assoc()) {
        $piattiArray=[];
        $idPiattiArray = explode(",", $row["idPiatti"]);
        foreach($idPiattiArray as $idPiatto){
            $piattiArray[]=getPiattoFromId($idPiatto,$conn);
        }
        $ordine = new Ordine($piattiArray, $row["idCliente"], $row["data"], $row["stato"], $row["idOrdine"]);
        $ordini[] = $ordine;
    }
    return $ordini;
}
function updateMenu($gestoreristorante,$conn){
    $conn->query("TRUNCATE TABLE piatti");
    $menu=$gestoreristorante->getMenu();
    $piatti = $menu->getPiatti();
    
    foreach($piatti as $piatto){
        $sql="INSERT INTO piatti (nome,descrizione,prezzo,type) VALUES ('".$piatto->getNomePiatto()."','".$piatto->getDescrizionePiatto()."','".$piatto->getPrezzoPiatto()."','".$piatto->getTypePiatto()."')";
        $conn->query($sql);
    }
    


}



function setLoginCookie($cliente){
    setcookie("id",$cliente->getIdCliente(),time() + (86400 * 30),"/");
    setcookie("nome",$cliente->getNomeCliente(),time() + (86400 * 30),"/");
    setcookie("indirizzo",$cliente->getIndirizzoCliente(),time() + (86400 * 30),"/");
    setcookie("cellulare",$cliente->getCellulareCliente(),time() + (86400 * 30),"/");
}








?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Ristorante/css/style.css?v=1.4">
</head>