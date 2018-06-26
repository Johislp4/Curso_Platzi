<?php


 //Utilizando una función anónima como parámetro de otra funciónote

 //se crra un arreglo de números

 //$numbers = [1, 2, 3, 4, 5];

//array map recibe 2 parametros, el primero una función que se ejecutará para hacer la operación con todos los elementos
// y el segundo parametro el arreglo al que se le aplicará la funciónote
// El par´´ametro 1 será una función anónima que se espera multiplique por 2 a cada elemento del arreglo
// $n será una variable temporal que rrecorrerá todos los elementos del array

 //$result = array_map(function ($n) {

   //return $n * 2;
// }, $numbers);

//var_dump($result);


//$numbers = [1, 2, 3, 4, 5];

//array map recibe 2 parametros, el primero una función que se ejecutará para hacer la operación con todos los elementos
// y el segundo parametro el arreglo al que se le aplicará la funciónote
// El par´´ametro 1 será una función anónima que se espera multiplique por 2 a cada elemento del arreglo
// $n será una variable temporal que rrecorrerá todos los elementos del array


//en este caso declaramos la variable $x para que nuestro arregla sea multiplicado por dicho valor
//hay que utilizar la palabra reservada "use" para incluír un valor que está definido por fuera de la funcion anónima

$x = 3;
$numbers = [1, 2, 3, 4, 5];
$result = array_map(function ($n) use ($x) {

  return $n * $x;
}, $numbers);

var_dump($result);




 ?>
