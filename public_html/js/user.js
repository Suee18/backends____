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
