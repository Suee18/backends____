<?php

include_once "../../config/db_config.php";

$user_id = mysqli_real_escape_string($conn, htmlspecialchars($_POST["user_id"]));

$sql = "delete FROM users WHERE id = '$user_id'";

$result=mysqli_query($conn,$sql);

?>