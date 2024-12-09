<?php

header("Content-Type: application/json");

interface RecommendationStrategy {
    public function recommend(string $input): string; 
}

class QuizRecommendationStrategy implements RecommendationStrategy {
    public function recommend(string $input): string {
        return "";
        // TODO: Implement recommend() method.
    }
}

class ChatbotRecommendationStrategy implements RecommendationStrategy {
    public function recommend(string $input): string {
        // Simple keyword matching for now
        if (stripos($input, "suv") !== false) {
            return "I recommend the latest Toyota Highlander, a spacious and reliable SUV.";
        } elseif (stripos($input, "sedan") !== false) {
            return "You might like the Honda Accord, known for its fuel efficiency and comfort.";
        } elseif (stripos($input, "electric") !== false) {
            return "The Tesla Model 3 is a great electric car with a long range.";
        } else {
            return "I'm not sure about that. Can you be more specific about the car type you're looking for?";
        }
    }
}

class RecommendationContext {
    private RecommendationStrategy $strategy;

    public function __construct(RecommendationStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(RecommendationStrategy $strategy): void {
        $this->strategy = $strategy;
    }

    public function recommend(string $input): string {
        return $this->strategy->recommend($input);
    }
}

$inputData = json_decode(file_get_contents("php://input"), true);
if (isset($inputData["input"]) && isset($inputData["strategy"])) {
    $input = $inputData["input"];
    $strategyType = $inputData["strategy"];

    $context = null;

    // Set strategy based on the type
    if ($strategyType === "chatbot") {
        $context = new RecommendationContext(new ChatbotRecommendationStrategy());
    } else {
        echo json_encode(["response" => "Invalid strategy type."]);
        exit;
    }

    // Get the recommendation and send the response
    $response = $context->recommend($input);
    echo json_encode(["response" => $response]);
} else {
    echo json_encode(["response" => "Invalid input."]);
}