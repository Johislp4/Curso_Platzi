<?php
include_once '../config.php';//en este caso tenemos que especificar la rutadonde se encuentra el archivo, ya que no está en el directorio actual, sino en un directorio superior
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
        <h2>Posts</h2>
        <a class="btn btn-primary" href="insert-post.php">New Post</a>

<!--Vamos a desplegar los blogpost en una tabla para poder asignar llas opciones de eliinar, editar, etc.-->
      <table class="table">
        <tr>
          <th>Title</th>
          <th>Edit</th>
          <th>Delete</th>

        </tr>

        <?php
        foreach ($blogPosts as $blogPost) {
          echo '<tr>';
          echo '<td>' . $blogPost['title'] . '</td>';//OJO:acá se tiene que poner la variable del elemento que estamos recorriendo "blogpost" y no la variable del arreglo "$blogPosts"
          echo '<td>Edit</td>';
          echo '<td>Delete</td>';
          echo '</tr>';
        }

        ?>
      </table>





      </div>
      <div class="col-md-4">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <footer>
          This is a footer<br>
          <a href="admin/index.php">Admin Panel</a>

        </footer>

      </div>

    </div>



  </div>
  </body>
</html>
