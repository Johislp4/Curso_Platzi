<?php
include  'Vehicles/Car.php';
include  'Vehicles/Truck.php';
include  'Vehicles/ToyCar.php';




use Vehicles\Car;
use Vehicles\Truck; //PAra evitar hacer estos llamados por separado se puede utilizar use Vehicles\{car, Truck};
use Vehicles\ToyCar;

echo 'class ToyCar <br>';

try{$Toycar = new ToyCar('Johana');
$Toycar->move();
}catch (Exception $e){
  echo "this is a toy <br>";
}finally{
  echo "finally <br><br>";
}


echo 'class Car <br>';
$car = new Car('Alex');
$car->move();
echo 'owner car: '. $car->getOwner()."<br>";
echo 'gps pos:' . $car->getPos() . "<br>";//aca traemos el método Post que no está definido en nuestra clase car, sino en el trait que creamos (GPSTrait)

echo "class truck.<br>";

$truck = new Truck('Pipe','Mazda');
$truck->move();
echo 'owner truck: '. $truck->getOwner();

//De esta forma se llamaría la clase "VehicleBase" sí no fuera del tipo "abstract"
//$v1 = new \Vehicles\Vehiclebase('Johana');
//$v1->move();


 ?>
