<?php

class Product{
    public ?string $name = NULL;
    public float $price;
    public int $quantity;

    public function __construct($name,$price,$quantity){
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;

    }
    public function getTotalPrice(){
        return $this->price * $this->quantity;
    }
    public function displayProduct(){
        return "Nome: ". $this->name .", Prezzo: Eur ". $this->price .", Quantità: ". $this->quantity;
    }
}

class Order{
    public array $products;
    public function __construct() {
        $this->products = [];
    }
    
    
    public function addProduct($product){
        $this->products[]=$product;
    }
    public function getTotalOrderPrice(){
        $total=0;
        foreach ($this->products as $product) {
            $total += $product->getTotalPrice();
        }
        return $total;

    }
    public function displayOrder(){
        if (empty($this->products)) {
            return "Nessun prodotto nell'ordine.";
        }
        $scontrino="";
        foreach ($this->products as $product) {
            $scontrino .= $product->displayProduct() . "<br>";
        }
        return $scontrino;

    }
}
?>