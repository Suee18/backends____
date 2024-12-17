<?php if (isset($filteredCar)): ?>
    <link rel="stylesheet" href="css/car_card.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="../js/favorites.js" defer></script>

    <div id="notification-container"></div>
    <div class="car-cards-container">
        
        <div class="container2">
            <div class="car-card">
                <div class="car-card-inner">
                    <!-- Front of the card -->
                    <div class="car-card-front">
                        <div class="img-container">
                            <img src="<?= htmlspecialchars($filteredCar['image']); ?>" alt="<?= htmlspecialchars($filteredCar['make'] . ' ' . $filteredCar['model']); ?>" class="car-card-img">
                        </div>
                        <div class="car-card-content">
                            <div class="car-info-container">
                                <p class="car-name"><?= htmlspecialchars($filteredCar['make']); ?></p>
                                <p class="carModel"><?= htmlspecialchars($filteredCar['model']); ?></p>
                            </div>

                            <?php
                          
                           if (!function_exists('limitDescription')) {
                               function limitDescription($description, $wordLimit = 30)
                               {
                                   $words = explode(' ', $description);
                                   if (count($words) > $wordLimit) {
                                       return implode(' ', array_slice($words, 0, $wordLimit)) . '...';
                                   }
                                   return $description;
                               }
                           }
                           
                            ?>
                            <p class="car-description"><?= htmlspecialchars(limitDescription($filteredCar['personaDescription'])); ?></p>
                            <p class="car-price">$<?= htmlspecialchars(number_format($filteredCar['price'])); ?></p>
                        </div>
                    </div>
                    <!-- Back of the card -->
                    <div class="car-card-back">
                        <div class="car-specs-content">
                            <h3 class="specs-title">Car Specifications</h3>
                            <table class="specs-table">
                                <tbody>
                                    <?php foreach ($filteredCar as $key => $value): ?>
                                        <?php if (!in_array($key, ['make', 'model', 'image', 'price', 'personaDescription'])): ?>
                                            <tr>
                                                <td class="spec-in-table"><?= ucfirst(str_replace('_', ' ', $key)); ?></td>
                                                <td><?= htmlspecialchars($value); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- ⚠️⚠️⚠️⚠️⚠️⚠️ check animation with omneya -->
                             
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
<?php endif; ?>