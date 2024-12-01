<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../public_html/media/icons/turboIcon.png">

    <title>Turbo chat</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="../../../public_html/css/chatbot_Main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="../../../public_html/js/chatbot_MainPage.js"></script>
</head>

<body>
    <?php include '../../../public_html/components/userNavbar.php'; ?>

    <!-- User Profile icon -->
    <!-- <nav>
    <div class="nav-content">
        <div class="toggle-btn">
        <i class="fa-solid fa-user" style="color: #ffffff;"></i>
        </div>
        <span style="--i:4;"><a href="../../../public_html/index.php"><i class="fa-solid fa-house" style="color: #ffffff;"></i></a></span>
        <span style="--i:3;"><a href="profile.php"><i class="fa-solid fa-user" style="color: #ffffff;"></i></a></span>
        <span style="--i:2;"><a href="favorites.php"><i class="fa-solid fa-heart" style="color: #ffffff;"></i></a></span>
        <span style="--i:1;"><a href="../../../public_html/index.php"><i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i></a></span>
    </div>
</nav> -->

    <!-- Top of the Page -->

    <div class="first-part">
        <img id="chatbot" class="chatbot" src="../../../public_html/media/animated-robot.gif">
        <!-- <img id="chatbot" class="chatbot" src="../../../public_html/media/chatbot2.png" alt="Chatbot Icon"> -->
        <div class="chatbotText">
            <h1 id="qoute" class="qoute">Turbo here!</h1>
            <p id="qoute2" class="qoute2">Let's shift gears and get your<br>
                questions answered in a flash!</p>
        </div>
        <!-- <p id="qoute" class="qoute">Turbo here! Let's shift gears and get your<br> questions answered in a flash!</p> -->
        <div class="button-container">
            <button class="btn" id="chat-btn" onclick="window.location.href='chat_page.php'">
                <svg xmlns="http://www.w3.org/2000/svg" class="arr-2" viewBox="0 0 24 24">
                    <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
                </svg>
                <span class="text">Start a Chat</span>
                <span class="circle"></span>
                <svg xmlns="http://www.w3.org/2000/svg" class="arr-1" viewBox="0 0 24 24">
                    <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
                </svg>
            </button>
        </div>

    </div>


    <!-- Info About Turbo Section -->
    <div class="second-part">
        <div class="card-1">
            <h1 class="turbo-question">Who is Turbo?</h1>
            <p class="turbo-description">Turbo is an advanced chatbot designed specifically for car enthusiasts and automotive customers.
                With a deep understanding of vehicle specifications,<br> maintenance tips, and troubleshooting advice,
                Turbo serves as a virtual assistant, providing users with quick and accurate information about their cars.</p>
        </div>


    </div>

    <!-- Guidance Section -->
    <div class="third-part">
        <div class="card-2">

            <h1 class="guidance">
                <i class="fa-solid fa-circle-info" style="color: #ffffff;"></i>
                Guide: How to talk to Turbo
            </h1>

            <h2 class="steps">Step 1 : Start a Chat</h2>
            <p class="step-description">To start chatting with Turbo, simply click the
                <button class="guideBtn" onclick="window.location.href='chat_page.php'">
                    <span>Start a Chat</span>
                </button>
                button.
                <br> This will open the chat window where you can ask Turbo any car-related questions.
            </p>

            <h2 class="steps">Step 2 : Ask Your Question</h2>
            <p class="step-description">You can ask Turbo about car specifications, maintenance tips, repair advice, and more.
                <br> Just type any question like: "How often should I change my oil?"
            </p>

            <h2 class="steps">Step 3 : Get Instant Help</h2>
            <p class="step-description">Turbo will respond instantly with the information you need, including step-by-step instructions, links to helpful resources, or suggestions for further actions.</p>
        </div>
    </div>

</body>

</html>