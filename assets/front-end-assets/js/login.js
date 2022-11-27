const switchers = [...document.querySelectorAll(".switcher")];

switchers.forEach((item) => {
    item.addEventListener("click", function () {
        switchers.forEach((item) =>
            item.parentElement.classList.remove("is-active")
        );
        this.parentElement.classList.add("is-active");
    });
});

$(document).ready(() => {
    $(".chk-siswa").on("click", () => {
        if ($(".chk-siswa").is(":checked"))
            return $(".chk-perusahaan").prop("checked", false);
    });

    $(".chk-perusahaan").on("click", () => {
        if ($(".chk-perusahaan").is(":checked"))
            return $(".chk-siswa").prop("checked", false);
    });

    $("#signup-email").change(() => {
        console.log("haloo");
        $(".input-invalid").removeClass("input-invalid");
    });
});
