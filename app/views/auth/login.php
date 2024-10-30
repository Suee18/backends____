<?php
// Start session
session_start();
include_once "../../config/db_config.php";

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Test the database connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$error_message = '';  // Initialize error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];

    // Use prepared statements to prevent SQL Injection
    $sql = "SELECT * FROM user WHERE Email = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        die("Error in SQL query: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $Email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Directly compare the plaintext passwords
        if ($Password === $row["Password"]) { // Plain text comparison
            // Set session variables
            $_SESSION["ID"] = $row["ID"];
            $_SESSION["UserType"] = $row["UserType"];
            $_SESSION["Username"] = $row["Username"];
            $_SESSION["Email"] = $row["email"];
            $_SESSION["Birthdate"] = $row["Birthdate"];
            $_SESSION["Gender"] = $row["Gender"];
            $_SESSION["Persona"] = $row["Persona"];

            header("Location: ../landing_page.php");
            exit;
        } else {
            $error_message = "Invalid Email or Password";
        }
    } else {
        $error_message = "Invalid Email or Password";
    }
}
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
    <div class="biggest-containerLI">
        <!-- <div class="login-container"> -->


        <div class="form-section_LI">
            <form action="" method="post" id="loginForm">
                <p class="formTitle">Log in</p>
                <div class="fieldsConatiner">
                    <label for="email">e-mail :</label>
                    <input type="text" id="email" name="Email" placeholder="Enter your email">
                    <span class="error-message" id="email-error"></span>

                    <label for="password">Password :</label>
                    <input type="password" id="password" name="Password" placeholder="Enter your password">
                    <span class="error-message" id="password-error"></span> <!-- Error container for password -->
                </div>

                <div class="buttonscontainer">
                    <input  class="R_button" type="submit" value="Log in" name="Submit">
                    <input class="R_button" type="reset" value="Reset">
                </div>

                <p class="no-account-text">Don't have an account? <a href="../../views/auth/signup.php" class="no-account-link">Sign up</a> now and explore more features!</p>

            </form>
        </div>

        <!-- 
        <div class="welcome-section">
            <h1>Welcome Back!</h1>
            <p>Our website's slogan and a brief introduction go here.</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div> -->
    </div>
    </div>
    <script src="../../../public_html/js/login.js"></script>
</body>

</html>