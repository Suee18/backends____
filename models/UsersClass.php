<?php
include_once 'C:\xampp\htdocs\SWE Project\SWE_Phase1\app\config\db_config.php';

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
        $sql = "INSERT INTO users (username), (birthdate), (gender), (password), (email), (type), (timeStamp) VALUES ('$user->username', '$user->birthdate', '$user->gender', '$user->passowrd', '$user->email', '$user->userType', '$user->timeStamp')";
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

    static function loginUser($email, $password)
    {
        global $conn;
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $user = null;
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($password === $row["password"]) {
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

}