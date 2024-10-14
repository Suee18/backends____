let currentSlide = 1;
const slideInterval = 5000; // 5000 milliseconds = 5 seconds

document.addEventListener("DOMContentLoaded", function() {
    showSlide(currentSlide); // Show the first slide when the page loads
    setupVideoEndListener(); // Add listener to switch when video ends
    autoSlide(); // Start automatic slide switching for other slides
});

// Function to show the current slide
function showSlide(n) {
    let slides = document.querySelectorAll(".slide");
    let dots = document.querySelectorAll(".dot");

    if (n > slides.length) {
        currentSlide = 1;
    }
    if (n < 1) {
        currentSlide = slides.length;
    }

    // Hide all slides
    slides.forEach(slide => {
        slide.style.display = "none";
    });

    // Remove "active" class from all dots
    dots.forEach(dot => {
        dot.classList.remove("active");
    });

    // Show the selected slide and activate the corresponding dot
    slides[currentSlide - 1].style.display = "block";
    dots[currentSlide - 1].classList.add("active");
}

// Function to switch to the next slide
function nextSlide() {
    currentSlide++;
    showSlide(currentSlide);
}

// Automatic slide switching every 5 seconds (except for the video)
function autoSlide() {
    setInterval(function() {
        if (currentSlide !== 1) { // Only auto-swipe if not on the first slide
            nextSlide(); // Move to the next slide
        }
    }, slideInterval);
}

// Set up listener to transition to the next slide when the video ends
function setupVideoEndListener() {
    const video = document.querySelector("#slide1 video"); // Select the video in the first slide

    if (video) {
        video.addEventListener("ended", function() {
            nextSlide(); // Move to the next slide when the video ends
        });
    }
}

// Optional: Manual navigation via dots
function showSlideOnClick(n) {
    currentSlide = n;
    showSlide(currentSlide);
}
