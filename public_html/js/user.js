document.addEventListener("DOMContentLoaded", function () {
  const deleteTab = document.querySelector(".deleteTab");
  const warningPopup = document.getElementById("warningPopup");
  const overlay = document.querySelector(".overlay");
  const cancelBtn = document.getElementById("cancel");

  deleteTab.addEventListener("click", function (event) {
    event.preventDefault();
    warningPopup.classList.remove("hidden");
    overlay.classList.add("show");
  });

  cancelBtn.addEventListener("click", function () {
    warningPopup.classList.add("hidden");
    overlay.classList.remove("show");
  });

  const confirmBtn = document.getElementById("confirm");
  confirmBtn.addEventListener("click", function () {
    alert("Account deleted!");
    warningPopup.classList.add("hidden");
    overlay.classList.remove("show");
  });
});

//****LATEST NEWS JS*****
document.addEventListener("DOMContentLoaded", function () {
  const reviews = document.querySelector(".news-container");
  const reviewCards = reviews.innerHTML;
  reviews.innerHTML += reviewCards;
  let position = 0;
  let isPaused = false;
  function moveMarquee() {
    if (!isPaused) {
      position -= 0.4;
    }

    if (Math.abs(position) >= reviews.scrollHeight / 2) {
      position = 0;
    }

    reviews.style.transform = `translateY(${position}px)`;

    requestAnimationFrame(moveMarquee);
  }

  reviews.addEventListener("mouseover", () => {
    isPaused = true;
  });

  reviews.addEventListener("mouseout", () => {
    isPaused = false;
  });

  moveMarquee();
});

//Edit button js

function editInfo(icon) {
  const infoContent = icon.previousElementSibling;

  if (infoContent.isContentEditable) {
    infoContent.contentEditable = false;
    icon.textContent = "edit";
  } else {
    infoContent.contentEditable = true;
    infoContent.focus();
    icon.textContent = "check";
  }
}
