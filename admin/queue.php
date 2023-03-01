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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// $sql = "INSERT INTO `machines` (`id`, `name`, `status`, `additional`) VALUES (NULL, 'Machine2', 'active', 'test');";
// $result = $conn->query($sql);
$date_book = file_get_contents("../booking_for.txt");
// echo $date_book;
$sql = "SELECT * FROM `list` WHERE `date` = '$date_book' ORDER BY `time` ASC";
$result = $conn->query($sql);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="../main.css" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>WM-Booking Admin</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"> <img src="../res/logo.png" id="main_logo_nav"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php"><i class="fa-solid fa-gears"></i> Машинки <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href=""><i class="fa-solid fa-list-ul"></i> Очередь <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" action="log_out.php">
        <button class="btn btn-outline-danger my-2 my-sm-0"><i class="fa-solid fa-right-from-bracket"></i>  Logout</button>
      </form>
    </div>
  </nav>


  <div class="container">
    <br>
    <div class="row">
      <div class="col-6">
        <h3>
        <i class="fa-solid fa-list-ul"></i> Очередь
        </h3>
      </div>
      <div class="col-6" style="text-align: right;">
        <button class="btn btn-success my-2 my-sm-0" data-toggle="modal" data-target="#exampleModalCenter" type="submit"><i class="fa-regular fa-calendar-days"></i> Изменить дату</button>
      </div>
    </div>
    <br>
    <?php echo "Запись открыта на <span class=\"badge badge-pill badge-success\">".$date_book."</span>" ?><br><br>
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col" width="50">ID</th>
          <th scope="col">Время брони</th>
          <th scope="col">Занял(Имя)</th>
          <th scope="col">Машинка</th>
          <th scope="col">Время</th>
          <th scope="col" style="width: 150px;">Действия</th>
        </tr>
      </thead>
      <tbody>
<?php

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $machines = str_replace("\",\"", "<br>", $row["machine_nums"]);
    $machines = str_replace("[\"", "", $machines);
    $machines = str_replace("\"]", "", $machines);
    echo("<tr><th scope='row'>".$row["id"]."</th> <td>".$row["date_reg"]."</td> <td>".$row["name"]."</td><td>".$machines."</td><td>".$row["time"]."</td><td><a href='remove_book.php?id=".$row["id"]."' class='btn btn-warning'>Снять бронь</a></td></tr>");
  }
} else {
  echo "0 results";
}

?>
      </tbody>
    </table>
  </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Открыть запись</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Дата</label>
          <input type="date" class="form-control" id="machine_name" placeholder="Название">
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
        <button type="button" onclick="addMachine()" class="btn btn-success">Открыть</button>
      </div>
    </div>
  </div>
</div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://kit.fontawesome.com/7f0d399664.js" crossorigin="anonymous"></script>
  <script src="../scripts.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script>
    function addMachine(){
      var name = $("#machine_name").val();
      window.location.href = encodeURI('https://abduvoitov.uz/dormitory/admin/open_booking.php?date='+name);
    }
  </script>
</body>

</html>

<?php
$conn->close();
?>