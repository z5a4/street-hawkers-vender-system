// ratingsslider.js

const sliders = document.querySelectorAll('.slider');
const prevSlideButton = document.querySelector('.prev-slide');
const nextSlideButton = document.querySelector('.next-slide');
let currentSlideIndex = 0;

function showSlide(index) {
    sliders.forEach((slider, i) => {
        slider.style.transform = `translateX(${100 * (i - index)}%)`;
    });
}

function changeSlide(direction) {
    currentSlideIndex += direction;

    if (currentSlideIndex < 0) {
        currentSlideIndex = sliders.length - 1;
    } else if (currentSlideIndex >= sliders.length) {
        currentSlideIndex = 0;
    }

    showSlide(currentSlideIndex);
}

// Show the initial slide
showSlide(currentSlideIndex);

// Event listeners for arrow navigation
prevSlideButton.addEventListener('click', function () {
    changeSlide(-1);
});

nextSlideButton.addEventListener('click', function () {
    changeSlide(1);
});
