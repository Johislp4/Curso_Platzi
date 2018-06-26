<?php
namespace Vehicles;
require_once 'VehicleBase.php';

class Truck extends VehicleBase
{
  private $type;
  public function __construct($nameOwner, $type)//la función construct recibe 2 parametros, el que se le define exclusivamente a la clase hija y adicionalmente el que recibe de la clase padre
  {
    $this->type = $type;

    parent::__construct($nameOwner);

  }

// El siguiente bloque de código permite crear funcionalidades adicionales a la clase hija de las que hereda se la clase padre
    //public function move()
    //{
    //  echo 'Truck ' . $this->type .': moving<br>';
    //}

    public function startEngine(){

      return 'Truck: start engine'; //Aquí estoy definiendo el comportamiento que va a tener el método abstracto starEngine en la clase hija "Truck"
    }
}
