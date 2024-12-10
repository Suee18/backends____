<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../env_loader.php';
use OpenAI\OpenAI;

interface RecommendationStrategy
{
    public function recommend(string $input): string;
}

class QuizRecommendationStrategy implements RecommendationStrategy
{
    public function recommend(string $input): string
    {
        return "";
    }
}

class ChatbotRecommendationStrategy implements RecommendationStrategy
{
    public function recommend(string $input): string
    {
        $openAIInstructionPrompt =
            "You are a car recommendation assistant. Recommend cars based on type, budget, features, and usage. 
            Limitations:
            1. No real-time data (prices, availability, etc.).
            2. Responses should be brief and up-to-date with the latest news.
            3. Only respond to car-related queries and ask clarifying questions if needed.";


        $apiKey = $_ENV['OPENAI_API_KEY'];
        $client = \OpenAI::client($apiKey);

        try {
            $response = $client->chat()->create([
                'model' => 'gpt-4-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => $openAIInstructionPrompt],
                    ['role' => 'user', 'content' => $input]
                ]
            ]);

            $message = $response['choices'][0]['message']['content'] ?? "I couldn't understand that. Could you rephrase?";

            // Return the response text
            return trim($message);
        } catch (Exception $e) {
            return "An error occurred while processing your request.";
        }
    }
}

class RecommendationContext
{
    private RecommendationStrategy $strategy;

    public function __construct(RecommendationStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function setStrategy(RecommendationStrategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function recommend(string $input): string
    {
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