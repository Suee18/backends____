
// document.getElementById('loginForm').addEventListener('submit', function (event) {
//     let valid = true;

//     // Get form fields and error message elements
//     const emailField = document.getElementById('email');
//     const passwordField = document.getElementById('password');
//     const emailError = document.getElementById('email-error');
//     const passwordError = document.getElementById('password-error');

//     // Clear previous error messages
//     emailError.textContent = '';
//     passwordError.textContent = '';






























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
  const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
  passwordInput.setAttribute("type", type);
});

// Login form submission
const loginForm = document.getElementById("loginForm");
const loginUsernameInput = document.querySelector("#loginForm #userName");
const loginPasswordInput = document.querySelector("#loginForm #password");

// Create error elements for login feedback
const loginUsernameError = document.createElement("small");
loginUsernameError.style.color = "red";
loginUsernameError.style.display = "none";
loginUsernameInput.parentNode.insertBefore(loginUsernameError, loginUsernameInput.nextSibling);

const loginPasswordError = document.createElement("small");
loginPasswordError.style.color = "red";
loginPasswordError.style.display = "none";
loginPasswordInput.parentNode.insertBefore(loginPasswordError, loginPasswordInput.nextSibling);

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


const signupForm = document.getElementById("signupForm");
const signupUsernameInput = document.getElementById("signupUserName");
const signupPasswordInput = document.getElementById("signupPassword");
const confirmPasswordInput = document.getElementById("confirmPassword");
const birthdateInput = document.getElementById("birthdate");

// Create signup error elements
const signupUsernameError = document.createElement("small");
signupUsernameError.style.color = "red";
signupUsernameError.style.display = "none";
signupUsernameInput.parentNode.insertBefore(signupUsernameError, signupUsernameInput.nextSibling);

const passwordErrors = document.createElement("ul");
passwordErrors.style.color = "red";
passwordErrors.style.listStyle = "none";
passwordErrors.style.padding = "0";
passwordErrors.style.display = "none";
signupPasswordInput.parentNode.insertBefore(passwordErrors, signupPasswordInput.nextSibling);

const confirmPasswordError = document.createElement("small");
confirmPasswordError.style.color = "red";
confirmPasswordError.style.display = "none";
confirmPasswordInput.parentNode.insertBefore(confirmPasswordError, confirmPasswordInput.nextSibling);

const birthdateError = document.createElement("small");
birthdateError.style.color = "red";
birthdateError.style.display = "none";
birthdateInput.parentNode.insertBefore(birthdateError, birthdateInput.nextSibling);

// Handle sign-up form submission
signupForm.addEventListener("submit", async (e) => {
  e.preventDefault(); // Prevent default form submission

  // Gather form data
  const username = signupUsernameInput.value.trim();
  const password = signupPasswordInput.value;
  const confirmPassword = confirmPasswordInput.value;
  const birthdate = birthdateInput.value;
  const gender = document.getElementById("gender").value;

  // Validate passwords match
  if (password !== confirmPassword) {
    confirmPasswordError.textContent = "Passwords do not match.";
    confirmPasswordError.style.display = "block";
    return;
  } else {
    confirmPasswordError.style.display = "none";
  }

  // Validate other client-side rules here if needed

  // Send data to the backend
  const response = await fetch("signup.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ username, password, birthdate, gender }),
  });

  const result = await response.json();

  if (result.success) {
    alert("Sign-up successful! Redirecting...");
    window.location.href = "login.php"; // Redirect to login page
  } else {
    // Display backend validation errors
    if (result.errors.name) {
      signupUsernameError.textContent = result.errors.name;
      signupUsernameError.style.display = "block";
    } else {
      signupUsernameError.style.display = "none";
    }

    if (result.errors.email) {
      alert(result.errors.email); // Email error from backend
    }
  }
});
