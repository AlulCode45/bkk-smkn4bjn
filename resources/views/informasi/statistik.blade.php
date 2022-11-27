@extends('layouts.navbar')
@section('css')
    <style>
        .bg-primary,
        .active a.page-link {
            background-color: #604586 !important;
        }

        .badge.bg-primary {
            background-color: #6045863a !important;
            color: #604586 !important;
        }
    </style>
@endsection
@section('content')
    <div class="waves">
        <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 400" xmlns="http://www.w3.org/2000/svg"
            class="transition duration-300 ease-in-out delay-150">
            <defs>
                <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                    <stop offset="5%" stop-color="#614385"></stop>
                    <stop offset="95%" stop-color="#516395"></stop>
                </linearGradient>
            </defs>
            <path
                d="M 0,400 C 0,400 0,200 0,200 C 95.89285714285714,165.92857142857144 191.78571428571428,131.85714285714286 326,149 C 460.2142857142857,166.14285714285714 632.7499999999999,234.5 774,264 C 915.2500000000001,293.5 1025.2142857142858,284.1428571428571 1131,267 C 1236.7857142857142,249.85714285714286 1338.392857142857,224.92857142857144 1440,200 C 1440,200 1440,400 1440,400 Z"
                stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="1"
                class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 200)">
            </path>
        </svg>
    </div>
    <div class="container">
        <div class="w-100 d-flex">
            <h2 class="badge bg-primary rounded-pill p-3 mx-auto mb-4 fs-6">
                Statistik
            </h2>
        </div>
        <div class="container d-flex justify-content-center">
            <div class="row row-cols-1 row-cols-md-2" style="margin-top: 6rem">
                <div class="col">
                    <div class="text-center">
                        <h3>Data Keterserapan</h3>
                    </div>
                    <div id="chartKeterserapan" style="width:100%; max-width:600px; height:500px;">
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="text-center">
                        <h3>Jumlah Keterserapan</h3>
                    </div>
                    <div id="chartSumKeterserapan" style="width:100%; max-width:700px; height:350px;"></div>
                </div>
            </div>
        </div>
        <div class="w-100 d-flex mt-3">
            <h2 class="badge bg-primary rounded-pill p-3 mx-auto mb-4 fs-6">
                SURVEY KEPUASAN PELANGGAN
            </h2>
        </div>

        <div class="container d-flex justify-content-center">
            <div class="row row-cols-md-2 row-cols-1">
                <div class="col border border-black-50">
                    <div id="statistik1"></div>
                </div>
                <div class="col border border-black-50">
                    <div id="statistik2"></div>
                </div>
                <div class="col border border-black-50">
                    <div id="statistik3"></div>
                </div>
                <div class="col border border-black-50">
                    <div id="statistik4"></div>
                </div>
                <div class="col border border-black-50">
                    <div id="statistik5"></div>
                </div>
                <div class="col border border-black-50">
                    <div id="statistik6"></div>
                </div>
                <div class="col border border-black-50">
                    <div id="statistik7"></div>
                </div>
                <div class="col border border-black-50">
                    <div id="statistik8"></div>
                </div>
                <div class="col border border-black-50">
                    <div id="statistik9"></div>
                </div>
                <div class="col border border-black-50">
                    <div id="statistik10"></div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Keterserapan", "Rasio"],
                ["Bekerja", {{ $keterserapan['bekerja'] }}],
                ["Kuliah", {{ $keterserapan['kuliah'] }}],
                ["Wirausaha", {{ $keterserapan['wirausaha'] }}],
                ["Belum", {{ $keterserapan['tidak_bekerja'] }}],
            ]);

            var options = {
                colors: ["#228B22", "#0096FF", "#FF5733", "#C70039"],
                title: "",
                is3D: true,
                'width': 600,
                'height': 400
            };

            var chart = new google.visualization.PieChart(
                document.getElementById("chartKeterserapan")
            );
            chart.draw(data, options);
        }

        google.charts.load("current", {
            packages: ["bar"]
        });
        google.charts.setOnLoadCallback(chartBar);

        function chartBar() {
            var data = google.visualization.arrayToDataTable([
                ["", "<{{ date('Y') - 3 }}", "{{ date('Y') - 2 }}", "{{ date('Y') - 1 }}", "{{ date('Y') }}"],
                ["Bekerja", {{ $keterserapan_tahun_4['bekerja'] }}, {{ $keterserapan_tahun_3['bekerja'] }},
                    {{ $keterserapan_tahun_2['bekerja'] }}, {{ $keterserapan_tahun_1['bekerja'] }}
                ],
                ["Kuliah", {{ $keterserapan_tahun_4['kuliah'] }}, {{ $keterserapan_tahun_3['kuliah'] }},
                    {{ $keterserapan_tahun_2['kuliah'] }}, {{ $keterserapan_tahun_1['kuliah'] }}
                ],
                ["Wirausaha", {{ $keterserapan_tahun_4['wirausaha'] }}, {{ $keterserapan_tahun_3['wirausaha'] }},
                    {{ $keterserapan_tahun_2['wirausaha'] }}, {{ $keterserapan_tahun_1['wirausaha'] }}
                ],
                ["Belum", {{ $keterserapan_tahun_4['tidak_bekerja'] }},
                    {{ $keterserapan_tahun_3['tidak_bekerja'] }},
                    {{ $keterserapan_tahun_2['tidak_bekerja'] }}, {{ $keterserapan_tahun_1['tidak_bekerja'] }}
                ],
            ]);

            var options = {
                chart: {
                    title: " ",
                    subtitle: " ",
                },
                bars: "vertical",
                'width': 500,
                'height': 400
            };

            var chart = new google.charts.Bar(
                document.getElementById("chartSumKeterserapan")
            );

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart1);

        function drawChart1() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Statistik');
            data.addColumn('number', 'Jumlah');
            data.addRows([
                ['Sangat Setuju', {{ $survey1['sangat_setuju'] }}],
                ['Setuju', {{ $survey1['setuju'] }}],
                ['Netral', {{ $survey1['netral'] }}],
                ['Tdk. Setuju', {{ $survey1['tidak_setuju'] }}]
            ]);

            var options = {
                'title': 'Total Rasio Keterserapan',
                'width': 600,
                'height': 400
            };
            var chart = new google.visualization.PieChart(document.getElementById('statistik1'));
            chart.draw(data, options);
        }

        google.charts.setOnLoadCallback(drawChart2);

        function drawChart2() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Statistik');
            data.addColumn('number', 'Jumlah');
            data.addRows([
                ['Sangat Setuju', {{ $survey2['sangat_setuju'] }}],
                ['Setuju', {{ $survey2['setuju'] }}],
                ['Netral', {{ $survey2['netral'] }}],
                ['Tdk. Setuju', {{ $survey2['tidak_setuju'] }}]
            ]);

            var options = {
                'title': 'Jumlah Keterserapan',
                'width': 600,
                'height': 400
            };
            var chart = new google.visualization.PieChart(document.getElementById('statistik2'));
            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawChart3);

        function drawChart3() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Statistik');
            data.addColumn('number', 'Jumlah');
            data.addRows([
                ['Sangat Setuju', {{ $survey3['sangat_setuju'] }}],
                ['Setuju', {{ $survey3['setuju'] }}],
                ['Netral', {{ $survey3['netral'] }}],
                ['Tdk. Setuju', {{ $survey3['tidak_setuju'] }}]
            ]);

            var options = {
                'title': 'Pelayanan di BKK Terhadap penyaluran lulusan ke industri',
                'width': 600,
                'height': 400
            };
            var chart = new google.visualization.PieChart(document.getElementById('statistik3'));
            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawChart4);

        function drawChart4() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Statistik');
            data.addColumn('number', 'Jumlah');
            data.addRows([
                ['Sangat Setuju', {{ $survey4['sangat_setuju'] }}],
                ['Setuju', {{ $survey4['setuju'] }}],
                ['Netral', {{ $survey4['netral'] }}],
                ['Tdk. Setuju', {{ $survey4['tidak_setuju'] }}]
            ]);

            var options = {
                'title': 'Pelayanan di BKK menerapkan 5 S ( Salam, Senyum, Sapa , Sopan dan Santum',
                'width': 600,
                'height': 400
            };
            var chart = new google.visualization.PieChart(document.getElementById('statistik4'));
            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawChart5);

        function drawChart5() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Statistik');
            data.addColumn('number', 'Jumlah');
            data.addRows([
                ['Sangat Setuju', {{ $survey5['sangat_setuju'] }}],
                ['Setuju', {{ $survey5['setuju'] }}],
                ['Netral', {{ $survey5['netral'] }}],
                ['Tdk. Setuju', {{ $survey5['tidak_setuju'] }}]
            ]);

            var options = {
                'title': 'Pelayanan di BKK menggunakan komunikasi bahasa yang mudah dimengerti dan dipahami',
                'width': 600,
                'height': 400
            };
            var chart = new google.visualization.PieChart(document.getElementById('statistik5'));
            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawChart6);

        function drawChart6() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Statistik');
            data.addColumn('number', 'Jumlah');
            data.addRows([
                ['Sangat Setuju', {{ $survey6['sangat_setuju'] }}],
                ['Setuju', {{ $survey6['setuju'] }}],
                ['Netral', {{ $survey6['netral'] }}],
                ['Tdk. Setuju', {{ $survey6['tidak_setuju'] }}]
            ]);

            var options = {
                'title': 'Pelayanan di BKK dalam penyampaian informasi kerja',
                'width': 600,
                'height': 400
            };
            var chart = new google.visualization.PieChart(document.getElementById('statistik6'));
            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawChart7);

        function drawChart7() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Statistik');
            data.addColumn('number', 'Jumlah');
            data.addRows([
                ['Sangat Setuju', {{ $survey7['sangat_setuju'] }}],
                ['Setuju', {{ $survey7['setuju'] }}],
                ['Netral', {{ $survey7['netral'] }}],
                ['Tdk. Setuju', {{ $survey7['tidak_setuju'] }}]
            ]);

            var options = {
                'title': 'Pelayanan di BKK dalam pelaksanaan tes kerja (recruitmen)',
                'width': 600,
                'height': 400
            };
            var chart = new google.visualization.PieChart(document.getElementById('statistik7'));
            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawChart8);

        function drawChart8() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Statistik');
            data.addColumn('number', 'Jumlah');
            data.addRows([
                ['Sangat Setuju', {{ $survey8['sangat_setuju'] }}],
                ['Setuju', {{ $survey8['setuju'] }}],
                ['Netral', {{ $survey8['netral'] }}],
                ['Tdk. Setuju', {{ $survey8['tidak_setuju'] }}]
            ]);

            var options = {
                'title': 'Pelayanan di BKK dalam pembimbingan karir alumni',
                'width': 600,
                'height': 400
            };
            var chart = new google.visualization.PieChart(document.getElementById('statistik8'));
            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawChart9);

        function drawChart9() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Statistik');
            data.addColumn('number', 'Jumlah');
            data.addRows([
                ['Sangat Setuju', {{ $survey9['sangat_setuju'] }}],
                ['Setuju', {{ $survey9['setuju'] }}],
                ['Netral', {{ $survey9['netral'] }}],
                ['Tdk. Setuju', {{ $survey9['tidak_setuju'] }}]
            ]);

            var options = {
                'title': 'Pelayanan di BKK dalam pembekalan alumni sebelum ke tempat kerja',
                'width': 600,
                'height': 400
            };
            var chart = new google.visualization.PieChart(document.getElementById('statistik9'));
            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawChart10);

        function drawChart10() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Statistik');
            data.addColumn('number', 'Jumlah');
            data.addRows([
                ['Sangat Setuju', {{ $survey10['sangat_setuju'] }}],
                ['Setuju', {{ $survey10['setuju'] }}],
                ['Netral', {{ $survey10['netral'] }}],
                ['Tdk. Setuju', {{ $survey10['tidak_setuju'] }}]
            ]);

            var options = {
                'title': 'Kemampuan Pengelola BKK dalam menjawab pertanyaan dan kebutuhan informasi dari Orangtua / Wali',
                'width': 600,
                'height': 400
            };
            var chart = new google.visualization.PieChart(document.getElementById('statistik10'));
            chart.draw(data, options);
        }
    </script>
@endsection
