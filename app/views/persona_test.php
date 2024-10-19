<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persona Quiz</title>
    <link rel="stylesheet" href="../../public_html/css/persona_test.css">
    <link rel="stylesheet" href="../../public_html/css/global_styles.css">
    <link rel="stylesheet" href="../../public_html/css/nav_bar.css">
</head>

<body>
    <?php include '../../public_html/components/nav_bar.php'; ?>

    <div class="quiz-container">
        <h1>Find Your Car Persona</h1>
        <div id="quiz"></div>
        <button id="next-btn" onclick="nextQuestion()">Next</button>
        <div id="result" class="hidden">
            <h2>Your Persona: <span id="persona"></span></h2>
            <p id="persona-description"></p>
        </div>
    </div>
    <script src="../../public_html/js/persona_test.js"></script>
</body>

</html>