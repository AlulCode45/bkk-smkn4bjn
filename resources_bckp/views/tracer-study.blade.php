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
    <div class="container-fluid">
        <div class="bg-light p-3 mb-5">
            <h1 class="text-center">Data Alumni</h1>
            <div class="card shadow rounded mt-5">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="alumni">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Alumni Tahun</th>
                                    <th>Jurusan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_alumni as $alumni)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $alumni->nama_siswa }}</td>
                                        <td>{{ $alumni->tahun_lulus }}</td>
                                        <td>{{ $alumni->nama_jurusan }}</td>
                                        <td>{{ $alumni->keterangan_status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <h1 class="text-center">Tracer Study</h1>

            <div class="card shadow rounded mt-5">
                <div class="card-body">
                    <div class="w-100 d-flex">
                        <h2 class="badge bg-primary rounded-pill p-3 mx-auto mb-4 fs-6">Penyerapan Tahun
                            {{ date('Y') - 3 }}
                        </h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="penyerapan-tahun-1">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Jurusan</th>
                                    <th>JML. Siswa</th>
                                    <th>Kerja</th>
                                    <th>Kuliah</th>
                                    <th>Usaha</th>
                                    <th>Kerja + Kuliah</th>
                                    <th>Kerja + Usaha</th>
                                    <th>Kerja + Kuliah + Usaha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_jurusan as $jurusan)
                                    <tr>
                                        <td>{{ $jurusan->nama_jurusan }}</td>
                                        <td>{{ \App\Models\JurusanModel::hitungJumlahSiswa($jurusan->id, date('Y') - 3) }}
                                        </td>
                                        <td>{{ \App\Models\JurusanModel::hitungJumlahSiswaKerja($jurusan->id, date('Y') - 3) }}
                                        </td>
                                        <td>{{ \App\Models\JurusanModel::hitungJumlahSiswaKuliah($jurusan->id, date('Y') - 3) }}
                                        </td>
                                        <td>{{ \App\Models\JurusanModel::hitungJumlahSiswaUsaha($jurusan->id, date('Y') - 3) }}
                                        </td>
                                        <td>{{ \App\Models\JurusanModel::hitungJumlahSiswaKerjaKuliah($jurusan->id, date('Y') - 3) }}
                                        </td>
                                        <td>{{ \App\Models\JurusanModel::hitungJumlahSiswaKerjaUsaha($jurusan->id, date('Y') - 3) }}
                                        </td>
                                        <td>{{ \App\Models\JurusanModel::hitungJumlahSiswaKerjaKuliahUsaha($jurusan->id, date('Y') - 3) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card shadow rounded mt-5">
                <div class="card-body">
                    <div class="w-100 d-flex">
                        <h2 class="badge bg-primary rounded-pill p-3 mx-auto mb-4 fs-6">Penyerapan Tahun
                            {{ date('Y') - 2 }}
                        </h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="penyerapan-tahun-1">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Jurusan</th>
                                    <th>JML. Siswa</th>
                                    <th>Kerja</th>
                                    <th>Kuliah</th>
                                    <th>Usaha</th>
                                    <th>Kerja + Kuliah</th>
                                    <th>Kerja + Usaha</th>
                                    <th>Kerja + Kuliah + Usaha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_jurusan as $jurusan)
                                    <tr>
                                        <td>{{ $jurusan->nama_jurusan }}</td>
                                        <td>{{ \App\Models\JurusanModel::hitungJumlahSiswa($jurusan->id, date('Y') - 2) }}
                                        </td>
                                        <td>{{ \App\Models\JurusanModel::hitungJumlahSiswaKerja($jurusan->id, date('Y') - 2) }}
                                        </td>
                                        <td>{{ \App\Models\JurusanModel::hitungJumlahSiswaKuliah($jurusan->id, date('Y') - 2) }}
                                        </td>
                                        <td>{{ \App\Models\JurusanModel::hitungJumlahSiswaUsaha($jurusan->id, date('Y') - 2) }}
                                        </td>
                                        <td>{{ \App\Models\JurusanModel::hitungJumlahSiswaKerjaKuliah($jurusan->id, date('Y') - 2) }}
                                        </td>
                                        <td>{{ \App\Models\JurusanModel::hitungJumlahSiswaKerjaUsaha($jurusan->id, date('Y') - 2) }}
                                        </td>
                                        <td>{{ \App\Models\JurusanModel::hitungJumlahSiswaKerjaKuliahUsaha($jurusan->id, date('Y') - 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card shadow rounded mt-5">
                <div class="card-body">
                    <div class="w-100 d-flex">
                        <h2 class="badge bg-primary rounded-pill p-3 mx-auto mb-4 fs-6">Penyerapan Tahun
                            {{ date('Y') - 1 }}
                        </h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="penyerapan-tahun-1">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Jurusan</th>
                                    <th>JML. Siswa</th>
                                    <th>Kerja</th>
                                    <th>Kuliah</th>
                                    <th>Usaha</th>
                                    <th>Kerja + Kuliah</th>
                                    <th>Kerja + Usaha</th>
                                    <th>Kerja + Kuliah + Usaha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_jurusan as $jurusan)
                                    <tr>
                                        <td>{{ $jurusan->nama_jurusan }}</td>
                                        <td>{{ \App\Models\JurusanModel::hitungJumlahSiswa($jurusan->id, date('Y') - 1) }}
                                        </td>
                                        <td>{{ \App\Models\JurusanModel::hitungJumlahSiswaKerja($jurusan->id, date('Y') - 1) }}
                                        </td>
                                        <td>{{ \App\Models\JurusanModel::hitungJumlahSiswaKuliah($jurusan->id, date('Y') - 1) }}
                                        </td>
                                        <td>{{ \App\Models\JurusanModel::hitungJumlahSiswaUsaha($jurusan->id, date('Y') - 1) }}
                                        </td>
                                        <td>{{ \App\Models\JurusanModel::hitungJumlahSiswaKerjaKuliah($jurusan->id, date('Y') - 1) }}
                                        </td>
                                        <td>{{ \App\Models\JurusanModel::hitungJumlahSiswaKerjaUsaha($jurusan->id, date('Y') - 1) }}
                                        </td>
                                        <td>{{ \App\Models\JurusanModel::hitungJumlahSiswaKerjaKuliahUsaha($jurusan->id, date('Y') - 1) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#alumni').DataTable();
        });
    </script>
@endsection
