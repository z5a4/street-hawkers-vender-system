document.addEventListener("DOMContentLoaded", function () {
    // Initialize the selected rating
    let selectedRating = 0;

    // Get all star elements
    const stars = document.querySelectorAll(".star");

    // Add event listeners to each star
    stars.forEach(function (star) {
        star.addEventListener("click", function () {
            const ratingValue = parseInt(star.getAttribute("data-value"));
            selectedRating = ratingValue;

            // Remove 'active' class from all stars
            stars.forEach(function (s) {
                s.classList.remove("active");
            });

            // Add 'active' class to selected stars
            for (let i = 0; i < ratingValue; i++) {
                stars[i].classList.add("active");
            }
        });
    });

    // Handle form submission
    const feedbackForm = document.getElementById("feedbackForm");
    const feedbackResponse = document.getElementById("feedback-response");

    feedbackForm.addEventListener("submit", function (e) {
        e.preventDefault();

        // Get form values
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const phone = document.getElementById("phone").value;
        const message = document.getElementById("message").value;
        const suggestions = document.getElementById("suggestions").value;

        // Simulate form submission (you can send this data to a server)
        const formData = {
            name,
            email,
            phone,
            message,
            suggestions,
            rating: selected
