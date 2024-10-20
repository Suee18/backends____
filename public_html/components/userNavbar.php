<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warning Popup</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="../../../public_html/css/userNavbar.css">
    <script src="../../../public_html/js/user.js" defer></script>
</head>

<body>
    <aside class="sidebar">
        <div class="logo">
            <a href="../../../public_html/index.php" class="Apex-text">
                <h2>Apex</h2>
            </a>
        </div>
        <ul class="links">
            <h4>Main Menu</h4>
            <li>
                <span class="material-symbols-outlined">directions_car</span>
                <a href="#">Car recommendation</a>
            </li>
            <li>
                <span class="material-symbols-outlined">swap_horiz</span>
                <a href="../../../SWE_Phase1/app/views/car_comparison.php">Car comparison</a>
            </li>
            <li>
                <span class="material-symbols-outlined">question_answer</span>
                <a href="../../../app/views/user/chatbot_mainPage.php">Turbo</a>
            </li>
            <hr>

            <h4>Account</h4>
            <li>
                <span class="material-symbols-outlined">favorite</span>
                <a href="../../../app/views/user/favorites.php">Favorites</a>
            </li>
            <li>
                <span class="material-symbols-outlined">mail</span>
                <a href="#">Message</a>
            </li>
            <li>
                <span class="material-symbols-outlined">settings</span>
                <a href="#">Settings</a>
            </li>
            <li class="logout-link">
                <span class="material-symbols-outlined">logout</span>
                <a href="#">Logout</a>
            </li>
            <li class="deletion-link">
                <span class="material-symbols-outlined">delete</span>
                <a class="deleteTab" href="#">Delete Account</a>
            </li>
        </ul>
    </aside>

    <span class="overlay"></span>
    
    <section>
        <div id="warningPopup" class="popup hidden">
            <i class="fas fa-exclamation-circle"></i>
            <h2>Warning</h2>
            <h3>Are you sure you want to delete your account?</h3>
            <div class="buttons">
                <button id="confirm">Yes</button>
                <button id="cancel">No</button>
            </div>
        </div>
    </section>

   
</body>

</html>
