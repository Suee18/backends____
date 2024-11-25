<?php
include_once __DIR__ . '/../app/config/db_config.php';
require_once __DIR__ . '/../models/UsersClass.php';
require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../env_loader.php';

// Handle "Sign up with Google"
$client = new Google\Client;
$client->setClientId($_ENV['GOOGLE_CLIENT_ID']);
$client->setClientSecret($_ENV['GOOGLE_CLIENT_SECRET']);
$client->setRedirectUri($_ENV['GOOGLE_REDIRECT_URI']);

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token["access_token"]);
    $oauth = new Google\Service\Oauth2($client);
    $user = $oauth->userinfo->get();

    $email = $user->email;
    $name = $user->name;
    $gender = $user->gender;

    $response = Users::addUserIntoDBGoogle($name, $email, $gender);

    if ($response) {
        // Redirect to the home page or dashboard after successful login
       header("Location: index.php");
        exit;
        // echo "User added successfully";
    } else {
        // If there is an issue with adding the user, redirect to the login page
        header('Location: /../SWE_Project/SWE_Phase1/app/views/auth/login.php');
        exit;
    }
} else {
    // If no authorization code is provided, redirect to the login page
    header('Location: /../SWE_Project/SWE_Phase1/app/views/auth/login.php');
    exit;
}
