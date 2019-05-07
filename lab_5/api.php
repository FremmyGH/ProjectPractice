<?php
require 'db_conf.php';
$result='';
//Get
if(isset($_GET["Get"]))
{
    if($_GET["Get"]=="Клиенты"){
        $result = mysqli_fetch_all(mysqli_query($GLOBALS["connection"], "CALL `GetClient`"), MYSQLI_ASSOC);
        echo (json_encode($result));
        JSON_save("lab_5.json", json_encode(array(
            "GetClient"=> $result
        )), $_SERVER['REQUEST_METHOD']);
    }
    if($_GET["Get"]=="Услуги"){
        $result = mysqli_fetch_all(mysqli_query($GLOBALS["connection"], "CALL `GetService`"));
        echo (json_encode($result));
        JSON_save("lab_5.json", json_encode(array(
            "GetService"=> $result
        )), $_SERVER['REQUEST_METHOD']);
    }
    if($_GET["Get"]=="Заявки"){
        $result = mysqli_fetch_all(mysqli_query($GLOBALS["connection"], "CALL `GetRequest`"));
        echo (json_encode($result));
        JSON_save("lab_5.json", json_encode(array(
            "GetRequest"=> $result
        )), $_SERVER['REQUEST_METHOD']);
    }
}
//Insert
if(isset($_GET["InsertClient"]))
{
        $name=$_GET["name"];
        (mysqli_query($GLOBALS["connection"], "CALL InsertClient('$name')"));
        echo (json_encode($result));
        JSON_save("lab_5.json", json_encode(array(
            "InsertClient"=> $result
        )), $_SERVER['REQUEST_METHOD']);
}
if(isset($_GET["InsertRequest"]))
{
    $client=$_GET["client"];
    (mysqli_query($GLOBALS["connection"], "CALL InsertRequest('$client')"));
    echo (json_encode($result));
    JSON_save("lab_5.json", json_encode(array(
        "InsertRequest"=> $result
    )), $_SERVER['REQUEST_METHOD']);
}
if(isset($_GET["InsertService"]))
{
    $name=$_GET["name"];
    $price=$_GET["price"];
    (mysqli_query($GLOBALS["connection"], "CALL InsertService('$name','$price')"));
    echo (json_encode($result));
    JSON_save("lab_5.json", json_encode(array(
        "InsertService"=> $result
    )), $_SERVER['REQUEST_METHOD']);
}
//Update
if(isset($_GET["UpdateClient"]))
{
    $id=$_GET["id"];
    $name=$_GET["name"];
    (mysqli_query($GLOBALS["connection"], "CALL UpdateClient('$id','$name')"));
    echo (json_encode($result));
    JSON_save("lab_5.json", json_encode(array(
        "UpdateClient"=> $result
    )), $_SERVER['REQUEST_METHOD']);
}
if(isset($_GET["UpdateRequest"]))
{
    $id=$_GET["id"];
    $client=$_GET["client"];
    (mysqli_query($GLOBALS["connection"], "CALL UpdateRequest('$id','$client')"));
    echo (json_encode($result));
    JSON_save("lab_5.json", json_encode(array(
        "UpdateRequest"=> $result
    )), $_SERVER['REQUEST_METHOD']);
}
if(isset($_GET["UpdateService"]))
{
    $id=$_GET["id"];
    $name=$_GET["name"];
    $price=$_GET["price"];
    (mysqli_query($GLOBALS["connection"], "CALL UpdateService('$id','$name','$price')"));
    echo (json_encode($result));
    JSON_save("lab_5.json", json_encode(array(
        "UpdateService"=> $result
    )), $_SERVER['REQUEST_METHOD']);
}
//Delete
if(isset($_GET["DeleteClient"]))
{
    $id=$_GET["id"];
    (mysqli_query($GLOBALS["connection"], "CALL DeleteClient('$id')"));
    echo (json_encode($result));
    JSON_save("lab_5.json", json_encode(array(
        "DeleteClient"=> $result
    )), $_SERVER['REQUEST_METHOD']);
}
if(isset($_GET["DeleteRequest"]))
{
    $id=$_GET["id"];
    (mysqli_query($GLOBALS["connection"], "CALL DeleteRequest('$id')"));
    echo (json_encode($result));
    JSON_save("lab_5.json", json_encode(array(
        "DeleteRequest"=> $result
    )), $_SERVER['REQUEST_METHOD']);
}
if(isset($_GET["DeleteService"]))
{
    $id=$_GET["id"];
    (mysqli_query($GLOBALS["connection"], "CALL DeleteService('$id')"));
    echo (json_encode($result));
    JSON_save("lab_5.json", json_encode(array(
        "DeleteService"=> $result
    )), $_SERVER['REQUEST_METHOD']);
}
function JSON_save($filename, $response, $method)
{
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $example = array(
        'url' => $url,
        'response' => $response,
        'method' => $method);
    $json_example = json_encode($example, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    file_put_contents($filename, $json_example . "\n", FILE_APPEND | LOCK_EX);
}