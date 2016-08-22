<?php
	//Alchemy API using IBM Bluemix
	//http://www.alchemyapi.com/api/combined/urls.html
	//IBM AlchemyAPI Free Plan
    //1,000 API Events per day per Bluemix Organization\
	$text = $_POST['text'];
	$text = urlencode($text);
	$api_string = "http://gateway-a.watsonplatform.net/calls/text/TextGetCombinedData?extract=keyword,taxonomy&outputMode=json&apikey=fa0dea09f83bc4e1f167a98c012c79559b7b0693&text=".$text;
	$response = file_get_contents($api_string);
	echo $response;
?>