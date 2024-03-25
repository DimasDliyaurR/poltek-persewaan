document.addEventListener("DOMContentLoaded", function () {
    const radioBtns = document.querySelectorAll('input[name="radio-btn"]');
    const slides = document.querySelector(".slides");

    radioBtns.forEach((btn, index) => {
        btn.addEventListener("click", () => {
            slides.style.transform = `translateX(-${index * 100}%)`;
        });
    });
});
