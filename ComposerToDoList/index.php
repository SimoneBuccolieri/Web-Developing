<?php

require 'vendor/autoload.php';

use Carbon\Carbon;
use vlucas\phpdotenv;
use Illuminate\Database\Capsule\Manager as Capsule;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$capsule= new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => $_ENV['DB_SERVERNAME'],
    'database' => $_ENV['DB_NAME'],
    'username' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix' => '',
]);
$capsule->setAsGlobal();

class Evento{
    private ?string $oggetto=null;
    private $data;
    private int $id;

    public function __construct($oggetto,$datetime){
        $this->oggetto=$oggetto;
        $this->data= new Carbon($datetime);
    }
    public function insertId($id){
        $this->id=$id;
    }
    public function getOggetto(){
        return $this->oggetto;
    }
    public function getDatetime(){
        return $this->data->format('Y-m-d H:i');
    }
    public function getId(){
        return $this->id;
    }
}
function addDB($evento){
    Capsule::table('list')->insert(['oggetto' => $evento->getOggetto(),'data' => $evento->getDateTime()]);
    #$sql = "INSERT INTO list (oggetto, data) VALUES ('" . $evento->getOggetto() . "', '" . $evento->getDateTime() . "')";
    #$conn->query($sql);
}
function getDB(){
    $eventi=[];
    $eventisql=Capsule::table('list')->get();

    #$sql="SELECT * FROM list";
#    if($result=$conn->query($sql)){
        foreach($eventisql as $eventosql){
            $evento= new Evento($eventosql->oggetto,$eventosql->data);
            $evento->insertId($eventosql->id);
            $eventi[]=$evento;
        }
#    }
    return $eventi;
}
function removeDB($idEvento){
    #$sql="DELETE FROM list WHERE id='".$idEvento."'";
    #$conn->query($sql);
    Capsule::table('list')->where('id',$idEvento)->delete();
}



if(isset($_POST["oggetto"]) && isset($_POST["data"])){
    $evento=new Evento($_POST["oggetto"],$_POST["data"]);
    addDB($evento,$conn);
}
if(isset($_GET["removeid"])){
    removeDB($_GET["removeid"]);
}
include "viewform.html";

include "agenda.php";



