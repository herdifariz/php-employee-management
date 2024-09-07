<?php
class User
{
  public $conn;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function login($username, $password)
  {
    $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }

  public function register($username, $password)
  {
    // Mengecek apakah username sudah ada
    $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      return false;
    }

    // Simpan user baru
    $stmt = $this->conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param('ss', $username, $password);
    return $stmt->execute();
  }
}
?>