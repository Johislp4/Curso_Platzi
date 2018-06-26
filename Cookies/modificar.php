<?php
//modificando la cookie en 1

$value = $_COOKIE['count'];

$value++;

setcookie('count',$value);
echo "Adding cookie";





 ?>
