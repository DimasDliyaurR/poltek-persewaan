const carousel = document.querySelector(".carousel");
const dragging = log(e) => {
console.log(e.pageX);
}
carousel.addEventListener("mousemove", dragging);