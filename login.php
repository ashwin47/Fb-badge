# login-callback.php
<?php
require( __DIR__.'/facebook_start.php' );

$helper = $fb->getRedirectLoginHelper();

try {
  $accessToken = $helper->getAccessToken();
  } 
    catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
      echo 'Graph returned an error: ' . $e->getMessage();
       exit;
    } 
    catch(Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }

if (isset($accessToken)) {
    // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;
    //echo $_SESSION['facebook_access_token'];

    header("Location: overlay.php"); //redirect
    die();
      //"overlay",array("token"=> $token),true);
    // Now you can redirect to another page and use the
    // access token from $_SESSION['facebook_access_token']
  } elseif ($helper->getError()) {
    // The user denied the request
    var_dump($helper->getError());
    var_dump($helper->getErrorCode());
    var_dump($helper->getErrorReason());
    var_dump($helper->getErrorDescription());
    exit;
  }
http_response_code(400);
exit;

