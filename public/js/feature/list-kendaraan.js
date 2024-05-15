function add(button) {
    var input = document.createElement("input")
    var isSame = true
    input.type = "text"
    input.name = "slug[]"
    input.value = button.children[0].value
    var slug_input = document.getElementById("input-slug")

    for (let index = 0; index < (slug_input.children).length; index++) {
        var children = slug_input.children[index].value
        var sibling = button.children[index].value

        console.log(index);
        console.log((slug_input.children[index]));
        // console.log((slug_input.children).length);

        // if (children == sibling) {
        //     // isSame = false;
        //     console.log("sama wak");
        //     break;
        // }

    }
    if (isSame) {
        slug_input.appendChild(input)
    }
};

$(document).ready(function () {

    let slug = $("input[name^=slug]")
    let temp = "{{ $item->mk_slug }}";

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

    let total = 0
    $.ajax({
        type: "GET",
        url: "/api/merkKendaraans/" + temp,
        dataType: "json",
        success: response => {
            $(response).each(function (indexInArray, merkKendaraan) {
                total += Number(merkKendaraan.mk_tarif)
                let card = $("#card")
                let card_inner = $("<div class='flex md:flex-row flex-col border-t p-2'></div>")
                let image_card = $("<div class='md:w-1/4'></div>");
                let containt = $("<div class='w-3/4 border shadow-sm flex flex-col p-4'><div div class='ml-3 text-2xl font-bold'>" + merkKendaraan.mk_merk + "</div> <div class='ml-3 text-md font-bold'>Rp. " + addCommas(merkKendaraan.mk_tarif) + "</div></div>")

                // Image
                var img = document.createElement("img")
                img.className = "object-cover md:rounded-l-lg rounded-t-lg"
                img.src = "/storage/" + merkKendaraan.mk_foto
                let image_card_image = image_card.append(img)

                card_inner = card_inner.append(image_card_image, containt);
                card.append(card_inner);
            });
        }
    });

    // Events Trigger

    $("#add-item").click((e) => {
        e.preventDefault();
        // var input = document.createElement("input");
        // input.type = "text"
        // input.name = "slug[]"
        // var slug_input = $("#input-slug")

        // slug_input.append(input)

        $("#drawer-bottom-example").removeClass("hidden");
    });

});