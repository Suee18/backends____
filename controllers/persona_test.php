<?php
// Define personas and their attributes
$personas = [
    'Eco-Warrior' => [
        'name' => 'Eco-Warrior',
        'id' => 1,
        'icon' => 'eco_warrior_icon.png',
        'description' => 'Committed to sustainable and eco-friendly driving.',
        'weight' => 0
    ],
    'Tech Geek' => [
        'name' => 'Tech Geek',
        'id' => 2,
        'icon' => 'tech_geek_icon.png',
        'description' => 'Loves the latest technology in vehicles.',
        'weight' => 0
    ],
    'Performance Enthusiast' => [
        'name' => 'Performance Enthusiast',
        'id' => 3,
        'icon' => 'performance_enthusiast_icon.png',
        'description' => 'Prioritizes speed and performance.',
        'weight' => 0
    ],
    'Family First' => [
        'name' => 'Family First',
        'id' => 4,
        'icon' => 'family_first_icon.png',
        'description' => 'Focuses on safety and family comfort.',
        'weight' => 0
    ],
    'Luxury Seeker' => [
        'name' => 'Luxury Seeker',
        'id' => 5,
        'icon' => 'luxury_seeker_icon.png',
        'description' => 'Enjoys luxury and stylish driving experiences.',
        'weight' => 0
    ],
    'Budget Conscious' => [
        'name' => 'Budget Conscious',
        'id' => 6,
        'icon' => 'budget_conscious_icon.png',
        'description' => 'Seeks value and affordability in a car.',
        'weight' => 0
    ],
    'Classic Car Lover' => [
        'name' => 'Classic Car Lover',
        'id' => 7,
        'icon' => 'classic_car_lover_icon.png',
        'description' => 'Appreciates classic aesthetics and nostalgic designs.',
        'weight' => 0
    ],
];

$questions = [
    1 => [
        'question' => 'What is your primary use for a car?',
        'answers' => [
            'A' => [
                'text' => 'Daily commuting in the city',
                'icon' => '../../../public_html/media/Persona_Test_Images/Test_images/icons/balance-icon.png',
                'scores' => ['City Slicker' => 4, 'Budget Conscious' => 3]
            ],
            'B' => [
                'text' => 'Family trips and errands',
                'icon' => '',
                'scores' => ['Family First' => 5]
            ],
            'C' => [
                'text' => 'High-performance driving',
                'icon' => 'high_performance_icon.png',
                'scores' => ['Performance Enthusiast' => 4, 'Adventurer' => 2]
            ],
            'D' => [
                'text' => 'Luxury and comfort',
                'icon' => 'luxury_comfort_icon.png',
                'scores' => ['Luxury Seeker' => 4, 'Classic Car Lover' => 3]
            ],
            'E' => [
                'text' => 'Eco-friendly driving',
                'icon' => 'eco_friendly_icon.png',
                'scores' => ['Eco-Warrior' => 4]
            ]
        ]
    ],
    2 => [
        'question' => 'How important is fuel efficiency to you?',
        'answers' => [
            'A' => [
                'text' => 'Very important',
                'icon' => 'fuel_efficiency_icon.png',
                'scores' => ['Eco-Warrior' => 0, 'Budget Conscious' => 3]
            ],
            'B' => [
                'text' => 'Somewhat important',
                'icon' => 'somewhat_important_icon.png',
                'scores' => ['Family First' => 5]
            ],
            'C' => [
                'text' => 'Not important',
                'icon' => 'not_important_icon.png',
                'scores' => ['Performance Enthusiast' => 4, 'Adventurer' => 2]
            ],
            'D' => [
                'text' => 'I prefer luxury over fuel efficiency',
                'icon' => 'prefer_luxury_icon.png',
                'scores' => ['Luxury Seeker' => 4, 'Classic Car Lover' => 3]
            ],
            'E' => [
                'text' => 'I don’t care about fuel efficiency',
                'icon' => 'dont_care_icon.png',
                'scores' => ['Luxury Seeker' => 4]
            ]
        ]
    ],

    // Add remaining questions following the same structure...
];


// // Define the questions and scoring system
// $questions = [
//     1 => [
//         'question' => 'What is your primary use for a car?',
//         'answers' => [
//             'A' => ['City Slicker' => 4, 'Budget Conscious' => 3],
//             'B' => ['Family First' => 5],
//             'C' => ['Performance Enthusiast' => 4, 'Adventurer' => 2],
//             'D' => ['Luxury Seeker' => 4, 'Classic Car Lover' => 3],
//             'E' => ['Luxury Seeker' => 4]
//         ]
//     ],
//     2 => [
//         'question' => 'How important is fuel efficiency to you?',
//         'answers' => [
//             'A' => ['City Slicker' => 4, 'Budget Conscious' => 3],
//             'B' => ['Family First' => 5],
//             'C' => ['Performance Enthusiast' => 4, 'Adventurer' => 2],
//             'D' => ['Luxury Seeker' => 4, 'Classic Car Lover' => 3],
//             'E' => ['Luxury Seeker' => 4]
//         ]
//     ],

//     // Add remaining questions following the same structure...
// ];



// Function to calculate persona weights based on answers
function calculatePersonas($responses, $questions, &$personas) {
    foreach ($responses as $questionId => $answer) {
        if (isset($questions[$questionId]['answers'][$answer])) {
            foreach ($questions[$questionId]['answers'][$answer]['scores'] as $persona => $weight) {
                if (isset($personas[$persona])) {
                    $personas[$persona]['weight'] += $weight;
                }
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

?>
