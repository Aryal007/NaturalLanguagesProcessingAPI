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
			$text = $_POST['text'];

			$handle = curl_init();

			curl_setopt($handle, CURLOPT_URL, 'http://api.cortical.io:80/rest/text/keywords?retina_name=en_associative');
			curl_setopt($handle, CURLOPT_POST, true);
			curl_setopt($handle, CURLOPT_POSTFIELDS, $text);
			curl_setopt($handle, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'api-key: 8c8e3f70-6515-11e6-a057-97f4c970893c'));
			curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

			$response = curl_exec($handle);
			curl_close($handle);

			$response = (json_decode($response));			
		?>
		<div class="container">
			<table class="table table-hover">
	  			<tbody>
	  				<tr>
	  					<th colspan='2'>Keywords extraction using cortical.io</th>
	  				</tr>

	  				<tr>
	  					<th>Keywords:</th>
	  					<td><?php foreach($response as $key=>$value){
	  							echo $value.',';
	  						}
	  						?>
	  					</td>
	  				</tr>
				</tbody>
			</table>
		</div>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	</body>