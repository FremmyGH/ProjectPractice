<?php
header('Content-Type: application/json');

$n = basename($_SERVER['REQUEST_URI']);
$codes = json_decode(file_get_contents("regions.json"));

$result = $codes->$n;
echo json_encode($result, JSON_UNESCAPED_UNICODE);

require_once "saveResult.php";
Save("../lab_1.json", $result);