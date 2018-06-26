<?php
namespace Vehicles;
require_once 'VehicleBase.php';
require_once 'GPSTrait.php';


//herencia: Al crear esta clase todas las propiedades y métodos que tenemos en nuestra clase vehículo
//están disponible en nuestra clase car

class Car extends VehicleBase
{

  use GPSTrait; //Al agregar esta línea de código, los métodos que contiene nuestro trait quedan disponibles para la clase "car"

  //public function move()
  //{
  //  echo 'Car: moving<br>'; //Esta función ahora se está llamando desde la clase "car" (hija) y no de la clase "vehicle" (padre)
  //}

  public function startEngine(){

    return 'Car: start engine'; //Aquí estoy definiendo el comportamiento que va a tener el método abstracto starEngine en la clase hija "car"


  }
}
