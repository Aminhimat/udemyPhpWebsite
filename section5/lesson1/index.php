<?php
  //PDO Database Class & Connection

  require 'classes/Database.php';

  $database = new Database();



  $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

  if ($post['submit']) {
    $title = $post['title'];
    $body = $post['body'];

    $database->query('INSERT INTO posts (title, body) VALUES(:title, :body)');
    $database->bind(':title', $title);
    $database->bind(':body', $body);
    $database->execute();

    if($database->lastInsertId) {
      echo '<p>Post Added</p>';
    }
  }

  $database->query('SELECT * FROM posts');
  $rows = $database->resultSet();
?>

<h1>Add post</h1>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
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
  <?php endforeach; ?>
</div>
