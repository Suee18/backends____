// Sample questions
const questions = [
    {
        question: "Do you prefer speed or fuel efficiency?",
        answers: [
            { text: "Speed", type: "Performance Enthusiast" },
            { text: "Fuel Efficiency", type: "Eco-Warrior" }
        ]
    },
    {
        question: "Do you prefer luxury or affordability?",
        answers: [
            { text: "Luxury", type: "Luxury Seeker" },
            { text: "Affordability", type: "Budget Conscious" }
        ]
    },
    {
        question: "Do you like the latest technology in cars?",
        answers: [
            { text: "Yes", type: "Tech Geek" },
            { text: "No", type: "Classic Car Lover" }
        ]
    }
];

// Variables to keep track of the current question and persona scores
let currentQuestionIndex = 0;
let personaScores = {
    "Performance Enthusiast": 0,
    "Eco-Warrior": 0,
    "Luxury Seeker": 0,
    "Budget Conscious": 0,
    "Tech Geek": 0,
    "Classic Car Lover": 0
};

// Function to load the current question
function loadQuestion() {
    const questionContainer = document.getElementById("quiz");
    const question = questions[currentQuestionIndex];

    // Clear previous question content
    questionContainer.innerHTML = `<h2>${question.question}</h2>`;

    // Add answer buttons
    question.answers.forEach(answer => {
        const button = document.createElement("button");
        button.innerText = answer.text;
        button.onclick = () => selectAnswer(answer.type);
        questionContainer.appendChild(button);
    });
}

// Function to handle answer selection
function selectAnswer(persona) {
    // Increment the score for the selected persona
    personaScores[persona]++;
    currentQuestionIndex++;

    // Check if there are more questions
    if (currentQuestionIndex < questions.length) {
        loadQuestion();
    } else {
        showResult();
    }
}

// Function to show the result
function showResult() {
    // Hide the quiz and show the result
    document.getElementById("quiz").classList.add("hidden");
    document.getElementById("next-btn").classList.add("hidden");
    document.getElementById("result").classList.remove("hidden");

    // Find the persona with the highest score
    const topPersona = Object.keys(personaScores).reduce((a, b) => personaScores[a] > personaScores[b] ? a : b);
    document.getElementById("persona").innerText = topPersona;

    // Set persona description
    const descriptions = {
        "Performance Enthusiast": "You love cars that go fast and handle well.",
        "Eco-Warrior": "You prioritize fuel efficiency and environmental impact.",
        "Luxury Seeker": "You appreciate the finer things in life, including luxury cars.",
        "Budget Conscious": "You are practical and value affordability in your vehicle choice.",
        "Tech Geek": "You love cars with the latest technology and gadgets.",
        "Classic Car Lover": "You appreciate the timeless design and simplicity of classic cars."
    };
    document.getElementById("persona-description").innerText = descriptions[topPersona];
}

// Initial call to load the first question
loadQuestion();
