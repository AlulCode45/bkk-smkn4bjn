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
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css'
        integrity='sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=='
        crossorigin='anonymous' />
    <title>Angket Siswa</title>
    <style>
        i {
            font-size: 90px;
        }
    </style>
</head>

<body style="background-color: rgb(52, 174, 231)">
    <div class="container card shadow p-3 mt-5 text-center">
        <div class="d-flex w-100">
            <i class="fa fa-check-circle text-success m-auto"></i>
        </div>
        <h3 class="mt-3">Data Berhasil Disimpan</h3>
        <span class="mb-4">Terima kasih telah mengisi angket ini.</span>
        <a href="{{ route('home') }}" class="btn btn-secondary w-100"> Kembali Ke Halaman Utama</a>
    </div>
    <script src="{{ asset('assets/front-end-assets/js/vendor/vendor.min.js') }}"></script>

    <script src="{{ asset('assets/front-end-assets/js/bootstrap.js') }}"></script>

</body>

</html>
