<?php

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