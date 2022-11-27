@extends('layouts.navbar')

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
    <div class="section-title">
        <h2>Tracer Study</h2>
    </div>
    <div class="row py-5">
        <div class="col-lg-10 mx-auto">
            <div class="table-responsive">
                <table id="example" style="width:100%" class="table table-striped table-bordered">
                    <thead class="table-color">
                        <tr>
                            <th>NO.</th>
                            <th>NAMA SISWA</th>
                            <th>ALUMNI TAHUN</th>
                            <th>KOMPETENSI</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>System Architect</td>
                            <td>2021-2022</td>
                            <td>Rekayasa Pernagkat Lunak</td>
                            <td>2011/04/25</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Accountant</td>
                            <td>2021-2022</td>
                            <td>Rekayasa Pernagkat Lunak</td>
                            <td>2011/07/25</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Junior Technical Author</td>
                            <td>2021-2022</td>
                            <td>Rekayasa Pernagkat Lunak</td>
                            <td>2009/01/12</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Senior Javascript Developer</td>
                            <td>2021-2022</td>
                            <td>Rekayasa Pernagkat Lunak</td>
                            <td>2012/03/29</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Alex Ferguson</td>
                            <td> 2021-2022</td>
                            <td>Rekayasa Pernagkat Lunak</td>
                            <td>2008/11/28</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="section-title">
        <h2>PENYERAPAN LULUSAN 2020</h2>
    </div>
    <div class="row py-5">
        <div class="col-lg-10 mx-auto">
            <div class="table-responsive">
                <table id="example" style="width:100%" class="table table-striped table-bordered">
                    <thead class="table-color">
                        <tr>
                            <td><b>JURUSAN</b></td>
                            <td><b>JML. SISWA</b></td>
                            <td><b>KERJA</b></td>
                            <td><b>KULIAH</b></td>
                            <td><b>USAHA</b></td>
                            <td><b>KERJA + KULIAH</b></td>
                            <td><b>KERJA + USAHA</b></td>
                            <td><b>KULIAH + USAHA</b></td>
                            <td><b>KERJA + KULIAH + USAHA</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Rekayasa Perangkat Lunak</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>Rekayasa Perangkat Lunak</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                    </tbody>
                    <tfoot class="table-footer">
                        <tr>
                            <td></td>
                            <td>120</td>
                            <td>123</td>
                            <td>13</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
