const header = document.querySelector('#judul-nav')

if (window.scrollY > 10) {
    header.classList.add('text-black');
    header.classList.remove('text-white');
} else {
    header.classList.remove('text-black');
    header.classList.add('text-white');
}

window.addEventListener('scroll', function () {
    if (window.scrollY > 10) {
        header.classList.add('text-black');
        header.classList.remove('text-white');
    } else {
        header.classList.remove('text-black');
        header.classList.add('text-white');
    }
});