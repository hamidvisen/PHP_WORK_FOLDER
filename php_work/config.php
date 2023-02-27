<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('701112338239-0h860mt3u9alg8cbd5gk5au9nkr2asda.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/php_work/login.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>