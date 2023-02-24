<?php
session_start();
if(isset($_SESSION["valid"])){
  header("Location: https://abduvoitov.uz/dormitory/admin"); 
  exit();
}
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

// $sql = "INSERT INTO `machines` (`id`, `name`, `status`, `additional`) VALUES (NULL, 'Machine2', 'active', 'test');";
// $result = $conn->query($sql);

$sql = "SELECT * FROM `machines`";
$result = $conn->query($sql);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="../../main.css" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>WM-Booking Admin</title>
</head>

<body>
  

<div class="container" style="text-align: center;">
        <img src="../../res/logo.png" id="main_logo">
        <h3>WM-Booking</h3>
        <p>Система бронирования стиральных машинок для общежитий</p>

        <form action="login.php" method="post" style="text-align: left; max-width: 300px; margin:auto; text-align: center;">
            <br>
            <label for="exampleInputEmail1" class="form-label">Логин</label>
            <input type="text" name="login" class="form-control" placeholder="Логин" id="login">
            <br>
            <label for="exampleInputEmail1" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" placeholder="Пароль" id="password">
            <br>
            <!-- <label for="exampleInputEmail1" class="form-label">Номер телефона:</label>
            <input type="tel" class="form-control" placeholder="+7(999)999-99-99" id="phoneNum" aria-describedby="emailHelp">
            <br> -->
        <button class="btn btn-dark" style="margin: auto;">Войти</button>
            <?php
              if(isset($_GET["warning"])){
                echo "<br>";
                echo "<span class='badge badge-pill badge-danger'>".$_GET["warning"]."</span>";
              }
            ?>
        </form>

        <div class="fotter">
            Designed by <a href="https://vk.com/mqodir" target="_blank">Muhammadqodir</a>
        </div>
    </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://kit.fontawesome.com/7f0d399664.js" crossorigin="anonymous"></script>
  <script src="../scripts.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>

<?php
$conn->close();
?>