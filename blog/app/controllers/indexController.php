<?php
namespace App\Controllers;

class IndexController extends BaseController{ //para que nuestro Index controller cuente con la función render

  public function getIndex(){
    global $pdo;//Significa que esta variable va a ser importada desdenscope superior

    $query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY id DESC'); //esta consulta quiere decir que queremos que nos de el id más reciente siempre al principio
    $query->execute();

   $blogPosts = $query->fetchAll(\PDO::FETCH_ASSOC); //se crea una nueva variable donde se van a traer todos los blogpost de nuestra base de datos. FetchAll se trae todos los registros que se obtuvieron en la consulta
   return $this->render('index.twig', ['blogPosts' => $blogPosts]);

  }

}
 ?>
