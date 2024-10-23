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
                <input type="radio" name="nav" value="edit" id="edit">
                Users
            </label>
            <label>
                <input type="radio" name="nav" value="edit" id="edit">
                Cars
            </label> <!-- no js-->
            <label>
                <input type="radio" name="nav" value="edit" id="edit">
                reviews
            </label> <!-- no js-->

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


        <!------ statistics --------->
        <div id="div1" class="content-div" style="display: none;">
            <div class="small-container">
                <div id="div1" class="stats-div">
                    <h2> Turbo Conversations</h2>
                    <canvas id="conversationsChart" width="400" height="200"></canvas>
                </div>
                <div id="div1" class="stats-div">
                    <p class="stat-title">Generated Plans</p class="stat-title">
                    <canvas id="plansChart" width="400" height="200"></canvas>
                </div>

                <div id="div1" class="stats-div">
                    <p class="stat-title">Website Views</p class="stat-title">
                    <canvas id="viewsChart" width="400" height="200"></canvas>

                </div>
                <div id="div1" class="stats-div">
                    <h2>Average Session Duration (Minutes)</h2>
                    <canvas id="sessionDurationChart" width="400" height="200"></canvas>
                </div>

                <div id="div1" class="stats-div">
                    <p>
                    <h2>Registered Users per Month<h2>
                            <canvas id="usersChart" width="400" height="200"></canvas></p>
                </div>

                <div id="div1" class="stats-div">
                    <p>
                    <h2>Generated Personas</h2>
                    <canvas id="personasChart" width="400" height="200"></canvas></p>
                </div>

                <div id="div1" class="stats-div">
                    <p>Most recommended car this month</p>
                    <!--waiting on dynamic car car -->
                </div>
            </div> <!-- containers -->
        </div>

        <!------ post --------->

        <div id="div2" class="content-div" style="display: none;">
            <div class="small-container">
                This is Post Content
                (@Aloo2a 😚 add anything here with id the same as that parent id)
            </div>
        </div>


        <!--=================== USER ===========================-->

        <div id="div3" class="content-div" style="display: none;">

            <div class="small-container">
                <div class="formContainer">
                    <form id="userForm">
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
        <input type="text" id="username" readonly disabled>
    </div>

    <div>
        <label class="userformLabels" for="password">Password :</label>
        <input type="password" id="password" readonly disabled>
    </div>

    <div>
        <label class="userformLabels" for="user_type">User Type :</label>
        <select id="user_type" disabled>

            <option value=""></option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
    </div>

    <div>
        <label class="userformLabels" for="email">e-mail :</label>
        <input type="email" id="email" readonly disabled>
    </div>
</div>
                        <div class="CRUD_bigcontainer">
                            <p class="controlPanel_text">control panel</p>

                            <!-- Buttons -->
                            <div class="CRUD_control">
                                <div class="CRUDcontainer">

                                    <!-- <button type="button" id="editButton" onclick="enableEditing()">Edit user info</button> -->
                                    <button disabled class="button" type="button" id="editButton" onclick="enableEditing()">
                                        <span class="button__text">Edit info</span>
                                        <span class="button__icon">
                                            <i class="fa-solid fa-user-pen" style="color: #ffffff;"></i>
                                        </span>
                                    </button>


                                    <!-- <button type="submit" id="saveButton" disabled>Save</button> -->
                                    <button disabled class="button" type="submit" id="saveButton" onclick="clearForm()">
                                        <span class="button__text"> Save info</span>
                                        <span class="button__icon">
                                            <i class="fa-regular fa-floppy-disk" style="color: #ffffff;"></i>
                                    </button>

                                </div>

                                <div class="CRUDcontainer">

                                    <!-- <button type="button" id="addButton" onclick="clearForm()">Add new User</button> -->
                                    <button class="button" type="button" id="addButton" onclick="clearForm()">
                                        <span class="button__text">Add user</span>
                                        <span class="button__icon">
                                            <i class="fa-solid fa-user-plus" style="color: #ffffff;"></i>
                                        </span>
                                    </button>

                                    <!-- <button type="button" id="deleteButton">Delete user</button> -->
                                    <button disabled class="button" type="button" id="deleteButton">
                                        <span class="button__text">Delete user</span>
                                        <span class="button__icon"><i class="fa-solid fa-trash-can" style="color: #ffffff;"></i></span>
                                    </button>



                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>

        <div id="div4" class="content-div" style="display: none;">
            This is Logout loader
        </div>

        <script src="../../../public_html/js/admin.js"></script>

</body>

</html>