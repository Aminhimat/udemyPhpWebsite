<?php
  //PDO Database Class & Connection

  require 'classes/Database.php';

  $database = new Database();



  $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

  if ($_POST['delete']) {
    $delete_id =  $_POST['delete_id'];
    $database->query('DELETE FROM posts WHERE id=:id');
    $database->bind(':id', $delete_id);
    $database->execute();
  }

  if ($post['submit']) {
    $id = $post['id'];
    $title = $post['title'];
    $body = $post['body'];

    $database->query('UPDATE posts SET title=:title, body=:body WHERE id=:id');
    $database->bind(':id', $id);
    $database->bind(':title', $title);
    $database->bind(':body', $body);
    $database->execute();
  }

  $database->query('SELECT * FROM posts');
  $rows = $database->resultSet();
?>

<h1>Add post</h1>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
  <label>Text ID</label><br />
  <input type="text" name="id" placeholder="Specify ID"/>
  <br /><br />
  <label>Text Title</label><br />
  <input type="text" name="title" placeholder="Add a title..."/>
  <br /><br />
  <label>Text Body</label>
  <br/>
  <textarea name="body"></textarea>
  <br/>
  <input type="submit" name="submit" value="submit"/>
</forn>

<h1>Posts</h1>
<div>
  <?php foreach($rows as $row) : ?>
    <div>
      <h3><?php echo $row['title']; ?></h3>
      <p><?php echo $row['body']; ?></p>
      <h4><?php echo $row['create_date']; ?></h4>
      <form method='post' action="<?php $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>"/>
        <input type="submit" name="delete" value='Delete'/>
      </form>
    </div>
  <?php endforeach; ?>
</div>
