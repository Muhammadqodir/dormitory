<?php

$file = 'locations.json';

$json = file_get_contents('php://input');
$data = json_encode($_POST) . "\r\n";
file_put_contents($file, "POST /locations: " . $data, FILE_APPEND);
