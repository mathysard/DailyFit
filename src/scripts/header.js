document.addEventListener("DOMContentLoaded", () => {
    switch(window.location.pathname) {
        case "/src/app/index.php":
            document.querySelector("#homepage").classList.add("text-blue-500");
            break;
        case "/src/app/activity/index.php":
            document.querySelector("#activityNavbar").classList.add("text-blue-500");
            break;
    }

    document.querySelector("#userMenu").onclick = () => {
        if(document.querySelector("#logoutButton").classList.contains("hidden")) {
            document.querySelector("#logoutButton").classList.remove("hidden");
        } else {
            document.querySelector("#logoutButton").classList.add("hidden")
        }
    }
})
