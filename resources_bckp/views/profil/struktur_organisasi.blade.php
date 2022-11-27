@extends('layouts.navbar')

@section('content')
    {{-- <div class="bg-light">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-3">
                    <li class="breadcrumb-item"><a href="/" class="nav-breadcrumb">Profil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Struktur Organisasi BKK</li>
                </ol>
            </nav>
        </div>
    </div> --}}
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
    <div class="text-center">
        <h1>Struktur BKK</h1>
        <div class="container mt-4">
            <img src="{{ asset('assets/images/struktur/' . $struktur) }}" alt="Struktur Organisasi BKK" class="w-100">
        </div>
    </div>
@endsection
