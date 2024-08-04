const header = document.querySelector('#judul-nav')
const nav = document.querySelector('#nav-menu ul')

if (window.scrollY > 1) {
    header.classList.add('text-black');
    nav.classList.add('text-black');
    header.classList.remove('text-white');
    nav.classList.remove('text-white');
} else {
    header.classList.remove('text-black');
    nav.classList.remove('text-black');
    header.classList.add('text-white');
    nav.classList.add('text-white');
}

window.addEventListener('scroll', function () {
    if (window.scrollY > 1) {
        header.classList.add('text-black');
        nav.classList.add('text-black');
        header.classList.remove('text-white');
        nav.classList.remove('text-white');
    } else {
        header.classList.remove('text-black');
        nav.classList.remove('text-black');
        header.classList.add('text-white');
        nav.classList.add('text-white');
    }
});