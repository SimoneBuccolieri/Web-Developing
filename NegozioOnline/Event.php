<?php

class Event{
    public int $id;
    public ?string $oggetto = NULL;
    public ?string $data = NULL;

    public function __construct($id){
        $this->id = $id;
        $this->data = $data;
        $this->oggetto = $oggetto;

    }
    public function getDate(){
        return date('d/m/Y H:i', strtotime($this->date));
    }

}
new Event($row["id"],$row["data"],$row["title"]);


?>