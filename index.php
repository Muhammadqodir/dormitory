<!DOCTYPE html>
<html>

<head>
    <title>Firebase Phone Verification</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
</head>

<body>
    <form action="verification.php">
        <h1>Firebase Phone verification In PHP</h1>
        <div class="formcontainer">
            <hr />
            <div class="container">
                <label for="uname"><strong>Phone Number</strong></label>
                <input type="text" id="number" placeholder="Enter phone number" name="uname" required>
            </div>
            <div id="recaptcha-container"></div>
            <button type="button" onclick="phoneAuth();">Send Otp</button>

    </form>
    <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase.js"></script>
    <script>
        // Your web app's Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyA3mlI-cSGPeKPCybYCOis9wNNb_6U_RDc",
            authDomain: "dormitory-c46bf.firebaseapp.com",
            projectId: "dormitory-c46bf",
            storageBucket: "dormitory-c46bf.appspot.com",
            messagingSenderId: "31407886065",
            appId: "1:31407886065:web:c9595b16efcd966740e350",
            measurementId: "G-H9M9LK0BFR"
        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
    </script>
    <script src="firebase.js" type="text/javascript"></script>
</body>

</html>