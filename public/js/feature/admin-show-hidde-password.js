$(document).ready(function () {
    const openEye =
        `<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/><path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>`
    const closeEye =
        `<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>`
    const visible = document.querySelector("#eyeVision")
    const form = $("#formChangePassword")

    visible.addEventListener("click", () => {
        console.log(visible.checked);
        $.each(form.children(), function (indexInArray, valueOfElement) {
            $.each(valueOfElement.children, function (indexInArrayInner,
                valueOfElementInner) {
                if (valueOfElementInner.nodeName == "INPUT") {
                    if (valueOfElementInner
                        .type != "checkbox") {
                        if (valueOfElementInner.type == "text") {
                            valueOfElementInner.type = "password"
                        } else {
                            valueOfElementInner.type = "text"
                        }
                    }
                }

            });
        });
    });
});