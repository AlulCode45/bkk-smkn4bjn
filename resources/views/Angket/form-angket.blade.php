<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/front-end-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-end-assets/css/style.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/bkk-logo.png') }}">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/front-end-assets/js/angket.js') }}"></script>
    <title>Angket Siswa</title>
</head>

<body style="background-color: rgb(52, 174, 231)">
    <div class="container card shadow p-3 mt-5">
        <div class="container-sm p-3">
            <div class="text-center mb-3">
                <h3>Angket Penelusuran Alumni</h3>
            </div>
            <div class="alert-danger msg p-3 d-none">
                Silahkan isi semua data yang ada!
            </div>
            <form action="{{ route('simpanAngket') }}" method="POST" onsubmit="onSubmit(event)">
                @csrf
                <div class="form-group">
                    <label class="mb-1">Jurusan</label>
                    <select name="jurusan" id="jurusan" class="form-select @error('jurusan') is-invalid @enderror"
                        onchange="getDetailJurusan(event)">
                        <option value="#">Pilih Jurusan</option>
                        @foreach ($jurusan as $data)
                            <option value="{{ $data->id }}" {{ $data->id == old('jurusan') ? 'selected' : '' }}>
                                {{ $data->nama_jurusan }}</option>
                        @endforeach
                        {{-- @foreach ($komli as $data)
                        <option value="{{ $data->id }}">{{ $data->nama_komli }}</option>
                    @endforeach --}}

                    </select>
                    @error('jurusan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3 form-kelas d-none">
                    <label for="" class="mb-1">Kelas</label>
                    <select name="kelas" id="jurusanDetail" class="form-select @error('kelas') is-invalid @enderror"
                        onchange="getDetailSiswa(event)">

                    </select>
                    @error('kelas')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3 form-nama d-none">
                    <label for="" class="mb-1">Nama</label>
                    <select name="id_user" id="siswaDetail" class="form-select @error('id_user') is-invalid @enderror">
                    </select>
                    @error('id_user')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <label for="" class="mt-3">Status Saat Ini</label>
                <div class="form-check mt-3">

                    <div class="row row-cols-1">
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name='kuliah' value="1" id="kuliah"
                                onchange="validationchange()">
                            <label class="form-check-label" for="kuliah">
                                Kuliah
                            </label>
                        </div>
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="bekerja" value="1" id="bekerja"
                                onchange="validationchange()">
                            <label class="form-check-label" for="bekerja">
                                Bekerja
                            </label>
                        </div>
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="usaha" value="1" id="usaha"
                                onchange="validationchange()">
                            <label class="form-check-label" for="usaha">
                                Usaha
                            </label>
                        </div>
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="nothing" value="1" id="nothing"
                                onchange="validationchange()">
                            <label class="form-check-label" for="nothing">
                                Belum Bekerja
                            </label>
                        </div>
                    </div>

                </div>
                <div class="text-center mt-3 mb-3">
                    <button onclick="nextForm(event)" class="btn btn-primary btn-next-form" disabled="true">Lanjut
                        Form</button>
                </div>
                <div class="next d-none">
                    <div class="form-group">
                        <div class="d-none mt-3 chk-kuliah">
                            <label for="">Nama Universitas</label>
                            <input type="text" class="form-control" name="nama_univ"
                                placeholder="Tulis Nama Universitas..." id="nama_univ" onchange="handleuniv(event)">
                        </div>
                        <div class="d-none mt-3 chk-kerja">
                            <label for="">Nama Perusahaan/Kantor</label>
                            <input type="text" class="form-control" name="nama_kantor"
                                placeholder="Tulis Nama Perusahaan..." id="nama_kantor"
                                onchange="handleKantor(event)">
                        </div>
                        <div class="d-none mt-3 chk-usaha">
                            <label for="">Nama Usaha</label>
                            <input type="text" class="form-control" name="nama_usaha"
                                placeholder="Tulis Usahamu..." id="nama_usaha" onchange="handleUsaha(event)">
                        </div>
                    </div>
                    <div class="form-group mt-5 ms-auto">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('assets/front-end-assets/js/vendor/vendor.min.js') }}"></script>

    <script src="{{ asset('assets/front-end-assets/js/bootstrap.js') }}"></script>

</body>

</html>
