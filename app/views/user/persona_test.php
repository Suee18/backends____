<?php

include '../../../controllers/persona_test.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="icon" href="../../../public_html/media/persona-icon.png" alt="persona-icon" />
    <title>Personality Test</title>
    <link rel="stylesheet" href="../../../public_html/css/persona_test.css">
    <link rel="stylesheet" href="../../../public_html/css/global_styles.css">
    <link rel="stylesheet" href="../../../public_html/css/userNavbar.css">
</head>

<body>
    <?php include '../../../public_html/components/userNavbar.php'; ?>

    <div class="background-images"></div>

    <form method="POST" action="../../../controllers/persona_test.php">
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach ($questions as $questionId => $data): ?>
                    <div class="swiper-slide">
                        <div class="question-container">
                            <h1 class="question-number">Question <?= $questionId; ?></h1>
                            <p class="question-text"><?= $data['question']; ?></p>
                            <div class="options-container-five">
                                <div class="first-options-five">
                                    <?php $answers = array_slice($data['answers'], 0, 3, true); ?>
                                    <?php foreach ($answers as $answerKey => $answerData): ?>
                                        <label class="option">
                                            <input type="radio" name="answers[<?= $questionId; ?>]" value="<?= $answerKey; ?>" required>
                                            <img src="<?= $answerData['icon']; ?>" alt="Option Icon1">
                                            <p><?= $answerData['text']; ?></p>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                                <div class="second-options-five">
                                    <?php $answers = array_slice($data['answers'], 3, null, true); ?>
                                    <?php foreach ($answers as $answerKey => $answerData): ?>
                                        <label class="option">
                                            <input type="radio" name="answers[<?= $questionId; ?>]" value="<?= $answerKey; ?>">
                                            <img src="<?= $answerData['icon']; ?>" alt="Option Icon2">
                                            <p><?= $answerData['text']; ?></p>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>


                <!---A UI BUG WHERE THE BUTTON SOMETIMES DOEST CLICKS ONLY !-->
                <!-- Final Slide
                <div class="swiper-slide last-slide">
                    <img src="../../../public_html/media/Persona_Test_Images/Test_Images/icons/persona-icon.png" alt="Persona Icon" class="persona-icon" />
                    <h3 class="title">Ready to see your results?</h3>
                    <p class="subtext">Click below to unveil your persona !</p>
                 <div>
                    <button type="submit" class="btn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="arr-2" viewBox="0 0 24 24">
                            <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
                        </svg>
                        <span class="text">Find My Persona</span>
                        <span class="circle"></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="arr-1" viewBox="0 0 24 24">
                            <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
                        </svg>
                    </button>
                 </div>
                </div> -->


                <div class="swiper-slide last-slide">
                    <button type="submit" class="mybutton">NO BUG BUTTON</button>
                </div>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </form>

    <div class="progress-bar-container">
        <div class="progress-bar"></div>
    </div>

    <script src="../../../public_html/js/persona_test.js"></script>
</body>

</html>