document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("input[type=checkbox]").oninput = () => {
        if(document.querySelector("input[type=checkbox]").checked) {
            document.querySelector("input[type=checkbox]").value = "Yes";
            document.querySelector("textarea#activityDescription").classList.remove("hidden");
        } else {
            document.querySelector("input[type=checkbox]").value = "No";
            document.querySelector("textarea#activityDescription").classList.add("hidden");
        }
    }

    document.querySelector("textarea#activityDescription").oninput = () => {
        if (document.querySelector("textarea#activityDescription").value.length > 0) {
            document.querySelector("textarea#activityDescription").setAttribute("value", document.querySelector("textarea#activityDescription").value);
            if(!document.querySelector("#submitInput")) {
                const submitInput = document.createElement("input");
                submitInput.setAttribute("id", "submitInput");
                submitInput.setAttribute("type", "submit");
                submitInput.value = "Submit";
                submitInput.classList.add("px-4", "py-2", "rounded-lg", "bg-blue-600", "text-white", "font-semibold", "hover:bg-blue-800", "hover:cursor-pointer", "active:bg-blue-900", "shadow-xl");
                document.querySelector("#activitySubmit").appendChild(submitInput);
            }
        } else {
            if(document.querySelector("#submitInput")) {
                document.querySelector("textarea#activityDescription").removeAttribute("value");
                document.querySelector("#submitInput").remove();
            }
        }
    };    
})