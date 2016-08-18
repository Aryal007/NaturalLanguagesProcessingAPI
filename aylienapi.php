<!DOCTYPE HTML>
<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<title>News Parsing</title>
	</head>

	<body>
		<?php

			//Alchemy API using IBM Bluemix
			//http://www.alchemyapi.com/api/combined/urls.html
			//IBM AlchemyAPI Free Plan
		    //1,000 API Events per day per Bluemix Organization
			$url = $_POST['url'];

			$api_string = "https://sandbox.aylien.com/textapi/?endpoints=entities&mode=document&language=en&url=".$url;

			$response = file_get_contents($api_string);

			// $response = file_get_contents('http://gateway-a.watsonplatform.net/calls/url/URLGetCombinedData?extract=concept,author,title,keyword,entity,taxonomy,pub-date,doc-sentiment,doc-emotion&outputMode=json&apikey=fa0dea09f83bc4e1f167a98c012c79559b7b0693&showSourceText=1&url=http://kathmandupost.ekantipur.com/news/2016-08-17/readers-want-authentic-voices.html');
			
			$response = json_decode($response);
			$entities = $response->entities;
			
		?>
		<div class="container">
			<table class="table table-hover">
	  			<tbody>
	  				<tr>
	  					<th colspan='2'>Entity Extraction</th>
	  				</tr>

	  				<tr>
	  					<th>Text:</th>
	  					<td><?php echo $entities->text;?></td>
	  				</tr>

	  				<tr>
	  					<th>Language:</th>
	  					<td><?php echo $entities->language;?></td>
	  				</tr>

	  				<tr>
	  					<th>Entities:</th>
  						<td>
  							<?php foreach($entities->entities as $key => $value){
  								echo $key,': ';
  									foreach($value as $key1 => $value1){
  										echo $value1.',';
  									}
									echo'<br>';
  							} ?>  								
						</td>
	  				</tr>

				</tbody>
			</table>
		</div>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	</body>