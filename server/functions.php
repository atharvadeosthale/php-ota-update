<?php

// OTA Update Script
// Made by Atharva Deosthale

// Function to send response to the client in the JSON Format

function send_response($x,$y) {
	// Create response in form of array
	$response["status_code"] = $x;
	$response["status_message"] = $y;

	// Encode the data into JSON Format
	$json = json_encode($response);
	// RESPOND
	echo $json;
	die();
}

?>
