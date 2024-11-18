document.addEventListener("DOMContentLoaded", () => {
    // Place all your JavaScript code here

    // Flip the card between login and signup forms
    const card = document.querySelector(".card");
    const flipToSignup = document.getElementById("flipToSignup");
    const flipToLogin = document.getElementById("flipToLogin");

    flipToSignup.addEventListener("click", (e) => {
        e.preventDefault(); // Prevent default link behavior
        card.classList.add("flip");
    });

    flipToLogin.addEventListener("click", (e) => {
        e.preventDefault(); // Prevent default link behavior
        card.classList.remove("flip");
    });

    // Toggle password visibility
    const togglePassword = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("password");
    togglePassword.addEventListener("click", () => {
        const type =
            passwordInput.getAttribute("type") === "password"
                ? "text"
                : "password";
        passwordInput.setAttribute("type", type);
    });

    //================================================== Login form submission
    const loginForm = document.getElementById("loginForm");
    const loginUsernameInput = document.querySelector("#loginForm #userName");
    const loginPasswordInput = document.querySelector("#loginForm #password");

    // Create error elements for login feedback
    const loginUsernameError = document.createElement("small");
    loginUsernameError.style.color = "red";
    loginUsernameError.style.display = "none";
    loginUsernameInput.parentNode.insertBefore(
        loginUsernameError,
        loginUsernameInput.nextSibling
    );

    const loginPasswordError = document.createElement("small");
    loginPasswordError.style.color = "red";
    loginPasswordError.style.display = "none";
    loginPasswordInput.parentNode.insertBefore(
        loginPasswordError,
        loginPasswordInput.nextSibling
    );

    // Handle login form submission
    loginForm.addEventListener("submit", async (e) => {
        e.preventDefault(); // Prevent default form submission

        // Gather form data
        const username = loginUsernameInput.value.trim();
        const password = loginPasswordInput.value;

        // Send login data to PHP backend
        const response = await fetch("login.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ username, password }),
        });

        const result = await response.json();

        if (result.success) {
            // Login successful
            alert("Login successful! Redirecting...");
            window.location.href = result.redirect_url; // Redirect based on user type
        } else {
            // Handle errors
            if (result.error === "User does not exist.") {
                loginUsernameError.textContent = result.error;
                loginUsernameError.style.display = "block";
                loginPasswordError.style.display = "none";
                loginUsernameInput.value = "";
                loginPasswordInput.value = "";
            } else if (result.error === "Incorrect password.") {
                loginUsernameError.style.display = "none";
                loginPasswordError.textContent = result.error;
                loginPasswordError.style.display = "block";
                loginPasswordInput.value = "";
            } else {
                console.error("Unexpected error:", result.error);
            }
        }
    });
    //=========================================================================================================================

    const signupForm = document.getElementById("signupForm");
    signupForm.addEventListener("submit", async (e) => {
        e.preventDefault();
    });
});
