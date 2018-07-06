<?php
//Este archivo va a ser nuestro Front Controller
//Con el siguiente codigo (líneas 4-5) le estamos diciendo a php que nos regrese cualquiere error que se encuentre en cualquier parte de nuestra aplicación
ini_set('display_errors', 1);//permite inicializar valores de configuración
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//agregamos el módulo de autoloding de composer
require_once '../vendor/autoload.php'; //con esta línes ya puedo utilizar las clases de phroute sin necesidad de hacer los include o require de los archivos que utiliza la libreráa


include_once '../config.php'; //en este caso tenemos que especificar la rutadonde se encuentra el archivo, ya que no está en el directorio actual, sino en un directorio superior

//Para llamar las páginas que tenemos pendientes
$route = $_GET['route'] ?? '/';

//vamos a definir rutas
use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();
$router->get('/', function()  use ($pdo) {   //acá vamos a agregar el tipo de request que vamos a recibir. Adicionalmente, se inserta la variable $pdo en la función anónima para que no marque error
   $query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY id DESC'); //esta consulta quiere decir que queremos que nos de el id más reciente siempre al principio
   $query->execute();

  $blogPosts = $query->fetchAll(PDO::FETCH_ASSOC); //se crea una nueva variable donde se van a traer todos los blogpost de nuestra base de datos. FetchAll se trae todos los registros que se obtuvieron en la consulta
  include '../views/index.php';

});

//el dispatcher es el objeto que va a tomar la ruta que nos está llegando y va a llamar al método que realmente necesita
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());


$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);//esto el lo que vamos a regresar al cliente

    echo $response;


 ?>
