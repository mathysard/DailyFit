document.addEventListener("DOMContentLoaded", () => {
    switch(window.location.pathname) {
        case "/src/app/index.php":
            document.querySelector("#homepage").classList.add("text-blue-500")
            break;
    }
})
