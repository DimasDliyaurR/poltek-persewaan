
let jam = document.querySelector("#jam")
let hari = document.querySelector("#hari")
let bulan = document.querySelector("#bulan")
let satuan = document.querySelector("input[name='gl_satuan_gedung']")

let longObject = satuan.value.split(",")
for (let i = 0; i < longObject.length; i++) {
    if (longObject[i] == "jam") {
        jam.checked = true
    } else if (longObject[i] == "hari") {
        hari.checked = true
    } else if (longObject[i] == "bulan") {
        bulan.checked = true
    }
}

jam.addEventListener("click", () => {
    let object = satuan.value.split(",")
    let isJamExist = false
    for (let i = 0; i < object.length; i++) {
        if (object[i] == "jam") {
            isJamExist = true
        }
    }

    if (isJamExist) {
        satuan.value = satuan.value.replace("," + "jam", "")
    } else {
        satuan.value = satuan.value + "," + "jam"
    }
});

hari.addEventListener("click", () => {
    let object = satuan.value.split(",")
    let isHariExist = false
    for (let i = 0; i < object.length; i++) {
        if (object[i] == "hari") {
            isHariExist = true
        }
    }

    if (isHariExist) {
        satuan.value = satuan.value.replace("," + "hari", "")
    } else {
        satuan.value = satuan.value + "," + "hari"
    }
});

bulan.addEventListener("click", () => {
    let object = satuan.value.split(",")
    let isBulanExist = false
    for (let i = 0; i < object.length; i++) {
        if (object[i] == "bulan") {
            isBulanExist = true
        }
    }

    if (isBulanExist) {
        satuan.value = satuan.value.replace("," + "bulan", "")
    } else {
        satuan.value = satuan.value + "," + "bulan"
    }
});