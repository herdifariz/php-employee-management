<?php
class Employee
{
  public $conn;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function getAll()
  {
    return $this->conn->query("SELECT * FROM employees")->fetch_all(MYSQLI_ASSOC);
  }

  public function search($searchTerm)
  {
    $stmt = $this->conn->prepare("SELECT * FROM employees WHERE name LIKE ?");
    $searchTerm = "%$searchTerm%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();

    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }

  public function add($name, $email, $position, $salary, $imagePath)
  {
    $stmt = $this->conn->prepare("INSERT INTO employees (name, email, position, salary, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $position, $salary, $imagePath);
    $imagePath = $imagePath !== null ? $imagePath : null;
    $stmt->execute();
  }

  public function getById($id)
  {
    $stmt = $this->conn->prepare("SELECT * FROM employees WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
  }

  public function update($id, $name, $email, $position, $salary, $imagePath)
  {
    if ($imagePath !== null) {
      $stmt = $this->conn->prepare("UPDATE employees SET name = ?, email = ?, position = ?, salary = ?, image = ? WHERE id = ?");
      $stmt->bind_param("sssssi", $name, $email, $position, $salary, $imagePath, $id);
    } else {
      $stmt = $this->conn->prepare("UPDATE employees SET name = ?, email = ?, position = ?, salary = ? WHERE id = ?");
      $stmt->bind_param("ssssi", $name, $email, $position, $salary, $id);
    }
    $imagePath = $imagePath !== null ? $imagePath : null;
    $stmt->execute();
  }

  public function deleteImage($id)
  {
    $stmt = $this->conn->prepare("UPDATE employees SET image = NULL WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
  }

  public function delete($id)
  {
    $stmt = $this->conn->prepare("DELETE FROM employees WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
  }
}
?>