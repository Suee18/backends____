// User Icon
document.addEventListener("DOMContentLoaded", function () {
    const nav = document.querySelector("nav"),
        toggleBtn = nav.querySelector(".toggle-btn");
    toggleBtn.addEventListener("click", () => {
        nav.classList.toggle("open");
    });
});

/*chat functions*/
document.addEventListener("DOMContentLoaded", function () {
    const sendButton = document.getElementById("send-btn");
    const caption = document.getElementById("caption");
    const inputField = document.getElementById("input");
    const chatBox = document.getElementById("chat-box");

    sendButton.addEventListener("click", function () {
        if (inputField.value.trim() !== "") {
            caption.classList.add("hidden");
            console.log("Caption hidden");

            const userMessage = document.createElement("div");
            userMessage.textContent = inputField.value;
            userMessage.classList.add("user-message");
            chatBox.appendChild(userMessage);

            inputField.value = "";
        }
    });

    inputField.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            sendButton.click();
        }
    });
});

/*Chat responses*/

// const botResponses = {
//     suv: "I recommend the latest Toyota Highlander, a spacious and reliable SUV.",
//     sedan: "You might like the Honda Accord, known for its fuel efficiency and comfort.",
//     electric: "The Tesla Model 3 is a great electric car with a long range.",
//     default:
//         "I'm not sure about that. Can you be more specific about the car type you're looking for?",
// };

document.getElementById("send-btn").addEventListener("click", sendMessage);

function appendMessage(sender, message) {
    const chatBox = document.getElementById("chat-box");
    const newMessage = document.createElement("div");
    newMessage.classList.add(
        sender === "user" ? "user-message" : "bot-message"
    );

    if (sender === "bot") {
        // Simulate typing animation with proper spaces
        let i = 0;
        const interval = setInterval(() => {
            if (i < message.length) {
                // Use message.substring(i, i+1) to append the exact character
                newMessage.innerText = message.substring(0, i + 1);
                chatBox.scrollTop = chatBox.scrollHeight;
                i++;
            } else {
                clearInterval(interval); // Stop interval when done
            }
        }, 20); // Adjust interval time for speed (20ms makes it fast)
    } else {
        // For user messages, display the full message immediately
        newMessage.innerText = message;
    }

    chatBox.appendChild(newMessage);
    chatBox.scrollTop = chatBox.scrollHeight;
}

function sendMessage() {
    const userInput = document.getElementById("input").value.trim();
    if (userInput === "") return;

    appendMessage("user", userInput); // Display user message
    displayDateTime();

    // Send input to the backend using AJAX
    $.ajax({
        url: "../../../controllers/RecommendingProcess.php", // PHP backend URL
        type: "POST",
        data: JSON.stringify({ input: userInput, strategy: "chatbot" }),
        contentType: "application/json", // Specify JSON content type
        success: function (response) {
            // Display the response from the backend
            appendMessage("bot", response.response);
        },
        error: function (xhr, status, error) {
            console.error("Error details:", xhr.responseText);
            appendMessage("bot", "Sorry, something went wrong.");
        },
    });

    document.getElementById("input").value = ""; // Clear input
}

function displayDateTime() {
    const now = new Date();
    const options = {
        weekday: "long",
        year: "numeric",
        month: "short",
        day: "numeric",
        hour: "2-digit",
        minute: "2-digit",
    };
    const dateTimeString = now.toLocaleString("en-US", options);
    document.getElementById("date-time").innerText = dateTimeString;
}

function getBotResponse(userInput) {
    userInput = userInput.toLowerCase();

    if (userInput.includes("suv")) {
        return botResponses["suv"];
    } else if (userInput.includes("sedan")) {
        return botResponses["sedan"];
    } else if (userInput.includes("electric")) {
        return botResponses["electric"];
    } else {
        return botResponses["default"];
    }
}

/*accessing submit button & removing caption when submitting*/
document.addEventListener("DOMContentLoaded", function () {
    const sendButton = document.getElementById("send-btn");
    const caption = document.getElementById("caption");
    const input = document.getElementById("input");
    sendButton.disabled = true;

    input.addEventListener("input", function () {
        if (input.value.trim() === "") {
            sendButton.disabled = true;
            sendButton.style.backgroundColor = "#ccc";
        } else {
            sendButton.disabled = false;
            sendButton.style.backgroundColor = "#739aae7f";
        }
    });

    sendButton.addEventListener("click", function () {
        caption.style.display = "none";
    });

    input.addEventListener("keypress", function (event) {
        if (event.key === "Enter" && input.value.trim() !== "") {
            caption.style.display = "none";
        }
    });
});
