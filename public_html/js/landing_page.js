let currentSlide = 1;
const slide1Duration = 97000; 
const otherSlidesDuration = 8000; // 5 seconds for the other slides
let slideTimer; // Variable to store the setInterval for autoSlide

document.addEventListener("DOMContentLoaded", function() {
    showSlide(currentSlide); // Show the first slide when the page loads
    startAutoSlide(); // Start automatic slide switching with the appropriate duration
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
    if (dots.length > 0) {
        dots[currentSlide - 1].classList.add("active");
    }
}

// Function to switch to the next slide
function nextSlide() {
    currentSlide++;
    showSlide(currentSlide);
    stopAutoSlide(); // Stop the current auto-slide timer
    startAutoSlide(); // Start a new timer with appropriate duration
}

// Function to start auto slide with custom duration based on the current slide
function startAutoSlide() {
    const currentDuration = (currentSlide === 1) ? slide1Duration : otherSlidesDuration; // Use 25s for slide 1, 5s for others
    slideTimer = setInterval(function() {
        nextSlide();
    }, currentDuration);
}

// Function to stop auto slide
function stopAutoSlide() {
    clearInterval(slideTimer); // Clear the existing interval
}

// Optional: Manual navigation via dots
function showSlideOnClick(n) {
    currentSlide = n;
    showSlide(currentSlide);
    stopAutoSlide(); // Stop the current auto-slide timer
    startAutoSlide(); // Restart the auto-slide timer after manual navigation
}

// *******REVEIWS' JS*******

const swiper = new Swiper('.swiper-container', {
  effect: 'coverflow',
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: 'auto',
  coverflowEffect: {
    rotate: 0,  
    stretch: 10,  
    depth: 200,  
    modifier: 1,
    slideShadows: true,  
  },
  autoplay: {
    delay: 2000,  
    disableOnInteraction: false,
  },
  loop: true,
});
