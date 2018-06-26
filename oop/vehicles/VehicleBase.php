<?php
namespace Vehicles;

abstract class VehicleBase // a través de la palabra resevada abstract volvemos nuestra clase abstracta
{

  private $owner;
  public function __construct($nameOwner){
    $this->owner = $nameOwner;
    echo "construct <br>";
  }


  public function move(){
    echo $this->startEngine(). "<br>";
    echo 'moving<br>';
  }

  public function getOwner(){
    return $this->owner;
  }


public function setOwner($owner){
  $this->owner = $owner;
  }

//Creando un método abstracto que permitirá "encender el motor de un vehículo"
 public abstract function startEngine(); //Todas las clases que heredan de "VehicleBase" van a implementar este método y le deben definir un comportamiento real

}
