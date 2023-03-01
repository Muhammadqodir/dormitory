<?php

session_start();
if(!isset($_SESSION["valid"])){
  header("Location: https://abduvoitov.uz/dormitory/admin/login"); 
  exit();
}

file_put_contents("../booking_for.txt", date("d.m.Y", strtotime($_GET["date"])));
header("Location: https://abduvoitov.uz/dormitory/admin/queue.php"); 
exit();

?>