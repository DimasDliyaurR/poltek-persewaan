$(document).ready(function () {
    var tl_tanggal_pelaksanaan = $("input#tl_tanggal_pelaksanaan")
    var tl_tanggal_pelaksanaan_error = $("#tl_tanggal_pelaksanaan_error")
    var tl_tujuan = $("input#tl_tujuan")
    var tl_tujuan_error = $("#tl_tujuan_error")
    var tl_durasi_sewa = $("input#tl_durasi_sewa")
    var tl_durasi_sewa_error = $("#tl_tujuan_error")
    var promo = $("#promo")
    var promo_error = $("#promo_error")

    let isPelaksanaanValidated = true
    let isDurasiValidated = true
    let isPromoValidated = true
    let isTujuanValidated = true
    let timeout = null
    let currentLocation = $(location).attr('href')
    let slug = currentLocation.split('/')[currentLocation.split('/').length - 1]

    let dropdown = $("#dropdown")
    let submit = $("#submit-dropdown")
    let form = $("#form_asrama")
    let pesan = $("#pesan")

    function ValidationPromo() {
        clearTimeout(timeout)
        timeout = setTimeout(() => {

            var val = promo.val()

            if (val == "") {
                promo_error.text("")
            }

            fetch(`http://localhost:8000/api/voucher/${val}/layanans`)
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

    function toggleForm() {
        event.preventDefault();
        let input = $(`<input type="text" name="slug[]" class=""hidden value="${slug}" />`)
        if (dropdown.hasClass("hidden")) {
            form.append(input);
            dropdown.removeClass("hidden")
        } else {
            let slugObj = $("input[name=slug]")
            slugObj.remove()
            dropdown.addClass("hidden")
        }
    }

    function validationTujuan() {
        if (tl_tujuan.val() == "") {
            tl_tujuan_error.removeClass("hidden")
            tl_tujuan_error.text("Tanggal kembali mohon diisi!")
            isTujuanValidated = false
        } else {
            tl_tujuan_error.addClass("hidden")
            tl_tujuan_error.text("")
            isTujuanValidated = true
        }

        return isTujuanValidated
    }

    function validationPelaksanaan() {
        if (tl_tanggal_pelaksanaan.val() == "") {
            tl_tanggal_pelaksanaan_error.removeClass("hidden")
            tl_tanggal_pelaksanaan_error.text("Tanggal kembali mohon diisi!")
            isPelaksanaanValidated = false
        } else {
            tl_tanggal_pelaksanaan_error.addClass("hidden")
            tl_tanggal_pelaksanaan_error.text("")
            isPelaksanaanValidated = true
        }

        return isPelaksanaanValidated
    }

    function validationDurasi() {
        if (tl_durasi_sewa.val() == "") {
            tl_durasi_sewa_error.removeClass("hidden")
            tl_durasi_sewa_error.text("Tanggal kembali mohon diisi!")
            isDurasiValidated = false
        } else {
            tl_durasi_sewa_error.addClass("hidden")
            tl_durasi_sewa_error.text("")
            isDurasiValidated = true
        }

        return isDurasiValidated
    }

    function validate() {
        event.preventDefault()
        if (validationPelaksanaan() && validationDurasi() && validationTujuan()) {
            let kondisi = true
            $.ajax({
                type: "POST",
                url: "http://localhost:8000/api/layanan/pelaksanaan",
                data: {
                    pelaksanaan: tl_tanggal_pelaksanaan.val(),
                    durasi: tl_durasi_sewa.val(),
                    slug: slug
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

    tl_tanggal_pelaksanaan.on("input", validationPelaksanaan)
    tl_tujuan.on("input", validationTujuan)
    tl_durasi_sewa.on("input", validationDurasi)
    promo.on("input", ValidationPromo)
    pesan.on("click", toggleForm)
    submit.click(validate)

    setInterval(() => {
        if (isPelaksanaanValidated && isDurasiValidated && isTujuanValidated && isPromoValidated) {
            submit.attr("disabled", false)
        } else {
            submit.attr("disabled", true)
        }
    }, 100);


});