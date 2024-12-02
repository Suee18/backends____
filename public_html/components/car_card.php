<link rel="stylesheet" href="css/car_card.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="js/favorites.js" defer></script>

<div id="notification-container"></div>
<div class="car-cards-container">
    <div class="container2">


        <div class="car-card">
            <div class="car-card-inner">

                <!-- Front of the card -->
                <div class="car-card-front">
                    <div class="img-container">
                        <img src="./media/cctoyotaa.png" alt="Car 1" class="car-card-img">
                    </div>

                    <div class="car-card-content">
                        <div class="car-info-container">
                            <p class="car-name">Toyota</p>
                            <p class="carModel">Land Cruiser</p>
                        </div>
                        <?php
                        function limitDescription($description, $wordLimit = 30)
                        {
                            $words = explode(' ', $description);
                            if (count($words) > $wordLimit) {
                                return implode(' ', array_slice($words, 0, $wordLimit)) . '...';
                            }
                            return $description;
                        }
                        ?>
                        <p class="car-description"><?php echo limitDescription('The Toyota Land Cruiser is legendary for its unparalleled off-road capability, luxurious comfort, and reliability that’s stood the test of time. Designed to handle the toughest terrains, it comes equipped with a powerful V8 engine, advanced four-wheel-drive systems, and an array of off-road technologies that make it an adventurer\'s dream. Despite its ruggedness, the Land Cruiser offers a refined interior, complete with high-quality leather seating, advanced infotainment features, and spacious accommodations.'); ?></p>

                        <p class="car-price">$20,000</p>
                    </div>
                </div>

                <!-- Back of the card -->
                <div class="car-card-back">
                    <div class="car-specs-content">
                        <h3 class="specs-title">Car Specifications</h3>
                        <table class="specs-table">
                            <tbody>
                                <tr>
                                    <td class="spec-in-table">Engine</td>
                                    <td>5.7L V8</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Power</td>
                                    <td>381 hp @ 5,600 rpm</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Torque</td>
                                    <td>401 lb-ft @ 3,600 rpm</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">0-60 mph</td>
                                    <td>6.7 seconds</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Fuel Economy (City/Highway)</td>
                                    <td>13/17 MPG</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Transmission</td>
                                    <td>8-speed Automatic</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Drivetrain</td>
                                    <td>4WD (Full-Time Four-Wheel Drive)</td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="con-like">
                            <input class="like" type="checkbox" title="like">
                            <div class="checkmark">
                                <svg xmlns="http://www.w3.org/2000/svg" class="outline" viewBox="0 0 24 24">
                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="filled" viewBox="0 0 24 24">
                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" class="celebrate">
                                    <polygon class="poly" points="10,10 20,20"></polygon>
                                    <polygon class="poly" points="10,50 20,50"></polygon>
                                    <polygon class="poly" points="20,80 30,70"></polygon>
                                    <polygon class="poly" points="90,10 80,20"></polygon>
                                    <polygon class="poly" points="90,50 80,50"></polygon>
                                    <polygon class="poly" points="80,80 70,70"></polygon>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="car-card">
            <div class="car-card-inner">
                <!-- Front of the card -->
                <div class="car-card-front">
                    <div class="img-container">
                        <img src="./media/ccsharkk.png" alt="Car 2" class="car-card-img">
                    </div>
                    <div class="car-card-content">
                        <h3 class="car-name">Mitsubishi Lancer</h3>
                        <h3 class="carModel">Shark</h3>
                        <p class="car-description">The Mitsubishi Lancer Shark Revered for its rally-inspired performance, the Lancer Shark embodies precision handling and dynamic driving. Though compact appealing to drivers who value connection to the road.</p>
                        <p class="car-price">$20,000</p>
                    </div>
                </div>

                <!-- Back of the card -->
                <div class="car-card-back">
                    <div class="car-specs-content">
                        <!-- Mitsubishi Lancer Shark Specifications -->
                        <h3 class="specs-title">Car Specifications</h3>
                        <table class="specs-table">
                            <tbody>
                                <tr>
                                    <td class="spec-in-table">Engine</td>
                                    <td>2.0L Turbocharged I4</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Power</td>
                                    <td>237 hp @ 6,000 rpm</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Torque</td>
                                    <td>253 lb-ft @ 3,500 rpm</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">0-60 mph</td>
                                    <td>5.9 seconds</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Top Speed</td>
                                    <td>140 mph</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Fuel Economy (City/Highway)</td>
                                    <td>22/30 MPG</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Transmission</td>
                                    <td>5-speed Manual / CVT Automatic</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Drivetrain</td>
                                    <td>All-Wheel Drive (AWD)</td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="con-like">
                            <input class="like" type="checkbox" title="like">
                            <div class="checkmark">
                                <svg xmlns="http://www.w3.org/2000/svg" class="outline" viewBox="0 0 24 24">
                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="filled" viewBox="0 0 24 24">
                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" class="celebrate">
                                    <polygon class="poly" points="10,10 20,20"></polygon>
                                    <polygon class="poly" points="10,50 20,50"></polygon>
                                    <polygon class="poly" points="20,80 30,70"></polygon>
                                    <polygon class="poly" points="90,10 80,20"></polygon>
                                    <polygon class="poly" points="90,50 80,50"></polygon>
                                    <polygon class="poly" points="80,80 70,70"></polygon>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="car-card">
            <div class="car-card-inner">
                <!-- Front of the card -->
                <div class="car-card-front">
                    <div class="img-container">
                        <img src="./media/ccmustang.jpg" alt="Car 3" class="car-card-img">
                    </div>
                    <div class="car-card-content">
                        <div class="car-info-container">

                            <h3 class="car-name">Ford </h3>
                            <h3 class="carModel">Mustang </h3>
                        </div>
                        <p class="car-description">
                            The Ford Mustang has stood the test of time With its distinct design and roaring engines, modern technology maintaining its legendary status.
                        </p>
                        <p class="car-price">$20,000</p>
                    </div>
                </div>

                <!-- Back of the card -->
                <div class="car-card-back">
                    <div class="car-specs-content">
                        <h3 class="specs-title">Car Specifications</h3>

                        <!-- Ford Mustang Specifications -->
                        <table class="specs-table">
                            <tbody>
                                <tr>
                                    <td class="spec-in-table">Engine</td>
                                    <td>2.3L EcoBoost I4 / 5.0L Ti-VCT V8</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Power</td>
                                    <td>310 hp (EcoBoost) / 480 hp (GT V8)</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Torque</td>
                                    <td>350 lb-ft (EcoBoost) / 420 lb-ft (GT V8)</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">0-60 mph</td>
                                    <td>4.5 seconds (GT V8)</td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="con-like">
                            <input class="like" type="checkbox" title="like">
                            <div class="checkmark">
                                <svg xmlns="http://www.w3.org/2000/svg" class="outline" viewBox="0 0 24 24">
                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="filled" viewBox="0 0 24 24">
                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" class="celebrate">
                                    <polygon class="poly" points="10,10 20,20"></polygon>
                                    <polygon class="poly" points="10,50 20,50"></polygon>
                                    <polygon class="poly" points="20,80 30,70"></polygon>
                                    <polygon class="poly" points="90,10 80,20"></polygon>
                                    <polygon class="poly" points="90,50 80,50"></polygon>
                                    <polygon class="poly" points="80,80 70,70"></polygon>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="car-card">
            <div class="car-card-inner">
                <!-- Front of the card -->
                <div class="car-card-front">
                    <div class="img-container">
                        <img src="./media/ccRAM.png" alt="Car 4" class="car-card-img">
                    </div>
                    <div class="car-card-content">
                        <h3 class="car-name">Dodge</h3>
                        <h3 class="carModel">RAM</h3>
                        <p class="car-description">The Dodge Ram is renowned for its versatility and toughness, making it a top choice for those needing a reliable truck for both heavy-duty work and leisure with features that rival luxury vehicles. </p>
                        <p class="car-price">$20,000</p>
                    </div>
                </div>

                <!-- Back of the card -->
                <div class="car-card-back">
                    <div class="car-specs-content">
                        <h3 class="specs-title">Car Specifications</h3>
                        <table class="specs-table">
                            <tbody>
                                <tr>
                                    <td class="spec-in-table">Engine</td>
                                    <td>3.6L Pentastar V6 / 5.7L HEMI V8 / 6.2L Supercharged HEMI V8</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Power</td>
                                    <td>305 hp (V6) / 395 hp (V8) / 702 hp (Supercharged V8)</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Torque</td>
                                    <td>269 lb-ft (V6) / 410 lb-ft (V8) / 650 lb-ft </td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Fuel Economy</td>
                                    <td>20/25 MPG (V6) / 15/22 MPG (V8) / 10/14 MPG </td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Transmission</td>
                                    <td>8-speed Automatic</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Drivetrain</td>
                                    <td>RWD or 4WD</td>
                                </tr>
                                <tr>

                            </tbody>
                        </table>
                        <div class="con-like">
                            <input class="like" type="checkbox" title="like">
                            <div class="checkmark">
                                <svg xmlns="http://www.w3.org/2000/svg" class="outline" viewBox="0 0 24 24">
                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="filled" viewBox="0 0 24 24">
                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" class="celebrate">
                                    <polygon class="poly" points="10,10 20,20"></polygon>
                                    <polygon class="poly" points="10,50 20,50"></polygon>
                                    <polygon class="poly" points="20,80 30,70"></polygon>
                                    <polygon class="poly" points="90,10 80,20"></polygon>
                                    <polygon class="poly" points="90,50 80,50"></polygon>
                                    <polygon class="poly" points="80,80 70,70"></polygon>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="car-card">
            <div class="car-card-inner">
                <!-- Front of the card -->
                <div class="car-card-front">
                    <div class="img-container">
                        <img src="./media/ccAM.png" alt="Car 5" class="car-card-img">
                    </div>
                    <div class="car-card-content">
                        <h3 class="car-name">Aston Martin</h3>
                        <h3 class="carModel">Vantage</h3>
                        <p class="car-description">The Vantage is synonymous with luxury and high-performance, blending the elegance with the agility of a sports car. The Vantage offers a thrilling driving experience, with sharp handling and the power to satisfy the most discerning drivers</p>
                        <p class="car-price">$20,000</p>
                    </div>
                </div>

                <!-- Back of the card -->
                <div class="car-card-back">
                    <div class="car-specs-content">
                        <h3 class="specs-title">Car Specifications</h3>
                        <table class="specs-table">
                            <tbody>
                                <tr>
                                    <td class="spec-in-table">Engine</td>
                                    <td>4.0L Twin-Turbocharged V8</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Power</td>
                                    <td>503 hp @ 6,000 rpm</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Torque</td>
                                    <td>505 lb-ft @ 2,000-5,000 rpm</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">0-60 mph</td>
                                    <td>3.5 seconds</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Top Speed</td>
                                    <td>195 mph</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Fuel Economy (City/Highway)</td>
                                    <td>18/24 MPG</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Transmission</td>
                                    <td>8-speed Automatic</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Drivetrain</td>
                                    <td>Rear-Wheel Drive (RWD)</td>
                                </tr>


                            </tbody>
                        </table>
                        <div class="con-like">
                            <input class="like" type="checkbox" title="like">
                            <div class="checkmark">
                                <svg xmlns="http://www.w3.org/2000/svg" class="outline" viewBox="0 0 24 24">
                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="filled" viewBox="0 0 24 24">
                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" class="celebrate">
                                    <polygon class="poly" points="10,10 20,20"></polygon>
                                    <polygon class="poly" points="10,50 20,50"></polygon>
                                    <polygon class="poly" points="20,80 30,70"></polygon>
                                    <polygon class="poly" points="90,10 80,20"></polygon>
                                    <polygon class="poly" points="90,50 80,50"></polygon>
                                    <polygon class="poly" points="80,80 70,70"></polygon>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="car-card">
            <div class="car-card-inner">
                <!-- Front of the card -->
                <div class="car-card-front">
                    <div class="img-container">
                        <img src="./media/ccAMG.png" alt="Car 6" class="car-card-img">
                    </div>
                    <div class="car-card-content">
                        <h3 class="car-name">Mercedes</h3>
                        <h3 class="carModel">AMG GT 63 S 2024</h3>
                        <p class="car-description">Representing the pinnacle of luxury and performance, combining the comfort of a high-end sedan with the heart of a supercar with aggressive styling, cutting-edge technology. Designed for who crave speed without sacrificing comfort.</p>
                        <p class="car-price">$20,000</p>
                    </div>
                </div>

                <!-- Back of the card -->
                <div class="car-card-back">
                    <div class="car-specs-content">
                        <h3 class="specs-title">Car Specifications</h3>

                        <table class="specs-table">
                            <tbody>
                                <tr>
                                    <td class="spec-in-table">Engine</td>
                                    <td>4.0L V8 Biturbo with Hybrid Assist</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Power</td>
                                    <td>843 hp (combined system output)</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Torque</td>
                                    <td>1,033 lb-ft (combined system output)</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">0-60 mph</td>
                                    <td>2.9 seconds</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Top Speed</td>
                                    <td>196 mph</td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="con-like">
                            <input class="like" type="checkbox" title="like">
                            <div class="checkmark">
                                <svg xmlns="http://www.w3.org/2000/svg" class="outline" viewBox="0 0 24 24">
                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="filled" viewBox="0 0 24 24">
                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" class="celebrate">
                                    <polygon class="poly" points="10,10 20,20"></polygon>
                                    <polygon class="poly" points="10,50 20,50"></polygon>
                                    <polygon class="poly" points="20,80 30,70"></polygon>
                                    <polygon class="poly" points="90,10 80,20"></polygon>
                                    <polygon class="poly" points="90,50 80,50"></polygon>
                                    <polygon class="poly" points="80,80 70,70"></polygon>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="car-card">
            <div class="car-card-inner">
                <!-- Front of the card -->
                <div class="car-card-front">
                    <div class="img-container">
                        <img src="./media/ccAMG.png" alt="Car 7" class="car-card-img">
                    </div>
                    <div class="car-card-content">
                        <h3 class="car-name">Mercedes</h3>
                        <h3 class="carModel">AMG GT 63 S 2024</h3>
                        <p class="car-description">Representing the pinnacle of luxury and performance, combining the comfort of a high-end sedan with the heart of a supercar with aggressive styling, cutting-edge technology. Designed for who crave speed without sacrificing comfort.</p>
                        <p class="car-price">$20,000</p>
                    </div>
                </div>

                <!-- Back of the card -->
                <div class="car-card-back">
                    <div class="car-specs-content">
                        <h3 class="specs-title">Car Specifications</h3>

                        <table class="specs-table">
                            <tbody>
                                <tr>
                                    <td class="spec-in-table">Engine</td>
                                    <td>4.0L V8 Biturbo with Hybrid Assist</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Power</td>
                                    <td>843 hp (combined system output)</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Torque</td>
                                    <td>1,033 lb-ft (combined system output)</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">0-60 mph</td>
                                    <td>2.9 seconds</td>
                                </tr>
                                <tr>
                                    <td class="spec-in-table">Top Speed</td>
                                    <td>196 mph</td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="con-like">
                            <input class="like" type="checkbox" title="like">
                            <div class="checkmark">
                                <svg xmlns="http://www.w3.org/2000/svg" class="outline" viewBox="0 0 24 24">
                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="filled" viewBox="0 0 24 24">
                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" class="celebrate">
                                    <polygon class="poly" points="10,10 20,20"></polygon>
                                    <polygon class="poly" points="10,50 20,50"></polygon>
                                    <polygon class="poly" points="20,80 30,70"></polygon>
                                    <polygon class="poly" points="90,10 80,20"></polygon>
                                    <polygon class="poly" points="90,50 80,50"></polygon>
                                    <polygon class="poly" points="80,80 70,70"></polygon>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>