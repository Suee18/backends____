<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public_html/css/admin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha384-4oVU5+BHEfuDd4Q6+lcl6v+9XYWQ0JN+DNJeSoDgxGfCxGp3h66laXK9N/5ay2ad" crossorigin="anonymous">
     

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
            <!-- <label>
                <input type="radio" name="nav" value="post" id="post">
                Post
            </label> -->
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
        <!-- 
        <div id="div2" class="content-div" style="display: none;">
            <div class="small-container">
                This is Post Content
                (@Aloo2a 😚 add anything here with id the same as that parent id)
            </div>
        </div> ======================= post end======================= -->



        <!--=================== USER CRUD form ===========================-->

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
                                    <!-- add -->
                                    <button class="button" type="button" id="addButton" onclick="enableFormFields()">
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
            cars control form goes here
        </div>


        <div id="div6" class="content-div" style="display: none;">
            <div class="small-container">

                <div class="table-container-adminReview">
                    <table class="table-adminReview">
                        <thead>
                            <tr>
                                <th>Review ID</th>
                                <th>Username</th>
                                <th>Review Content</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>101</td>
                                <td>JohnDoe</td>
                                <td>Great experience! Really enjoyed using it.</td>
                                <td class="delete-icon-adminReview">
                                <i class="fa-solid fa-trash fa-bounce" style="color: #e51515;"></i>
                                </td>
                            </tr>
                            <tr>
                                <td>102</td>
                                <td>JaneSmith</td>
                                <td>Good quality, but took a while to arrive.</td>
                                <td class="delete-icon-adminReview">
                                <i class="fa-solid fa-trash fa-bounce" style="color: #e51515;"></i>

                                </td>
                            </tr>
                            <tr>
                                <td>103</td>
                                <td>tech lover</td>
                                <td>"The chatbot feature is fantastic! I initially had some trouble finding the right information on the site, but the chatbot made everything so much easier. It's quick, accurate, and feels like I'm talking to a real person. It even remembers my previous questions, so I don't have to repeat myself. Definitely a must-have feature for customer support – it saved me a lot of time and effort!".</td>
                                <td class="delete-icon-adminReview">
                                <i class="fa-solid fa-trash fa-bounce" style="color: #e51515;"></i>

                                </td>
                            </tr>
                            <tr>
                                <td>104</td>
                                <td>Carenthusiat</td>
                                <td>"I was really excited about the car comparison feature, but it turned out to be a huge letdown. The interface feels clunky and slow, and half the time, it doesn't even load the cars I want to compare. The data seems outdated, and I found several specs that were just plain wrong. I was hoping to get a clear side-by-side view of different models, but it’s hard to read, and the images are so small they’re practically useless. Honestly, this feature needs a major overhaul to be even remotely useful for serious buyers like me."</td>
                                <td class="delete-icon-adminReview">
                                <i class="fa-solid fa-trash fa-bounce" style="color: #e51515;"></i>

                                </td>
                            </tr>
                            <tr>
                                <td>105</td>
                                <td>JohnDoe</td>
                                <td>Great experience! Really enjoyed using it.</td>
                                <!-- <td class="delete-icon-adminReview">&#x1F5D1;</td> -->
                                <td class="delete-icon-adminReview">
                                <i class="fa-solid fa-trash fa-bounce" style="color: #e51515;"></i>

                                </td>
                            </tr>
                            <tr>
                                <td>106</td>
                                <td>JohnDoe</td>
                                <td>Great experience! Really enjoyed using it.</td>
                                <td class="delete-icon-adminReview">
                                    <i class="fa-solid fa-trash fa-bounce" style="color: #e51515;"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="../../../public_html/js/admin.js"></script>

</body>

</html>