<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<fieldset class="field">
    <legend>Клиенты</legend>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Клиенты" name="Get">
        </fieldset>
    </form>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Добавить" name="InsertClient">
            <label>Имя</label><input type="text" name="name">
        </fieldset>
    </form>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Обновить" name="UpdateClient">
            <label>ID клиента</label><input type="text" name="id">
            <label>Имя</label><input type="text" name="name">
        </fieldset>
    </form>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Удалить" name="DeleteClient">
            <label>ID клиента</label><input type="text" name="id">
        </fieldset>
    </form>
</fieldset>


<fieldset class="field">
    <legend>Заявки</legend>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Заявки" name="Get">
        </fieldset>
    </form>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Добавить" name="InsertRequest">
            <label>ID клиента</label><input type="text" name="client">
        </fieldset>
    </form>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Обновить" name="UpdateRequest">
            <label>ID заявки</label><input type="text" name="id">
            <label>ID клиента</label><input type="text" name="client">
        </fieldset>
    </form>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Удалить" name="DeleteRequest">
            <label>ID заявки</label><input type="text" name="id">
        </fieldset>
    </form>
</fieldset>


<fieldset class="field">
    <legend>Услуги</legend>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Услуги" name="Get">
        </fieldset>
    </form>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Добавить" name="InsertService">
            <label>Название</label><input type="text" name="name">
            <label>Цена</label><input type="text" name="price">
        </fieldset>
    </form>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Обновить" name="UpdateService">
            <label>ID услуги</label><input type="text" name="id">
            <label>Название</label><input type="text" name="name">
            <label>Цена</label><input type="text" name="price">
        </fieldset>
    </form>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Удалить" name="DeleteService">
            <label>ID услуги</label><input type="text" name="id">
        </fieldset>
    </form>
</fieldset>

<?php
require 'db_conf.php';
$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$file = file_get_contents('lab_5.json');
if (isset($_GET["Get"])) {
    $api = 'http://pp/lab_5/api.php?Get='.$_GET["Get"];
    $ur = file_get_contents($api, $_SERVER['REQUEST_METHOD']);
    $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
    unset($list);
}
//Insert
if (isset($_GET["InsertClient"])){
    $api = 'http://pp/lab_5/api.php?InsertClient=Добавить&name='.$_GET["name"];
    $ur = file_get_contents($api, $_SERVER['REQUEST_METHOD']);
    $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
    unset($list);
}
if (isset($_GET["InsertRequest"])){
    $api = 'http://pp/lab_5/api.php?InsertRequest=Добавить&client='.$_GET["client"];
    $ur = file_get_contents($api, $_SERVER['REQUEST_METHOD']);
    $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
    unset($list);
}
if (isset($_GET["InsertService"])){
    $api = 'http://pp/lab_5/api.php?InsertService=Добавить&name='.$_GET["name"].'&price='.$_GET["price"];
    $ur = file_get_contents($api, $_SERVER['REQUEST_METHOD']);
    $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
    unset($list);
}
//Update
if (isset($_GET["UpdateClient"])){
    $api = 'http://pp/lab_5/api.php?UpdateClient=Обновить&id='.$_GET["id"].'&name='.$_GET["name"];
    $ur = file_get_contents($api, $_SERVER['REQUEST_METHOD']);
    $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
    unset($list);
}
if (isset($_GET["UpdateRequest"])){
    $api = 'http://pp/lab_5/api.php?UpdateRequest=Обновить&id='.$_GET["id"].'&client='.$_GET["client"];
    $ur = file_get_contents($api, $_SERVER['REQUEST_METHOD']);
    $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
    unset($list);
}
if (isset($_GET["UpdateService"])){
    $api = 'http://pp/lab_5/api.php?UpdateService=Обновить&id='.$_GET["id"].'&name='.$_GET["name"].'&price='.$_GET["price"];
    $ur = file_get_contents($api, $_SERVER['REQUEST_METHOD']);
    $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
    unset($list);
}
//Delete
if (isset($_GET["DeleteClient"])){
    $api = 'http://pp/lab_5/api.php?DeleteClient=Удалить&id='.$_GET["id"];
    $ur = file_get_contents($api, $_SERVER['REQUEST_METHOD']);
    $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
    unset($list);
}
if (isset($_GET["DeleteRequest"])){
    $api = 'http://pp/lab_5/api.php?DeleteRequest=Удалить&id='.$_GET["id"];
    $ur = file_get_contents($api, $_SERVER['REQUEST_METHOD']);
    $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
    unset($list);
}
if (isset($_GET["DeleteService"])){
    $api = 'http://pp/lab_5/api.php?DeleteService=Удалить&id='.$_GET["id"];
    $ur = file_get_contents($api, $_SERVER['REQUEST_METHOD']);
    $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
    unset($list);
}