var mulaiInput = document.getElementById("p_mulai")
var endInput = document.getElementById("p_kadaluarsa")
var result = document.getElementById("datetime-result")
var submit = document.getElementById("submit")

function setTime() {
    var mulai = new Date(mulaiInput.value).getTime()
    var end = new Date(endInput.value).getTime()
    var t = end - mulai
    let days = Math.floor(t / (1000 * 60 * 60 * 24));

    if (t <= 0) {
        // Add Few class on submit
        submit.classList.add("cursor-not-allowed")
        submit.classList.add("bg-gray-600")

        // Add Disabled on submit
        submit.disabled = true

        // Add Style on result
        result.style.color = "red"
    } else {
        // Add Few class on submit
        submit.classList.remove("cursor-not-allowed")
        submit.classList.remove("bg-gray-600")

        // Add Disabled on submit
        submit.disabled = false

        // Add Style on result
        result.style.color = ""
    }

    if (!isNaN(mulai) && !isNaN(end)) {
        result.innerHTML = t > 0 ? days + " Hari " : "Tanggal mulai melebihi Tanggal akhir mohon diubah"
    }

}