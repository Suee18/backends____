let currentSlide = 1;

document.addEventListener("DOMContentLoaded", function() {
    showSlide(currentSlide); // Show the first slide when the page loads
});

// Function to show the current slide
function showSlide(n) {
    let slides = document.querySelectorAll(".slide");
    let dots = document.querySelectorAll(".dot");

    // Hide all slidesh
    slides.forEach(slide => {
        slide.style.display = "none";
    });

    // Remove "active" class from all dots
    dots.forEach(dot => {
        dot.classList.remove("active");
    });

    // Show the selected slide and activate the corresponding dot
    slides[n - 1].style.display = "block";
    dots[n - 1].classList.add("active");
}
