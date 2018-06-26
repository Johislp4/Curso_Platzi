
<?php
//En este archivo vamos a guardar la conexión al servidor
$dbHost = 'localhost';
$dbName = 'cursophp';
$dbUser = 'root';
$dbpass = '';
try {
  $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName","$dbUser","$dbpass");
  //PDO por default no siempre viene configurada para lanzar excepciones en los errores, para ello
  //es importante inicializar la conección de la siguiente manera:
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//ERRMODE_EXCEPTION es el modo de error global de php que utilizaremos

} catch (Exception $e) {
  echo $e->getMessage("error al conectar");
}


 ?>
