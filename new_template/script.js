let slideIndex = 0;
showSlides();

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    if (slideIndex >= slides.length) {
        slideIndex = 0;
    }
    if (slideIndex < 0) {
        slideIndex = slides.length - 1;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex].style.display = "block";
}

document.addEventListener("DOMContentLoaded", function () {
    const knowMoreBtn = document.querySelector(".know-more-btn");

    knowMoreBtn.addEventListener("click", function (e) {
        e.preventDefault(); // Prevent the default link behavior
        window.open("about_us.html", "_blank");
    });
});