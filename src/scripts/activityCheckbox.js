document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("input[type=checkbox]").oninput = () => {
        if(document.querySelector("input[type=checkbox]").checked) {
            document.querySelector("textarea").classList.remove("hidden");
        } else {
            document.querySelector("textarea").classList.add("hidden");
        }
    }
})