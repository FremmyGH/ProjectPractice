<?php
header('Content-Type: application/json');

if (isset ( $_GET['date']))
	{
	    day( $_GET['date']);
	}
if (isset($_GET['a']) and isset($_GET['b']) and isset($_GET['c']))
{
    //Получаем a,b,c уравнения и передаем методу
    equation($_GET['a'], $_GET['b'], $_GET['c']);
}
function Save($file, $result)
{
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $record = array(
        'url' => $url,
        'result' => $result,
        'method' => $_SERVER['REQUEST_METHOD']);

    $json_record = json_encode($record, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    file_put_contents($file, $json_record . "\n", FILE_APPEND | LOCK_EX);
}
function day($date){
    $str = explode(".", $date);
    $result = date("l", mktime(0,0,0, $str[1], $str[0], $str[2]));
    echo json_encode($result);
    Save("../lab_1.json", $result);
}
function equation($a,$b,$c){
    $D = ($b*$b) - (4*$a*$c);
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
    Save("../lab_1.json", $result);
}