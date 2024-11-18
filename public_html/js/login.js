
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
  const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
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
//=========================================================================================================================

// ========================= SIGNUP FORM LOGIC =========================
const signupForm = document.getElementById("signupForm");
const signupUsernameInput = document.querySelector("#signupForm #signupUserName");
const signupPasswordInput = document.querySelector("#signupForm #signupPassword");
const confirmPasswordInput = document.querySelector("#signupForm #confirmPassword");
const birthdateInput = document.querySelector("#signupForm #birthdate");



// Toggle password visibility
const togglePassword2 = document.getElementById("togglePasswordSU");
const passwordInput2 = document.getElementById("signupPassword");
togglePassword2.addEventListener("click", () => {
  const type2 = passwordInput2.getAttribute("type") === "password" ? "text" : "password";
  passwordInput2.setAttribute("type", type2);
});
// Toggle password visibility
const togglePassword3 = document.getElementById("toggleConfirmPassword");
const passwordInput3 = document.getElementById("confirmPassword");
togglePassword3.addEventListener("click", () => {
  const type3 = passwordInput2.getAttribute("type") === "password" ? "text" : "password";
  passwordInput3.setAttribute("type", type3);
});



// Mock list of existing usernames for signup validation
const existingUsernames = ["john_doe", "jane_smith", "user123", "sample_user"];

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

// Username validation
signupUsernameInput.addEventListener("input", () => {
  const usernameValue = signupUsernameInput.value.trim();

  if (existingUsernames.includes(usernameValue)) {
    signupUsernameError.textContent = "This username already exists. choose another one.";
    signupUsernameError.style.display = "block";
    signupUsernameInput.value = "";
  } else {
    signupUsernameError.textContent = "";
    signupUsernameError.style.display = "none";
  }
});

// Password validation
signupPasswordInput.addEventListener("input", () => {
  const passwordValue = signupPasswordInput.value;
  const errors = [];

  if (!/[A-Z]/.test(passwordValue)) errors.push("Must contain an uppercase letter.");
  if (!/\d/.test(passwordValue)) errors.push("Must contain anumber.");
  if (!/[@$!%*?&"]/.test(passwordValue)) errors.push("Must contain a special character (@$!%*?&)");
  if (passwordValue.length < 6) errors.push("Must be at least 6 characters long.");

  passwordErrors.innerHTML = "";
  if (errors.length > 0) {
    passwordErrors.style.display = "block";
    errors.forEach((error) => {
      const li = document.createElement("li");
      li.textContent = error;
      passwordErrors.appendChild(li);
    });
  } else {
    passwordErrors.style.display = "none";
  }
});

// Confirm password validation
confirmPasswordInput.addEventListener("input", () => {
  if (signupPasswordInput.value !== confirmPasswordInput.value) {
    confirmPasswordError.textContent = "Passwords do not match.";
    confirmPasswordError.style.display = "block";
  } else {
    confirmPasswordError.textContent = "";
    confirmPasswordError.style.display = "none";
  }
});

// Birthdate validation
const maxDate = new Date(2013, 11, 31);
const formatDate = (date) => `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, "0")}-${String(date.getDate()).padStart(2, "0")}`;

birthdateInput.setAttribute("max", formatDate(maxDate));
birthdateInput.addEventListener("input", () => {
  const birthdateValue = new Date(birthdateInput.value);

  if (birthdateValue > maxDate) {
    birthdateError.textContent = "Must be older than 10 years.";
    birthdateError.style.display = "block";
  } else {
    birthdateError.textContent = "";
    birthdateError.style.display = "none";
  }
});

// Prevent form submission if there are validation errors
signupForm.addEventListener("submit", (e) => {
  const hasErrors =
    signupUsernameError.style.display === "block" ||
    passwordErrors.style.display === "block" ||
    confirmPasswordError.style.display === "block" ||
    birthdateError.style.display === "block";

  if (hasErrors) {
    e.preventDefault();
    alert("Please correct the highlighted errors before submitting the form.");
  }
});




































});