$(document).ready(function () {
    var isDp = $("input[name=is_dp]")
    const tarifDp = $("input[name=tarif_dp]").parent()

    var is_dp_checked = $("input[name=is_dp]:checked")
    console.log(is_dp_checked.val());
    if (is_dp_checked.val() == 1) {
        tarifDp.removeClass("hidden")
    } else if (is_dp_checked.val() == 0) {
        if (!tarifDp.hasClass("hidden")) {
            tarifDp.addClass("hidden")
        }
    }

    isDp.click(function () {
        var is_dp_checked = $("input[name=is_dp]:checked")
        console.log(is_dp_checked.val());
        if (is_dp_checked.val() == 1) {
            tarifDp.removeClass("hidden")
        } else if (is_dp_checked.val() == 0) {
            if (!tarifDp.hasClass("hidden")) {
                tarifDp.addClass("hidden")
            }
        }
    });
});