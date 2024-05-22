function isStyleHidden(elm) {
    return document.querySelector(elm).classList[dropdown.classList.length - 1] == "hidden"
}

function isSlugSame(oldSlug, newSlug) {
    return oldSlug == newSlug
}

function resetUpper() {
    var pilihKamarChildren = document.querySelector("#pilihKamar").children[1].children

    for (let i = 0; i < pilihKamarChildren.length; i++) {
        var childrenClassList = pilihKamarChildren[i].classList
        for (let j = 0; j < childrenClassList.length; j++) {
            if (childrenClassList[j] == "shadow-md") {
                childrenClassList.remove("shadow-md")
                childrenClassList.add("shadow-sm")
                return true
            }
        }
    }
    return false
}

function dropdown_form(elm) {
    var childrenClassList = elm.classList // Akses Class list parent
    var nameRoom = elm.children[0] // Akses nama ruangan
    var nameRoomCore = nameRoom.children[0] // Children name room

    var nameRoomSlug = nameRoomCore.innerHTML.toLowerCase().replace(/\s/g, "-");

    var dropdown = document.getElementById("dropdown") // Akses parent Dropdown
    var form = dropdown.children[1] // input slug
    var oldSlug = form.children[0].value // Akses input slug value

    var input = document.createElement("input")
    input.className = "hidden"
    input.name = "slug[]"
    input.type = "text"
    input.id = "slug-input"
    input.value = nameRoomSlug

    var title = document.querySelector("#dropdown-title")
    title.innerHTML = "FORM " + nameRoomCore.innerHTML

    if (isStyleHidden('#dropdown')) {
        form.insertAdjacentElement("afterbegin", input)
        dropdown.classList.remove("hidden")
    } else if (!isSlugSame(oldSlug, nameRoomSlug) && !isStyleHidden('#dropdown')) {
        form.children[0].remove()
        form.insertAdjacentElement("afterbegin", input)
    } else {
        form.children[0].remove()
        dropdown.classList.add("hidden")
    }

    resetUpper()

    if (!isSlugSame(oldSlug, nameRoomSlug)) {
        childrenClassList.remove("shadow-sm")
        childrenClassList.add("shadow-md")
    } else {
        childrenClassList.remove("shadow-md")
        childrenClassList.add("shadow-sm")
    }
}

$(document).ready(function () {
    var check_in = $("input#ta_check_in")
    var check_in_error = $("#ta_check_in_error")
    var check_out = $("input#ta_check_out")
    var check_out_error = $("#ta_check_out_error")
    var promo = $("input#promo")
    var promo_error = $("#promo_error")
    var slug = $("#slug-input")
    var isPromoValidated = false
    var isCheckInValidated = false
    var isCheckOutValidated = false
    var timeout = null


    let dropdown = $("#dropdown")
    let submit = $("#submit-dropdown")
    let form = $("#form_asrama")

    function validationCheckIn() {
        if (check_in.val() == "") {
            check_in_error.removeClass("hidden")
            check_in_error.text("Check In mohon diisi!")
            isCheckInValidated = false
        } else {
            check_in_error.addClass("hidden")
            check_in_error.text("")
            isCheckInValidated = true
        }

        return isCheckInValidated
    }

    function validationCheckOut() {
        if (check_out.val() == "") {
            check_out_error.removeClass("hidden")
            check_out_error.text("Check Out mohon diisi!")
            isCheckOutValidated = false
        } else {
            check_out_error.addClass("hidden")
            check_out_error.text("")
            isCheckOutValidated = true
        }

        return isCheckOutValidated
    }

    function ValidationPromo() {
        var val = promo.val()

        if (val == "") {
            promo_error.text("")
        }
        clearTimeout(timeout)
        timeout = setTimeout(() => {

            fetch(`http://localhost:8000/api/voucher/${val}/asramas`)
                .then((res) => res.json())
                .then((data) => {
                    if (data.error == true) {
                        promo_error.removeClass("hidden")
                        promo_error.text(data.message)
                        isPromoValidated = false
                    } else {
                        promo_error.addClass("hidden")
                        promo_error.text("")
                        isPromoValidated = true
                    }
                })
        }, 1000)
    }
    function validate() {
        event.preventDefault()
        console.log(submit);
        if (validationCheckIn() && validationCheckOut()) {
            let kondisi = true
            $.ajax({
                type: "POST",
                url: "http://localhost:8000/api/asrama/pelaksanaan",
                data: {
                    check_in: check_in.val(),
                    check_out: check_out.val(),
                    slug: slug.val()
                },
                header: {
                    "Content-Type": "application/json",
                },
                dataType: "json",
                success: function (response) {
                    $(response).each(function (indexInArray, data) {
                        if (data.success) {
                            form.submit()
                        }
                    });
                },
                error: (res) => {
                    $(res).each((index, val) => {
                        var data = val.responseJSON
                        console.log(data);
                        console.log(data.error == true);
                        if (data.error) {
                            let alertFloding = $(`<div id="alert-2" class="flex items-center p-4 mb-4 text-orange-600 rounded-lg bg-orange-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium">
                              ${data.message} <a href="#" class="font-semibold underline hover:no-underline">Jadwal Kendaraan</a>.
                            </div>
                          </div>`)
                            if (dropdown.find("div#alert-2").length < 1) {
                                form.before(alertFloding)
                            } else {
                                form.children().remove("div#alert-2")
                            }
                        }
                    })
                }
            })
        }
    }

    check_out.on("input", validationCheckOut);
    check_in.on("input", validationCheckIn);
    promo.on("input", ValidationPromo);
    submit.click(validate);
})

