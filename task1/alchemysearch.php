<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="UTF-8">
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
			//fa0dea09f83bc4e1f167a98c012c79559b7b0693
			//fcd3536b6cee8adae1d1e8204086704a5dcc109e
			//Alchemy API using IBM Bluemix
			//http://www.alchemyapi.com/api/combined/urls.html
			//IBM AlchemyAPI Free Plan
		    //1,000 API Events per day per Bluemix Organization
			$title = $_POST['title'];
			$titles = str_replace(' ','^',$title);
			$titles = 'A['.$titles.']';
			$api_string = "https://gateway-a.watsonplatform.net/calls/data/GetNews?q.enriched.url.title=".$titles."&apikey=fcd3536b6cee8adae1d1e8204086704a5dcc109e&outputMode=json&start=now-1d&end=now&return=enriched.url.url,enriched.url.title";
			// die($api_string);

			$response = file_get_contents($api_string);
			// $response = file_get_contents('http://gateway-a.watsonplatform.net/calls/url/URLGetCombinedData?extract=concept,author,title,keyword,entity,taxonomy,pub-date,doc-sentiment,doc-emotion&outputMode=json&apikey=fa0dea09f83bc4e1f167a98c012c79559b7b0693&showSourceText=1&url=http://kathmandupost.ekantipur.com/news/2016-08-17/readers-want-authentic-voices.html');
			
			$response = json_decode($response);

			// die(var_dump($response));
			
		?>
		<div class="container">
			<table class="table table-hover">
	  			<tbody>
	  				<tr>
	  					<th>Total transactions:</th>
	  					<td colspan='2'><?php echo $response->totalTransactions;?></td>
	  				</tr>

	  				<tr>
	  					<th>Title</th>
	  					<th>URL</th>
	  					<th>Time</th>
	  				</tr>

  					<?php 
  					if(isset($response->result->docs)){
  						foreach($response->result->docs as $row){?>
		  				<tr>
		  					<td><?php echo $row->source->enriched->url->title;?></td>
		  					<td><?php echo $row->source->enriched->url->url;?></td>
		  					<td><?php echo date('Y-m-d H:i:s', $row->timestamp)?></td>
		  				</tr>
  					<?php }
  					} 
  					else {?>
  						<tr>
  							<td colspan='3'>No news for <?php echo $title;?> found</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	</body>