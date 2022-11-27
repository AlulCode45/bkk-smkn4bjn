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
    <title>Angket Angket Kepuasan Pelanggan</title>
    {{-- select 2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        .select2-container--default .select2-selection--single {
            height: 40px !important;
            padding: 5px;
            font-size: 18px;
            line-height: 1.33;
            border-radius: 6px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            top: 85% !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 26px !important;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #CCC !important;
            box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset;
            transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
        }
    </style>
</head>

<body style="background-color: rgb(52, 174, 231)">
    <div class="container card shadow p-3 mt-5">
        <div class="container-sm p-3">
            <div class="text-center mb-3">
                <h3>Angket Kepuasan Pelanggan BKK</h3>
            </div>
            <hr>
            <div class="alert-danger msg p-3 d-none">
                Silahkan isi semua data yang ada!
            </div>
            <form action="{{ route('simpanAngketKepuasan') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <select class="form-control" name="id_user" id="nama">
                        <option value="">Pilih Nama</option>
                        @foreach ($perusahaan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                        @foreach ($data_alumni as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_siswa }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-4">
                    <label for="">Pelayanan di BKK Terhadap penyaluran lulusan ke industri</label>
                    <select name="pelayanan" id="pelayanan" class="form-select @error('pelayanan') is-invalid @enderror"
                        required>
                        <option value="">Pilih Pelayanan</option>
                        <option value="1">Sangat Setuju</option>
                        <option value="2">Setuju</option>
                        <option value="3">Netral</option>
                        <option value="4">Tdk. Setuju</option>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <label for="">Pelayanan di BKK menerapkan 5 S ( Salam, Senyum, Sapa ,Sopan dan
                        Santum</label>
                    <select name="pelayanan2" id="pelayanan2"
                        class="form-select @error('pelayanan2') is-invalid @enderror"required>
                        <option value="">Pilih Pelayanan</option>
                        <option value="1">Sangat Setuju</option>
                        <option value="2">Setuju</option>
                        <option value="3">Netral</option>
                        <option value="4">Tdk. Setuju</option>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <label for="">Pelayanan di BKK menggunakan komunikasi bahasa yang mudah dimengerti dan
                        dipahami</label>
                    <select name="pelayanan3" id="pelayanan3"
                        class="form-select @error('pelayanan3') is-invalid @enderror"required>
                        <option value="">Pilih Pelayanan</option>
                        <option value="1">Sangat Setuju</option>
                        <option value="2">Setuju</option>
                        <option value="3">Netral</option>
                        <option value="4">Tdk. Setuju</option>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <label for="">Pelayanan di BKK dalam penyampaian informasi kerja</label>
                    <select name="pelayanan4" id="pelayanan4"
                        class="form-select @error('pelayanan4') is-invalid @enderror" required>
                        <option value="">Pilih Pelayanan</option>
                        <option value="1">Sangat Setuju</option>
                        <option value="2">Setuju</option>
                        <option value="3">Netral</option>
                        <option value="4">Tdk. Setuju</option>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <label for="">Pelayanan di BKK dalam pelaksanaan tes kerja (recruitmen)</label>
                    <select name="pelayanan5" id="pelayanan5"
                        class="form-select @error('pelayanan5') is-invalid @enderror" required>
                        <option value="">Pilih Pelayanan</option>
                        <option value="1">Sangat Setuju</option>
                        <option value="2">Setuju</option>
                        <option value="3">Netral</option>
                        <option value="4">Tdk. Setuju</option>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <label for="">Pelayanan di BKK dalam pembimbingan karir alumni</label>
                    <select name="pelayanan6" id="pelayanan6"
                        class="form-select @error('pelayanan6') is-invalid @enderror" required>
                        <option value="">Pilih Pelayanan</option>
                        <option value="1">Sangat Setuju</option>
                        <option value="2">Setuju</option>
                        <option value="3">Netral</option>
                        <option value="4">Tdk. Setuju</option>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <label for="">Pelayanan di BKK dalam pembekalan alumni sebelum ke tempat kerja</label>
                    <select name="pelayanan7" id="pelayanan7"
                        class="form-select @error('pelayanan7') is-invalid @enderror" required>
                        <option value="">Pilih Pelayanan</option>
                        <option value="1">Sangat Setuju</option>
                        <option value="2">Setuju</option>
                        <option value="3">Netral</option>
                        <option value="4">Tdk. Setuju</option>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <label for="">Kemampuan Pengelola BKK dalam menjawab pertanyaan dan kebutuhan informasi
                        dari
                        Orangtua / Wali</label>
                    <select name="pelayanan8" id="pelayanan8"
                        class="form-select @error('pelayanan8') is-invalid @enderror" required>
                        <option value="">Pilih Pelayanan</option>
                        <option value="1">Sangat Setuju</option>
                        <option value="2">Setuju</option>
                        <option value="3">Netral</option>
                        <option value="4">Tdk. Setuju</option>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <label for="">Kenyamanan Fasilitas dan Perangkat yang digunakan di ruang BKK</label>
                    <select name="pelayanan9" id="pelayanan9"
                        class="form-select @error('pelayanan9') is-invalid @enderror" required>
                        <option value="">Pilih Pelayanan</option>
                        <option value="1">Sangat Setuju</option>
                        <option value="2">Setuju</option>
                        <option value="3">Netral</option>
                        <option value="4">Tdk. Setuju</option>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <label for="">Respon / Penanganan BKK dalam memberikan solusi terhadap keluhan orangtua /
                        Wali</label>
                    <select name="pelayanan10" id="pelayanan10"
                        class="form-select @error('pelayanan10') is-invalid @enderror" required>
                        <option value="">Pilih Pelayanan</option>
                        <option value="1">Sangat Setuju</option>
                        <option value="2">Setuju</option>
                        <option value="3">Netral</option>
                        <option value="4">Tdk. Setuju</option>
                    </select>
                </div>
                <div class="form-group mt-4 d-flex">
                    <button type="submit" class="btn btn-primary ms-auto">Kirim Survey</button>
                    <a href="{{ route('home') }}" class="btn btn-secondary ms-2">Kembali</a>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('assets/front-end-assets/js/vendor/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/front-end-assets/js/bootstrap.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#nama').select2();
        });
    </script>
</body>

</html>
