<?php
include_once __DIR__ . '/../app/config/db_config.php';
include_once __DIR__ . '/../models/PersonasModel.php';

// Ensure the database connection is established
if (!isset($conn)) {
    die("Database connection not established.");
}

// Instantiate the PersonasModel with the database connection
$personaModel = new PersonasModel($conn);

// Fetch all personas from the database
$personasFromDb = $personaModel->getAllPersonasAsArray();

// Initialize personas dynamically
$personas = [];
if ($personasFromDb !== false) {
    foreach ($personasFromDb as $persona) {
        $personas[$persona['personaName']] = [
            'name' => $persona['personaName'],
            'id' => $persona['personaID'],
            'icon' => $persona['personaIcon'],
            'description' => $persona['personaDescription'],
            'weight' => 0 // Initialize the weight to 0
        ];
    }
} else {
    die("Error fetching personas from the database.");
}

// // Questions
$questions = [
    1 => [
        'question' => 'What is your primary use for a car?',
        'answers' => [
            'A' => [
                'text' => 'Commuting in the city',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/commuting.png',
                'scores' => ['City Slicker' => 4, 'Budget Conscious' => 3]
            ],
            'B' => [
                'text' => 'Family trips and daily school runs',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/family-icon.png',
                'scores' => ['Family First' => 5]
            ],
            'C' => [
                'text' => 'Long road trips or off-roading adventures',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/long-road.png',
                'scores' => ['Performance Enthusiast' => 4, 'Adventurer' => 2]
            ],
            'D' => [
                'text' => 'Enjoying the luxury of driving',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/fun-icon.png',
                'scores' => ['Luxury Seeker' => 4, 'Classic Car Lover' => 3]
            ],
            'E' => [
                'text' => 'I don’t know',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/i_dont_know.png',
                'scores' => ['The Path Finder' => 1]
            ]
        ]
    ],
    2 => [
        'question' => 'How important is fuel efficiency to you?',
        'answers' => [
            'A' => [
                'text' => 'Extremely important - I want an electric/hybrid car',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/electric-car-icon.png',
                'scores' => ['Eco-Warrior' => 5]
            ],
            'B' => [
                'text' => 'Fairly Important - I am open to both',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/balance-icon.png',
                'scores' => ['Budget Conscious' => 3]
            ],
            'C' => [
                'text' => 'Not a priority - I focus more about performance',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/performance-icon.png',
                'scores' => ['Performance Enthusiast' => 4]
            ],
            'D' => [
                'text' => 'Not a matter - I care more about the driving experience',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/driving-icon.png',
                'scores' => [ 'Classic Car Lover' => 4]
            ],
            'E' => [
                'text' => 'I don’t know',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/i_dont_know.png',
                'scores' => ['The Path Finder' => 1]
            ]
        ]
            ],
    3 => [
        'question' => 'How many passengers do you typically accommodate?',
        'answers' => [
            'A' => [
                'text' => 'Just me or one other person',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/two-people-icon.png',
                'scores' => [ 'Performance Enthusiast' => 3, 'Tech Geek' => 2 ]
            ],
            'B' => [
                'text' => '3-4 people',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/group-of-people-icon.png',
                'scores' => ['Eco-Warrior' => 3, 'Budget Conscious' => 4 ]
            ],
            'C' => [
                'text' => '5 or more people',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/family-icon.png',
                'scores' => ['Family First' => 5 ]
            ],
            'D' => [
                'text' => 'It depends on the occasion',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/flexible-icon.png',
                'scores' => ['Luxury Seeker' => 3 ]
            ],    
            'E' => [
                'text' => 'I don’t know',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/i_dont_know.png',
                'scores' => ['The Path Finder' => 1]
            ]
        ]
    ],
    4 => [
        'question' => 'What’s your budget range for a new car?',
        'answers' => [
            'A' => [
                'text' => 'Under $20,000',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/dollar-sign-icon.png',
                'scores' => ['Budget Conscious' => 5]
            ],
            'B' => [
                'text' => '$20,000 - $50,000',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/price-tag-icon.png',
                'scores' => ['Eco-Warrior' => 4, 'Family First' => 4]
            ],
            'C' => [
                'text' => 'Over $50,000',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/luxury-icon.png',
                'scores' => ['Luxury Seeker' => 5, 'Performance Enthusiast' => 3]
            ],
            'D' => [
                'text' => 'Money’s no issue – I’m after the experience',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/money-bag-icon.png',
                'scores' => ['Classic Car Lover' => 5, 'Luxury Seeker' => 4]
            ],
            'E' => [
                'text' => 'I don’t know',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/i_dont_know.png',
                'scores' => ['The Path Finder' => 2]
            ]
        ]
 
     
    ],
       

    5 => [
        'question' => 'How important is having the latest technology in your car?',
        'answers' => [
            'A' => [
                'text' => 'Very important - I want all the latest gadgets',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/gadgets-icon.png',
                'scores' => ['Tech Geek' => 5, 'Luxury Seeker' => 4]
            ],
            'B' => [
                'text' => 'It\'s a nice bonus but not essential',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/bonus-icon.png',
                'scores' => ['Eco-Warrior' => 3, 'Performance Enthusiast' => 3]
            ],
            'C' => [
                'text' => 'Not necessary - I\'m more focused on driving mechanics',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/steering-wheel-icon.png',
                'scores' => ['Classic Car Lover' => 4]
            ],
            'D' => [
                'text' => 'I prefer practical tech for safety and convenience',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/safety-icon.png',
                'scores' => ['Family First' => 4]
            ],
            'E' => [
                'text' => 'I don’t know',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/i_dont_know.png',
                'scores' => ['The Path Finder' => 2]
            ]
        ]
    ],
  
    6 => [
        'question' => 'What kind of road conditions do you usually drive on?',
        // 'answers' => [
        //     'A' => [
        //         'text' => 'City streets and highways',
        //         'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/city-icon.png'
        //     ],
        //     'B' => [
        //         'text' => 'Suburban or rural roads',
        //         'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/countryside-icon.png'
        //     ],
        //     'C' => [
        //         'text' => 'Rough terrain, off-road, or long-distance',
        //         'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/offroad-icon.png'
        //     ],
        //     'D' => [
        //         'text' => 'I love scenic and classic drives',
        //         'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/scenic-icon.png'
        //     ],
        //     'E' => [
        //         'text' => 'I don’t know',
        //         'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/i_dont_know.png',
        //         'scores' => ['The Path Finder' => 2]
        //     ]
        // ]
        'answers' => [
            'A' => [
            'text' => 'City streets and highways',
            'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/city-icon.png',
            'scores' => ['City Slicker' => 4, 'Tech Geek' => 3, 'Eco-Warrior' => 3]
            ],
            'B' => [
            'text' => 'Suburban or rural roads',
            'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/countryside-icon.png',
            'scores' => ['Family First' => 4, 'Budget Conscious' => 4]
            ],
            'C' => [
            'text' => 'Rough terrain, off-road, or long-distance',
            'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/offroad-icon.png',
            'scores' => ['Performance Enthusiast' => 5]
            ],
            'D' => [
            'text' => 'I love scenic and classic drives',
            'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/scenic-icon.png',
            'scores' => ['Classic Car Lover' => 5]
            ],
            'E' => [
            'text' => 'I don’t know',
            'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/i_dont_know.png',
            'scores' => ['The Path Finder' => 2]
            ]
        ]
    
    ],


    7 => [
        'question' => 'How important is safety when choosing a car?',
        'answers' => [
            'A' => [
            'text' => 'It\'s my top priority',
            'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/safety-icon.png',
            'scores' => ['Family First' => 5, 'Budget Conscious' => 4]
            ],
            'B' => [
            'text' => 'Fairly important - but I also consider performance',
            'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/balance-icon.png',
            'scores' => ['Performance Enthusiast' => 4, 'Eco-Warrior' => 3]
            ],
            'C' => [
            'text' => 'Safety matters, but comfort and style come first',
            'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/comfort-icon.png',
            'scores' => ['Luxury Seeker' => 4, 'Classic Car Lover' => 3]
            ],
            'D' => [
            'text' => 'Not a primary concern - I prioritize fun driving experience',
            'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/fun-icon.png',
            'scores' => ['Classic Car Lover' => 5]
            ],
            'E' => [
            'text' => 'I don’t know',
            'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/i_dont_know.png',
            'scores' => ['The Path Finder' => 2]
            ]
        ]
            // 'A' => [
            //     'text' => 'It\'s my top priority',
            //     'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/safety-icon.png'
            // ],
            // 'B' => [
            //     'text' => 'Fairly important - but I also consider performance',
            //     'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/balance-icon.png'
            // ],
            // 'C' => [
            //     'text' => 'Safety matters, but comfort and style come first',
            //     'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/comfort-icon.png'
            // ],
            // 'D' => [
            //     'text' => 'Not a primary concern - I prioritize fun driving experience',
            //     'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/fun-icon.png'
            // ],
            // 'E' => [
            //     'text' => 'I don’t know',
            //     'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/i_dont_know.png',
            //     'scores' => ['The Path Finder' => 2]
            // ]
        
    ],
    8 => [
        'question' => 'Do you care about the environmental impact?',
        'answers' => [
            'A' => [
                'text' => 'Yes, I\'m committed to sustainable choices',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/recycle-icon.png',
                'scores' => ['Eco-Warrior' => 5]
            ],
            'B' => [
                'text' => 'Somewhat - but it\'s not my main concern',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/balance-icon.png',
                'scores' => ['Family First' => 3, 'Budget Conscious' => 4]
            ],
            'C' => [
                'text' => 'Not really - I care more about performance',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/performance-icon.png',
                'scores' => ['Performance Enthusiast' => 4]
            ],
            'D' => [
                'text' => 'I\'m more into classic aesthetics and luxury',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/luxury-icon.png',
                'scores' => ['Classic Car Lover' => 4, 'Luxury Seeker' => 3]
            ],
            // 'A' => [
            //     'text' => 'Yes, I\'m committed to sustainable choices',
            //     'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/recycle-icon.png'
            // ],
            // 'B' => [
            //     'text' => 'Somewhat - but it\'s not my main concern',
            //     'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/balance-icon.png'
            // ],
            // 'C' => [
            //     'text' => 'Not really - I care more about performance',
            //     'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/performance-icon.png'
            // ],
            // 'D' => [
            //     'text' => 'I\'m more into classic aesthetics and luxury',
            //     'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/luxury-icon.png'
            // ],
            'E' => [
                'text' => 'I don’t know',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/i_dont_know.png',
                'scores' => ['The Path Finder' => 2]
            ]
        ]
    ],

    9 => [
        'question' => 'What type of car body style do you prefer?',
        'answers' => [
            'A' => [
            'text' => 'Compact cars or sedans',
            'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/compact-car-icon.png',
            'scores' => ['Eco-Warrior' => 4, 'Budget Conscious' => 4, 'City Slicker' => 3]
            ],
            'B' => [
            'text' => 'SUVs or minivans',
            'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/suv-icon.png',
            'scores' => ['Family First' => 5, 'Performance Enthusiast' => 3]
            ],
            'C' => [
            'text' => 'Sleek, stylish luxury sedans or coupes',
            'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/luxury-icon.png',
            'scores' => ['Luxury Seeker' => 5, 'Classic Car Lover' => 4]
            ],
            'D' => [
            'text' => 'Sports cars or performance vehicles',
            'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/classic-icon.png',
            'scores' => ['Performance Enthusiast' => 5]
            ],
            'E' => [
            'text' => 'I don’t know',
            'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/i_dont_know.png',
            'scores' => ['The Path Finder' => 2]
            ]
        ]
        // 'answers' => [
            
        //     'A' => [
        //         'text' => 'Compact cars or sedans',
        //         'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/compact-car-icon.png'
        //     ],
        //     'B' => [
        //         'text' => 'SUVs or minivans',
        //         'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/suv-icon.png'
        //     ],
        //     'C' => [
        //         'text' => 'Sleek, stylish luxury sedans or coupes',
        //         'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/luxury-icon.png'
        //     ],
        //     'D' => [
        //         'text' => 'Sports cars or performance vehicles',
        //         'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/classic-icon.png',
        //     ],
        //     'E' => [
        //         'text' => 'I don’t know',
        //         'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/i_dont_know.png',
        //         'scores' => ['The Path Finder' => 2]
        //     ]
        // ]
    ],

    10 => [
        'question' => 'How would you describe your perfect driving experience?',
        'answers' => [
            'A' => [
            'text' => 'Quiet, smooth, and comfortable',
            'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/comfort-icon.png',
            'scores' => ['Eco-Warrior' => 5]
            ],
            'B' => [
            'text' => 'Safe and comfortable for my family',
            'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/family-icon.png',
            'scores' => ['Family First' => 5]
            ],
            'C' => [
            'text' => 'Luxurious and tech-enhanced',
            'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/luxury-icon.png',
            'scores' => ['Luxury Seeker' => 5, 'Tech Geek' => 4]
            ],
            'D' => [
            'text' => 'Fast and exhilarating',
            'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/sports-car-icon.png',
            'scores' => ['Performance Enthusiast' => 5]
            ],
            'E' => [
            'text' => 'Nostalgic and stylish',
            'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/classic-icon.png',
            'scores' => ['Classic Car Lover' => 5]
            ],
            'F' => [
            'text' => 'I don’t know',
            'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/i_dont_know.png',
            'scores' => ['The Path Finder' => 2]
            ]
        ]
        //     'A' => [
        //         'text' => 'Quiet, smooth, and comfortable',
        //         'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/comfort-icon.png'
        //     ],
        //     'B' => [
        //         'text' => 'Safe and comfortable for my family',
        //         'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/family-icon.png'
        //     ],
        //     'C' => [
        //         'text' => 'Luxurious and tech-enhanced',
        //         'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/luxury-icon.png'
        //     ],
        //     'D' => [
        //         'text' => 'Fast and exhilarating',
        //         'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/sports-car-icon.png'
        //     ],
        //     'E' => [
        //         'text' => 'Nostalgic and stylish',
        //         'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/classic-icon.png'
        //     ],
        //     'F' => [
        //         'text' => 'I don’t know',
        //         'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/i_dont_know.png',
        //         'scores' => ['The Path Finder' => 2]
        //     ]
        // ]
    ]




];
// Function to calculate persona weights based on answers
function calculatePersonas($responses, $questions, &$personas) {
    try {
        foreach ($responses as $questionId => $answer) {
            // Ensure the question exists
            if (!isset($questions[$questionId])) {
                throw new Exception("Invalid question ID: $questionId.");
            }

            // Ensure the answer exists for the question
            if (!isset($questions[$questionId]['answers'][$answer])) {
                throw new Exception("Invalid answer for question ID: $questionId.");
            }

            // Process the scores for the answer
            foreach ($questions[$questionId]['answers'][$answer]['scores'] as $personaName => $weight) {
                if (!isset($personas[$personaName])) {
                    // Fallback initialization for missing personas
                    $personas[$personaName] = [
                        'name' => $personaName,
                        'id' => null,
                        'icon' => 'default-icon.png', // Set a default icon or path
                        'description' => 'Description not available.', // Default description
                        'weight' => 0
                    ];
                }
                $personas[$personaName]['weight'] += $weight;
            }
        }

        return $personas;
    } catch (Exception $e) {
        // Log the exception for debugging
        error_log("Error in calculatePersonas: " . $e->getMessage());

        // Return an empty personas array or handle gracefully
        return [];
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $userResponses = $_POST['answers'] ?? [];

        // Ensure there are responses
        if (empty($userResponses)) {
            throw new Exception("No responses provided. Please answer the questions.");
        }

        // Validate the responses format
        if (!is_array($userResponses)) {
            throw new Exception("Invalid responses format.");
        }

        // Calculate the persona scores
        $personas = calculatePersonas($userResponses, $questions, $personas);

        // Log calculated personas for debugging
        error_log(print_r($personas, true));

        // Check if personas array is empty (indicating an error)
        if (empty($personas)) {
            throw new Exception("Persona calculation failed. No valid personas generated.");
        }

        // Determine the top persona
        usort($personas, function ($a, $b) {
            return $b['weight'] <=> $a['weight'];
        });

        // Get the top persona
        $topPersona = reset($personas);

        // Ensure topPersona has required fields
        if (empty($topPersona['name']) || empty($topPersona['weight'])) {
            throw new Exception("Top persona data is incomplete.");
        }

        // Redirect to a results page or display results
        header('Content-Type: application/json');
        echo json_encode([
            'topPersona' => [
                'name' => $topPersona['name'],
                'description' => $topPersona['description'] ?? 'Description not available.',
                'icon' => $topPersona['icon'] ?? 'default-icon.png',
                'weight' => $topPersona['weight']
            ]
        ]);
        exit;

    } catch (Exception $e) {
        // Log the exception
        error_log("Error in form submission handling: " . $e->getMessage());

        // Return an error response
        header('Content-Type: application/json');
        echo json_encode([
            'error' => true,
            'message' => $e->getMessage()
        ]);
        exit;
    }
}
