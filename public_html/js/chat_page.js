


document.addEventListener('DOMContentLoaded', function () {
    const sendButton = document.getElementById('send-btn');
    const caption = document.getElementById('caption');
    const inputField = document.getElementById('input');
    const chatBox = document.getElementById('chat-box');

    sendButton.addEventListener('click', function () {
        if (inputField.value.trim() !== '') {
          
            caption.classList.add('hidden'); 
            console.log("Caption hidden"); 

            const userMessage = document.createElement('div');
            userMessage.textContent = inputField.value;
            userMessage.classList.add('user-message');
            chatBox.appendChild(userMessage);

            inputField.value = '';
        }
    });

    inputField.addEventListener('keypress', function (event) {
        if (event.key === 'Enter') {
            sendButton.click();
        }
    });
});









const botResponses = {
    "suv": "I recommend the latest Toyota Highlander, a spacious and reliable SUV.",
    "sedan": "You might like the Honda Accord, known for its fuel efficiency and comfort.",
    "electric": "The Tesla Model 3 is a great electric car with a long range.",
    "default": "I'm not sure about that. Can you be more specific about the car type you're looking for?"
};

document.getElementById('send-btn').addEventListener('click', sendMessage);

function appendMessage(sender, message) {
    const chatBox = document.getElementById('chat-box');
    const newMessage = document.createElement('div');
    newMessage.classList.add(sender === 'user' ? 'user-message' : 'bot-message');
    newMessage.innerText = message;
    chatBox.appendChild(newMessage);
    chatBox.scrollTop = chatBox.scrollHeight; 
}

function sendMessage() {
    const userInput = document.getElementById('input').value.trim();
    if (userInput === "") return;


    appendMessage('user', userInput);
    displayDateTime();

    const botResponse = getBotResponse(userInput);

    setTimeout(() => appendMessage('bot', botResponse), 500);
    document.getElementById('input').value = '';
}

function displayDateTime() {
    const now = new Date();
    const options = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit' };
    const dateTimeString = now.toLocaleString('en-US', options);
    document.getElementById('date-time').innerText = dateTimeString;
}

function getBotResponse(userInput) {
    userInput = userInput.toLowerCase();

    if (userInput.includes('suv')) {
        return botResponses['suv'];
    } else if (userInput.includes('sedan')) {
        return botResponses['sedan'];
    } else if (userInput.includes('electric')) {
        return botResponses['electric'];
    } else {
        return botResponses['default'];
    }
}



// User Icon
document.addEventListener("DOMContentLoaded", function () {
    const nav = document.querySelector("nav"),
        toggleBtn = nav.querySelector(".toggle-btn");
    toggleBtn.addEventListener("click", () => {
        nav.classList.toggle("open");
    });

});