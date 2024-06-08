$(document).ready(function () {
    let pelaksanaan = $("#tg_tanggal_pelaksanaan")
    let pelaksanaan_error = $("#tg_tanggal_pelaksanaan_error")
    let promo = $("#promo")
    let promo_error = $("#promo_error")
    let satuan = $("#satuan")
    let satuan_error = $("#satuan_error")
    let kembali = $("input#tg_tanggal_kembali")
    let kembali_error = $("#tg_tanggal_kembali_error")
    let tujuan = $("#tg_tujuan")
    let tujuan_error = $("#tg_tujuan_error")
    let tanggal_kembali_field = $("#tanggal_kembali")

    let isPelaksanaanValidated = true
    let isKembaliValidated = true
    let isSatuanValidated = true
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

            fetch(`http://localhost:8000/api/voucher/${val}/gedung_laps`)
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

    function validationPelaksanaan() {
        if (pelaksanaan.val() == "") {
            pelaksanaan_error.removeClass("hidden")
            pelaksanaan_error.text("Tanggal Pelaksanaan mohon diisi!")
            isPelaksanaanValidated = false
        } else {
            pelaksanaan_error.addClass("hidden")
            pelaksanaan_error.text("")
            isPelaksanaanValidated = true
        }
        return isPelaksanaanValidated
    }

    function toggleDurasi() {
        console.log(tanggal_kembali_field);
        tanggal_kembali_field.removeClass("hidden")
        let satuanValue = satuan.val()
        console.log(kembali.type);
        if (satuanValue == "jam") {
            kembali.attr("type", "time")
        } else {
            kembali.attr("type", "date")
        }
    }

    function validationKembali() {
        if (kembali.val() == "") {
            kembali_error.removeClass("hidden")
            kembali_error.text("Tanggal kembali mohon diisi!")
            isKembaliValidated = false
        } else {
            kembali_error.addClass("hidden")
            kembali_error.text("")
            isKembaliValidated = true
        }

        return isKembaliValidated
    }

    function validationSatuan() {
        if (satuan.val() == "") {
            satuan_error.removeClass("hidden")
            satuan_error.text("Tanggal kembali mohon diisi!")
            isSatuanValidated = false
        } else {
            satuan_error.addClass("hidden")
            satuan_error.text("")
            isSatuanValidated = true
        }

        return isSatuanValidated
    }

    function validationTujuan() {
        if (tujuan.val() == "") {
            tujuan_error.removeClass("hidden")
            tujuan_error.text("Tanggal kembali mohon diisi!")
            isTujuanValidated = false
        } else {
            tujuan_error.addClass("hidden")
            tujuan_error.text("")
            isTujuanValidated = true
        }

        return isTujuanValidated
    }

    function validate() {
        event.preventDefault()
        if (validationPelaksanaan() && validationKembali() && validationTujuan()) {
            let kondisi = true
            $.ajax({
                type: "POST",
                url: "http://localhost:8000/api/gedung-lap/pelaksanaan",
                data: {
                    tg_tanggal_pelaksanaan: pelaksanaan.val(),
                    tg_tanggal_kembali: kembali.val(),
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
                        console.log(data);
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

    pelaksanaan.on("input", validationPelaksanaan)
    kembali.on("input", validationKembali)
    promo.on("input", ValidationPromo)
    satuan.on("change", toggleDurasi)
    tujuan.on("click", validationTujuan)
    pesan.on("click", toggleForm)
    submit.click(validate)

    setInterval(() => {
        if (isPelaksanaanValidated && isSatuanValidated && isKembaliValidated && isTujuanValidated && isPromoValidated) {
            submit.attr("disabled", false)
        } else {
            submit.attr("disabled", true)
        }
    }, 100);

});