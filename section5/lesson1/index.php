<?php
  //PDO Database Class & Connection

  require 'classes/Database.php';

  $database = new Database();

  $database->query('SELECT * FROM posts WHERE id = :id');
  $database->bind(':id', 2);
  $rows = $database->resultSet();

?>
<h1>Posts</h1>
<div>
  <?php foreach($rows as $row) : ?>
    <div>
      <h3><?php echo $row['title']; ?></h3>
      <p><?php echo $row['body']; ?></p>
      <h4><?php echo $row['create_date']; ?></h4>
  <?php endforeach; ?>
</div>
