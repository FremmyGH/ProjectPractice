<?php

header('Content-Type: application/json');

$date = $_GET['date'];
$str = explode(".", $date);
$result = date("l", mktime(0,0,0, $str[1], $str[0], $str[2]));

echo json_encode($result, JSON_UNESCAPED_UNICODE);

require_once "saveResult.php";
Save("../lab_1.json", $result);


