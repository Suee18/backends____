const totalSlides = document.querySelectorAll(".swiper-slide").length;
const progressBar = document.querySelector(".progress-bar");

const swiper = new Swiper(".swiper", {
    // effect: "fade",
    // fadeEffect: { crossFade: true },

    effect: 'slide',
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    allowTouchMove: false, // Disable swiping, use buttons only
    on: {
        slideChange: updateProgressBar,
    },
});

function updateProgressBar() {
    const currentSlideIndex = swiper.realIndex + 1; // 1-based index
    const progress = (currentSlideIndex / totalSlides) * 100;
    progressBar.style.width = `${progress}%`;
}

// Option selection logic
document.querySelectorAll(".option").forEach((option) => {
    option.addEventListener("click", function () {
        // Deselect other options in the same container
        this.parentElement
            .querySelectorAll(".option")
            .forEach((opt) => opt.classList.remove("selected"));
        // Select the clicked option
        this.classList.add("selected");
    });
});

// Initialize the progress bar on load
updateProgressBar();
