<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
require 'vendor/autoload.php';
require 'db_conf.php';
$app = new Slim\App;
$result = '';
$app->get('/getClient', function (Request $request, Response $response, array $args) {
    $result = mysqli_fetch_all(mysqli_query($GLOBALS["connection"], "CALL `GetClient`"));
    JSON_save("lab_2.json", json_encode(array(
        'getClient'=> $result
    )),"GET");
    return $response->withJSON(
        ['getClient'=> $result],
        200,
        JSON_UNESCAPED_UNICODE
    );
});
$app->get('/getService', function (Request $request, Response $response, array $args) {
    $result = mysqli_fetch_all(mysqli_query($GLOBALS["connection"], "CALL `GetService`"));
    JSON_save("lab_2.json", json_encode(array(
        "getService"=> $result
    )),"GET");
    return $response->withJSON(
        ["getService"=> $result],
        200,
        JSON_UNESCAPED_UNICODE
    );
});
$app->get('/getRequest', function (Request $request, Response $response, array $args) {
    $result = mysqli_fetch_all(mysqli_query($GLOBALS["connection"], "CALL `GetRequest`"));
    JSON_save("lab_2.json", json_encode(array(
        "getRequest"=> $result
    )),"GET");
    return $response->withJSON(
        ["getRequest"=> $result],
        200,
        JSON_UNESCAPED_UNICODE
    );
});
$app->get('/getRequestService', function (Request $request, Response $response, array $args) {
    $result = mysqli_fetch_all(mysqli_query($GLOBALS["connection"], "CALL `GetRequestService`"));
    JSON_save("lab_2.json", json_encode(array(
        "getRequestService"=> $result
    )),"GET");
    return $response->withJSON(
        ["getRequestService"=> $result],
        200,
        JSON_UNESCAPED_UNICODE
    );
});
/*INSERT*/
$app->get('/insertClient/{Name}', function (Request $request, Response $response, array $args) {
    $name = $args['Name'];
    $result = mysqli_query($GLOBALS["connection"],
        "CALL `InsertClient`('".$name."')");
    if ($result == "1")
    {
        JSON_save("lab_2.json", json_encode(array('insertClient'=> "Insert succesfull")),"POST");
    }
    return $response->withJSON(
        ['InsertClient'=> $result],
        200,
        JSON_UNESCAPED_UNICODE
    );
});
$app->get('/insertRequest/{Client_ID}', function (Request $request, Response $response, array $args) {
    $name = $args['Client_ID'];
    $result = mysqli_query($GLOBALS["connection"],
        "CALL `InsertRequest`('".$name."')");
    if ($result == "1")
    {
        JSON_save("lab_2.json", json_encode(array('insertRequest'=> "Insert succesfull")),"POST");
    }
    return $response->withJSON(
        ['InsertRequest'=> $result],
        200,
        JSON_UNESCAPED_UNICODE
    );
});
$app->get('/insertService/{Name}&{Price}', function (Request $request, Response $response, array $args) {
    $name = $args['Name'];
    $price = $args['Price'];
    $result = mysqli_query($GLOBALS["connection"],
        "CALL `InsertService`('".$name."','".$price."')");
    if ($result == "1")
    {
        JSON_save("lab_2.json", json_encode(array('insertService'=> "Insert succesfull")),"POST");
    }
    return $response->withJSON(
        ['InsertService'=> $result],
        200,
        JSON_UNESCAPED_UNICODE
    );
});
$app->get('/insertRequestService/{Request_ID}&{Service_ID}', function (Request $request, Response $response, array $args) {
    $request = $args['Request_ID'];
    $service = $args['Service_ID'];
    $result = mysqli_query($GLOBALS["connection"],
        "CALL `InsertRequestService`('".$request."','".$service."')");
    if ($result == "1")
    {
        JSON_save("lab_2.json", json_encode(array('insertRequestService'=> "Insert succesfull")),"POST");
    }
    return $response->withJSON(
        ['InsertRequestService'=> $result],
        200,
        JSON_UNESCAPED_UNICODE
    );
});
/*UPDATE*/
$app->get('/updateClient/{id}&{Name}', function (Request $request, Response $response, array $args) {
    $id = (int)$args['id'];
    $name = $args['Name'];
    $result = mysqli_query($GLOBALS["connection"],
        "CALL `UpdateClient`('".$id."','".$name."')");
    if ($result == "1")
    {
        JSON_save("lab_2.json", json_encode(array('UpdateClient'=> "Update succesfull")),"PUT");
    }
    return $response->withJSON(
        ['UpdateClient'=> $result],
        200,
        JSON_UNESCAPED_UNICODE
    );
});
$app->get('/updateRequest/{id}&{Client_ID}', function (Request $request, Response $response, array $args) {
    $id = (int)$args['id'];
    $name = $args['Client_ID'];
    $result = mysqli_query($GLOBALS["connection"],
        "CALL `UpdateRequest`('".$id."','".$name."')");
    if ($result == "1")
    {
        JSON_save("lab_2.json", json_encode(array('UpdateRequest'=> "Update succesfull")),"PUT");
    }
    return $response->withJSON(
        ['UpdateRequest'=> $result],
        200,
        JSON_UNESCAPED_UNICODE
    );
});
$app->get('/updateService/{id}&{Name}&{Price}', function (Request $request, Response $response, array $args) {
    $id = (int)$args['id'];
    $name = $args['Name'];
    $price = $args['Price'];
    $result = mysqli_query($GLOBALS["connection"],
        "CALL `UpdateService`('".$id."','".$name."','".$price."')");
    if ($result == "1")
    {
        JSON_save("lab_2.json", json_encode(array('UpdateService'=> "Update succesfull")),"PUT");
    }
    return $response->withJSON(
        ['UpdateService'=> $result],
        200,
        JSON_UNESCAPED_UNICODE
    );
});
/*DELETE*/
$app->get('/deleteClient/{id}', function (Request $request, Response $response, array $args) {
    $id = (int)$args['id'];
    $result = mysqli_query($GLOBALS["connection"],
        "CALL `DeleteClient`('".$id."')");
    if ($result == "1")
    {
        JSON_save("lab_2.json", json_encode(array('DeleteClient'=> "Delete succesfull")),"DELETE");
    }
    return $response->withJSON(
        ['DeleteClient'=> $result],
        200,
        JSON_UNESCAPED_UNICODE
    );
});
$app->get('/deleteRequest/{id}', function (Request $request, Response $response, array $args) {
    $id = (int)$args['id'];
    $result = mysqli_query($GLOBALS["connection"],
        "CALL `DeleteRequest`('".$id."')");
    if ($result == "1")
    {
        JSON_save("lab_2.json", json_encode(array('DeleteRequest'=> "Delete succesfull")),"DELETE");
    }
    return $response->withJSON(
        ['DeleteRequest'=> $result],
        200,
        JSON_UNESCAPED_UNICODE
    );
});
$app->get('/deleteService/{id}', function (Request $request, Response $response, array $args) {
    $id = (int)$args['id'];
    $result = mysqli_query($GLOBALS["connection"],
        "CALL `DeleteService`('".$id."')");
    if ($result == "1")
    {
        JSON_save("lab_2.json", json_encode(array('DeleteService'=> "Delete succesfull")),"DELETE");
    }
    return $response->withJSON(
        ['DeleteService'=> $result],
        200,
        JSON_UNESCAPED_UNICODE
    );
});
$app->run();
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