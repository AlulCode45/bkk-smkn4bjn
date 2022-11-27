@extends('layouts.navbar')

@section('css')
    <style>
        .berita-detail {
            font-size: 13px
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
        <div class="text-center">
            <h2>Berita Terkini</h2>
        </div>
        <div class="bg-light p-3">
            <div class="row row-cols-md-3 row-cols-1">
                @foreach ($berita as $data)
                    <div class="col mb-2 mt-2">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="fs-5 p-3 fw-bold text-center">{{ $data->judul }}</h5>
                            </div>
                            <div class="card-body">
                                {!! substr($data->isi, 0, strlen($data->isi) / 10) !!} .....
                                <br>
                                <br>
                                <b class="mt-5 berita-detail">
                                    Posted By :
                                    {{ \App\Models\User::find($data->id_user) == null ? '' : \App\Models\User::find($data->id_user)->name }}
                                    - {{ $data->created_at }}
                                </b>
                            </div>
                            <div class="card-footer">
                                <a href="/berita/detail/{{ $data->slug }}" class="btn btn-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-5">
                {{ $berita->links() }}
            </div>
        </div>
    </div>
@endsection
