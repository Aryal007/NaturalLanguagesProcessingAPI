<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">

    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

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
		<div class='col-md-9'>
			  <div class="form-group">
			    <label for="title">News Title:</label>
			    <input type="text" class="form-control" name="title" id="title"></input>
			  </div>
		</div>
		<div class='col-md-9'>
			  <div class="form-group">
			    <label for="WEB URL">News description:</label>
			    <textarea class="form-control" rows="5" name="text" id="text"></textarea>
			  </div>
		</div>
		<div class='col-md-3'>
			  <div class="form-group">
			    <label for="WEB URL">Keywords:</label>
			    <textarea class="form-control" rows="5" name="keywords" id="keywords"></textarea>
			  </div>
		</div>
		<div class='col-md-9'>
			<label>Summary</label><hr>
			  <div class="form-group">
			    <label for="WEB URL">News summary:</label>
			    <textarea class="form-control" rows="5" name="text" id="summary"></textarea>
			  </div>
		</div>
		<div class='col-md-3'>
			  <div class="form-group">
			    <label for="WEB URL">Taxonomy (Top 3):</label><hr>
			    <input type="text" class="form-control" name="taxonomy" id="taxonomy1"></input><br>
			    <input type="text" class="form-control" name="taxonomy" id="taxonomy2"></input><br>
			    <input type="text" class="form-control" name="taxonomy" id="taxonomy3"></input>
			  </div>
		</div>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </body>
  <script>
  	$('#text').change(function(){
  		var text = $("#text").val();  		
  		var title = $("#title").val();
  		var taxonomy1 = $("#taxonomy1").val();
  		var taxonomy2 = $("#taxonomy2").val();
  		var taxonomy3 = $("#taxonomy3").val();
  		var uritext = encodeURIComponent(text);
  		var urititle = encodeURIComponent(title);
  		//for keywords and taxonomy
  		$.ajax({
        type:'POST',
        url:'alchemy.php',
        data:"text=" + uritext,
        datatype: JSON,
        success:function(data)
        {
 			var obj = JSON.parse(data);
 			if(obj.status == 'ERROR'){
 				alert(obj.statusInfo);
 				$('#keywords').val(''); 
	        	$('#taxonomy1').val(''); 
	        	$('#taxonomy2').val(''); 
	        	$('#taxonomy3').val(''); 
 				return false;
 			}
 			var keywords = '';
        	$('#keywords').val(''); 
        	$('#taxonomy1').val(''); 
        	$('#taxonomy2').val(''); 
        	$('#taxonomy3').val(''); 
        	for (i = 0; i < obj.keywords.length; i++) {
			    keywords += obj.keywords[i].text + ",";
			}
			for (i = 0; i < 3; i++){
				if(typeof obj.taxonomy[0] != 'undefined'){
					taxonomy1 = obj.taxonomy[0].label;
				}
				if(typeof obj.taxonomy[1] != 'undefined'){
					taxonomy2 = obj.taxonomy[1].label;
				}
				if(typeof obj.taxonomy[2] != 'undefined'){
					taxonomy3 = obj.taxonomy[2].label;
				}
			}
        	document.getElementById('keywords').value = keywords;
        	document.getElementById('taxonomy1').value = taxonomy1;
        	document.getElementById('taxonomy2').value = taxonomy2;
        	document.getElementById('taxonomy3').value = taxonomy3;
        }
    	});
    	//for summary
    	$.ajax({
        type:'POST',
        url:'aylien.php',
        data:"title=" + urititle+"&text=" + uritext,
        datatype: JSON,
        success:function(data)
        {
 			var obj = JSON.parse(data);
 			var summary = '';
        	$('#summary').val(''); 
        	for (i = 0; i < obj.summarize.sentences.length; i++) {
			    summary += obj.summarize.sentences[i]+ " ";
			}
        	document.getElementById('summary').value = summary;
        }
    	});
  	});
  </script>
<html>