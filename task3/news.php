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
	<?php 
		$con = mysqli_connect("localhost","root","","testdb");
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$sql="SELECT * from news WHERE id =".$_GET['id'];
		$result = $con->query($sql);
		// var_dump($result->fetch_assoc());die;
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$title = $row["Title"];
				$description = $row["Description"];
		    }
		} else {
		    die('Wrong URL');
		}
		mysqli_close($con);
	?>
	<div class='container'>
		<div class='col-md-9'>
		  <div class="form-group">
		    <b><?php echo $title;?></b>
		  </div>
		</div>
		<div class='col-md-9'>
		  <div class="form-group">
		    <label>News description:</label>
		    <p><?php echo $description;?></p>
		  </div>
		</div>
		<div class='col-md-3'>
			<label>Related news:</label>
			<div class='clearfix'></div>
			<?php 
    			$con = mysqli_connect("localhost","root","","testdb");
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				$sql="SELECT * from tags WHERE news_id=".$_GET['id'];
				$result = $con->query($sql);
				$tag_string = "(";
				if ($result->num_rows > 0) {
    				// output data of each row
    				while($row = $result->fetch_assoc()) {
    					$tag_string .= "'".$row['tags']."',";
				    }
				    $tag_string .= "' ')";
				} else {
				    $tag_string = "(' ')";
				}
				$related = "SELECT tags.news_id,news.Title, news.id as id, COUNT(news_id) as repeat_keyword FROM tags 
							JOIN news ON
							tags.news_id = news.id
							WHERE tags in $tag_string GROUP BY news_id
							ORDER BY repeat_keyword DESC LIMIT 3 OFFSET 1";
				// die($related);
				$related_news = $con->query($related);
				if ($related_news->num_rows > 0) {
					while($row = $related_news->fetch_assoc()) {
						echo '<a href="news.php?id='.$row["id"].'">* '.$row['Title'].'('.$row["repeat_keyword"].')</a></br>';
					}
				}
				mysqli_close($con);
    		?>
		</div>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </body>
<html>