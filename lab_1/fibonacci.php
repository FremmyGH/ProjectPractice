<?php
header('Content-Type:application/json');

$fib = basename($_SERVER['REQUEST_URI']);

if($fib > 0)
{
    $result = round(((5 ** .5 + 1) / 2) ** $fib / 5 ** .5);
}
else
{
    $result = null;
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);

require_once "saveResult.php";
Save("../lab_1.json", $result);