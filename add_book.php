<?php
// print_r($_COOKIE);
// if(isset($_COOKIE["booking"])){
//   echo("exist");
//   exit();
// }else{
//   setcookie("booking", true, time()+20);
// }

  $servername = "localhost";
  $username = "u1635882_dormito";
  $password = "kJ4yL9nO8ioF8cI5";
  $dbname = "u1635882_dormitory";


  $name = $_GET["name"];
  $room = $_GET["room"];
  $time = $_GET["time"];
  $machines = $_GET["machines"];
  $bookingdate = file_get_contents("booking_for.txt");

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $date = date("H:i d.m.Y");
  $sql = "INSERT INTO `list` (`id`, `date`, `time`, `date_reg`, `name`, `phone`, `machine_nums`, `room_num`) VALUES (NULL, '$bookingdate', '$time', '$date', '$name', '', '$machines', '$room');";
  $result = $conn->query($sql);

  $conn->close();
  header("Location: https://abduvoitov.uz/dormitory"); 
  exit();

?>