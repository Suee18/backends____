document.addEventListener("DOMContentLoaded", function () {
    const pageContainer = document.querySelector(".fav_cars");

    if (pageContainer) {
        document.querySelectorAll(".con-like .like").forEach(likeButton => {
            likeButton.addEventListener("click", function () {
                const carCard = this.closest(".car-card");

                if (carCard) {
                    carCard.style.transition = "opacity 0.3s ease, transform 0.3s ease";
                    carCard.style.opacity = "0";
                    carCard.style.transform = "translateY(-10px)";
                    setTimeout(() => {
                        carCard.remove();
                    }, 300);
                }
            });
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const notificationContainer = document.getElementById("notification-container");
    function showNotification(message) {
        const notification = document.createElement("div");
        notification.classList.add("notification");
        notification.textContent = message;
        notificationContainer.appendChild(notification);
        setTimeout(() => {
            notification.remove();
        }, 2000);
    }
    document.querySelectorAll(".landingPage_part2 .con-like .like").forEach(likeButton => {
        likeButton.addEventListener("change", function () {
            if (this.checked) {
                showNotification("Added to favorites");
            }
        });
    });
});
