<?php

require_once 'config.php';

$queryResult = $pdo->query("SELECT * FROM users");// query es un método de la clase PDO que permite realizar la consulta SELECT




 ?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Databases</title>

<!-- la línea a continuación corresponde a bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
      <h1>List Users</h1>
      <a href="index2.php">Home</a>

      <table class = "table">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>

        <?php
        //El método fetch utilizado sobre $queryResult regresa uno por uno los registros que estamos obteniendo de la consulta,
        //la asignación se hace a la variable $row, cuando fetch no tenga elementos para regresar va a arrojar un false y terminará el ciclo
        //FETCH_ASSOC es una de las opciones de retorno que tiene el método fetch, PHP tiene otros tipos de retorno (mirar la documentación de php)
        while ($row = $queryResult->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td><a href="update.php?id='.$row['id'].'">Edit</a></td>';//El id que pasamos a través de row corresponde a los id que aparecen en la base de datos
            echo '<td><a href="delete.php?id='.$row['id'].'">Delete</a></td>';//El id que pasamos a través de row corresponde a los id que aparecen en la base de datos
            echo "</tr>";
        }
        ?>

      </table>

    </div>
  </body>
</html>
