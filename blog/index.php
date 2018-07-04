<?php
include_once 'config.php';
$query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY id DESC'); //esta consulta quiere decir que queremos que nos de el id más reciente siempre al principio
$query->execute();

$blogPosts = $query->fetchAll(PDO::FETCH_ASSOC); //se crea una nueva variable donde se van a traer todos los blogpost de nuestra base de datos. FetchAll se trae todos los registros que se obtuvieron en la consulta

 ?>


<!-- Creando la vista inicial de mi blog-->
<html>
  <head>
    <meta charset="utf-8">
    <title>Blog</title>

<!-- la línea a continuación corresponde a bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Blog Title</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">

      <?php
      //En este bloque php vamos a insertar los valores que estamos leyendo de nuestras entradas
      foreach($blogPosts as $blogPost){
        echo '<div class="blog-post">';
        echo '<h2> '. $blogPost['title'] . '</h2>';
        echo '<p>jan 1, 2020 by <a href="">Alex</a></p>';
        echo '<div class="blog-post-image">';
        echo '<img src="images/bosque.jpg" alt="" height="300" width="650">';
        echo '</div>';
        echo '<div class="blog-post-content">';
        echo $blogPost['content'];
        echo '</div>';
        echo '</div>';

      }

       ?>



      </div>
      <div class="col-md-4">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <footer>
          This is a footer<br>
          <a href="admin/admin.php">Admin Panel</a>

        </footer>

      </div>

    </div>



  </div>
  </body>
</html>
