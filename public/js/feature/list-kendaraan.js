$(document).ready(function () {

    var slug = $("div#input-slug")
    var card = $("#card")
    var temp = slug.children()[0].value;
    var tempOrder = "";

    console.log(temp);

    // Catch each value of slug
    slug.map((idz, elem) => {
        temp += "," + $(elem).val()
    }).get()

    // Format The Price
    function addCommas(nStr) {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        return x1 + x2;
    }

    async function getTag() {
        return new Promise(() => {
            const time = setTimeout(() => {
                $("p#close").click((e) => {
                    e.preventDefault();
                    console.log($(this).siblings())
                });;
            }, 1000);
        });
    };

    // Handle List Item
    function handle_item(data) {
        $.ajax({
            type: "GET",
            url: "/api/merkKendaraans/" + data,
            dataType: "json",
            success: response => {
                $(response).each(function (indexInArray, merkKendaraan) {

                    let containt = merkKendaraan.mk_merk + " Rp. " + addCommas(merkKendaraan.mk_tarif)
                    let spanContaint = $("<span class='hidden'>" + merkKendaraan.mk_tarif + "</span>")
                    let spanClose = $("<p class='block border cursor-pointer' id='close'>close</p>")
                    let list = $("<li></li>")
                    // Image
                    var img = document.createElement("img")
                    img.width = "120"
                    img.className = "object-cover md:rounded-l-lg rounded-t-lg"
                    img.src = "/storage/" + merkKendaraan.mk_foto
                    // let image_card_image = image_card.append(img)

                    list = list.append(img, containt, spanClose, spanContaint);
                    card.append(list);

                    return Number(merkKendaraan.mk_tarif);
                });
            }
        });
    }

    let total = 0

    // Handle Item From param
    handle_item(temp)
    getTag()


    // Events Trigger
    $("button#add").click(function (e) {
        e.preventDefault();
        var isSame = true
        var button = $(this)
        var buttonVal = button.children().val()
        var input = $("<input type='text' name='slug[]' value='" + buttonVal + "'/>")
        var slug_input = $("#input-slug")

        for (let i = 0; i < slug.children().length; i++) {
            if (slug.children()[i].value == buttonVal) {
                isSame = false
                break
            }
        }
        if (isSame) {
            slug_input.append(input)
            handle_item(buttonVal)
        }

        getTag
    });

    $("#add-item").click((e) => {
        e.preventDefault();
        $("#drawer-bottom-example").removeClass("hidden");
    });



});