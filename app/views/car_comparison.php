<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public_html/css/car_comparison.css">
    <link rel="stylesheet" href="../../public_html/css/global_styles.css">
    <link rel="stylesheet" href="../../public_html/css/nav_bar.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=New+Amsterdam&display=swap" rel="stylesheet">
    <title>Compare Cars Now!</title>
    <script src=""></script>
</head>

<body>
    <?php include '../../public_html/components/nav_bar.php'; ?>
    <div id="comparing-cars-banner">
        <h1>Compare Cars Models</h1>
        <p>Discover and compare different car models
            to find the best one that suits your needs. <br> Our comparison
            tool provides detailed specifications,
            features, and reviews to help you make an informed decision.</p>
    </div>

    <div class="comparison-section">
        <div class="car-card">
            <div class="car-image">
                <img src="../../public_html/media/Car_Comparison_Page_Images/left-comparison-car.png" alt="First Car">
            </div>
            <div class="car-details">
                <h2>Add first car</h2>
                <form>
                    <div class="form-group">
                        <label for="make1">Make</label>
                        <select id="make1">
                            <option>Choose a make</option>
                            <!-- Add more car makes here -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="model1">Model</label>
                        <select id="model1">
                            <option>Choose a model</option>
                            <!-- Add more car models here -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="year1">Year</label>
                        <select id="year1">
                            <option>Choose a year</option>
                            <!-- Add more years here -->
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <div class="car-card">
            <div class="car-image">
                <img src="../../public_html/media/Car_Comparison_Page_Images/right-comparison-car.png"
                 alt="Second Car">
            </div>
            <div class="car-details">
                <h2>Add second car</h2>
                <form>
                    <div class="form-group">
                        <label for="make2">Make</label>
                        <select id="make2">
                            <option>Choose a make</option>
                            <!-- Add more car makes here -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="model2">Model</label>
                        <select id="model2">
                            <option>Choose a model</option>
                            <!-- Add more car models here -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="year2">Year</label>
                        <select id="year2">
                            <option>Choose a year</option>
                            <!-- Add more years here -->
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>