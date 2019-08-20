<?php

// OTA Updater script
// Made by Atharva Deosthale

require_once "functions.php";

// Inform the brower that the page represents JSON Format

header("Content-Type: application/json");

// Check version

if(!isset($_POST["version"]))
{
	send_response("404","Invalid Request");
	die();
}

// Get version

$version = $_POST["version"];

// Check for updates

if($version == 1.0)
{
	send_response("200","http://localhost/newota/server/cdn/v2.zip");
	die();
}

// Send OTA Update

send_response("403","Latest Version");
die();

// End of script

?>
