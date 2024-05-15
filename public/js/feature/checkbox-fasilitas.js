$(document).ready(function () {

    var datePicker = $("input#fasilitas")

    datePicker.click(function () {
        var checkbox = $(this)
        var wadah = document.getElementById("input-fasilitas")
        var input = document.createElement("input")
        var valueSlug = checkbox.val().replace(" ", "-")
        var oldCheckbox = $("#fasilitas-input-" + valueSlug)[0]
        var isSame = true

        console.log(!checkbox[0].checked)
        console.log(oldCheckbox)

        // Cek
        if (!checkbox[0].checked) {
            oldCheckbox.remove()
        } else {

            input.name = "fasilitas[]"
            input.id = "fasilitas-input-" + valueSlug
            input.type = "text"
            input.value = checkbox.val()

            if (wadah.children.length == 0) {
                wadah.appendChild(input)
            }

            // Cek list
            for (let i = 0; i < wadah.children.length; i++) {
                if (wadah.children[i].value == checkbox.val()) {
                    isSame = false
                    break
                }
            }

            if (isSame) {
                wadah.appendChild(input)
            }
        }
    });


});