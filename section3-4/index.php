<?php
  // Section 3 OOP Fundamentals

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
      echo 'Setting '.$name.' to: <strong>'.$value.'</strong><br />';
      $this->name = $name;
    }

    public function __get($name) {
      echo 'Getting '.$name.': <strong>'.$this->name.'</strong><br />';
    }

    public function __isset($name) {
      echo 'Is '.$name.' set?<br />';
      return isset($this->name);
    }
  }

  //$post = new Post();
  //$post->name = 'Testing';
  //echo $post->name;
  //var_dump(isset($post->name));


  // Working with extending classes
  class First {
    protected $id = 23;
    protected $name = "John Doe";

    public function saySomething($word) {
      echo $word;
    }
  }

  class Second extends First {
    public function getName() {
      echo $this->name;
    }
  }

  $second = new Second();

  //echo $second->getName();

  //Section 4 Advanced OOP

  //Static Methods and Properties

  class StaticUser {

    public $username;
    public static $minPassLength = 5;

    public static function validatePassword($password) {
      if(strlen($password) >= self::$minPassLength) {
        return true;
      }

      else {
        return false;
      }
    }
  }

  //$password = "pass";
  //if (StaticUser::validatePassword($password)) {
  //  echo "Password is valid";
  //}

  //else {
  //  echo "Password is not valid";
  //}

  //Abstract Classes and Methods

  abstract class AbstractAnimal {

    public $name;
    public $color;

    public function describe() {
      return $this->name.' is '.$this->color.'<br />';
    }

    abstract public function makeSound();
  }

  class Duck extends AbstractAnimal {
    public function describe() {
      return parent::describe();
    }

    public function makeSound() {
      return "Quack! <br />";
    }
  }

  class Dog extends AbstractAnimal {
    public function describe() {
      return parent::describe();
    }

    public function makeSound() {
      return "Woof!";
    }
  }

  $animal = new Duck();

  //Autoloading Classes and Final Keyword
  spl_autoload_register(function($className){
	include $className . ".php";
});


  $foo = new Foo();

  $bar = new Bar();

  //Object Iteration

  class People {

    public $person1 = "Mike";
    public $person2 = "Shelly";
    public $person3 = "Jeff";

    protected $person4 = "John";

    private $person5 = "Jen";

    public function iterateObject() {
      foreach($this as $key => $value) {
        print  "$key => $value\n";
      }
    }
  }

  $people = new People();

  $people->iterateObject();
 ?>
