@extends('layouts.navbar')

@section('content')
    <div class="waves wave-profil">
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
    {{-- <div class="bg-light">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-3">
                    <li class="breadcrumb-item active" aria-current="page">Rekapitulasi</li>
                </ol>
            </nav>
        </div>
    </div> --}}
    <div class="container">
        <div class="text-center">
            <h3 class="text-rekapitulasi">Rekapitulasi</h3>
        </div>
        <div class="row text-center">
            <div class="col-md-4 col-xl-3" data-aos="fade-up" data-aos-duration="500">
                <di data-aos-once="true"v class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Kompetensi Keahlian</h6>

                        <h2 class="text-right">
                            <ion-icon name="book-outline" size="large"></ion-icon><span class="ms-3 kompentensi"
                                id="kompetensi"></span>
                        </h2>
                        <p class="m-b-0 text-center">Aktif</p>
                    </div>
                </di>
            </div>
            <div class="col-md-4 col-xl-3" data-aos="fade-up" data-aos-duration="500" data-aos-delay="50" data-aos-once="true"> 
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Total Rombel</h6>
                        <h2 class="text-right">
                            <ion-icon name="grid" size="large"></ion-icon><span class="ms-3" id="totalrombal">On
                                Progress</span>
                        </h2>
                        <p class="m-b-0 text-center">Aktif</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Peserta Didik</h6>
                        <h2 class="text-right">
                            <ion-icon name="people-outline" size="large"></ion-icon><span class="ms-3"
                                id="pesertadidik">On Progress</span>
                        </h2>
                        <p class="m-b-0 text-center">Aktif</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3" data-aos="fade-up" data-aos-duration="500" data-aos-delay="150" data-aos-once="true">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Lowongan</h6>
                        <h2 class="text-right">
                            <ion-icon name="search-circle-outline" size="large"></ion-icon><span class="ms-3"
                                id="lowongan">On Progress</span>
                        </h2>
                        <p class="m-b-0 text-center">Aktif</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4 col-xl-3" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200" data-aos-once="true">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Perusahaan</h6>
                        <h2 class="text-right">
                            <ion-icon name="podium" size="large"></ion-icon><span class="ms-3" id="perusahaan1">On
                                Progress</span>
                        </h2>
                        <p class="m-b-0 text-center">Terdaftar</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3" data-aos="fade-up" data-aos-duration="500" data-aos-delay="250" data-aos-once="true">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Perusahaan</h6>
                        <h2 class="text-right">
                            <ion-icon name="attach" size="large"></ion-icon><span class="ms-3" id="perusahaan2">On
                                Progress</span>
                        </h2>
                        <p class="m-b-0 text-center">(MOU dengan Sekolah)</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" data-aos-once="true">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Perusahaan</h6>
                        <h2 class="text-right">
                            <ion-icon name="list" size="large"></ion-icon><span class="ms-3" id="perusahaan3">On
                                Progress</span>
                        </h2>
                        <p class="m-b-0 text-center">(UMKM)</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3" data-aos="fade-up" data-aos-duration="500" data-aos-delay="350" data-aos-once="true">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Perusahaan</h6>
                        <h2 class="text-right">
                            <ion-icon name="layers" size="large"></ion-icon><span class="ms-3" id="perusahaan4">On
                                Progress</span>
                        </h2>
                        <p class="m-b-0 text-center">(UMKM dan MOU)</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4 col-xl-3" data-aos="fade-up" data-aos-duration="500" data-aos-delay="400" data-aos-once="true">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Total Alumni</h6>
                        <h2 class="text-right">
                            <ion-icon name="school" size="large"></ion-icon><span class="ms-3" id="totalalumni">On
                                Progress</span>
                        </h2>
                        <p class="m-b-0 text-center">Terdaftar</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3" data-aos="fade-up" data-aos-duration="500" data-aos-delay="450" data-aos-once="true">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Alumni Bekerja</h6>
                        <h2 class="text-right">
                            <ion-icon name="briefcase" size="large"></ion-icon><span class="ms-3"
                                id="alumnibekerja">On Progress</span>
                        </h2>
                        <p class="m-b-0 text-center">Total</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500" data-aos-once="true">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Alumni Kuliah</h6>
                        <h2 class="text-right">
                            <ion-icon name="school" size="large"></ion-icon><span class="ms-3"
                                id="alumnikuliah"><span>On Progress</span>
                        </h2>
                        <p class="m-b-0 text-center">Total</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3" data-aos="fade-up" data-aos-duration="500" data-aos-delay="550" data-aos-once="true">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Alumni Wirausaha</h6>
                        <h2 class="text-right">
                            <ion-icon name="stopwatch" size="large"></ion-icon><span class="ms-3"
                                id="alumniwirausaha">On Progress</span>
                        </h2>
                        <p class="m-b-0 text-center">Total</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-cols-1 row-cols-md-2 d-sm-flex" style="margin-top: 6rem">
            <div class="col flex-column">
                <div class="text-center">
                    <h3>Data Keterserapan</h3>
                </div>
                <div id="chartKeterserapan" style="width:100%; max-width:600px; height:500px;" data-aos="fade-up"
                    data-aos-duration="1500">
                </div>
            </div>
            <div class="col flex-column">
                <div class="text-center">
                    <h3>Jumlah Keterserapan</h3>
                </div>
                <div id="chartSumKeterserapan" style="width:100%; max-width:700px; height:350px;" data-aos="fade-up"
                    data-aos-duration="1500" data-aos-delay="300"></div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="{{ asset('assets/front-end-assets/js/rekapitulasi.js') }}"></script>
@endsection
