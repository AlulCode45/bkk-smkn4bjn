@extends('layouts.navbar')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/front-end-assets/css/style-search-form.css') }}">
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
        <div class="bg-light p-3 mb-5">
            <form action="{{ route('perusahaan') }}" method="get">
                <div class="search">
                    <input type="text" class="searchTerm" placeholder="Tulis Nama, Kode, atau No. Telp Perusahaan..."
                        value="{{ $request->get('search') ?? '' }}" name="search">
                    <button type="submit" class="searchButton">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>
                </div>
                <div class="mt-3 mb-3">
                    <a class="btn btn-light " data-bs-toggle="collapse" href="#Collapse1" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        <div class="d-flex mt-2">
                            <ion-icon name="options-outline" class="icon-filter me-1"></ion-icon>
                            <h6>Filter</h6>
                        </div>
                    </a>
                </div>
                <div class="col d-flex">
                    <div class="collapse multi-collapse" id="Collapse1">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
                            <div class="col">
                                <div>
                                    <span>Status</span>
                                </div>
                                <div class="divider-item"></div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="chk-mou" value="1"
                                        name="mou" {{ $request['mou'] == true ? 'checked' : '' }}>
                                    <label for="chk-mou" class="form-check-label">MOU</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="chk-umkm" value="1"
                                        name="umkm" {{ $request['umkm'] == true ? 'checked' : '' }}>
                                    <label for="chk-umkm" class="form-check-label">UMKM</label>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
                            <?php $no = 0; ?>
                                <div class="col">
                                    <input type="checkbox" class="form-check-input" id="chk-{{ $e->id }}"
                                        value="{{ $e->id }}" name="filterchk[]"
                                        {{ $request['filterchk'] ? (in_array($e->id, $request['filterchk']) ? 'checked' : '') : '' }}>
                                    <label for="chk-{{ $e->id }}">{{ $e->nama_jurusan }}</label>
                                </div>

                        </div> --}}
                    </div>
                </div>
            </form>
        </div>

        <div class="row row-cols-2 row-cols-md-2">
            @foreach ($perusahaan as $data)
                <div class="col" data-aos="fade-up"
                    data-aos-duration="{{ ($loop->iteration * 500) / $loop->iteration - 50 }}"
                    data-aos-delay="{{ $loop->iteration * 50 }}" data-aos-once="true">
                    <div class="card card-margin">
                        <div class="card-header no-border bg-light d-flex">
                            <h5 class="card-title perusahaan-jdl">
                                <ion-icon name="podium-outline" class="me-1"></ion-icon>{{ $data->nama }}
                            </h5>
                            @if ($data->mou == 1)
                                <div class="ms-auto">
                                    <span class="badge rounded-pill bg-success">MOU</span>
                                </div>
                            @endif
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <span class="widget-49-pro-title">
                                    <p>Tahun gabung : {{ $data->tahun_gabung }}</p>
                                </span>
                            </div>
                            <div>
                                <span class="widget-49-pro-title">
                                    <p>Alamat : {{ $data->alamat }}</p>
                                </span>
                            </div>
                        </div>
                        <div class="card-footer no-border bg -light">
                            <div class="text-center">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#Model{{ md5($loop->iteration) }}">
                                    <ion-icon name="list-circle-outline" class="me-1"></ion-icon>Detail Perusahaan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="Model{{ md5($loop->iteration) }}" tabindex="-1"
                    aria-labelledby="Model{{ md5($loop->iteration) }}Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="card-title perusahaan-jdl">
                                    <ion-icon name="podium-outline" class="me-1"></ion-icon>{{ $data->nama }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="flex-column">
                                    <span class="badge bg-light text-dark">Kode</span>
                                    <h6 class="ms-3 mt-2" style="opacity: 80%">{{ $data->kode }}</h6>
                                </div>
                                <div class="flex-column">
                                    <span class="badge bg-light text-dark">Alamat</span>
                                    <h6 class="ms-3 mt-2" style="opacity: 80%">{{ $data->alamat }}</h6>
                                </div>
                                <div class="flex-column">
                                    <span class="badge bg-light text-dark">Kota</span>
                                    <h6 class="ms-3 mt-2" style="opacity: 80%">{{ $data->kota }}</h6>
                                </div>
                                <div class="flex-column">
                                    <span class="badge bg-light text-dark">Tahun Gabung</span>
                                    <h6 class="ms-3 mt-2" style="opacity: 80%">{{ $data->tahun_gabung }}</h6>
                                </div>
                                <div class="flex-column">
                                    <span class="badge bg-light text-dark">No. Telp</span>
                                    <h6 class="ms-3 mt-2" style="opacity: 80%">{{ $data->no_telp }}</h6>
                                </div>
                                <div class="flex-column">
                                    <span class="badge bg-light text-dark">Standar</span>
                                    <h6 class="ms-3 mt-2" style="opacity: 80%">{{ $data->standar }}</h6>
                                </div>
                                <div class="flex-column">
                                    <span class="badge bg-light text-dark">Status</span>
                                    <div>
                                        @if ($data->mou == 1)
                                            <span class="badge rounded-pill bg-success ms-3">MOU</span>
                                        @endif
                                        @if ($data->umkm == 1)
                                            <span class="badge rounded-pill bg-danger ms-3">UMKM</span>
                                        @endif
                                        @if ($data->umkm == 0 && $data->mou == 0)
                                            <span class="badge rounded-pill bg-light ms-3 text-dark">Tidak ada</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
