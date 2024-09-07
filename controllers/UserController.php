<?php
require_once 'models/User.php';

class UserController
{
  public $model;

  public function __construct($db)
  {
    $this->model = new User($db);
  }

  public function authenticate()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $user = $this->model->login($username, md5($password));

      if ($user) {
        session_start();
        $_SESSION['logged_in'] = true;
        header('Location: index.php?action=dashboard');
      } else {
        $error_message = "Login gagal. Username atau password salah.";
        require 'views/login.php';
        exit();
      }
    } else {
      require 'views/login.php';
    }
  }

  public function store()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $isRegistered = $this->model->register($username, md5($password));

      if ($isRegistered) {
        header('Location: index.php?action=login');
      } else {
        $error_message = "Username sudah dipakai";
        require 'views/register.php';
        exit();
      }
    } else {
      require 'views/register.php';
    }
  }
}
?>