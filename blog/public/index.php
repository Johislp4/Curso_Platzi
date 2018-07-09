<?php
//Este archivo va a ser nuestro Front Controller
//Con el siguiente codigo (líneas 4-6) le estamos diciendo a php que nos regrese cualquiere error que se encuentre en cualquier parte de nuestra aplicación
ini_set('display_errors', 1);//permite inicializar valores de configuración
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//agregamos el módulo de autoloding de composer
require_once '../vendor/autoload.php'; //con esta línes ya puedo utilizar las clases de phroute sin necesidad de hacer los include o require de los archivos que utiliza la libreráa


include_once '../config.php'; //en este caso tenemos que especificar la ruta donde se encuentra el archivo, ya que no está en el directorio actual, sino en un directorio superior

$baseUrl = ''; //la variable $baseUrl nos permite tener la base url en todo nuestro proyecto, es decir, la base en donde estamos trabajando
$baseDir = str_replace(basename ($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']); //aquí obtenemos nuestro directrio base
$baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . $baseDir; //definimos el "host" de nuestro dominio

define('BASE_URL', $baseUrl ); //"define" permite definir constantes- En este caso vamos a guardar la constante $base Url

//Para llamar las páginas que tenemos pendientes
$route = $_GET['route'] ?? '/';

function render ($fileName, $params = []){
  ob_start(); //va a omitir cualquier salida que tenga la aplicación en este momento, todo lo va a almacenar internamente
  extract ($params);//necesitamos extraer las variables que vamos a enviar
  include $fileName;
  return ob_get_clean();

}
//vamos a definir rutas
use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

//Aquí definimos nustros 3 controladores
$router->controller('/admin', App\Controllers\Admin\IndexController::class);
$router->controller('/admin/posts', App\Controllers\Admin\PostController::class);
$router->controller('/', App\Controllers\IndexController::class);

//el dispatcher es el objeto que va a tomar la ruta que nos está llegando y va a llamar al método que realmente necesita
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());


$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);//es la respuesta del dispatcher. Esto el lo que vamos a regresar al cliente

    echo $response;


 ?>
