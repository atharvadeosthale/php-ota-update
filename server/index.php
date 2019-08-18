<?php

// OTA Updater script
// Made by Atharva Deosthale

require_once "functions.php";

header("Content-Type: application/json");

if(!isset($_POST["version"]))
{
	send_response("404","Invalid Request");
	die();
}

$version = $_POST["version"];

if($version == 1.0)
{
	send_response("200","http://localhost/newota/server/cdn/v2.zip");
	die();
}

send_response("403","Latest Version");
die();

?>