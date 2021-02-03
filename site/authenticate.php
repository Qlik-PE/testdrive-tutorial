<?php
session_start();
require '../userinfo.php'; # retrieve generated user info
$username = USERNAME;
$password = PASSWORD;
$tutorialType = TUTORIALTYPE;
$ip = EXTERNAL_IP;

function getProtocol() {
   $protocol = "http";
   if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
      $protocol = "https";
   }
   return $protocol;
}

//  check to see if data was passed via the URI
if (isset($_GET['username'], $_GET['password'])) {
   $user_in = $_GET['username'];
   $pw_in = $_GET['password'];
   if (!empty($user_in) && !empty($pw_in)) {
      if (urldecode($user_in) == $username) {
         // User name matches, now we verify the password.
         if (urldecode($pw_in) == $password) {
            // Verification success! User has loggedin!
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $username;
            // login success. Redirect to getting started.
            $loc = sprintf("Location: %s://%s/%s/getting-started/getting-started.php", 
                         getProtocol(), $ip, $tutorialType);
            header($loc);
            exit();
         }
      }
   }
}

// Now we check if the data was submitted, isset will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
   // Could not get the data that should have been sent.
   die ('Username and/or password not received!');
}
$user_in = $_POST['username'];
$pw_in = $_POST['password'];
if (urldecode($_POST['username']) == $username) {
   // User name matches, now we verify the password.
   if (urldecode($_POST['password']) == $password) {
      // Verification success! User has loggedin!
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['name'] = $username;
      // login success. Redirect to getting started.
      $loc = sprintf("Location: %s://%s/%s/getting-started/getting-started.php", 
                        getProtocol(), $ip, $tutorialType);
      //$loc = sprintf("Location: ./getting-started/getting-started.php", $ip);
      header($loc);
   } else {
      $loc = sprintf("Location: %s://%s/login.html", getProtocol(), $ip);
      header($loc);
   }
} else {
   $loc = sprintf("Location: %s://%s/login.html", getProtocol(), $ip);
   header($loc);
}
?>
