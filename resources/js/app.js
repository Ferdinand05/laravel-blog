import "./bootstrap";
import "flowbite";

// darkmode
const btn = document.querySelector(".dark-mode");

btn.addEventListener("click", () => {
    if (localStorage.getItem("dark-mode") === "false") {
        document.documentElement.classList.add("dark");
        localStorage.setItem("dark-mode", "true");
    } else {
        document.documentElement.classList.remove("dark");
        localStorage.setItem("dark-mode", "false");
    }
});

if (localStorage.getItem("dark-mode") === "true") {
    document.documentElement.classList.add("dark");
} else {
    document.documentElement.classList.remove("dark");
}
