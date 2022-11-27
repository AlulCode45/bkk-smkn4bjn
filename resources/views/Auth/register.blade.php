<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Aplikasi BKK</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css'
        integrity='sha512-CpIKUSyh9QX2+zSdfGP+eWLx23C8Dj9/XmHjZY2uDtfkdLGo0uY12jgcnkX9vXOgYajEKb/jiw67EYm+kBf+6g=='
        crossorigin='anonymous' />
</head>

<body>
    <h1>Pendaftaran Aplikasi BKK</h1>
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <hr>
    <p>
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </p>
    <form action="{{ route('registerAction') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Name :</label>
            <input type="text" name="name" id="" class="form-control w-25">
        </div>
        <div class="form-group">
            <label for="">Email :</label>
            <input type="email" name="email" id="" class="form-control w-25">
        </div>
        <div class="form-group">
            <label for="">Password :</label>
            <input type="password" name="password" id="" class="form-control w-25">
        </div>
        <div class="form-group">
            <label for="">Confirm Password :</label>
            <input type="password" name="password_confirmation" id="" class="form-control w-25">
        </div>
        <div class="form-group">
            <label for="">Akun Sebagai : </label>
            <select name="account_role" class="form-control w-25">
                <option value="">-- Pilih Role --</option>
                <option value="1">Siswa</option>
                <option value="2">Perusahaan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Daftar</button>
    </form>
</body>

</html>
