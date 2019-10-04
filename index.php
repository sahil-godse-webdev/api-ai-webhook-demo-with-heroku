<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->queryResult->parameters->text;

	switch ($text) {
		case 'hi':
			$speech = "Hi, Nice to meet you";
			break;

		case 'bye':
			$speech = "Bye, good night";
			break;

		case 'anything':
			$speech = "Yes, you can type anything here.";
			break;
		
		default:
			$speech = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}

	//$response = new \stdClass();
	//$response->speech = $text;
	//$response->displayText = $speech;
	//$response->source = "webhook";
	//echo json_encode($response);
	
	$output['speech']= $response['serviceresponse']['responsepreamble']['responsemessage'];
	$output['displayText']= $response['serviceresponse']['responsepreamble']['responsemessage'];
	$output['source']= 'whatever.php';
	
	ob_end_clean();
	echo json_encode($output);
}
else
{
	echo "Method not allowed";
}

?>
