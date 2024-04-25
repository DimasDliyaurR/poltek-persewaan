import "./bootstrap";
import "preline";

import "flowbite";
// navbar fixed
window.onscroll = function () {
    const header = document.querySelector("header");
    const fixedNav = header.offsetTop;

    if (window.pageYOffset > fixedNav) {
        header.classList.add("navbar-fixed");
    } else {
        header.classList.remove("navbar-fixed");
    }
};
// hamburger button
const hamburger = document.querySelector("#hamburger");
const navMenu = document.querySelector("#nav-menu");

hamburger.addEventListener("click", function () {
    hamburger.classList.toggle("hamburger-active");
    navMenu.classList.toggle("hidden");
    navMenu.classList.toggle("bg-white");
});
// back to top
const btnBTT = document.querySelector(".btnbtt");
let windowPosition = false;
window.addEventListener("scroll", function () {
    windowPosition = window.scrollY > 300;
    btnBTT.classList.toggle("btn-active", windowPosition);
});

// dropdown kategori
function toggleDropdown() {
    let dropdown = document.querySelector("#dropdownKategori #dropdown");
    dropdown.classList.toggle("hidden");
}
// loadmore promo

document.addEventListener("DOMContentLoaded", function () {
    const buttonLoadMore = document.getElementById("loadmore_promo");
    const buttonHideMore = document.getElementById("hidemore_promo");
    const promoItems = document.querySelectorAll(".promo-item");

    // Semua item kecuali 3 pertama akan disembunyikan
    buttonLoadMore.addEventListener("click", function () {
        promoItems.forEach((promo) => {
            promo.classList.remove("hidden");
        });
        buttonLoadMore.classList.add("hidden");
        buttonHideMore.classList.remove("hidden");
    });

    buttonHideMore.addEventListener("click", function () {
        for (let i = 3; i < promoItems.length; i++) {
            promoItems[i].classList.add("hidden");
        }
        buttonLoadMore.classList.remove("hidden");
        buttonHideMore.classList.add("hidden");
    });
});

// end loadmore

function myFunction(imgs) {
    var expandImg = document.getElementById("expandedImg");
    var imgText = document.getElementById("imgtext");
    expandImg.src = imgs.src;
    imgText.innerHTML = imgs.alt;
    expandImg.parentElement.style.display = "block";
}
