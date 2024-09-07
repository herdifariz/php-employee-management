<?php
require_once 'config/database.php';
require_once 'controllers/EmployeeController.php';
require_once 'controllers/UserController.php';

session_start();

$employeeController = new EmployeeController($conn);
$userController = new UserController($conn);

$action = isset($_GET['action']) ? $_GET['action'] : 'login';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Cek Login
if (isset($_SESSION['logged_in']) && $action == 'login') {
  header('Location: index.php?action=dashboard');
  exit();
}

switch ($action) {
  case 'register':
    $userController->store();
    break;
  case 'login':
    $userController->authenticate();
    break;
  case 'logout':
    session_destroy();
    header('Location: index.php?action=login');
    break;
  case 'list':
    $employeeController->index();
    break;
  case 'add':
    $employeeController->add();
    break;
  case 'edit':
    $employeeController->edit($id);
    break;
  case 'delete':
    $employeeController->delete($id);
    break;
  case 'deleteimage':
    $employeeController->deleteImage($id);
    break;
  case 'detail':
    $employeeController->detail($id);
    break;
  case 'dashboard':
    require 'views/dashboard.php';
    break;
  default:
    require 'views/dashboard.php';
    break;
}
?>