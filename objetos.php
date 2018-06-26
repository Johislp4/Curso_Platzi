<?php

class Car
{
  //Atributos (en este caso lo hicimos private y no public)
private $owner;
public function __construct($nameOwner){
$this->owner = $nameOwner;
echo "construct"; //Costruct va a imprimirse 2 veces dato que tenemos 2 instancia  creadas "car" y "car2"
// cada que se llama una instancia se llama el constructor.
}

public function __destruct(){
echo "destruct"; //se imprime también 2 veces

}
//métodos


public function move(){
echo 'moving<br>';

}
//Para poder acceder al atributo owner que se encuentra en modo private
//estamos encapsulando

public function getOwner(){
return $this->owner;
}

//Para que tome diferentes valores la variable owner creamos la función o método setowner
public function setOwner($owner){
  $this->owner = $owner;


}


}
echo 'class Car <br>';

$car = new Car('Alex');
$car2 = new Car('Pipe');

//llamando al método "move"
$car->move();

//llamando al atributo ""owner"
$car->setOwner('Alex');
$car2->setOwner('Alex');


echo 'owner car: '. $car->getOwner()."<br>";
echo 'owner car2: '. $car2->getOwner();

 ?>
