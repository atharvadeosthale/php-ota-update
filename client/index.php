<?php

require_once "functions.php";

$url = "http://localhost/newota/server/";

$data = [
"version" => "1.0"
];

$datastring = http_build_query($data);

$connection = curl_init();

curl_setopt($connection, CURLOPT_URL, $url);
curl_setopt($connection, CURLOPT_POST, true);
curl_setopt($connection, CURLOPT_POSTFIELDS, $datastring);
curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($connection);

if($response["status_code"] == "200")
{
	$link = $response["status_message"];
}
else
{
	die("You are already using the latest version of product");
}

echo "New version found!<br>Updating Product....";

file_put_contents("update.zip", file_get_contents($response["status_message"]));

// Get Project path
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

header("Location: update_files/update.php");
die();

?>

