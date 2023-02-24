<?php

session_start();
if(!isset($_SESSION["valid"])){
  header("Location: https://abduvoitov.uz/dormitory/admin/login"); 
  exit();
}

$servername = "localhost";
$username = "u1635882_dormito";
$password = "kJ4yL9nO8ioF8cI5";
$dbname = "u1635882_dormitory";

$id = $_GET["id"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM `machines` WHERE `id`=$id";
$result = $conn->query($sql);

$conn->close();
header("Location: https://abduvoitov.uz/dormitory/admin"); 
exit();

?>