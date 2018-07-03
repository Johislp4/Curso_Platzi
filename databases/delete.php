<?php

include_once 'config.php';

$id = $_GET['id'];

$sql = 'DELETE FROM users WHERE id=:id';
$query = $pdo->prepare($sql);
$query->execute([
'id' => $id

]);

//"header" agrega encabezados a nuestra respuesta, en este caso el encabezado será location y se especifica la dirección a donde queremos que nos retorne
header("location:list.php");
 ?>
