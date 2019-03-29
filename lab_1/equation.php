<?php
header('Content-Type: application/json');
$a = $_GET['a'];
$b = $_GET['b'];
$c = $_GET['c'];

$D = ($b*$b) - (4*$a*$c);
//echo $D;
$result = array();
if ($D>0) {
    $result[] = (-$b + sqrt($D)) / (2*$a);
    $result[] = (-$b - sqrt($D)) / (2*$a);
}
elseif ($D==0){
    $result[] = -$b / (2*$a);
}
else{
    $result[] = null;
}

echo json_encode($result);

require_once "saveResult.php";
Save("../lab_1.json", $result);