<?php

session_start();
unset($_SESSION["valid"]);

header("Location: https://abduvoitov.uz/dormitory/admin/login");
exit();
?>