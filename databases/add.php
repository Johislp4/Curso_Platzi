<?php

require_once 'config.php'; //incluímos el archivo de conexión a la base de datos
$result = false; //inicializamos result para abajo hacel la comprobación con el alert

//Verificando si POST está vacio
if (!empty ($_POST)){

    $name = $_POST['name'];
    $email= $_POST['email'];
    $password = md5($_POST['password']); //md5 hace que la contraseña se "encripte" en la base de datos

//insertando los valores en la BD utilizando PDO. Se va a hacer una consulta SQL y se ejecuta a través de la conexión PDOStatement
$sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)"; //las variables demtro de values se relacionarán con la consulta a través de execute
$query = $pdo->prepare($sql); //aquí se realiza la consulta, pasamos nuestra variable de consulta $sql


$result = $query->execute([ //con execute podemos pasar un arreglo relacional en el cual podemos agregar cada uno de los valores con los cuales queremos que se relacione la consulta

  'name'=> $name,
  'email'=> $email,
  'password'=> $password

]);

}

 ?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Databases</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

  </head>
  <body>
    <div class="container" >
      <h1>Add User</h1>
      <a href="index2.php">Home</a>

<!-- haciendo la verificación de result-->
    <?php
      if ($result == true) {
        echo '<div class="alert alert-success"> Success!! </div>';
      }

    ?>
      <form action="add.php" method="post">
        <label for="name">Name</<label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="email">Email</<label>
        <input type="text" name="email" id="email" required>
        <br>
        <label for="password">Password</<label>
        <input type="password" name="password" id="password" required>
        <br>
        <br>
        <input class="btn btn-sm btn-primary" type="submit" value="Save">

      </form>




    </div>
  </body>
</html>
