@extends('layouts.navbar')
@section('css')
    <style>
        .content {
            position: relative;
            width: 90%;
            /* max-width: 400px; */
            margin: auto;
            overflow: hidden;
        }

        .content .content-overlay {
            background: rgba(85, 93, 146, 0.7);
            position: absolute;
            height: 99%;
            width: 100%;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
            opacity: 0;
            -webkit-transition: all 0.4s ease-in-out 0s;
            -moz-transition: all 0.4s ease-in-out 0s;
            transition: all 0.4s ease-in-out 0s;
        }

        .content:hover .content-overlay {
            opacity: 1;
        }

        .content-image {
            width: 100%;
        }

        .content-details {
            position: absolute;
            text-align: center;
            padding-left: 1em;
            padding-right: 1em;
            width: 100%;
            top: 50%;
            left: 50%;
            opacity: 0;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-transition: all 0.3s ease-in-out 0s;
            -moz-transition: all 0.3s ease-in-out 0s;
            transition: all 0.3s ease-in-out 0s;
        }

        .content:hover .content-details {
            top: 50%;
            left: 50%;
            opacity: 1;
        }

        .content-details h3 {
            color: #fff;
            font-weight: 500;
            letter-spacing: 0.15em;
            margin-bottom: 0.5em;
            text-transform: uppercase;
        }

        .content-details p {
            color: #fff;
            font-size: 0.8em;
        }

        .fadeIn-bottom {
            top: 80%;
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
    <div class="container-fluid text-center">
        <h3>Gallery BKK SMKN 4 Bojonegoro</h3>
        <hr>
        <div class="row row-cols-md-3 row-cols-1 mt-5">
            @foreach ($data_gallery as $gallery)
                @if ($gallery->type == 1)
                    <div class="col mb-2 mt-2">
                        <div class="content h-100 w-100 shadow rounded-3">
                            <a href="#">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ asset('assets/images/gallery/' . $gallery->name) }}"
                                    class="w-100 rounded-3" height="280">
                                <div class="content-details fadeIn-bottom">
                                    <h3 class="content-title">{{ $gallery->judul }}</h3>
                                    <p class="content-text"><i class="fa fa-map-marker"></i> {{ $gallery->deskripsi }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @else
                    <div class="col mb-2 mt-2 shadow rounded-3">
                        <div class="content h-100 w-100">
                            <a href="#" onclick="playVideo({{ $gallery->id }})">
                                <div class="content-overlay"></div>
                                <iframe class="w-100 rounded-3 shadowm content-image"
                                    id="video{{ $gallery->id }}"height="280" src="{{ $gallery->name }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer;fullScreen; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"
                                    allowFullScreen></iframe>
                                <div class="content-details fadeIn-bottom">
                                    <h3 class="content-title">{{ $gallery->judul }}</h3>
                                    <p class="content-text"><i class="fa fa-map-marker"></i> {{ $gallery->deskripsi }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $data_gallery->links() }}
        </div>
    </div>
@endsection
@section('js')
    <script>
        function playVideo(id) {
            $('#video' + id).attr('src', $('#video' + id).attr('src') + '?autoplay=1');
        };
    </script>
@endsection
