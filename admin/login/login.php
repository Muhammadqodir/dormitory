<?php

$servername = "localhost";
$username = "u1635882_dormito";
$password = "kJ4yL9nO8ioF8cI5";
$dbname = "u1635882_dormitory";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$login = $_POST["login"];
$password = $_POST["password"];
$sql = "SELECT * FROM `admins` WHERE `login`='$login' AND `password`='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $date = date("Y-m-d H:i:s");
  $sql = "UPDATE `admins` SET `last_seen`='$date' WHERE `login`='$login'";
  $result = $conn->query($sql);
  session_start();
  $_SESSION["valid"] = true;
  header("Location: https://abduvoitov.uz/dormitory/admin");
  exit();
} else {
  header("Location: https://abduvoitov.uz/dormitory/admin/login");
  exit();
}
$conn->close();

?>