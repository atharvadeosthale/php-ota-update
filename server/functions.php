<?php

function send_response($x,$y) {
	$response["status_code"] = $x;
	$response["status_message"] = $y;

	$json = json_encode($response);
	echo $json;
	die();
}

?>