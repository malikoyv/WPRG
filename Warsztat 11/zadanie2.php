<?php
    class Produkt {
        private $name;
        private $price;
        private $quantity;

        public function __construct($name, $price, $quantity)
        {
            $this->name = $name;
            $this->price = $price;
            $this->quantity = $quantity;
        }

        public function getName(){
            return $this->name;
        }

        public function getPrice(){
            return $this->price;
        }

        public function getQuantity(){
            return $this->quantity;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function setPrice($price){
            $this->price = $price;
        }

        public function setQuantity($quantity){
            $this->quantity = $quantity;
        }

        public function __toString()
        {
            return "Produkt: " . $this->name . " Cena: " . $this->price . " Ilosc: " . $this->quantity . "<br>";
        }
    }

    class Cart {
        private $products;

        public function __construct()
        {
            $this->products = [];
        }

        public function addProduct(Produkt $produkt){
            array_push($this->products, $produkt);
        }

        public function removeProduct(Produkt $produkt){
            unset($this->products[array_search($produkt, $this->products)]);
        }

        public function getTotal(){
            $cenaCalkowita = 0;
            foreach($this->products as $p){
                $cenaCalkowita += $p->getPrice();
            }       
            return $cenaCalkowita;
        }

        public function __toString()
        {
            $result = "";
            foreach($this->products as $p){
               $result .= $p->__toString() . "<br>";
            }
            $result .= "Total price: " . $this->getTotal() . "<br>";
            return $result;
        }

    }

    $produkt1 = new Produkt("Laptop", 1500, 1);
    $produkt2 = new Produkt("Smartphone", 800, 2);

    $cart = new Cart();
    $cart->addProduct($produkt1);
    $cart->addProduct($produkt2);

    echo $cart;
?>