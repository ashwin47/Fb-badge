<?php 
require( __DIR__.'/facebook_start.php' );
$text = htmlspecialchars($_POST['text']);
//echo $text;
$token = $_SESSION['facebook_access_token'];
var_dump($_SESSION['path']);
$path = $_SESSION['path'];
var_dump($path);
//Upload image
upload($path,$token,$fb,$text);
function upload($path,$token,$fb,$text)
{
	$image = [
	  'caption' => $text,
	  'source' => $fb->fileToUpload($path),
	  
	];

	try {
	  // Returns a `Facebook\FacebookResponse` object
	  $response = $fb->post('/me/photos', $image, $token);
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

	$graphNode = $response->getGraphNode();

	print_r($graphNode);
	//echo " \n Photo ID: " . $graphNode['id'];
}

session_write_close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Show your support for Net Neutralty | Update </title>
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/skeleton.css">
<link rel="icon" type="image/png" href="images/favicon.png">
<link href="css/custom.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<?php include_once("analyticstracking.php") ?>
<img src=<?php echo $bg_path?> class="bg">
<div class="container">
    <div class="row">
      
      <div class="header">
      	<h1>Thank you for your support!</h1>
        <img class="profile" src=<?php echo $path ?> alt="">
      </div>
      <div class="content">
      Your picture is uploaded.
       <br/>
      Spread the word:
        <ul class="share-buttons">
		  <li><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fisupportnetneutrality.in%2F&t=Show%20your%20support%20for%20Net%20Neutralty" title="Share on Facebook" target="_blank"><img src="images/simple_icons_black/Facebook.png"></a></li>
		  <li><a href="https://twitter.com/intent/tweet?source=http%3A%2F%2Fisupportnetneutrality.in%2F&text=Show%20your%20support%20for%20Net%20Neutralty:%20http%3A%2F%2Fisupportnetneutrality.in%2F&via=ashwinm" target="_blank" title="Tweet"><img src="images/simple_icons_black/Twitter.png"></a></li>
		  <li><a href="http://www.reddit.com/submit?url=http%3A%2F%2Fisupportnetneutrality.in%2F&title=Show%20your%20support%20for%20Net%20Neutralty" target="_blank" title="Submit to Reddit"><img src="images/simple_icons_black/Reddit.png"></a></li>
		  <li><a href="mailto:?subject=Show%20your%20support%20for%20Net%20Neutralty&body=Let%20us%20show%20our%20support%20for%20Net%20Neutrality%20by%20changing%20our%20facebook%20profile%20picture:%20http%3A%2F%2Fisupportnetneutrality.in%2F" target="_blank" title="Email"><img src="images/simple_icons_black/Email.png"></a></li>
		</ul>
      
      </div>
      <div class="footer"><a href='https://github.com/ashwin47/Net-Neutral'>Made</a> by <a href="http://twitter.com/ashwinm">@ashwinm</a> </div>
    </div>
</div>


</body>
</html>