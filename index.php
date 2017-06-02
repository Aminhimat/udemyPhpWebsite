<?php
  class User {

    private $id;
    private $username;
    private $email;
    private $password;

    public function __construct($id, $username, $email, $password) {
      $this->id = $id;
      $this->username = $username;
      $this->email = $email;
      $this->password = $password;
    }

    public function register() {
      echo 'User registered <br />';
    }

    public function login() {
      echo $this->auth_user();
    }

    public function auth_user() {
      echo $this->username.' is authenticated. <br />';
    }

    public function __destruct() {
      echo "Logged out";
    }
  }

  class Post {
    private $name;

    public function __set($name, $value) {
      echo 'Setting '.$name.' to <strong>'.$value.'</strong><br />';
      $this->name = $name;
    }

    public function __get($name) {
      echo 'Getting '.$name.' <strong>'.$this->name.'</strong><br />';
    }

    public function __isset($name) {
      echo 'Is '.$name.' set?<br />';
      return isset($this->name);
    }
  }

  $post = new Post();
  $post->name = 'Testing';
  echo $post->name;
  var_dump(isset($post->name));

 ?>
