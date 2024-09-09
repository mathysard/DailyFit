document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("#loginButton").remove();

    if(new URL(window.location.href).searchParams.get("state")) {
        if(new URL(window.location.href).searchParams.get("state") === "Login") {
            document.querySelector("div#register").classList.add("hidden");
            document.querySelector("div#login").classList.remove("hidden");
        }
    }

    document.querySelector("#registerState").onclick = () => {
        document.querySelector("div#login").classList.add("hidden");
        document.querySelector("div#register").classList.remove("hidden");
    }

    document.querySelector("#loginState").onclick = () => {
        document.querySelector("div#register").classList.add("hidden");
        document.querySelector("div#login").classList.remove("hidden");
    }
});