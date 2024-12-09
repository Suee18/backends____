<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../env_loader.php';
use OpenAI\Client as OpenAIClient;
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
        "You are a helpful car recommendation assistant. You specialize in recommending cars based on user preferences, such as car type, budget, features, and usage scenarios. 
        Limitations:
        1. You do not have access to real-time data, such as current car prices or availability.
        2. Your knowledge is based on information up to September 2021.
        3. You cannot provide information about new car models released after this date or current market trends.
        4. Always clarify if you're unsure or need more details from the user to make a recommendation.
        5. Avoid giving financial, legal, or technical advice outside the scope of car recommendations.
        Your goal is to assist users by providing thoughtful, concise, and relevant car suggestions based on the information they provide. Ask follow-up questions if necessary to refine your recommendations.";

        $apiKey = $_ENV['OPENAI_API_KEY'];
        $client = \OpenAI::client($apiKey);
        
        try {
            $response = $client->chat()->create([
                'model' => 'gpt-4',
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