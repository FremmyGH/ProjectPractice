<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
require 'vendor/autoload.php';

$app = new Slim\App;
$app->get('/GetResult', function (Request $request, Response $response, array $args) {
//    $result = mysqli_fetch_all(mysqli_query($GLOBALS["connection"], "CALL `GetClient`"));
    $url = "http://www.mocky.io/v2/5c7db5e13100005a00375fda";

    $api_response = json_decode(file_get_contents($url));
    $res = $api_response->result;
    $find = " ";
    $replace = "_";
    $result = str_replace($find,$replace,$res);
    JSON_save("lab_4.json", json_encode($result));
    return $response->withJSON(
        ["result"=> $result],
        200,
        JSON_UNESCAPED_UNICODE
    );
});
$app->run();
function JSON_save($filename, $response)
{
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $example = array(
        'result' => $response,
        'method' => $_SERVER['REQUEST_METHOD']);
    $json_example = json_encode($example, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    file_put_contents($filename, $json_example . "\n", FILE_APPEND | LOCK_EX);
}
