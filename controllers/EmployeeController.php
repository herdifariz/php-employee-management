<?php
require_once 'models/Employee.php';

class EmployeeController
{
  private $model;

  public function __construct($db)
  {
    $this->model = new Employee($db);
  }

  public function index()
  {
    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
    if ($searchTerm) {
      $employees = $this->model->search($searchTerm);
    } else {
      $employees = $this->model->getAll();
    }
    require 'views/list.php';
  }

  public function add()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $position = $_POST['position'];
      $salary = $_POST['salary'];
      $imagePath = $this->uploadImage('image');

      if ($imagePath === null) {
        $imagePath = null;
      }

      $this->model->add($name, $email, $position, $salary, $imagePath);
      header('Location: index.php?action=list');
    } else {
      require 'views/add.php';
    }
  }

  public function edit($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $position = $_POST['position'];
      $salary = $_POST['salary'];
      $imagePath = isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK
        ? $this->uploadImage('image') : null;

      $this->model->update($id, $name, $email, $position, $salary, $imagePath);
      header('Location: index.php?action=list');
    } else {
      $employee = $this->model->getById($id);
      require 'views/edit.php';
    }
  }

  private function uploadImage($inputName)
  {
    if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] == UPLOAD_ERR_OK) {
      $fileTmpPath = $_FILES[$inputName]['tmp_name'];
      $fileName = $_FILES[$inputName]['name'];
      $uploadDir = 'assets/img/employees/';
      $destPath = $uploadDir . $fileName;

      if (move_uploaded_file($fileTmpPath, $destPath)) {
        return $destPath;
      }
    }
    return null;
  }

  public function deleteImage($id)
  {
    $this->model->deleteImage($id);
    header("Location: index.php?action=edit&id=$id");
  }

  public function delete($id)
  {
    $this->model->delete($id);
    header('Location: index.php?action=list');
  }

  public function detail($id)
  {
    $employee = $this->model->getById($id);
    require 'views/detail.php';
  }
}
?>