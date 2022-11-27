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
    <link rel="stylesheet" href="{{ asset('assets/front-end-assets/css/testimoni.css') }}">
@endsection
@section('content')
    <div id="carouselExampleSlidesOnly" class="carousel carousel-light slide" data-bs-ride="carousel">
        <div class="carousel-inner position-relative ">
            <div class="carousel-item active img">
                <img src="{{ asset('assets/images/photos/Background1.jpg') }}" class="d-block w-100 back-1" alt="...">
                <div class="carousel-caption d-none d-md-block position-absolute">
                    <div class="text-center">
                        <h3>{{ $top[0]->user->name }}</h3>
                        <h6>"{{ $top[0]->testimoni }}"</h6>
                    </div>
                </div>
            </div>
            @foreach ($testimoni as $data)
                <div class="carousel-item img">
                    <img src="{{ asset('assets/images/photos/Background' . rand(1, 3) . '.jpg') }}"
                        class="d-block w-100 back-1" alt="...">
                    <div class="carousel-caption d-none d-md-block position-absolute">
                        <div class="text-center">
                            <h3>{{ $data->user->name }}</h3>
                            <h6>"{{ $data->testimoni }}"</h6>
                        </div>
                    </div>
                </div>
            @endforeach
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

    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-3">
            <div class="col mt-2">
                <iframe width="100%" height="300" src="https://www.youtube.com/embed/_0aD9nVnvts"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <div class="col mt-2">
                <iframe width="100%" height="300" src="https://www.youtube-nocookie.com/embed/BLd9UVDHBgU"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <div class="col mt-2">
                <iframe width="100%" height="300" src="https://www.youtube-nocookie.com/embed/9M4OBbxoEZ0"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <div class="col mt-2">
                <iframe width="100%" height="300" src="https://www.youtube-nocookie.com/embed/cSfi0EZb2KA"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <div class="col mt-2">
                <iframe width="100%" height="300" src="https://www.youtube-nocookie.com/embed/nz0uiZW-iLI"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <div class="col mt-2">
                <iframe width="100%" height="300" src="https://www.youtube-nocookie.com/embed/dW6nvnE1D5Y"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>

        </div>
    </div>
@endsection
