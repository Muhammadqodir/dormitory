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

echo("connected");

// $sql = "INSERT INTO `machines` (`id`, `name`, `status`, `additional`) VALUES (NULL, 'Machine2', 'active', 'test');";
// $result = $conn->query($sql);

$sql = "SELECT * FROM `machines`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["status"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>