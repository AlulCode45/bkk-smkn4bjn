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
    <div class="container">

        <div class="row row-cols-1 row-cols-md-2">
            <div class="col">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="rounded-circle text-center">
                                    <ion-icon name="earth-outline" class="border border-3 rounded-circle ion-kontak p-1"
                                        size="large">
                                    </ion-icon>
                                    <h5 class="card-title kontak-judul">Website</h5>
                                    <h7 class="card-text" style="font-size: 70%; opacity: 70%">
                                        <b>bkk-smkn4bojonegoro.sch.id</b>
                                    </h7>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="rounded-circle text-center">
                                    <ion-icon name="mail-outline" class="border border-3 rounded-circle ion-kontak p-1"
                                        size="large">
                                    </ion-icon>
                                    <h5 class="card-title kontak-judul">Email</h5>
                                    <h7 class="card-text" style="font-size: 62%; opacity: 70%">
                                        <b>bkksmkn4bojonegoro@gmail.com</b>
                                    </h7>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="rounded-circle text-center">
                                    <ion-icon name="call-outline" class="border border-2 rounded-circle ion-kontak p-1"
                                        size="large">
                                    </ion-icon>
                                    <h5 class="card-title kontak-judul">Telp.</h5>
                                    <h7 class="card-text" style="font-size: 70%; opacity: 70%">(0353) 892418</h7>
                                    <br />
                                    <h7 class="card-text" style="font-size: 70%; opacity: 70%"><b>Hp.</b> +6281252124842
                                    </h7>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
            </div>
            <div class="col justify-content-center">
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="rounded-circle text-center">
                            <ion-icon name="location-outline" class="border border-3 rounded-circle ion-kontak p-1"
                                size="large">
                            </ion-icon>

                            <h5 class="card-title kontak-judul">Alamat</h5>
                            <h6 class="card-text text-center" style="opacity: 70%"> Jl. Surabaya, Sukowati, Kapas, Kabupaten
                                Bojonegoro, Jawa Timur 62181</h6>
                        </div>
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-center">
                    <div class="mapouter">
                        <div class="gmap_canvas"><iframe width="500" height="500" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=RW95+P7F,%20Jalan%20Raya%20Surabaya,%20Sukowati,%20Kapas,%20Sukolilo,%20Sukowati,%20Kec.%20Kapas,%20Kabupaten%20Bojonegoro,%20Jawa%20Timur%2062181&t=&z=15&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                                href="https://2piratebay.org"></a><br>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    height: 500px;
                                    width: 500px;
                                }
                            </style><a href="https://www.embedgooglemap.net">google maps in website</a>
                            <style>
                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    height: 500px;
                                    width: 500px;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                @if (Session::has('success'))
                    <div class="alert-success p-3">
                        Berhasil Dikirim!
                    </div>
                @endif

                <div class="mt-3 mt-md-0">
                    <form action="/send" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" name="name"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                id="exampleInputPassword1" placeholder="Subject.." name="subject"
                                value="{{ old('subject') }}" required>
                            @error('subject')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <textarea type="text" class="form-control @error('subject') is-invalid @enderror" id="exampleInputPassword1"
                                rows="5" placeholder="Tuliskan pesan / masukan..." name="body" value="" required>{{ old('body') }}</textarea>
                            @error('body')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
@endsection
