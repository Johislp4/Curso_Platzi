<?php
namespace App\Controllers\Admin;
class PostController {

  public function getIndex() {
    global $pdo;
    $query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY id DESC'); //esta consulta quiere decir que queremos que nos de el id más reciente siempre al principio
    $query->execute();

    $blogPosts = $query->fetchAll(\PDO::FETCH_ASSOC); //se crea una nueva variable donde se van a traer todos los blogpost de nuestra base de datos. FetchAll se trae todos los registros que se obtuvieron en la consulta

    return render ('../views/admin/posts.php', ['blogPosts' => $blogPosts]);
  }

  public function getCreate(){
    return render('../views/admin/insert-post.php');
  }

  public function postCreate() {
    global $pdo;
    $sql = 'INSERT INTO blog_posts (title, content) VALUES (:title, :content)';
    $query = $pdo->prepare($sql);
    $result = $query->execute([
      'title'=> $_POST['title'],
      'content'=> $_POST['content']
    ]);


    return render('../views/admin/insert-post.php', ['result'=>$result]);

  }

}




 ?>
