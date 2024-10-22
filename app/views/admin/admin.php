<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public_html/css/admin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 


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
                Edit
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
                <p><h2>Registered Users per Month<h2>
                <canvas id="usersChart" width="400" height="200"></canvas></p>
            </div>
            
            <div id="div1" class="stats-div">
                <p><h2>Generated Personas</h2>
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
        <!------ edit --------->

        <div id="div3" class="content-div" style="display: none;">
        <div class="small-container">
        This is edit  Content 
        (@Aloo2a 😚 add anything here with id the same as that parent id)
        </div>
        </div>

        <div id="div4" class="content-div" style="display: none;">
            This is Logout loader

        </div>

        <script src="../../../public_html/js/admin.js"></script>

</body>

</html>