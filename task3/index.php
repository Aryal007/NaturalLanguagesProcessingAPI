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
		<form name="insert" action="#" method="post">
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
				<input type="submit" name="submit" value="Insert the news"></input>
			</div>
		</form>
	</div>
	<div class='container'>
		<div class='col-md-12'>
	    	<label>All News</label><hr>
    	</div>
    	<div class='col-md-12'>
    		<?php 
    			$con = mysqli_connect("localhost","worxpro","worxpro","testdb");
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				$sql="SELECT * from news WHERE 1";
				$result = $con->query($sql);
				if ($result->num_rows > 0) {
    				// output data of each row
    				while($row = $result->fetch_assoc()) {
        				?><a href="<?php echo 'news.php?id='.$row['id'];?>"><?php echo $row["Title"]. "<br>";?></a><?php
				    }
				} else {
				    echo "0 results";
				}
				mysqli_close($con);
    		?>
    	</div>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </body>
<html>

<?php
if(isset($_POST['submit']))
{
	$text = $_POST['text'];
	$text = urlencode($text);
	$api_string = "http://gateway-a.watsonplatform.net/calls/text/TextGetCombinedData?extract=keyword,taxonomy&outputMode=json&apikey=fa0dea09f83bc4e1f167a98c012c79559b7b0693&text=".$text;
	$response = file_get_contents($api_string);
	$response = json_decode($response);
	// var_dump($response);die;
	$con = mysqli_connect("localhost","root","","testdb");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	  
	$sql="INSERT INTO news (Title,Description)
		VALUES ('$_POST[title]','$_POST[text]')";

		
	if (!mysqli_query($con,$sql))
  	{
  		die('Error: ' . mysqli_error($con));
  	}
  	else{	
  		$keywordcount = 1;	
  		$news_id = mysqli_insert_id($con);
		if($response->status == "OK"){
			foreach($response->keywords as $row){
				if($keywordcount <= 10){
					$sql="INSERT INTO tags (news_id,tags)
					VALUES ('$news_id','$row->text')";
					mysqli_query($con,$sql);
					$keywordcount++;
				}
			}
		}
?>
	<script>
		alert("News Inserted");
	</script>
<?php
		 
	}
	mysqli_close($con);
}
?> 