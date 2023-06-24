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

// $sql = "INSERT INTO `machines` (`id`, `name`, `status`, `additional`) VALUES (NULL, 'Machine2', 'active', 'test');";
// $result = $conn->query($sql);

$sql = "SELECT * FROM `machines` ORDER BY ABS(name)";
$result = $conn->query($sql);

$booking_for = file_get_contents("booking_for.txt");
$time = "21:00";

?>
<!DOCTYPE html>
<html>

<head>
    <title>WM-Booking-Общежитие 5(СКФУ)</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="container" style="text-align: center;">
        <img src="res/logo.png" id="main_logo">
        <h3>WM-Booking</h3>
        <p>Система бронирования стиральных машинок для общежитий</p>
        <?php if($booking_for != "closed") : ?>

        <h5 style="color: red;">Запись на: <?php echo $booking_for ?></h5>
            
        <form style="text-align: left;">
            <label class="form-label">Выберите время:</label>

            <div class="btn-group" role="group" style="width: 100%;" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
                <a href="index.php" class="btn btn-outline-dark">19:00</a>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                <a href="1940.php" class="btn btn-outline-dark">19:40</a>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                <a href="2020.php" class="btn btn-outline-dark">20:20</a>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" checked>
                <a href="2100.php" class="btn btn-outline-dark">21:00</a>

            </div>
            <br><br>
            <label class="form-label">Выберите машинку:</label>

            <div class="row">

<?php

$free_machines = 0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $availability = "Свободно";

    $sql = "SELECT * FROM `list` WHERE `date`='$booking_for' AND `time`='$time' AND `machine_nums` LIKE '%".$row["name"]."\"%'";
    // echo $sql;
    $queue = $conn->query($sql);

    if ($queue->num_rows > 0) {
        $row_book = $queue->fetch_assoc();
        $availability = $row_book["name"];
    }
    $disabled = "disabled";
    $desc = "wm_desc_booked";
    if($availability == "Свободно"){
        $disabled = "";
        $desc = "wm_desc";
        $free_machines++;
    }
    $machine = '
    <div class="col-md-2 col-3 center">
    <input onchange="machineSelected(this, \''.$row["name"].'\')" type="checkbox" class="check_box"'.$disabled.' id="checkbox'.$row["id"].'">
    <label for="checkbox'.$row["id"].'"></label><br>
    <label for="checkbox'.$row["id"].'">
        <div class="wm_title">'.$row["name"].'</div>
        <div class="'.$desc.'">('.$availability.')</div>
        <label>
    </div>';

    echo $machine;
  }
} else {
  echo "0 results";
}
?>

            </div>

            <?php echo "<div style=\"text-align: center; font-weight: bold;\"> Свободных машинок: ".$free_machines . "шт</div>" ?>
            <br>
            <label for="name" class="form-label">Ваше имя и фималия:</label>
            <input type="text" class="form-control" placeholder="Андрей" id="name">
            <br>
            <label for="room" class="form-label">Номер комнаты:</label>
            <input type="tel" class="form-control" placeholder="821" id="room">
            <br>
            <!-- <label for="exampleInputEmail1" class="form-label">Номер телефона:</label>
            <input type="tel" class="form-control" placeholder="+7(999)999-99-99" id="phoneNum" aria-describedby="emailHelp">
            <br> -->

            <div style="text-align: center;">
                <div id="recaptcha-container"></div><br>
            </div>
        </form>
        <button class="btn btn-dark" onclick="submitBtn()" style="margin: auto;">Забронировать</button>
        <?php else : ?>
            <br>
        <h5 style="color: red;">Запись закрыта</h5>
        <?php endif; ?>

        <div class="fotter">
            Designed by <a href="https://vk.com/mqodir" target="_blank">Muhammadqodir</a>
        </div>
    </div>




    <!-- <form action="verification.php">
        <h1>Firebase Phone verification In PHP</h1>
        <div class="formcontainer">
            <hr />
            <div class="container">
                <label for="uname"><strong>Phone Number</strong></label>
                <input type="text" id="number" placeholder="Enter phone number" name="uname" required>
            </div>
            <div id="recaptcha-container"></div>
            <button type="button" onclick="phoneAuth();">Send Otp</button>

    </form> -->

    <script>
        var selected_time = "<?php echo $time ?>";
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase.js"></script>
    <script src="scripts.js" crossorigin="anonymous"></script>
    <script src="firebase_config.js"></script>
    <script>
        $('#phoneNum').inputmask("+7(999)999-99-99");
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
    </script>
    <script src="firebase.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
<?php
$conn->close();
?>