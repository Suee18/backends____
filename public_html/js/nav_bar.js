document.addEventListener("DOMContentLoaded", function () {
    const searchIcon = document.getElementById("search-icon");
    const searchInputContainer = document.querySelector(".search-input-container");
    const compareLink = document.querySelector(".compare-link");
    const logoLink = document.querySelector(".logo-link");
    const loginLink = document.getElementById("listElement_login_navBar");

    // Toggle the search input visibility when the search icon is clicked
    searchIcon.addEventListener("click", function () {
        if (searchInputContainer.style.display === "none" || searchInputContainer.style.display === "") {
            // clicked: show search bar hide the rest 
            searchInputContainer.style.display = "block";

            compareLink.style.display = "none";

            loginLink.style.display = "none";    
            loginLink.style.fontSize = "1.8rem";

            logoLink.style.marginLeft = "55rem";
            logoLink.style.padding = "0.5rem";
            logoLink.style.textAlign = "center";
            
            //unclicked :show the original nav bar 
        } else {
            searchInputContainer.style.display = "none";

            compareLink.style.display = "";

            loginLink.style.display = "";
            loginLink.style.marginLeft = "35rem";
            loginLink.style.fontSize = "";

            logoLink.style.textAlign = "";
            logoLink.style.marginLeft = "20rem";
            logoLink.style.padding = "";



        }
    });
});
