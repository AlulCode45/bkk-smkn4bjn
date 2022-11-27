@extends('layouts.navbar')

@section('css')
    <link href="{{ asset('assets/front-end-assets/lity/lity.css') }}" rel="stylesheet">
@endsection
@section('content')
    <section class="">
        <div class="position-relative">
            <div id="carouselExampleFade" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/images/photos/back1.jpeg') }}" alt="" class="w-100 background1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/photos/back2.jpg') }}" alt="" class="w-100 background2">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/photos/back3.jpeg') }}" alt="" class="w-100 background3">
                    </div>
                    <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-once="true"
                        data-aos-duration="2000">
                        <div class="carousel-content d-flex">
                            <h1>Bursa Kerja Khusus <span class="text-school">SMKN 4 Bojonegoro</span></h1>
                            <span class="carousel-span d-none d-block">Melayani dengan LANCAR</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="position-absolute top-0 start-0 carousel-button mt-4 mt-md-1" data-aos="fade-up"
                data-aos-anchor-placement="top-bottom" data-aos-once="true" data-aos-duration="2000" data-aos-delay="200">
                <a href="https://www.youtube.com/watch?v=w7eLxLbBF30" class="btn btn-outline-primary" data-lity>
                    <div class="d-flex">
                        <div>
                            <ion-icon name="play-circle-outline"></ion-icon>
                        </div>
                        <div class="text-play ms-1">Lihat Video</div>
                    </div>
                </a>
            </div>
        </div>
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
            <div class="row row-cols-1 row-cols-md-2 margin-profil">
                <div class="col my-auto text-center" data-aos="fade-down-right" data-aos-duration="1000"
                    data-aos-once="true">
                    <img src="{{ asset('assets/images/kepsek/' . $kepsek->foto) }}" alt="" class="w-100 w-md-90">
                </div>
                <div class="col my-auto align-item-center" data-aos="fade-up-left" data-aos-duration="1000"
                    data-aos-delay="300" data-aos-once="true">
                    <div class="text-center text-sambutan">
                        <h3>Sambutan Kepala SMK Negeri 4 Bojonegoro</h3>
                    </div>
                    <div class="text-center mb-3">
                        <span class="text-opening"> Assalamu’alaikum Wr.Wb.</span>
                    </div>

                    {!! $kepsek->sambutan !!}
                    {{-- <br>
                    <br>
                    <br>
                    <b>{{ $kepsek->nama }}</b> --}}
                    </p>
                </div>
            </div>
        </div>

    </section>
@endsection
@section('js')
    <script src="{{ asset('assets/front-end-assets/lity/lity.js') }}"></script>
    <script src="{{ asset('assets/front-end-assets/js/main.min.js') }}"></script>
@endsection
