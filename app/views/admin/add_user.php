<?php
include_once "../../config/db_config.php"; 


//add
 
        $username = mysqli_real_escape_string($conn, htmlspecialchars($_POST["username"]));
        $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST["password"]));
        $type = mysqli_real_escape_string($conn, htmlspecialchars($_POST["user_type"]));
        $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST["email"]));
        $gender = mysqli_real_escape_string($conn, htmlspecialchars($_POST["gender"]));

        $sql = "insert into users (username, password, type, email, gender) VALUES ('$username', '$password', '$type', '$email', '$gender')";
        $result = mysqli_query($conn, $sql);
      

?>