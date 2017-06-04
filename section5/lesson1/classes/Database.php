<?php

  class Database {

    private $host = 'localhost';
    private $user = 'root';
    private $pass = '123456';
    private $dbname = 'myblog';
    //Dabatase handler
    private $dbh;
    private $error;
    //Statement property
    private $stmt;

    public function __construct() {
      // Set DSN
      $dsn = 'mysql::host='. $this->host . ';dbname=' . $this->dbname;
      //Set Options
      $options = array(
        PDO::ATTR_PERSISTENT => TRUE,
        PDO::ATTR_ERRORMODE =>  PDO::ERRMODE_EXCEPTION
      );
      // Create new PDO instant
      try {
        $this->dbh= new PDO($dsn, $this->user, $this->pass, $options);
      } catch(PDOException $e){
        $this->error = $e->getMessage();
      }
    }
  }

?>
