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
            'weight' => 0 // Initialize weights temporarily in-memory
        ];
    }
} else {
    die("Error fetching personas from the database.");
}

// // Questions
// $questions = [
//     1 => [
//         'question' => 'What is your primary use for a car?',
//         'answers' => [
//             'A' => [
//                 'text' => 'Commuting in the city',
//                 'icon' => '../../../public_html/media/Persona_Test_Images/Test_images/icons/balance-icon.png',
//                 'scores' => ['City Slicker' => 4, 'Budget Conscious' => 3]
//             ],
//             'B' => [
//                 'text' => 'Family trips and daily school runs',
//                 'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/family-icon.png',
//                 'scores' => ['Family First' => 5]
//             ],
//             'C' => [
//                 'text' => 'Long road trips or off-roading adventures',
//                 'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/long-road.png',
//                 'scores' => ['Performance Enthusiast' => 4, 'Adventurer' => 2]
//             ],
//             'D' => [
//                 'text' => 'Enjoying the luxury of driving',
//                 'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/fun-icon.png',
//                 'scores' => ['Luxury Seeker' => 4, 'Classic Car Lover' => 3]
//             ],
//             'E' => [
//                 'text' => 'I dont know',
//                 'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/i_dont_know.png',
//                 'scores' => ['The Path Finder' => 5]

//             ]
//         ]
//     ],
//     2 => [
//         'question' => 'How important is fuel efficiency to you?',
//         'answers' => [
//             'A' => [
//                 'text' => 'Extremely important - I want an electric/hybrid car',
//                 'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/electric-car-icon.png',
//                 'scores' => ['Eco-Warrior' => 0, 'Budget Conscious' => 3]
//             ],
//             'B' => [
//                 'text' => 'Fairly Important - I am open to both',
//                 'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/balance-icon.png',
//                 'scores' => ['Family First' => 5]
//             ],
//             'C' => [
//                 'text' => 'Not a priority - I focus more about performance',
//                 'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/performance-icon.png',
//                 'scores' => ['Performance Enthusiast' => 4, 'Adventurer' => 2]
//             ],
//             'D' => [
//                 'text' => 'Not a matter - I care more about the driving experience',
//                 'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/driving-icon.png',
//                 'scores' => ['Luxury Seeker' => 4, 'Classic Car Lover' => 3]
//             ],
//             'E' => [
//                 'text' => 'I dont know',
//                 'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/i_dont_know.png',
//                 'scores' => ['The Path Finder' => 5]

//             ]
//         ]
//     ]

// ];


