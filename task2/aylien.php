<?php
	//Alchemy API using IBM Bluemix
	//http://www.alchemyapi.com/api/combined/urls.html
	//IBM AlchemyAPI Free Plan
    //1,000 API Events per day per Bluemix Organization\
	$title = $_POST['title'];
	$text = $_POST['text'];
	$title = urlencode($title);
	$text = urlencode($text);

	$api_string = "https://sandbox.aylien.com/textapi/?endpoints=summarize&mode=document&language=en&title=".$title."&text=".$text."&sentences_number=3";
	$response = file_get_contents($api_string);
	echo $response;
?>