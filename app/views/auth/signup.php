<?php
session_start();
include_once "../../config/db_config.php";

$errorMessages = [
    'name' => '',
    'email' => '',
    'password' => '',
    'age' => '',
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
    $birthdate = $_POST["birthdate"];
    $gender = $_POST["gender"];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        $errorMessages['password'] = "Passwords do not match.";
    }

    // Calculate age from birthdate
    $birthDate = new DateTime($birthdate);
    $currentDate = new DateTime();
    $age = $birthDate->diff($currentDate)->y;

    if ($age < 18) {
        $errorMessages['age'] = "Age must be 18 or older. Please enter a valid birthdate.";
    }

    // Check if the email or username already exists
    $checkQuery = "SELECT * FROM users WHERE Username = ? OR email = ?";
    $checkStmt = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($checkStmt, "ss", $firstName, $email);
    mysqli_stmt_execute($checkStmt);
    $checkResult = mysqli_stmt_get_result($checkStmt);

    if (mysqli_num_rows($checkResult) > 0) {
        $row = mysqli_fetch_assoc($checkResult);
        if ($row['Username'] === $firstName) {
            $errorMessages['name'] = "Username already exists. Please choose a different one.";
        }
        if ($row['email'] === $email) {
            $errorMessages['email'] = "Email already exists. Please try with a different one.";
        }
    }

    if (empty(array_filter($errorMessages))) {
        $plainPassword = $password;

        $sql = "INSERT INTO users (Username, email, password, birthdate, gender) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt === false) {
            die("Error preparing the statement: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "sssss", $firstName, $email, $plainPassword, $birthdate, $gender);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../landing_page.php");

            exit;
        } else {
            echo "Error executing the statement: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../../public_html/css/login.css">
    <title>Sign Up</title>
</head>

<body>
    <!-- <div class="signup-container"> -->
    <div class="biggest-containerLI">

        <div class="form-sectionSU">
            <form id="signupForm" action="" method="POST">
                <p class="formTitle"> Sign Up</p>

                <div class="fieldsConatinerSU">

                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required />
                    <span id="nameError" class="error-message"><?php echo $errorMessages['name']; ?></span>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required />
                    <span id="emailError" class="error-message"><?php echo $errorMessages['email']; ?></span>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required />
                    <span id="passwordError" class="error-message"><?php echo $errorMessages['password']; ?></span>

                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm your password" required />
                    <span id="confirmPasswordError" class="error-message"></span>

                    <label for="birthdate">Birthdate</label>
                    <input type="date" id="birthdate" name="birthdate" placeholder="Enter your birthdate" required />
                    <span id="birthdateError" class="error-message"><?php echo $errorMessages['age']; ?></span>

                    <label  for="gender">Gender</label>
                    <select  class="gender-selection"id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <span id="genderError" class="error-message"></span>
                </div>
                <button class="R_button" type="submit" name="signup">Sign Up</button>
            <p id="tempMessage" style="display: none; color: green;">Sign-up successful! Redirecting to login...</p>
            <p class="no-account-text">Already have an account? <a href="../../views/auth/login.php" class="no-account-link">Log in.</a></p>
            </form>
        </div>

        <!-- <div class="welcome-section">
            <h1>Join Us!</h1>
            <p>Create an account and get started today</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f" style="color: #1E3A46;"></i></a>
                <a href="#"><i class="fab fa-instagram" style="color:#1E3A46;"></i></a>
            </div>
        </div> -->
        <!-- </div> -->
    </div>
    <script src="../../../public_html/js/signup.js"></script>
</body>

</html>