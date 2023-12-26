var downArrow = document.getElementById("downArrow");

downArrow.addEventListener("click", function () {
    var topbar = document.querySelector(".topbar-container");
    var extendediconsLeft = topbar.querySelector("#left-icons #expanded-icons");
    var extendediconsRight = topbar.querySelector("#right-icons #expanded-icons");
    var statusText = topbar.querySelector("#middle-text #status-text");
    var pageText = topbar.querySelector("#middle-text #page-text");
    var currentPage = window.location.pathname;

    var pageStatusMap = {
        "/home": "Feed",
        "/": "Welcome page",
        "/search": "Search",
        "/user": "User page",
        "/login": "Login form",
        "/register": "Register form"
    }

    if (pageStatusMap[currentPage]) {
        pageText.textContent = pageStatusMap[currentPage];
    }
    else {
        pageText.textContent = "Unknown";
    }
    
    topbar.classList.toggle("expanded");
    downArrow.classList.toggle("fa-chevron-down");
    downArrow.classList.toggle("fa-chevron-up");

    extendediconsLeft.classList.toggle("hidden");
    extendediconsLeft.classList.toggle("flex");

    extendediconsRight.classList.toggle("hidden");

    statusText.classList.toggle("hidden");
    statusText.classList.toggle("flex");
});