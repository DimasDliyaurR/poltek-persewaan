function toggleTable(elm) {
    let parent = elm
    let dropdown = elm.children[0].children
    let sibling = elm.nextSibling
    if (sibling.nextSibling.classList.contains("hidden")) {
        sibling.nextSibling.classList.remove("hidden")
        dropdown[1].classList.add("hidden")
        dropdown[2].classList.remove("hidden")
    } else {
        sibling.nextSibling.classList.add("hidden")
        dropdown[2].classList.add("hidden")
        dropdown[1].classList.remove("hidden")
    }
}