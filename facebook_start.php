<?php 
 ini_set('display_errors',1); 
   error_reporting(E_ALL);
  session_start();
  //require_once '/src/facebook/autoload.php';
  require( __DIR__.'/Facebook/autoload.php' );
  # Facebook PHP SDK v5: Check Login Status Example
 
// // Choose your app context helper
//   $helper = $fb->getCanvasHelper();
//   //$helper = $fb->getPageTabHelper();
//   //$helper = $fb->getJavaScriptHelper();
   
//   // Grab the signed request entity
//   $sr = $helper->getSignedRequest();
   
//   // Get the user ID if signed request exists
//   $user = $sr ? $sr->getUserId() : null;
   
//   if ( $user ) {
//     try {
   
//       // Get the access token
//       $accessToken = $helper->getAccessToken();
//     } catch( Facebook\Exceptions\FacebookSDKException $e ) {
   
//       // There was an error communicating with Graph
//       echo $e->getMessage();
//       exit;
//     }
//   }
  /* Create our Application instance (replace this with your appId and secret). */
$fb = new Facebook\Facebook(array(
  'app_id'                => 'YOUR_APP_ID',
  'app_secret'            => 'YOUR_APP_SECRET',
  'default_graph_version' => 'v2.3',
  ));
function debug_to_console($data) {
    if(is_array($data) || is_object($data))
  {
    echo("<script>console.log('PHP: ".json_encode($data)."');</script>");
  } else {
    echo("<script>console.log('PHP: ".$data."');</script>");
  }
}
