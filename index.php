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

        <form style="text-align: left;">
            <label class="form-label">Выберите время:</label>

            <div class="btn-group" role="group" style="width: 100%;" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                <label class="btn btn-outline-dark" for="btnradio1">19:00</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                <label class="btn btn-outline-dark" for="btnradio2">19:40</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                <label class="btn btn-outline-dark" for="btnradio3">20:20</label>
            </div>
            <br><br>
            <label class="form-label">Выберите машинку:</label>

            <div class="row">
                <div class="col-md-2 col-3 center">
                    <input type="checkbox" class="check_box" id="checkbox1">
                    <label for="checkbox1"></label><br>
                    <label for="checkbox1">
                        <div class="wm_title">Машинка №1</div>
                        <div class="wm_desc">(gfhg)</div>
                        <label>
                </div>

            </div>
            <br>
            <label for="exampleInputEmail1" class="form-label">Ваше имя:</label>
            <input type="email" class="form-control" placeholder="Андрей" id="exampleInputEmail1" aria-describedby="emailHelp">
            <br>
            <label for="exampleInputEmail1" class="form-label">Номер комнаты:</label>
            <input type="email" class="form-control" placeholder="821" id="exampleInputEmail1" aria-describedby="emailHelp">
            <br>
            <div style="text-align: center;">
                <button type="submit" class="btn btn-dark" style="margin: auto;">Забронировать</button>
            </div>
        </form>

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
    <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase.js"></script>
    <script src="firebase_config.js"></script>
    <script>
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
    </script>
    <script src="firebase.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>