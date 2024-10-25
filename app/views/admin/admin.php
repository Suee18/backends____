<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public_html/css/admin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Admin dashboard</title>
</head>

<body>
    <!-- Navigation Bar -->
    <header class="header_admin">
        <nav class="admin-navbar">
            <label>
                <input type="radio" name="nav" value="home" id="home" checked onclick="redirectTo('../../../public_html')">
                Home
            </label>
            <label>
                <input type="radio" name="nav" value="statistics" id="statistics">
                Statistics
            </label>
            <label>
                <input type="radio" name="nav" value="post" id="post">
                Post
            </label>
            <label>
                <input type="radio" name="nav" value="usersControl" id="usersControl">
                Users
            </label>
            <label>
                <input type="radio" name="nav" value="carsControl" id="carsControl">
                Cars
            </label>
            <label>
                <input type="radio" name="nav" value="reviewsControl" id="reviewsControl">
                reviews
            </label>
            <label>
                <input type="radio" name="nav" value="logout" id="logout">
                Logout
            </label>
        </nav>
    </header>

    <!-- Content Area -->
    <div class="content">

        <div id="div0" class="content-div" style="display: block;">
            <div class="welcome">welcome</div>
        </div>


        <!--======================= statistics =================================-->
        <div id="div1" class="content-div" style="display: none;">
            <div class="small-container">
                <div id="div1" class="stats-div">
                    <p class="stat-title"> Turbo Conversations</p>
                    <canvas id="conversationsChart" width="400" height="200"></canvas>
                </div>
                <div id="div1" class="stats-div">
                    <p class="stat-title">Generated Plans</p>
                    <canvas id="plansChart" width="400" height="200"></canvas>
                </div>

                <div id="div1" class="stats-div">
                    <p class="stat-title">Website Views</p class="stat-title">
                    <canvas id="viewsChart" width="400" height="200"></canvas>

                </div>
                <div id="div1" class="stats-div">
                    <p class="stat-title"> Average Session Duration (Minutes)</p>
                    <canvas id="sessionDurationChart" width="400" height="200"></canvas>
                </div>

                <div id="div1" class="stats-div">
                    <p>
                    <p class="stat-title"> Registered Users per Month
                    <p>
                        <canvas id="usersChart" width="400" height="200"></canvas>
                    </p>
                </div>

                <div id="div1" class="stats-div">
                    <p>
                    <p class="stat-title"> Generated Personas</p>
                    <canvas id="personasChart" width="400" height="200"></canvas></p>
                </div>
                <div id="div1" class="stats-div">
                    <p>Most recommended car this month</p>
                    <!--waiting on dynamic car car -->
                </div>
            </div>
        </div> <!--======================= statistics end =================================-->


        <!--======================= post =======================-->

        <div id="div2" class="content-div" style="display: none;">
            <div class="small-container">
                This is Post Content
                (@Aloo2a 😚 add anything here with id the same as that parent id)
            </div>
        </div> <!--======================= post end=======================-->



        <!--=================== USER CRUD form ===========================-->

        <div id="div3" class="content-div" style="display: none;">

            <div class="small-container">
                <div class="formContainer">
               <form id="userForm" method="POST" action="" >

                        <div class="formInputfields">
                            <div>
                                <label class="userformLabels" for="userSelect">Select User:</label>
                                <select id="userSelect" onchange="populateForm()">
                                    <option value="" disabled selected>Select a user</option>
                                    <option value="1" data-username="john_doe" data-email="john@example.com" data-type="admin">
                                        John Doe
                                    </option>
                                    <option value="2" data-username="jane_smith" data-email="jane@example.com" data-type="user">
                                        Jane Smith
                                    </option>
                                    <option value="3" data-username="alice_jones" data-email="alice@example.com" data-type="admin">
                                        Alice Jones
                                    </option>
                                </select>
                            </div>

                            <div>
                                <label class="userformLabels" for="username">Username :</label>
                                <input type="text" name="username" id="username" >
                            </div>

                            <div>
                             <label class="userformLabels" for="gender">Gender :</label>
                             <select id="gender" name="gender">
                             <option value="" ></option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            </select>
                           </div>

                            <div>
                                <label class="userformLabels" for="password">Password :</label>
                                <input type="password" name="password"  id="password" >
                            </div>

                            <div>
                                <label class="userformLabels" for="user_type">User Type :</label>
                                <select id="user_type"  name="user_type" >

                                    <option value=""></option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>

                            <div>
                                <label class="userformLabels" for="email">e-mail :</label>
                                <input type="email" name="email" id="email" >
                            </div>
                        </div>

                        <div class="CRUD_bigcontainer">
                            <p class="controlPanel_text">control panel</p>

                            <!-- Buttons -->
                            <div class="CRUD_control">
                                <div class="CRUDcontainer">
                                    <!-- add -->
                                    <button class="button" name="addButton" type="submit" id="addButton" onclick="enableFormFields()">
                                        <span class="button__text">Add user</span>
                                        <span class="button__icon">
                                            <i class="fa-solid fa-user-plus" style="color: #ffffff;"></i>
                                        </span>
                                    </button>
                                    <!-- edit -->
                                    <button class="button" type="button" id="editButton" onclick="enableEditing()" style=" display:none">
                                        <span class="button__text">Edit info</span>
                                        <span class="button__icon">
                                            <i class="fa-solid fa-user-pen" style="color: #ffffff;"></i>
                                        </span>
                                    </button>
                                    <!-- save -->
                                    <button style="display:none" class="button" type="submit" id="saveButton" onclick="clearForm()">
                                        <span class="button__text"> Save info</span>
                                        <span class="button__icon">
                                            <i class="fa-regular fa-floppy-disk" style="color: #ffffff;"></i>
                                    </button>
                                    <!-- delete -->
                                    <button class="button" type="button" id="deleteButton" style="display:none">
                                        <span class="button__text">Delete user</span>
                                        <span class="button__icon">
                                            <i class="fa-solid fa-user-plus" style="color: #ffffff;"></i>
                                        </span>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div> <!--=================== USER FORM END ===========================-->


        <div id="div4" class="content-div" style="display: none;">
            This is Logout loader
        </div>
        <div id="div5" class="content-div" style="display: none;">
            cars control form goes here </div>
        <div id="div6" class="content-div" style="display: none;">
            reviews control here </div>

        <script src="../../../public_html/js/admin.js"></script>

