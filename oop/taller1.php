<?php

class Computer
{
  private $price;
  private $provider;

  public function __construct($price,$provider){
  $this->price = $price;
  $this->provider = $provider;
  }

  public function getPrice(){
    return $this->price;
  }

  public function setPrice($price){
    return $this->price = $price;
  }

  Public function getProvider(){
    return $this->provider;
  }

  public function setProvider($provider){
    return $this->provider = $provider;
  }

  public function getPriceWihtDiscount($discount){
    return $this->price - ($this->price * $discount)/100;
  }

}

$computador1 = new Computer(300000,'Hp');
$computador2 = new Computer(400000, 'Dell');
$computador3 = new Computer(500000,'Asus');
$computador4 = new Computer(600000,'Toshiba');
$computador5 = new Computer(700000,'Apple');


echo "El precio del computador Hp con un 10% de descuento es: " . $computador1->getPriceWihtDiscount(10) . "<br>";

echo "El precio del computador Dell con un 10% de descuento es: " . $computador2->getPriceWihtDiscount(10) . "<br>";

echo "El precio del computador Asus con un 10% de descuento es: " . $computador3->getPriceWihtDiscount(10) . "<br>";

echo "El precio del computador Toshiba con un 10% de descuento es: " . $computador4->getPriceWihtDiscount(10) . "<br>";

echo "El precio del computador Apple con un 10% de descuento es: " . $computador5->getPriceWihtDiscount(10). "<br>";




function getMostExpensiveComputer ($computador1, $computador2, $computador3, $computador4,$computador5){

  $maxValue = max(....)

  if($maxValue == $comoutador1->getpic){
    return 1
  }
//max

}

 echo "el mas caro es el computador: " . getMostExpensiveComputer($computador1, $computador2, $computador3, $computador4,$computador5);

 ?>
