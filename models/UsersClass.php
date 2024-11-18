<?php
include_once 'C:\xampp\htdocs\post-phase1-backup\SWE_Phase1\app\config\db_config.php';

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


    function addUserIntoDB($user)
    {
        global $conn;
        $sql = "INSERT INTO users (username, birthdate, gender, password, email, type, timeStamp) 
            VALUES ('$user->username', '$user->birthdate', '$user->gender', '$user->password', '$user->email', '$user->userType', '$user->timeStamp')";

        $result = mysqli_query($conn, $sql);
        return $result;
    }


    function deleteUserFromDB($userId)
    {
        global $conn;
        $sql = "DELETE FROM users WHERE id = '$userId'";
        $result = mysqli_query($conn, $sql);
        return $result;
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
    static function signUpUser($username, $birthdate, $gender, $password, $email = '', $userType, $timeStamp)
    {
        global $conn;
    
        // Check if username already exists
        $sqlUsername = "SELECT * FROM users WHERE username = ?";
        $stmtUsername = $conn->prepare($sqlUsername);
        $stmtUsername->bind_param("s", $username);
        $stmtUsername->execute();
        $resultUsername = $stmtUsername->get_result();
    
        // Check if email already exists
        $sqlEmail = "SELECT * FROM users WHERE email = ?";
        $stmtEmail = $conn->prepare($sqlEmail);
        $stmtEmail->bind_param("s", $email);
        $stmtEmail->execute();
        $resultEmail = $stmtEmail->get_result();
    
        $errors = ['name' => '', 'email' => ''];
    
        if ($resultUsername->num_rows > 0) {
            $errors['name'] = "Username already exists.";
        }
        if (!empty($email) && $resultEmail->num_rows > 0) {
            $errors['email'] = "Email already exists.";
        }
    
        // If there are any errors, return the errors array
        if (!empty($errors['name']) || !empty($errors['email'])) {
            return $errors;
        }
    
        // If no errors, proceed to insert the user
        $sqlInsert = "INSERT INTO users (username, birthdate, gender, password, email, type, timeStamp) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmtInsert = $conn->prepare($sqlInsert);
        $stmtInsert->bind_param("sssssss", $username, $birthdate, $gender, $password, $email, $userType, $timeStamp);
    
        if ($stmtInsert->execute()) {
            return true; // Success
        } else {
            return false; // Failed to insert
        }
    }
}