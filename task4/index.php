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
		<title>lateral.io recommendation</title>
	</head>

	<body>


<div class="container">
  <form name="insert" action="#" method="post">
  <h2>lateral.io</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Insert</a></li>
    <li><a data-toggle="tab" href="#menu1">Similar</a></li>
    <li><a data-toggle="tab" href="#menu2">Create User</a></li>
    <li><a data-toggle="tab" href="#menu3">Create Preference</a></li>
    <li><a data-toggle="tab" href="#menu4">Get Preference</a></li>
    <li><a data-toggle="tab" href="#menu5">Get Recommendations</a></li>
    <li><a data-toggle="tab" href="#menu6">Delete</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Insert into lateral.io documents</h3>    
        <i>This inserts data from ek_dragon_live db's tkp_news table. Specify the limit and offset for that table to insert multiple data at once.</i>  
        <div class="clearfix"></div>
        <div class='col-md-3'>
            <div class="form-group">
              <label for="title">Limit:</label>
              <input type="text" class="form-control" name="limit" id="limit"></input>
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group">
              <label for="title">Offset:</label>
              <input type="text" class="form-control" name="offset" id="offset"></input>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class='col-md-4'>
          <input type="submit" class="btn btn-success" name="submit" value="Add to lateral.io documents"></input>
          <input type="submit" class="btn btn-primary" name="Get" value="Get all documents"></input>
        </div>
    </div>



    <div id="menu1" class="tab-pane fade">
      <h3>Get Similar documents by document id</h3>
        <i>Gets similar news soleley on the basis of document. (Applicable for related news)</i>  
        <div class="clearfix"></div>
        <div class='col-md-3'>
            <div class="form-group">
              <label for="title">Document ID:</label>
              <input type="text" class="form-control" name="document_id" id="document_id"></input>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class='col-md-4'>
          <input type="submit" class="btn btn-primary" name="similar" value="Get similar documents"></input>
          <input type="submit" class="btn btn-primary" name="Get" value="Get all documents"></input>
        </div>
    </div>

    <div id="menu2" class="tab-pane fade">
      <h3>Create User</h3>
        <i>Create a user to add his/her preference for user specific recommended news. (ID later to be fed from cookie)</i>  
        <div class="clearfix"></div>
      <div class='col-md-3'>
          <div class="form-group">
            <label for="title">User ID:</label>
            <input type="text" class="form-control" name="user_id" id="user_id"></input>
          </div>
      </div>
      <div class="clearfix"></div>
      <div class='col-md-4'>
        <input type="submit" class="btn btn-success" name="create_user" value="Create User"></input>
          <input type="submit" class="btn btn-primary" name="get_user" value="Get all users"></input>
      </div>
    </div>

    <div id="menu3" class="tab-pane fade">
      <h3>Create Preference</h3>
        <i>The user ID and the corresponding document ID that the user viewed. (Later to be fed from cookie)</i>  
        <div class="clearfix"></div>
      <div class='col-md-3'>
          <div class="form-group">
            <label for="title">User ID:</label>
            <input type="text" class="form-control" name="pref_user_id" id="pref_user_id"></input>
          </div>
      </div>
      <div class='col-md-3'>
          <div class="form-group">
            <label for="title">Document ID:</label>
            <input type="text" class="form-control" name="pref_document_id" id="pref_document_id"></input>
          </div>
      </div>
      <div class="clearfix"></div>
      <div class='col-md-3'>
        <input type="submit" class="btn btn-success" name="create_pref" value="Create Preference"></input>
      </div>
    </div>

    <div id="menu4" class="tab-pane fade">
      <h3>Get Preferences</h3>
        <i>Get preferences of a particular user added earlier</i>  
        <div class="clearfix"></div>
      <div class='col-md-3'>
          <div class="form-group">
            <label for="title">User ID:</label>
            <input type="text" class="form-control" name="pref_user_id" id="pref_user_id"></input>
          </div>
      </div>
      <div class="clearfix"></div>
      <div class='col-md-3'>
        <input type="submit" class="btn btn-primary" name="get_preference" value="Get Preferences"></input>
      </div>
    </div>

    <div id="menu5" class="tab-pane fade">
      <h3>Get Recommendations</h3>
        <i>Get recommendation of a particular user based on his ID. (Later to be fed from cookie)</i>  
        <div class="clearfix"></div>
      <div class='col-md-3'>
          <div class="form-group">
            <label for="title">User ID:</label>
            <input type="text" class="form-control" name="recom_user_id" id="recom_user_id"></input>
          </div>
      </div>
      <div class="clearfix"></div>
      <div class='col-md-3'>
        <input type="submit" class="btn btn-primary" name="get_recommendations" value="Get Recommendations"></input>
      </div>
    </div>

    <div id="menu6" class="tab-pane fade">
      <h3>Delete all data</h3>
        <i>Delete all the documents/users/preferences. Caution: once deleted, will have to add all over again.</i>  
        <div class="clearfix"></div>
      <div class='col-md-3'>        
        <input type="submit" class="btn btn-danger" name="delete_all" value="Delete"></input>
      </div>
      <div class="clearfix"></div>
      <h3>Delete a document</h3>
        <i>Delete the documents with given document id. Caution: once deleted, cannot be reverted.</i>  
        <div class="clearfix"></div>
        <div class='col-md-3'>
          <div class="form-group">
            <label for="title">Document ID:</label>
            <input type="text" class="form-control" name="delete_document_document_id" id="delete_document_document_id"></input>
          </div>
        </div>
        <div class="clearfix"></div>
      <div class='col-md-3'>        
        <input type="submit" class="btn btn-danger" name="delete_document" value="Delete document"></input>
      </div>
    </div>
  </div>
  </form>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </body>
