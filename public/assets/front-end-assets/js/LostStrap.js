if (window.location.href == "http://127.0.0.1:8000/lowongan?search="){
    window.location.href = "http://127.0.0.1:8000/lowongan"
}
window.onscroll = () => validationNav();
// $(window).on('onbeforeload', () => {

// })
validationNav = () => {
    if (window.pageYOffset > 80) {
        $(".nav-top").addClass("fixed-top");
        $(".nav-top").removeClass("shadow");
        return;
    }
    $(".nav-top").removeClass("fixed-top");
    $(".nav-top").addClass("shadow");
};



$(document).ready(() => {
    var timeout1 = setTimeout(() => {
        if ($(".sosial-2").hasClass("floating")) return clearTimeout(timeout1);
        $(".sosial-2").addClass("floating");
        console.log("tes");
    }, 200);
    var timeout2 = setTimeout(() => {
        if ($(".sosial-3").hasClass("floating")) return clearTimeout(timeout2);
        $(".sosial-3").addClass("floating");
    }, 500);
    $(".dropdown-menu.profileMenu").hover(
        function () {
            $(".profile").addClass("active-hover");
            $(".dropdown-menu.profileMenu").stop();
        },
        () => {
            $(".profile").removeClass("active-hover");
        }
    );

    $(".dropdown-menu.informasiMenu").hover(
        () => {
            $(".informasi").addClass("active-hover");
        },
        () => {
            $(".informasi").removeClass("active-hover");
        }
    );

    $(".dropdown-menu.loginMenu").hover(
        () => {
            $(".login").addClass("active-hover");
        },
        () => {
            $(".login").removeClass("active-hover");
        }
    );

    $(".profile").hover(
        () => {
            if ($(".profile").hasClass("hover-active")) return;
            $(".profile").addClass("link-nav");
        },
        () => {
            if ($(".profile").hasClass("hover-active")) return;
            $(".profile").removeClass("link-nav");
        }
    );

    $(".nav-rekapitulasi").hover(
        () => {
            if ($(".nav-rekapitulasi").hasClass("hover-active")) return;
            $(".nav-rekapitulasi").addClass("link-nav");
        },
        () => {
            if ($(".nav-rekapitulasi").hasClass("hover-active")) return;
            $(".nav-rekapitulasi").removeClass("link-nav");
        }
    );

    $(".nav-lowongan").hover(
        () => {
            if ($(".nav-lowongan").hasClass("hover-active")) return;
            $(".nav-lowongan").addClass("link-nav");
        },
        () => {
            if ($(".nav-lowongan").hasClass("hover-active")) return;
            $(".nav-lowongan").removeClass("link-nav");
        }
    );

    $(".nav-perusahaan").hover(
        () => {
            if ($(".nav-perusahaan").hasClass("hover-active")) return;
            $(".nav-perusahaan").addClass("link-nav");
        },
        () => {
            if ($(".nav-perusahaan").hasClass("hover-active")) return;
            $(".nav-perusahaan").removeClass("link-nav");
        }
    );

    $(".informasi").hover(
        () => {
            if ($(".nav-informasi").hasClass("hover-active")) return;
            $(".informasi").addClass("link-nav");
        },
        () => {
            if ($(".nav-informasi").hasClass("hover-active")) return;
            $(".informasi").removeClass("link-nav");
        }
    );

    $(".nav-kontak").hover(
        () => {
            if ($(".nav-kontak").hasClass("hover-active")) return;
            $(".nav-kontak").addClass("link-nav");
        },
        () => {
            if ($(".nav-kontak").hasClass("hover-active")) return;
            $(".nav-kontak").removeClass("link-nav");
        }
    );

    $(".login").hover(
        () => {
            if ($(".login").hasClass("hover-active")) return;
            $(".login").addClass("link-nav");
        },
        () => {
            if ($(".login").hasClass("hover-active")) return;
            $(".login").removeClass("link-nav");
        }
    );
});

$(document).on("lity:ready", function (event, instance) {
    var iframe = $(".lity-iframe-container").find("iframe");
    iframe.prop("id", "lity-youtube-player");

    var player = new YT.Player("lity-youtube-player", {
        events: {
            onReady: function (e) {
                e.target.playVideo();
            },
            onStateChange: function (e) {
                if (e.data == YT.PlayerState.ENDED) {
                    instance.close();
                }
            },
        },
    });
});

google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ["Keterserapan", "Rasio"],
        ["Bekerja", 10],
        ["Kuliah", 15],
        ["Wirausaha", 30],
        ["Belum", 10],
    ]);

    var options = {
        colors: ["#228B22", "#0096FF", "#FF5733", "#C70039"],
        title: "",
        is3D: true,
    };

    var chart = new google.visualization.PieChart(
        document.getElementById("chartKeterserapan")
    );
    chart.draw(data, options);
}

google.charts.load("current", { packages: ["bar"] });
google.charts.setOnLoadCallback(chartBar);

function chartBar() {
    var data = google.visualization.arrayToDataTable([
        ["", "<2019", "2020-2021", ">2022"],
        ["Bekerja", 10, 70, 50],
        ["Kuliah", 21, 30, 15],
        ["Wirausaha", 32, 12, 32],
        ["Belum", 10, 112, 50],
    ]);

    var options = {
        chart: {
            title: " ",
            subtitle: " ",
        },
        bars: "horizontal", // Required for Material Bar Charts.
    };

    var chart = new google.charts.Bar(
        document.getElementById("chartSumKeterserapan")
    );

    chart.draw(data, google.charts.Bar.convertOptions(options));
}

const switchers = [...document.querySelectorAll(".switcher")];

switchers.forEach((item) => {
    item.addEventListener("click", function () {
        switchers.forEach((item) =>
            item.parentElement.classList.remove("is-active")
        );
        this.parentElement.classList.add("is-active");
    });
});

const counterAnim = (qSelector, start = 0, end, duration = 3000) => {
    const target = document.querySelector(qSelector);
    let startTimestamp = null;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        target.innerText = Math.floor(progress * (end - start) + start);
        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };
    window.requestAnimationFrame(step);
};
//#endregion - end of - number counter animation

document.addEventListener("DOMContentLoaded", () => {
    if (window.location.href == "https://bkk-smkn4bojonegoro.sch.id/rekapitulasi") {
        const getData = async () => {
            const response = await fetch(
                "https://bkk-smkn4bojonegoro.sch.id/api/rekapitulasi"
            );
            const result = await response.json();
            counterAnim("#kompetensi", 10, result.count, 1000);
            counterAnim("#lowongan", 10, result.lowongan, result.lowongan * 50);
        };
        getData();
        
        counterAnim("#totalrombal", 10, 250, 1500);
        counterAnim("#pesertadidik", 10, -150, 2000);
        counterAnim("#perusahaan1", 10, 255, 1000);
        counterAnim("#perusahaan2", 10, 250, 1500);
        counterAnim("#perusahaan3", 10, -150, 2000);
        counterAnim("#perusahaan4", 10, -100, 2500);
        counterAnim("#totalalumni", 10, 255, 1000);
        counterAnim("#alumnibekerja", 10, 250, 1500);
        counterAnim("#alumnikuliah", 10, -150, 2000);
        counterAnim("#alumniwirausaha", 10, -100, 2500);
    }
});
