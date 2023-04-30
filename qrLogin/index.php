<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QR</title>
</head>

<body>
  <div style="text-align: center;">
    <h2>Отсканируйте QR код</h2>
    <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https://abduvoitov.uz/dormitory/qrLogin/login.php&choe=UTF-8" title="Link to Google.com" />
  </div>
</body>

<script>
  var checker = setInterval(function() {
    const Http = new XMLHttpRequest();
    const url = 'https://abduvoitov.uz/dormitory/qrLogin/checkIsLogin.php';
    Http.open("GET", url);
    Http.send();

    Http.onreadystatechange = (e) => {
      if(Http.responseText == "true"){
        console.log("loggedIn");
        clearInterval(checker);
        window.location.replace('https://abduvoitov.uz/dormitory/qrLogin/admin.php');
      }else{
        console.log("waiting...");
      }
    }
  }, 800);
</script>

</html>