</body>

</html>

<?php
include_once "../../config/db_config.php"; // Include your database configuration

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Create
    if (isset($_POST['addButton'])) {
        $username = mysqli_real_escape_string($conn, htmlspecialchars($_POST["username"]));
        $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST["password"]));
        $type = mysqli_real_escape_string($conn, htmlspecialchars($_POST["user_type"]));
        $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST["email"]));
        $gender = mysqli_real_escape_string($conn, htmlspecialchars($_POST["gender"]));

        $sql = "INSERT INTO users (username, password, type, email, gender) VALUES ('$username', '$password', '$type', '$email', '$gender')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "User added successfully!";
        } else {
            echo "Error adding user: " . mysqli_error($conn);
        }
    }

    // Update
    if (isset($_POST['saveButton'])) {
        $userId = mysqli_real_escape_string($conn, htmlspecialchars($_POST["userId"])); // You need to add this hidden field in your form to store the user ID
        $username = mysqli_real_escape_string($conn, htmlspecialchars($_POST["username"]));
        $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST["password"]));
        $type = mysqli_real_escape_string($conn, htmlspecialchars($_POST["user_type"]));
        $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST["email"]));
        $gender = mysqli_real_escape_string($conn, htmlspecialchars($_POST["gender"]));

        $sql = "UPDATE users SET username='$username', password='$password', type='$type', email='$email', gender='$gender' WHERE id='$userId'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "User updated successfully!";
        } else {
            echo "Error updating user: " . mysqli_error($conn);
        }
    }

    // Delete
    if (isset($_POST['deleteButton'])) {
        $userId = mysqli_real_escape_string($conn, htmlspecialchars($_POST["userId"])); // Similarly, get the user ID
        $sql = "DELETE FROM users WHERE id='$userId'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "User deleted successfully!";
        } else {
            echo "Error deleting user: " . mysqli_error($conn);
        }
    }
}

// Read: This can be handled separately to display users on the dashboard.
// You can fetch users from the database and display them in a table or select dropdown.
?>
