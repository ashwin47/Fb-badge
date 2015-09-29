<?php

  require( __DIR__.'/facebook_start.php' );
  $helper = $fb->getRedirectLoginHelper();
 
  $permissions = ['email', 'user_posts','publish_actions']; // optional
  $callback    = 'http://localhost/net-neutral/login.php';
  $loginUrl    = $helper->getLoginUrl($callback, $permissions);

  //Selecting a random image 
  $bg=['images/bg1.jpeg','images/bg2.jpg'];
  $bg_path=$bg[array_rand($bg)];
  //debug_to_console($bg_path));
?>


<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Show your support for Net Neutralty </title>
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
    <img src=<?php echo $bg_path?> class="bg">
    <div class="container">
      <div class="row">
        
        <div class="header">
          <h1>Show your support for Net Neutralty</h1>
          <img class="profile" src= alt="images/modi.jpg">
        </div>
        <div class="content">
        <p>Let us show our support for Net Neutrality by changing our facebook profile picture </p>
      
        
          <a class="button button-primary" href=<?php echo htmlspecialchars($loginUrl)?> > Log in with Facebook </a>


        
        
        </div>
        <ul class="share-buttons">
            <li><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fisupportnetneutrality.in%2F&t=" title="Share on Facebook" target="_blank"><img src="images/simple_icons_black/Facebook.png"></a></li>
            <li><a href="https://twitter.com/intent/tweet?source=http%3A%2F%2Fisupportnetneutrality.in%2F&text=:%20http%3A%2F%2Fisupportnetneutrality.in%2F" target="_blank" title="Tweet"><img src="images/simple_icons_black/Twitter.png"></a></li>
            <li><a href="http://www.reddit.com/submit?url=http%3A%2F%2Fisupportnetneutrality.in%2F&title=" target="_blank" title="Submit to Reddit"><img src="images/simple_icons_black/Reddit.png"></a></li>
            <li><a href="mailto:?subject=&body=:%20http%3A%2F%2Fisupportnetneutrality.in%2F" target="_blank" title="Email"><img src="images/simple_icons_black/Email.png"></a></li>
          </ul>
        <footer class="footer">Made by <a href="http://twitter.com/ashwinm">@ashwinm</a> </footer>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    
  </body>
</html>