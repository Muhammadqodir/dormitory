<!DOCTYPE html>
<html>

<head>
  <title>Firebase Phone Verification</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link href="main.css" rel="stylesheet">
</head>

<body>
  <form>
    <h1>Firebase Phone verification In PHP</h1>
    <div class="formcontainer">
      <hr />
      <div class="container">
        <input type="text" id="verificationCode" placeholder="Enter verification code">

      </div>

      <button type="button" onclick="codeverify();">Verify code</button>

  </form>
  <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase.js"></script>
  <script src="firebase_config.js"></script>
  <script>
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
  </script>
  <script src="firebase.js" type="text/javascript"></script>
</body>

</html>