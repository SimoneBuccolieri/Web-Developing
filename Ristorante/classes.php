<?php
class Cliente{
    private ?string $nome = null;
    private ?string $indirizzo = null;
    private ?string $cellulare = null;
    private array $ordini;
    private int $idCliente;

    public function __construct($nome,$indirizzo,$cellulare){#idCliente escluso
        $this->nome = $nome;
        $this->indirizzo = $indirizzo;
        $this->cellulare = $cellulare;
        $this->ordini = [];
    }
    public function getIdCliente(){
        return $this->idCliente;
    }
    public function getNomeCliente(){
        return $this->nome;
    }
    public function getIndirizzoCliente(){
        return $this->indirizzo;
    }
    public function getCellulareCliente(){
        return $this->cellulare;
    }
    public function getOrdiniCliente(){
        return $this->ordini;
    }
    #metodi classe cliente
    public function idClienteFromDB($idCliente){

        $this->idCliente = $idCliente;
    }
    public function newOrdine($piatti,$idCliente,$dateTime,$stato,$idOrdine){
        $this->ordini[]=new Ordine($piatti,$idCliente,$dateTime,$stato,$idOrdine);
    }
    public function viewOrdini(){
        foreach($this->ordini as $ordine){
            echo "Ordine numero:".$ordine->idOrdine.", Stato:".$ordine->stato."\n";
            foreach($ordine->getPiatti() as $piatto){
                echo $piatto->getNomePiatto()."\n";
            }
        }
    }

}
class Piatto{
    private ?string $nome = null;
    private ?string $descrizione = null;
    private float $prezzo;
    private ?string $type = null;
    private int $idPiatto;

    public function __construct($nome,$descrizione,$prezzo,$type,$idPiatto){
        $this->nome = $nome;
        $this->descrizione = $descrizione;
        $this->prezzo = $prezzo;
        $this->type = $type;
        $this->idPiatto = $idPiatto;
    }
    public function getNomePiatto(){
        return $this->nome;
    }
    public function getDescrizionePiatto(){
        return $this->descrizione;
    }
    public function getPrezzoPiatto(){
        return $this->prezzo;
    }
    public function getTypePiatto(){
        return $this->type;
    }
    public function getIdPiatto(){
        return $this->idPiatto;
    }
}
class Menu{
    private $piatti = [];

    public function __construct(){
        $this->piatti=[];
    }
    public function getPiatti(){
        return $this->piatti;
    }
    #metodi Menu
    public function visualizza(){
        foreach($this->piatti as $piatto){
            echo "Piatto: ".$piatto->GetNomePiatto().", Descrizione: ".$piatto->getDescrizionePiatto().", Prezzo: ".$piatto->getPrezzoPiatto().", Tipo: ".$piatto->getTypePiatto()."\n";
        }
    }
    public function searchType($type){
        foreach ($this->piatti as $piatto){
            if($piatto->getTypePiatto() === $type){
                echo "Piatto: ".$piatto->GetNomePiatto().", Descrizione: ".$piatto->getDescrizionePiatto().", Prezzo: ".$piatto->getPrezzoPiatto().", Tipo: ".$piatto->getTypePiatto();
        }
        }
    }
    public function addPiatto(Piatto $piatto){
        $this->piatti[]=$piatto;
    }
    public function removePiatto($id){
        foreach ($this->piatti as $index => $piatto) {
            if ($piatto->getIdPiatto() == $id) {
                unset($this->piatti[$index]);
                $this->piatti = array_values($this->piatti); // Riordina gli indici
                break; // Esci dal loop una volta trovato l'elemento
            }
        }
    }
    
}
class Ordine{
    private array $piatti;
    private int $idCliente;
    private ?string $dateTime = null;
    private ?string $stato = null;
    private int $idOrdine;

    public function __construct($piatti,$idCliente,$dateTime,$stato,$idOrdine){
        $this->piatti = $piatti;
        $this->idCliente = $idCliente;
        $this->dateTime = $dateTime;
        $this->stato = $stato;
        $this->idOrdine = $idOrdine;
    }
    public function getPiatti(){
        return $this->piatti;
    }
    public function getIdCliente(){
        return $this->idCliente;
    }
    public function getDateTime(){
        return $this->dateTime;
    }
    public function getStato(){
        return $this->stato;
    }
    public function getIdOrdine(){
        return $this->idOrdine;
    }
}
class Carrello{
    private array $idPiatti;
    private int $idCliente;

    public function __construct($idCliente){
        $this->idCliente = $idCliente;
        $this->idPiatti =[];
    }
    
    public function addPiatto($idPiatto){
        $this->idPiatti[]=$idPiatto;
    }
    
    public function remPiatto($idPiatto){
        if(($key = array_search($idPiatto, $this->idPiatti)) !== false)
            unset($this->idPiatti[$key]);
    }
    
    public function getIdPiatti(){
        return $this->idPiatti;
    }
}
class GestoreRistorante{
    private $menu;
    
    public function __construct($menu) {
        $this->menu = $menu;
    }
    public function loadMenu($menu){
        $this->menu = $menu;
    }
    public function addPiatto($piatto){
        $this->menu->addPiatto($piatto);
    }
    public function removePiatto($idPiatto){
        $this->menu->removePiatto($idPiatto);
    }
    public function getMenu() {
        return $this->menu;
    }
    public function cercaMenu($type) {
        $this->menu->searchType($type);
    }
       
}

?>
