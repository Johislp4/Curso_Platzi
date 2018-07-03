<?php
include_once 'config.php';
$result= false; //inicializando el result para posterior verificación

if (!empty($_POST)) {
   $id = $_POST ['id'];
   $newName = $_POST['name'];
   $newEmail = $_POST['email'];

   //Creamos una nueva consulta SQL para guardar información
   $sql = "UPDATE users SET name=:name, email=:email WHERE id=:id";
   $query = $pdo->prepare($sql);
   $result = $query->execute([
     'id' => $id,
     'name' => $newName,
     'email' => $newEmail

   ]);

   $nameValue = $newName;
   $emailValue = $newEmail;

}else {
  $id = $_GET['id'];//obtenemos el id que estamos pasando a través de GET

  //haciendo la cosulta SQL
  $sql = "SELECT * FROM users WHERE id=:id"; //Aún no se especifíca el id
  $query = $pdo->prepare($sql);
  //vamos a ejecutar la consulta

  $query->execute ([
    'id'=> $id //e especifica que el id que requerimos en la consulta (línea 7) debe igualarse con el id que estamos obteniendo de nuestra super global GET (línea 4)

  ]);

  $row = $query->fetch(PDO::FETCH_ASSOC);
  $nameValue = $row['name'];
  $emailValue = $row['email'];
}

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
      <h1>Update User</h1>
      <a href="list.php">Back</a>
      <!-- haciendo la verificación de result (línea 12)-->
          <?php
            if ($result == true) {
              echo '<div class="alert alert-success"> Success!! </div>';
            }

          ?>
      <form action="update.php" method="post">

        <form action="add.php" method="post">
          <label for="name">Name</<label>
          <input type="text" name="name" id="name" value="<?php echo $nameValue;?>  ">
          <br>
          <label for="email">Email</<label>
          <input type="text" name="email" id="email" value="<?php echo $emailValue;?>">
          <br>
          <br>
          <!-- el input tipo hidden permite tener ese input como parte del formulario, pero no se va a mostrar nada al usuario final-->
          <input type="hidden" name="id"  value="<?php echo $id ?>">
          <input type="submit" value="Update">
    </form>

    </div>
  </body>
</html>
