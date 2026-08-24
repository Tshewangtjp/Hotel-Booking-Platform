const html = document.getElementById("htmlPage");
const checkbox = document.getElementById("checkbox");

// Check if the theme preference is stored in local storage
const savedTheme = localStorage.getItem("theme");
if (savedTheme === "dark") {
    html.setAttribute("data-bs-theme", "dark");
    checkbox.checked = true;
} else {
    html.setAttribute("data-bs-theme", "light");
    checkbox.checked = false;
}

checkbox.addEventListener("change", () => {
    if (checkbox.checked) {
        html.setAttribute("data-bs-theme", "dark");
        localStorage.setItem("theme", "dark");
    } else {
        html.setAttribute("data-bs-theme", "light");
        localStorage.setItem("theme", "light");
    }
});