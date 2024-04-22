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
// back to top LP
const btnBTT = document.querySelector(".btnbtt .btndt");
let windowPosition = false;
window.addEventListener("scroll", function () {
    windowPosition = window.scrollY > 300;
    btnBTT.classList.toggle("btn-active", windowPosition);
});

// back to top detail

// dropdown kategori
function toggleDropdown() {
    let dropdown = document.querySelector("#dropdownKategori #dropdown");
    dropdown.classList.toggle("hidden");
}
// loadmore promo

// document.addEventListener("DOMContentLoaded", function () {
//     const buttonLoadMore = document.getElementById("loadmore_promo");
//     const buttonHideMore = document.getElementById("hidemore_promo");
//     const promoItems = document.querySelectorAll(".promo-item");

//     // Semua item kecuali 3 pertama akan disembunyikan
//     buttonLoadMore.addEventListener("click", function () {
//         promoItems.forEach((promo) => {
//             promo.classList.remove("hidden");
//         });
//         buttonLoadMore.classList.add("hidden");
//         buttonHideMore.classList.remove("hidden");
//     });

//     buttonHideMore.addEventListener("click", function () {
//         for (let i = 3; i < promoItems.length; i++) {
//             promoItems[i].classList.add("hidden");
//         }
//         buttonLoadMore.classList.remove("hidden");
//         buttonHideMore.classList.add("hidden");
//     });
// });
// new
const loadmore = document.querySelector("#loadmore_promo");
const hideMore = document.querySelector("#hidemore_promo");
const promoItems = [...document.querySelectorAll(".promo")];
let showAll = false;

// Fungsi untuk menampilkan atau menyembunyikan item-item promo
function togglePromoVisibility() {
    for (let i = 0; i < promoItems.length; i++) {
        if (showAll || i < 3) {
            promoItems[i].style.display = "flex"; // Tampilkan
        } else {
            promoItems[i].style.display = "none"; // Sembunyikan
        }
    }
}

// Tampilkan hanya 3 item promo saat halaman dimuat
togglePromoVisibility();

// Event listener untuk tombol "Lihat Lebih Banyak"
loadmore.addEventListener("click", () => {
    showAll = true; // Set showAll menjadi true agar semua item promo ditampilkan
    togglePromoVisibility();
    loadmore.style.display = "none"; // Sembunyikan tombol "Lihat Lebih Banyak"
    hideMore.style.display = "block"; // Tampilkan tombol "Sembunyikan"
});

// Event listener untuk tombol "Sembunyikan"
hideMore.addEventListener("click", () => {
    showAll = false; // Set showAll menjadi false agar hanya 3 item promo yang ditampilkan
    togglePromoVisibility();
    loadmore.style.display = "block"; // Tampilkan tombol "Lihat Lebih Banyak"
    hideMore.style.display = "none"; // Sembunyikan tombol "Sembunyikan"
});
// end loadmore

function myFunction(imgs) {
    var expandImg = document.getElementById("expandedImg");
    var imgText = document.getElementById("imgtext");
    expandImg.src = imgs.src;
    imgText.innerHTML = imgs.alt;
    expandImg.parentElement.style.display = "block";
}
