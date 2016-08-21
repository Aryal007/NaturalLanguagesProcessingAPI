<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<title>News Parsing</title>
	</head>

	<body>

	<div class='container'>
		<div class='col-md-3'>
			<label>Parse the news using Alchemyapi</label><hr>
			<form action='alchemyapi.php' method="post">
			  <div class="form-group">
			    <label for="WEB URL">Web URL:</label>
			    <input type="text" class="form-control" name='url' id="url" placeholder="Enter web URL">
			  </div>
			  <button type="submit" class="btn btn-default">Parse the News</button>
			</form>
		</div>
		<div class='col-md-3'>
			<label>Parse the news using Aylienapi</label><hr>
			<form action='aylienapi.php' method="post">
			  <div class="form-group">
			    <label for="WEB URL">Web URL:</label>
			    <input type="text" class="form-control" name='url' id="url" placeholder="Enter web URL">
			  </div>
			  <button type="submit" class="btn btn-default">Extract entities using Aylienapi</button>
			</form>
		</div>
		<div class='col-md-6'>
			<label>Cortical.io text analysis for keywords</label><hr>
			<form action='cortical.php' method="post">
			  <div class="form-group">
			    <label for="WEB URL">Enter text:</label>
			    <textarea class="form-control" rows="5" name="text" id="text"></textarea>
			  </div>
			  <button type="submit" class="btn btn-default">Extract keywords using cortical.io</button>
			</form>
		</div>
		<div class='col-md-3'>
			<label>Search News based on title</label><hr>
			<form action='alchemysearch.php' method="post">
			  <div class="form-group">
			    <label for="WEB URL">Enter title:</label>
			    <input type="text" class="form-control" name='title' id="title" placeholder="Enter title">
			  </div>
			  <button type="submit" class="btn btn-default">Search</button>
			</form>
		</div>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </body>
<html>