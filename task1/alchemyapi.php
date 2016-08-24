<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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

			$api_string = "http://gateway-a.watsonplatform.net/calls/url/URLGetCombinedData?extract=concept,author,title,keyword,entities,taxonomy,doc-sentiment,doc-emotion&outputMode=json&apikey=fa0dea09f83bc4e1f167a98c012c79559b7b0693&showSourceText=1&url=".$url;

			$response = file_get_contents($api_string);
			// $response = file_get_contents('http://gateway-a.watsonplatform.net/calls/url/URLGetCombinedData?extract=concept,author,title,keyword,entity,taxonomy,pub-date,doc-sentiment,doc-emotion&outputMode=json&apikey=fa0dea09f83bc4e1f167a98c012c79559b7b0693&showSourceText=1&url=http://kathmandupost.ekantipur.com/news/2016-08-17/readers-want-authentic-voices.html');
			
			$response = json_decode($response);
			
			// echo '<pre>',print_r($response),'</pre>';
		?>
		<div class="container">
			<table class="table table-hover">
	  			<tbody>
	  				<tr>
	  					<th>URL:</th>
	  					<td><?php echo $response->url;?></td>
	  				</tr>

	  				<tr>
	  					<th>Transactions:</th>
	  					<td><?php echo $response->totalTransactions;?></td>
	  				</tr>

	  				<tr>
	  					<th>Language:</th>
	  					<td><?php echo $response->language;?></td>
	  				</tr>

	  				<tr>
	  					<th>Title:</th>
	  					<td><?php echo $response->title;?></td>
	  				</tr>

	  				<tr>
	  					<th>News:</th>
	  					<td><?php echo $response->text;?></td>
	  				</tr>

	  				<tr>
	  					<th>Author:</th>
	  					<td><?php echo $response->author;?></td>
	  				</tr>

	  				<tr>
	  					<th rowspan='<?php echo sizeof($response->entities)+1;?>'>Entities:</th>
  					</tr>

  					<?php foreach($response->entities as $row) { ?>
  						<tr>
							<td>
							<?php foreach($row as $key=>$value){
								if($key != 'disambiguated'){
									echo $key.' => '.$value.'<br>'; 
								}
							}?>
							</td>
	  					</tr>
  					<?php } ?>

	  				<tr>
	  					<th>Document Sentiment:</th>
  						<td>
  							<?php foreach($response->docSentiment as $key => $value){?>
  								<?php echo $key.' => '.$value.'<br>';?>
  							<?php } ?>  								
						</td>
	  				</tr>

	  				<tr>
	  					<th rowspan='<?php echo sizeof($response->concepts)+1;?>'>Concepts:</th>
  					</tr>

  					<?php foreach($response->concepts as $row) { ?>
  						<tr>
							<td>
							<?php foreach($row as $key=>$value){
								echo $key.' => '.$value.'<br>'; 
							}?>
							</td>
	  					</tr>
  					<?php } ?>

  					<tr>
	  					<th rowspan='<?php echo sizeof($response->taxonomy)+1;?>'>Taxonomy:</th>
  					</tr>

  					<?php foreach($response->taxonomy as $row) { ?>
  						<tr>
							<td>
							<?php foreach($row as $key=>$value){
								echo $key.' => '.$value.'<br>'; 
							}?>
							</td>
	  					</tr>
  					<?php } ?>

  					<tr>
	  					<th rowspan='<?php echo sizeof($response->keywords)+1;?>'>Keywords:</th>
  					</tr>

  					<?php foreach($response->keywords as $row) { ?>
  						<tr>
							<td>
							<?php foreach($row as $key=>$value){
								echo $key.' => '.$value.'<br>'; 
							}?>
							</td>
	  					</tr>
  					<?php } ?>

					<tr>
	  					<th>Document Emotions:</th>
  						<td>
  							<?php foreach($response->docEmotions as $key => $value){?>
  								<?php echo $key.' => '.$value.'<br>';?>
  							<?php } ?>  								
						</td>
	  				</tr>
				</tbody>
			</table>
		</div>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	</body>