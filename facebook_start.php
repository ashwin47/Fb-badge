<?php 
  ini_set('display_errors',1); 
  error_reporting(E_ALL);
  session_start();
  require( __DIR__.'/Facebook/autoload.php' );
  require( __DIR__.'/cred.php' );
  $fb = new Facebook\Facebook(array(
    'app_id'                => $_YOUR_APP_ID,
    'app_secret'            => $_YOUR_APP_SECRET,
    'default_graph_version' => 'v2.3',
    ));

  $bg_path = "images/bg1.jpeg";

  function debug_to_console($data) {
      if(is_array($data) || is_object($data))
    {
      echo("<script>console.log('PHP: ".json_encode($data)."');</script>");
    } else {
      echo("<script>console.log('PHP: ".$data."');</script>");
    }
  }
