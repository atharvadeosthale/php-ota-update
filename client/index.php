<?php

// OTA Update Script
// Made by Atharva Deosthale

// Require functions file
require_once "functions.php";

// Set cURL URL
$url = "http://localhost/newota/server/";

// set POST data
$data = [
"version" => "1.0"
];

// Create HTTP POST Data
$datastring = http_build_query($data);

// open connection
$connection = curl_init();

// set cURL options
curl_setopt($connection, CURLOPT_URL, $url); // url
curl_setopt($connection, CURLOPT_POST, true); // POST
curl_setopt($connection, CURLOPT_POSTFIELDS, $datastring); // set data for post
curl_setopt($connection, CURLOPT_RETURNTRANSFER, true); // return data without echoing

// establish connection and execute instruction and capture the response
$response = curl_exec($connection);

// check response for updates
if($response["status_code"] == "200")
{
	// save link
	$link = $response["status_message"];
}
else
{
	// kill app 
	die("You are already using the latest version of product");
}

// Start update
echo "New version found!<br>Updating Product....";

// Download update package
file_put_contents("update.zip", file_get_contents($response["status_message"]));

// Get project path
define('_PATH', dirname(__FILE__));

// Zip file name
$filename = 'update.zip';
$zip = new ZipArchive;
$res = $zip->open($filename);
if ($res === TRUE) {

 // Unzip path
 $path = _PATH."/update_files/";

 // Extract file
 $zip->extractTo($path);
 $zip->close();

 echo 'Unzip!';
} else {
 echo 'failed!';
}

// start update process
header("Location: update_files/update.php");
die();

?>