$questions = [
    1 => [
        'question' => 'What is your primary use for a car?',
        'answers' => [
            'A' => [
                'text' => 'Commuting in the city',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/balance-icon.png',
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
                'scores' => ['The Path Finder' => 2]
            ]
        ]
    ],
    2 => [
        'question' => 'How important is fuel efficiency to you?',
        'answers' => [
            'A' => [
                'text' => 'Extremely important - I want an electric/hybrid car',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/electric-car-icon.png',
                'scores' => ['Eco-Warrior' => 5, 'Budget Conscious' => 3]
            ],
            'B' => [
                'text' => 'Fairly Important - I am open to both',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/balance-icon.png',
                'scores' => ['Family First' => 5]
            ],
            'C' => [
                'text' => 'Not a priority - I focus more about performance',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/performance-icon.png',
                'scores' => ['Performance Enthusiast' => 4, 'Adventurer' => 2]
            ],
            'D' => [
                'text' => 'Not a matter - I care more about the driving experience',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/driving-icon.png',
                'scores' => ['Luxury Seeker' => 4, 'Classic Car Lover' => 3]
            ],
            'E' => [
                'text' => 'I don’t know',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/i_dont_know.png',
                'scores' => ['The Path Finder' => 2]
            ]
        ]
    ],
    3 => [
        'question' => 'How many passengers do you typically accommodate?',
        'answers' => [
            'A' => [
                'text' => 'Just me or one other person',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/two-people-icon.png',
                'scores' => ['Performance Enthusiast' => 3]
            ],
            'B' => [
                'text' => '3-4 people',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/group-of-people-icon.png',
                'scores' => ['Family First' => 4]
            ],
            'C' => [
                'text' => '5 or more people',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/family-icon.png',
                'scores' => ['Family First' => 5]
            ],
            'D' => [
                'text' => 'It depends on the occasion',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/flexible-icon.png',
                'scores' => ['Adventurer' => 3, 'Budget Conscious' => 2]
            ],
            'E' => [
                'text' => 'I don’t know',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/i_dont_know.png',
                'scores' => ['The Path Finder' => 2]
            ]
        ]
    ],
    4 => [
        'question' => "What's your budget for a new car?",
        'answers' => [
            'A' => [
                'text' => 'Under $20,000',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/dollar-sign-icon.png',
                'scores' => ['Budget Conscious' => 5]
            ],
            'B' => [
                'text' => '$20,000 - $50,000',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/price-tag-icon.png',
                'scores' => ['Family First' => 3, 'City Slicker' => 2]
            ],
            'C' => [
                'text' => 'Over $50,000',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/luxury-icon.png',
                'scores' => ['Luxury Seeker' => 5]
            ],
            'D' => [
                'text' => "Money's no issue, I'm after performance",
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/money-bag-icon.png',
                'scores' => ['Performance Enthusiast' => 4]
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
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/gadgets-icon.png'
            ],
            'B' => [
                'text' => 'It\'s a nice bonus but not essential',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/bonus-icon.png'
            ],
            'C' => [
                'text' => 'Not necessary - I\'m more focused on driving mechanics',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/steering-wheel-icon.png'
            ],
            'D' => [
                'text' => 'I prefer practical tech for safety and convenience',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/safety-icon.png'
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
        'answers' => [
            'A' => [
                'text' => 'City streets and highways',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/city-icon.png'
            ],
            'B' => [
                'text' => 'Suburban or rural roads',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/countryside-icon.png'
            ],
            'C' => [
                'text' => 'Rough terrain, off-road, or long-distance',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/offroad-icon.png'
            ],
            'D' => [
                'text' => 'I love scenic and classic drives',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/scenic-icon.png'
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
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/safety-icon.png'
            ],
            'B' => [
                'text' => 'Fairly important - but I also consider performance',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/balance-icon.png'
            ],
            'C' => [
                'text' => 'Safety matters, but comfort and style come first',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/comfort-icon.png'
            ],
            'D' => [
                'text' => 'Not a primary concern - I prioritize fun driving experience',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/fun-icon.png'
            ],
            'E' => [
                'text' => 'I don’t know',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_Images/icons/i_dont_know.png',
                'scores' => ['The Path Finder' => 2]
            ]
        ]
    ],




];

// Function to calculate persona weights based on answers
function calculatePersonas($responses, $questions, &$personas)
{
    foreach ($responses as $questionId => $answer) {
        if (isset($questions[$questionId]['answers'][$answer])) {
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
    }

    return $personas;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userResponses = $_POST['answers'] ?? [];

    if (empty($userResponses)) {
        die("No responses provided. Please answer the questions.");
    }

    // Calculate the persona scores
    $personas = calculatePersonas($userResponses, $questions, $personas);
    error_log(print_r($personas, true));

    // Determine the top persona
    usort($personas, function ($a, $b) {
        return $b['weight'] <=> $a['weight'];
    });

    // Get the top persona
    $topPersona = reset($personas);

    // Redirect to a results page or display results
    header('Content-Type: application/json');
    echo json_encode([
        'topPersona' => [
            'name' => $topPersona['name'],
            'description' => $topPersona['description'],
            'icon' => $topPersona['icon'],
            'weight' => $topPersona['weight']
        ]
    ]);
    exit;
}
