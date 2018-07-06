<?php
//include_once '../config.php';

//guardando los blogposts que estamos creando con nuestro formulario
$result = false;

if (!empty($_POST)){
  $sql = 'INSERT INTO blog_posts (title, content) VALUES (:title, :content)';
  $query = $pdo->prepare($sql);
  $result = $query->execute([
    'title'=> $_POST['title'],
    'content'=> $_POST['content']
  ]);

}
 ?>


<!-- Creando vista para insertar nuevos blogPosts-->
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
        <h2>New Post</h2>
        <p>
          <a class="btn btn-default" href="posts.php">Back</a>
        </p>
<!-- Este bloque PHP nos permite mostrarun mensaje de éxito de la consulta -->
        <?php
         if ($result) {
           echo '<div class="alert alert-success">Post Saved!</div>';
         }

         ?>

  <!--en esta sección vamos a agregar un nuevo formulario después del botón "Back"-->
        <form action="insert-post.php" method="post">
          <div class="form-group">
            <label for="inputTitle">Title</label>
            <input type="text" class="form-control" name="title" id="inputTitle">
          </div>
          <textarea class="form-control "name="content" id="inputContet" rows="5"></textarea>
          <br>
          <input class="btn btn-primary" type="submit" value="Save">
        </form>
      </div>



      <div class="col-md-4">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

      </div>
      </div>

    <div class="row">
      <div class="col-md-12">
        <footer>
          This is a footer<br>
          <a href="index.php">Admin Panel</a>

        </footer>

      </div>

    </div>



  </div>
  </body>
</html>