<html>

<?php
if(isset($_POST['submit']))
{
  $limit = $_POST['limit'];
  $offset = $_POST['offset'];

	$con = mysqli_connect("localhost","worxpro","worxpro","ek_dragon_live");
	
  if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql="SELECT * from tkp_news WHERE 1 LIMIT ".$limit." OFFSET ".$offset;
	$result = $con->query($sql);
	// var_dump($result->fetch_assoc());die;
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api-v4.lateral.io/documents/".$row['news_id'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\"text\":\"".$row['summary']."\",\"meta\":\"{ \\\"title\\\": \\\"".$row['title']."\\\",\\\"pub_date\\\": \\\"".$row['pub_date']."\\\",\\\"author_ids\\\": \\\"".$row['author_ids']."\\\",\\\"cat_id\\\": \\\"".$row['cat_id']."\\\" }\"}",
        CURLOPT_HTTPHEADER => array(
          "content-type: application/json",
          "subscription-key: 090be9a548c2a181b676a963e5f9a1d8"
        ),
      ));

      $response = curl_exec($curl);
      $response = json_decode($response);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err.'<br>';
      } else {
        echo '<pre>',print_r($response),'</pre>';
      }
    }
	} else {
	    die('Wrong URL');
	}
	mysqli_close($con);	
}

if(isset($_POST['Get']))
{
	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api-v4.lateral.io/documents/?per_page=100",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/json",
    "subscription-key: 7aff1ea51047cde93751ea61a401bab3"
  ),
));

$response = curl_exec($curl);
$response = json_decode($response);

$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo '<pre>',print_r($response),'</pre>';
}
}

if(isset($_POST['similar'])){
  $id = $_POST['document_id'];
	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api-v4.lateral.io/documents/".$id."/similar?fields=meta,text&number=10&unseen_only=true&use_hybrid=false",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/json",
    "subscription-key: 7aff1ea51047cde93751ea61a401bab3"
  ),
));

$response = curl_exec($curl);
$response = json_decode($response);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo '<pre>',print_r($response),'</pre>';
}
}

if(isset($_POST['delete_all'])){
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api-v4.lateral.io/delete-all-data",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "DELETE",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/json",
    "subscription-key: 090be9a548c2a181b676a963e5f9a1d8"
  ),
));

$response = curl_exec($curl);
$response = json_decode($response);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo '<pre>',print_r($response),'</pre>';
}
}

if(isset($_POST['delete_document'])){
  $id = $_POST['delete_document_document_id'];
  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api-v4.lateral.io/documents/".$id,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "DELETE",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/json",
    "subscription-key: 090be9a548c2a181b676a963e5f9a1d8"
  ),
));

$response = curl_exec($curl);
$response = json_decode($response);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo '<pre>',print_r($response),'</pre>';
}
}

if(isset($_POST['create_user'])){
  $id = $_POST['user_id'];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api-v4.lateral.io/users/".$id,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/json",
    "subscription-key: 090be9a548c2a181b676a963e5f9a1d8"
  ),
));

$response = curl_exec($curl);
$response = json_decode($response);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo '<pre>',print_r($response),'</pre>';
}
}


if(isset($_POST['create_pref'])){
  $user_id = $_POST['pref_user_id'];
  $document_id = $_POST['pref_document_id'];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api-v4.lateral.io/users/".$user_id."/preferences/".$document_id,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/json",
    "subscription-key: 090be9a548c2a181b676a963e5f9a1d8"
  ),
));

$response = curl_exec($curl);
$response = json_decode($response);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo '<pre>',print_r($response),'</pre>';
}
}


if(isset($_POST['get_recommendations'])){
  $user_id = $_POST['recom_user_id'];
$curl = curl_init();

curl_setopt_array($curl, array(
  //use_hybrid false gets recommendations on the basis of text of the document only (similarity 0-1)
  //use_hybrid scores each documents and gets recommendations based on that. Also, unseen_only=true can also be only used on hybrid true
  CURLOPT_URL => "https://api-v4.lateral.io/users/".$user_id."/recommendations?fields=meta,text&number=10&unseen_only=true&use_hybrid=false",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/json",
    "subscription-key: 7aff1ea51047cde93751ea61a401bab3"
  ),
));

$response = curl_exec($curl);
$response = json_decode($response);

$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo '<pre>',print_r($response),'</pre>';
}
}

if(isset($_POST['get_user'])){
  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api-v4.lateral.io/users",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/json",
    "subscription-key: 7aff1ea51047cde93751ea61a401bab3"
  ),
));

$response = curl_exec($curl);
$response = json_decode($response);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo '<pre>',print_r($response),'</pre>';
}
}

if(isset($_POST['get_preference'])){
  $user_id = $_POST['pref_user_id'];

  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api-v4.lateral.io/users/".$user_id."/preferences",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/json",
    "subscription-key: 7aff1ea51047cde93751ea61a401bab3"
  ),
));

$response = curl_exec($curl);
$response = json_decode($response);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo '<pre>',print_r($response),'</pre>';
}
}
?> 