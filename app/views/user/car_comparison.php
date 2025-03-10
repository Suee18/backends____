<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <link rel="stylesheet" href="../../../public_html/css/car_comparison.css">
    <link rel="stylesheet" href="../../../public_html/css/userNavbar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=New+Amsterdam&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">
    <title>Compare Cars Now!</title>
    <script src="../../../public_html/js/car_comparison.js" defer></script>

</head>

<body>
    <?php include '../../../public_html/components/userNavbar.php'; ?>

    <div id="comparing-cars-banner">
        <h1>Compare Cars Models</h1>
        <p>Discover and compare different car models
            to find the best one that suits your needs. <br> Our comparison
            tool provides detailed specifications,
            features, and reviews<br> to help you make an informed decision.</p>
    </div>
<div class="gradientBG">
    <div class="comparison-section">
        <div class="car-card">
            <div class="car-image">
                <img src="../../../public_html/media/Car_Comparison_Page_Images/left-comparison-car.png" alt="First Car">
            </div>
            <div class="car-details">
                <p class="car-details-title">Add first car</p>
                <form>
                    <div class="form-group">
                        <label for="make1">Make</label>
                        <select id="make1">
                            <option>Choose a make</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="model1">Model</label>
                        <select id="model1">
                            <option>Choose a model</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="year1">Year</label>
                        <select id="year1">
                            <option>Choose a year</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <div class="car-card">
            <div class="car-image">
                <img src="../../../public_html/media/Car_Comparison_Page_Images/right-comparison-car.png" alt="Second Car">
            </div>
            <div class="car-details">
                <p class="car-details-title">Add second car</p>
                <form>
                    <div class="form-group">
                        <label for="make2">Make</label>
                        <select id="make2">
                            <option>Choose a make</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="model2">Model</label>
                        <select id="model2">
                            <option>Choose a model</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="year2">Year</label>
                        <select id="year2">
                            <option>Choose a year</option>

                        </select>
                    </div>
                </form>
            </div>
        </div>


    </div>

    <button class="btn" onclick="toggleModal()">
        <svg xmlns="http://www.w3.org/2000/svg" class="arr-2" viewBox="0 0 24 24">
            <path
                d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
            </path>
        </svg>
        <span class="text">Compare Now</span>
        <span class="circle"></span>
        <svg xmlns="http://www.w3.org/2000/svg" class="arr-1" viewBox="0 0 24 24">
            <path
                d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
            </path>
        </svg>
    </button>
</div>
    <div id="comparisonModal" class="overlay">
        <div class="modal-content">
            <button class="close-button" onclick="toggleModal()">&times;</button>
            <div class="car-comparison-section">
                <h2 class="comparisonResultsTitle">Comparison result</h2>
                <div class="comparison-grid">
                    <div class="feature-item"></div>
                    <div class="car-column">
                        <h3  class="resultsTitle2">Car 1</h3>
                    </div>
                    <div class="car-column">
                        <h3 class="resultsTitle2">Car 2</h3>
                    </div>

                    <div class="feature-item">
                        <img src="../../../public_html/media/Car_Comparison_Page_Images/car_comparison_icons/fuel_type.png"
                            alt="Engine Fuel Type Icon" class="icon">
                        <p>Engine Fuel Type</p>
                    </div>
                    <div class="car-column">
                        <p class="carSpec">Gasoline</p>
                    </div>
                    <div class="car-column">
                        <p class="carSpec">Diesel</p>
                    </div>

                    <div class="feature-item">
                        <img src="../../../public_html/media/Car_Comparison_Page_Images/car_comparison_icons/horse_power.png"
                            alt="Engine HP Icon" class="icon">
                        <p>Engine HP</p>
                    </div>
                    <div class="car-column">
                        <p class="carSpec">250 HP</p>
                    </div>
                    <div class="car-column">
                        <p class="carSpec">300 HP</p>
                    </div>

                    <div class="feature-item">
                        <img src="../../../public_html/media/Car_Comparison_Page_Images/car_comparison_icons/engine_cylinders.png"
                            alt="Engine Cylinders Icon" class="icon">
                        <p>Engine Cylinders</p>
                    </div>
                    <div class="car-column">
                        <p class="carSpec">4 Cylinders</p>
                    </div>
                    <div class="car-column">
                        <p class="carSpec">6 Cylinders</p>
                    </div>

                    <div class="feature-item">
                        <img src="../../../public_html/media/Car_Comparison_Page_Images/car_comparison_icons/transmission_type.png"
                            alt="Transmission Type Icon" class="icon">
                        <p>Transmission Type</p>
                    </div>
                    <div class="car-column">
                        <p class="carSpec">Automatic</p>
                    </div>
                    <div class="car-column">
                        <p class="carSpec">Manual</p>
                    </div>

                    <div class="feature-item">
                        <img src="../../../public_html/media/Car_Comparison_Page_Images/car_comparison_icons/wheels.png"
                            alt="Driven Wheels Icon" class="icon">
                        <p>Driven Wheels</p>
                    </div>
                    <div class="car-column">
                        <p class="carSpec">Front Wheel Drive</p>
                    </div>
                    <div class="car-column">
                        <p class="carSpec">All Wheel Drive</p>
                    </div>

                    <div class="feature-item">
                        <img src="../../../public_html/media/Car_Comparison_Page_Images/car_comparison_icons/car_doors.png"
                            alt="No. of Doors Icon" class="icon">
                        <p>No. of Doors</p>
                    </div>
                    <div class="car-column">
                        <p class="carSpec">4</p>
                    </div>
                    <div class="car-column">
                        <p class="carSpec">2</p>
                    </div>

                    <div class="feature-item">
                        <img src="../../../public_html/media/Car_Comparison_Page_Images/car_comparison_icons/market_category.png"
                            alt="Market Category Icon" class="icon">
                        <p>Market Category</p>
                    </div>
                    <div class="car-column">
                        <p class="carSpec">Luxury, Performance</p>
                    </div>
                    <div class="car-column">
                        <p class="carSpec">Economy, Compact</p>
                    </div>

                    <div class="feature-item">
                        <img src="../../../public_html/media/Car_Comparison_Page_Images/car_comparison_icons/vehicle_size.png"
                            alt="Vehicle Size Icon" class="icon">
                        <p>Vehicle Size</p>
                    </div>
                    <div class="car-column">
                        <p class="carSpec">Midsize</p>
                    </div>
                    <div class="car-column">
                        <p class="carSpec">Compact</p>
                    </div>

                    <div class="feature-item">
                        <img src="../../../public_html/media/Car_Comparison_Page_Images/car_comparison_icons/vehicle_style.png"
                            alt="Vehicle Style Icon" class="icon">
                        <p>Vehicle Style</p>
                    </div>
                    <div class="car-column">
                        <p class="carSpec">Sedan</p>
                    </div>
                    <div class="car-column">
                        <p class="carSpec">SUV</p>
                    </div>

                    <div class="feature-item">
                        <img src="../../../public_html/media/Car_Comparison_Page_Images/car_comparison_icons/msrp.png"
                            alt="MSRP Icon" class="icon">
                        <p>MSRP</p>
                    </div>
                    <div class="car-column">
                        <p class="carSpec">$40,000</p>
                    </div>
                    <div class="car-column">
                        <p class="carSpec">$35,000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>