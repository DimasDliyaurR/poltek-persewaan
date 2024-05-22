$(document).ready(function () {
    let tab_tanggal_pesanan = $("input#tab_tanggal_pesanan")
    let tab_tanggal_pesanan_error = $("#tab_tanggal_pesanan_error")
    let tab_tanggal_kembali = $("input#tab_tanggal_kembali")
    let tab_tanggal_kembali_error = $("#tab_tanggal_kembali_error")
    let promo = $("input#promo")
    let promo_error = $("#promo_error")
    let keterangan = $("input#tab_keterangan")
    let keterangan_error = $("#tab_keterangan_error")
    let timeout = null
    let currentLocation = $(location).attr('href')
    let slug = currentLocation.split('/')[currentLocation.split('/').length - 1]

    let isPesananValidated = true
    let isKembaliValidated = true
    let isPromoValidated = true
    let isKeteranganValidated = true

    let dropdown = $("#dropdown")
    let submit = $("#submit-dropdown")
    let form = $("#form_asrama")
    let pesan = $("#pesan")


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

    function validationPesanan() {
        if (tab_tanggal_pesanan.val() == "") {
            tab_tanggal_pesanan_error.removeClass("hidden")
            tab_tanggal_pesanan_error.text("Tanggal Durasi mohon diisi!")
            isPesananValidated = false
        } else {
            tab_tanggal_pesanan_error.addClass("hidden")
            tab_tanggal_pesanan_error.text("")
            isPesananValidated = true
        }
        return isPesananValidated
    }

    function validationKembali() {
        if (tab_tanggal_kembali.val() == "") {
            tab_tanggal_kembali_error.removeClass("hidden")
            tab_tanggal_kembali_error.text("Tanggal Durasi mohon diisi!")
            isKembaliValidated = false
        } else {
            tab_tanggal_kembali_error.addClass("hidden")
            tab_tanggal_kembali_error.text("")
            isKembaliValidated = true
        }

        return isKembaliValidated
    }

    function validationKeterangan() {
        console.log(keterangan.val());
        if (keterangan.val() == "") {
            keterangan_error.removeClass("hidden")
            keterangan_error.text("Tanggal Durasi mohon diisi!")
            isKeteranganValidated = false
        } else {
            keterangan_error.addClass("hidden")
            keterangan_error.text("")
            isKeteranganValidated = true
        }
        return isKeteranganValidated
    }

    function ValidationPromo() {
        clearTimeout(timeout)
        timeout = setTimeout(() => {

            var val = promo.val()

            if (val == "") {
                promo_error.text("")
            }

            fetch(`http://localhost:8000/api/voucher/${val}/kendaraans`)
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
        if (validationKeterangan() && validationKembali() && validationPesanan()) {
            let kondisi = true
            $.ajax({
                type: "POST",
                url: "http://localhost:8000/api/alat-barang/pelaksanaan",
                data: {
                    tab_tanggal_pesanan: tab_tanggal_pesanan.val(),
                    tab_tanggal_kembali: tab_tanggal_kembali.val(),
                    slug: slug,
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

    pesan.on("click", toggleForm)
    tab_tanggal_pesanan.on("input", validationPesanan)
    tab_tanggal_kembali.on("input", validationKembali)
    keterangan.on("input", validationKeterangan)
    promo.on("input", ValidationPromo)
    submit.click(validate)

    setInterval(() => {
        if (isPesananValidated && isKembaliValidated && isPromoValidated && isKeteranganValidated) {
            submit.attr("disabled", false)
        } else {
            submit.attr("disabled", true)
        }
    }, 100);
});