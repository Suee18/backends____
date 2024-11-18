<?php
// Start session    
session_start();
include_once "../../config/db_config.php";
include_once "../../../models/UsersClass.php";

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check for POST request and JSON content type
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['CONTENT_TYPE'] === 'application/json') {
    $input = json_decode(file_get_contents('php://input'), true);

    $username = $input['username'] ?? '';
    $password = $input['password'] ?? '';

    $user = Users::loginUser($username, $password);

    if (is_string($user)) {
        // Return error if login fails
        echo json_encode(['success' => false, 'error' => $user]);
    } elseif ($user instanceof Users) {
        // Set session and return success with redirect URL
        $_SESSION['user'] = $user;

        // Debugging: Print session data to the terminal
        error_log("Session Data: " . print_r($_SESSION['user'], true));

        $redirect_url = $user->userType === "admin" ? "../admin/admin.php" : "../../../public_html/index.php";

        echo json_encode(['success' => true, 'redirect_url' => $redirect_url]);
    } else {
        // Unknown error
        echo json_encode(['success' => false, 'error' => 'An unknown error occurred.']);
    }
    exit();
}

// If not a valid request, return an error
http_response_code(400);
// echo json_encode(['success' => false, 'error' => 'Invalid request.']);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../../public_html/css/login.css">
    <title>Sign In</title>
</head>

<body>





    <div class="cardContainer">
    <div class="card">
      <!-- Front Side: Login Form -->
      <div class="cardFront">
        <form class="formContainer" id="loginForm" action="" method="post">
        <p class="formTitle">Log in</p>
        
        <input type="text" id="userName" name="userName" required placeholder="Enter your username">
         
          <div class="passwordContainer">
            <input type="password" id="password" name="Password" required placeholder="Enter your password">
            <svg id="togglePassword" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="eye-icon">
              <path
                d="M12 4.5C7.5 4.5 3.7 7.6 2 12c1.7 4.4 5.5 7.5 10 7.5s8.3-3.1 10-7.5c-1.7-4.4-5.5-7.5-10-7.5zm0 12c-2.5 0-4.5-2-4.5-4.5S9.5 7.5 12 7.5 16.5 9.5 16.5 12 14.5 16.5 12 16.5zm0-7.5c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3z">
              </path>
            </svg>
          </div>
          
          <button type="submit" value="Log in" name="Submit" >Log in</button>
          <button class="google">
            <svg viewBox="0 0 256 262" preserveAspectRatio="xMidYMid" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027"
                fill="#4285F4"></path>
              <path
                d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1"
                fill="#34A853"></path>
              <path
                d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782"
                fill="#FBBC05"></path>
              <path
                d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251"
                fill="#EB4335"></path>
            </svg>
            log in with Google
          </button>
          <p class="registerRedirection">No account? <a href="#" id="flipToSignup">Sign-up</a> now!</p>
        </form>
      </div>

      <!-- Back Side: Sign-Up Form -->
      <div class="cardBack">
        <form class="formContainer" id="signupForm">
          <p class="formTitle">Sign up</p>
          <input type="text" id="signupUserName" name="signupUserName" required placeholder="Enter your username">
          <input type="date" id="birthdate" name="birthdate" class="default" required>
          <select id="gender" name="gender" class="default" required>
            <option  value="" disabled selected>Select your gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="prefer_not_to_say">Prefer not to say</option>
          </select>


          <div class="passwordContainer">
            <input type="password" id="signupPassword" name="signupPassword" required placeholder="Enter your password">
            <svg id="togglePasswordSU" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="eye-icon">
              <path
                d="M12 4.5C7.5 4.5 3.7 7.6 2 12c1.7 4.4 5.5 7.5 10 7.5s8.3-3.1 10-7.5c-1.7-4.4-5.5-7.5-10-7.5zm0 12c-2.5 0-4.5-2-4.5-4.5S9.5 7.5 12 7.5 16.5 9.5 16.5 12 14.5 16.5 12 16.5zm0-7.5c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3z">
              </path>
            </svg>
          </div>
          <ul id="passwordErrors" style="color: red; list-style: none; padding: 0; display: none;"></ul>

          <div class="passwordContainer">
            <input type="password" id="confirmPassword" name="confirmPassword" required
              placeholder="Confirm your password">
            <svg id="toggleConfirmPassword" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="eye-icon">
              <path
                d="M12 4.5C7.5 4.5 3.7 7.6 2 12c1.7 4.4 5.5 7.5 10 7.5s8.3-3.1 10-7.5c-1.7-4.4-5.5-7.5-10-7.5zm0 12c-2.5 0-4.5-2-4.5-4.5S9.5 7.5 12 7.5 16.5 9.5 16.5 12 14.5 16.5 12 16.5zm0-7.5c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3z">
              </path>
            </svg>
          </div>
          <small id="confirmPasswordError" style="color: red; display: none;">Passwords do not match.</small>


          <button type="submit">Sign up</button>
          <button class="google">
            <svg viewBox="0 0 256 262" preserveAspectRatio="xMidYMid" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027"
                fill="#4285F4"></path>
              <path
                d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1"
                fill="#34A853"></path>
              <path
                d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782"
                fill="#FBBC05"></path>
              <path
                d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251"
                fill="#EB4335"></path>
            </svg>
            Sign up with Google
          </button>
          <p class="registerRedirection">Already have an account? <a href="#" id="flipToLogin">Log in</a></p>
        </form>
      </div>
    </div>
  </div>








    <script src="../../../public_html/js/login.js"></script>
</body>

</html>