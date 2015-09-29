#overlay
<?php 
	require( __DIR__.'/facebook_start.php' );

	$token = $_SESSION['facebook_access_token'];
   	//$r = new HttpRequest('https://graph.facebook.com/me?access_token='.$r, HttpRequest::METH_POST);

	$output = curly($token);
	echo $output;
	$r=json_decode($output, true); //To Array
	$id= $r['id'];
	$path = "cache/".$id.".jpg";
	// only create if not already exists in cache
	if (!file_exists($path)){	
		create($id, $path);
	}
	else{
		echo " \n already exitst : ".$path;
	}
	//override line 13. Always create for testing purposes
	//create($id, $path);
		//output as jpeg
	//header('Content-Type: image/jpg');
	//readfile($path);
	upload($path,$token,$fb);


	// HttpRequest for user profile image 
	function curly($token){

        // create curl resource
		$ch = curl_init();

        // set url
		curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/me?access_token=".$token);

        //return the transfer as a string
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
		$output = curl_exec($ch);

        // close curl resource to free up system resources
		curl_close($ch); 

		return $output;
	}

	// Create image 
	function create($id, $path){

	    // base image is just a transparent png in the same size as the input image
		$base_image = imagecreatefrompng("images/fbimage-template.png");
	    // Get the facebook profile image in 200x200 pixels
		$photo = imagecreatefromjpeg("http://graph.facebook.com/".$id."/picture?width=920&height=920");
		//$photo = imagecreatefromjpeg("http://graph.facebook.com/".$id."/picture?width=200&height=200");
		
	    // read overlay  
		$overlay = imagecreatefrompng("images/fbimage-overlay.png");
	    // keep transparency of base image
		imagesavealpha($base_image, true);
		imagealphablending($base_image, true);
	    // place photo onto base (reading all of the photo and pasting unto all of the base)
		imagecopyresampled($base_image, $photo, 0, 0, 0, 0, 200, 200, 200, 200);
		
	    // place overlay on top of base and photo
		imagecopy($base_image, $overlay, 0, 0, 0, 0, 200, 200);
	    // Save as jpeg
		imagejpeg($base_image, $path);
	}

	//Upload image
	function upload($path,$token,$fb)
	{
		$image = [
		  'caption' => 'Created using http://isupportnetneutrality.in/',
		  'source' => $fb->fileToUpload($path),
		  'is_silhouette' => true,
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
		echo " \n Photo ID: " . $graphNode['id'];
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
    <title>Show your support for Net Neutralty | Success </title>
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
<img src="images/bg2.jpg" class="bg">
    <div class="container">
	    <div class="row">
	      
	      <div class="header">
	      	<h1>Thank you for your support!</h1>
	        <img class="profile" src=<?php echo $path ?> alt="">
	      </div>
	      <div class="content">
	      <p></p>
	    
	      
	        <a class="button button-primary" href=<?php echo htmlspecialchars($loginUrl)?> > Log in with Facebook </a>
	      
	      </div>
	      <footer class="footer">Made by <a href="http://twitter.com/ashwinm">@ashwinm</a> </footer>
	    </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    
  </body>
</html>