/* NAVIGATION */

// Function to handle active class
document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll(".nav-link");

    links.forEach(link => {
        link.addEventListener("click", function () {
            // Remove active class from all links
            links.forEach(l => l.classList.remove("active"));

            // Add active class to clicked link
            this.classList.add("active");
        });
    });
});