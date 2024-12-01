<?php
include_once __DIR__ . '/../app/config/db_config.php';

class Users
{
    public $id;

    public $username;

    public $birthdate;

    public $gender;

    public $password;

    public $email;

    public $userType;

    public $timeStamp;

    function __construct($username, $birthdate, $gender, $password, $email, $userType, $timeStamp)
    {
        $this->username = $username;
        $this->birthdate = $birthdate;
        $this->gender = $gender;
        $this->password = $password;
        $this->email = $email;
        $this->userType = $userType;
        $this->timeStamp = $timeStamp;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    static function getAllUsers()
    {
        global $conn;
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);
        $users = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $user = new Users($row["username"], $row["birthdate"], $row["gender"], $row["password"], $row["email"], $row["type"], $row["timeStamp"]);
                $user->id = $row["ID"];
                array_push($users, $user);
            }
        }

        return $users;
    }

    static function getUserById($id)
    {
        global $conn;
        $sql = "SELECT * FROM users WHERE ID = $id";
        $result = mysqli_query($conn, $sql);
        $user = null;
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $user = new Users($row["username"], $row["birthdate"], $row["gender"], $row["password"], $row["email"], $row["type"], $row["timeStamp"]);
            $user->id = $row["ID"];
        } else {
            $user = null;
        }
        return $user;
    }

    static function getUserByUsername($username)
    {
        global $conn;
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $user = null;
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $user = new Users($row["username"], $row["birthdate"], $row["gender"], $row["password"], $row["email"], $row["type"], $row["timeStamp"]);
            $user->id = $row["ID"];
        } else {
            $user = null;
        }
    }


    public static function addUser($username, $birthdate, $gender, $password, $email, $userType)
    {
        global $conn;
        $username = mysqli_real_escape_string($conn, htmlspecialchars($username));
        $birthdate = mysqli_real_escape_string($conn, htmlspecialchars($birthdate));
        $password = mysqli_real_escape_string($conn, htmlspecialchars($password));
        $userType = mysqli_real_escape_string($conn, htmlspecialchars($userType));
        $email = mysqli_real_escape_string($conn, htmlspecialchars($email));
        $gender = mysqli_real_escape_string($conn, htmlspecialchars($gender));

        $sql = "INSERT INTO users (username, birthdate, gender, password, email, type) 
                VALUES ('$username', '$birthdate', '$gender', '$password', '$email', '$userType')";
        return mysqli_query($conn, $sql);
    }

    public static function updateUser($user_id, $username, $birthdate, $gender, $password, $email, $userType)
    {
        global $conn;
        $user_id = mysqli_real_escape_string($conn, htmlspecialchars($user_id));
        $username = mysqli_real_escape_string($conn, htmlspecialchars($username));
        $birthdate = mysqli_real_escape_string($conn, htmlspecialchars($birthdate));
        $password = mysqli_real_escape_string($conn, htmlspecialchars($password));
        $userType = mysqli_real_escape_string($conn, htmlspecialchars($userType));
        $email = mysqli_real_escape_string($conn, htmlspecialchars($email));
        $gender = mysqli_real_escape_string($conn, htmlspecialchars($gender));

        $sql = "UPDATE users 
                SET username='$username', birthdate='$birthdate', gender='$gender', password='$password', email='$email', type='$userType' 
                WHERE id='$user_id'";
        return mysqli_query($conn, $sql);
    }


    public static function deleteUser($user_id)
    {
        global $conn;
        $user_id = mysqli_real_escape_string($conn, htmlspecialchars($user_id));
        $sql = "DELETE FROM users WHERE id='$user_id'";
        return mysqli_query($conn, $sql);
    }
    static function loginUser($username, $password)
    {
        global $conn;
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $user = null;

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            if ($password === $row["password"]) { // Use proper password hashing in production!
                $user = new Users($row["username"], $row["birthdate"], $row["gender"], $row["password"], $row["email"], $row["type"], $row["timeStamp"]);
                $user->id = $row["ID"];
            } else {
                return "Incorrect password.";
            }
        } else {
            return "User does not exist.";
        }

        return $user;
    }

    static function signUpUser($username, $birthdate, $gender, $password, $email, $userType, $timeStamp)
    {
        global $conn;

        // Check if username already exists
        $sqlUsername = "SELECT * FROM users WHERE username = '$username'";
        $resultUsername = mysqli_query($conn, $sqlUsername);

        // Check if email already exists
        $sqlEmail = "SELECT * FROM users WHERE email = '$email'";
        $resultEmail = mysqli_query($conn, $sqlEmail);

        $errors = ['name' => '', 'email' => ''];

        if (mysqli_num_rows($resultUsername) > 0) {
            $errors['name'] = "Username already exists.";
        }
        if (mysqli_num_rows($resultEmail) > 0) {
            $errors['email'] = "Email already exists.";
        }

        // If there are any errors, return the errors array
        if (!empty($errors['name']) || !empty($errors['email'])) {
            return $errors;
        }

        // If no errors, proceed to create the user
        return self::addUser($username, $birthdate, $gender, $password, $email, $userType);
    }


    static function addUserIntoDBGoogle($name, $email, $gender)
    {
        global $conn;

        $sqlEmail = "SELECT * FROM users WHERE email = '$email'";
        $resultEmail = mysqli_query($conn, $sqlEmail);

        if (mysqli_num_rows($resultEmail) > 0) {
            $user = mysqli_fetch_assoc($resultEmail);

            // Check if the user has logged in with Google before
            if ($user['loginMethod'] == 'google') {
                // Allow the user to log in normally
                return true;
            } else {
                // Redirect back to the signup page
                return [
                    'status' => false,
                    'message' => "User already exists. Please log in with your username and password."
                ];
            }
        }

        // Insert new user into the database
        $sqlInsert = "INSERT INTO users (username, email, gender, loginMethod, type) VALUES ('$name', '$email', '$gender', 'google', 'user')";
        if (mysqli_query($conn, $sqlInsert)) {
            return true;
        } else {
            return [
                'status' => false,
                'message' => "Error: " . mysqli_error($conn)
            ];
        }
    }

    static function loginUserGoogle($name, $email, $gender) {
        global $conn;

        $sqlFindUserWithEmail = "SELECT * FROM users WHERE email='$email'";
        $sqlResult = mysqli_query($conn, $sqlFindUserWithEmail);

        if (mysqli_num_rows($sqlResult) === 0) {
            return self::addUserIntoDBGoogle($name, $email, $gender);
        } else {
            $user = mysqli_fetch_assoc($sqlResult);

            if ($user['loginMethod'] === 'google') {
                return [
                    'status' => true,
                    'message' => "User logged in successfully."
                ];
            } else {
                return [
                    'status' => false,
                    'message' => "User already exists. Please log in with your username and password."
                ];
            }
        }
    }
}