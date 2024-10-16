<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/landing_page.css">
    <title>Landing Page</title>
</head>

<body>
    <?php include './components/nav_bar.php'; ?>


    <div class="slideShowContainer_lp">

        <!-- Slide 1 -->
        <div class="slide" id="slide1">
            <div class="videoBG_lp">
                <video autoplay muted loop class="slide-bg" id="myVideo">
                    <source src="media/BMWM5CS.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>



            <div class="text-overlay">
                <p class="slide1Title_lp">
                    you can't really hide who you are</p>
                <p class="slide1paragraph_lp">
                    Take the test now, and find your match on wheels.</p>
            </div>
        </div>



        <!-- Slide 2 -->

        <div class="slide" id="slide2">
            <img src="media/thisOrThat.png" class="slide-bg" alt="Image Background">

            <div class="text-overlay">
                <p class="slide2Title_lp">
                    This or that?
                </p>
                <p class="slide2paragraph_lp">
                    Compare between any two car Models
                </p>
            </div>

        </div>




        <!-- Slide 3:  -->
        <div class="slide" id="slide3">
            <!-- <img src="media/animationGIF3_VoiceMotionAi.gif" class="slide-bg" alt="Image Background"> -->
            <video autoplay muted loop class="slide-bg" id="myVideo">
                    <source src="media/astonmartin.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video><div class="text-overlay">
            <p class="slide3Title_lp">
            Ready, set,
            <span class="slide3Title_lp">
            Turbo!
</span>
                </p>
                <p class="slide3paragraph_lp">
                    Talk now to Turbo, the chatbot
                </p>
            </div>
        </div>

        <!-- Slide 4: -->
        <div class="slide" id="slide4">
            <img src="path_to_your_image3.jpg" class="slide-bg" alt="Image Background">
            <div class="text-overlay">
                <p class="slide4Title_lp">Discover latest news, and read authentic reviews.</p>
            </div>
        </div>



        <!-- Dots for navigation -->
        <div class="dots">
            <span class="dot" onclick="showSlideOnClick(1)"></span>
            <span class="dot" onclick="showSlideOnClick(2)"></span>
            <span class="dot" onclick="showSlideOnClick(3)"></span>
            <span class="dot" onclick="showSlideOnClick(4)"></span>
        </div>
    </div>

    <div class="landingPage_part2">
        <P>PART 2 GOES HERE </P>
    </div>
    <script src="js/landing_page.js"></script>



</body>

</html>