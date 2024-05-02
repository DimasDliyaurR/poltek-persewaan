// Tampilkan gambar pertama secara default
var defaultImg = document.querySelector('.rounded-sm.cursor-pointer');
var expandImg = document.getElementById("expandedImg");
// var imgText = document.getElementById("imgtext");
expandImg.src = defaultImg.src;
// imgText.innerHTML = defaultImg.alt;
expandImg.parentElement.style.display = "block";

// Fungsi untuk mengganti gambar besar saat gambar kecil diklik
function myFunction(imgs) {
    expandImg.src = imgs.src;
    imgText.innerHTML = imgs.alt;
}

function closeImage() {
    expandImg.parentElement.style.display = "none";
}