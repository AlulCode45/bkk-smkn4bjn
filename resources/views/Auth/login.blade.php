<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login BKK</title>
    <link rel="stylesheet" href="{{ asset('assets/front-end-assets/css/style-css.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/front-end-assets/css/bootstrap.css') }}">
    {!! RecaptchaV3::initJs() !!}
</head>

<body>
    <img src="{{ asset('assets/images/bg.png') }}" alt=""
        class="position-absolute d-none d-md-block background">
    <div class="container-fluid">

        <section class="forms-section mt-5 justify-content-center">
            <h1 class="section-title text-center">Akses Masuk BKK SMK Negeri 4 Bojonegoro</h1>
            <div class="forms">
                <div class="form-wrapper {{ Session::has('errorRegister') ? '' : 'is-active' }}">
                    <button type="button" class="switcher switcher-login">
                        Masuk
                        <span class="underline"></span>
                    </button>
                    <form action="{{ route('loginAction') }}" class="form form-login" method="post">
                        @csrf
                        <fieldset>
                            <legend>Please, enter your email and password for login.</legend>
                            @if (Session::has('errorLogin'))
                                <div class="alert-danger p-2 mb-3">
                                    Email atau Password salah!!!
                                </div>
                            @endif
                            @if (Session::has('success'))
                                <div class="alert-success p-2 mb-3">
                                    Pendaftaran sukses silahkan login!!!
                                </div>
                            @endif
                            @if (Session::has('successLogout'))
                                <div class="alert-success p-2 mb-3">
                                    Berhasil Logout
                                </div>
                            @endif
                            <div class="input-block">
                                <label for="login-email">E-mail</label>
                                <input id="login-email" type="email" name="email" required>
                            </div>
                            <div class="input-block">
                                <label for="login-password">Password</label>
                                <input id="login-password" type="password" name="password" required>
                            </div>
                        </fieldset>
                        <input type="submit" class="btn-login" value="Masuk">
                    </form>
                </div>
                <div class="form-wrapper {{ Session::has('errorRegister') ? 'is-active' : '' }}">
                    <button type="button" class="switcher switcher-signup">
                        Daftar
                        <span class="underline"></span>
                    </button>
                    <form class="form form-signup" action="{{ route('registerAction') }}" method="post">
                        @csrf
                        <fieldset>
                            <legend>Please, enter your email, password and password confirmation for sign up.</legend>
                            <div class="input-block">
                                <label for="signup-name">Name</label>
                                <br>
                                @error('name')
                                    <span class="invalid-msg">{{ $message }}</span>
                                @enderror
                                <input id="signup-name" type="text" name="name" required class=""
                                    value="{{ $errors->name ? old('name') : '' }}">
                            </div>
                            <div class="input-block">
                                <label for="signup-email">E-mail</label>
                                <br>
                                @error('email')
                                    <span class="invalid-msg">{{ $message }}</span>
                                @enderror
                                <input id="signup-email" class="@error('email')input-invalid @enderror" type="email"
                                    name="email" required value="{{ $errors->email ? old('email') : '' }}">
                            </div>
                            <div class="input-block">
                                <label for="signup-password">Password</label>
                                <br>
                                @error('password')
                                    <span class="invalid-msg">{{ $message }}</span>
                                @enderror
                                <input id="signup-password" type="password" name="password" required
                                    class="@error('password')input-invalid @enderror">
                            </div>
                            <div class="input-block">
                                <label for="signup-repass">Confirm Password</label>
                                <br>
                                @error('repass')
                                    <span class="invalid-msg">{{ $message }}</span>
                                @enderror
                                <input id="signup-repass" type="password" name="password_confirmation" required
                                    class="@error('repass')input-invalid @enderror">
                            </div>
                            <div class="input-block {{ $errors->has('g-recaptcha-response') ? 'is-invalid' : '' }}">
                                {!! RecaptchaV3::field('register') !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row-cols-2 row-cols-md-2 d-flex">
                                <div class="col">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input chk-siswa @error('account_role') is-invalid @enderror"
                                            type="checkbox" value="1" id="chk-siswa" name="account_role"
                                            {{ old('account_role') == '1' ? 'checked' : '' }}>
                                        <label for="chk-siswa" class="label-chk">
                                            Siswa/Alumni
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input chk-perusahaan @error('account_role') is-invalid @enderror"
                                            type="checkbox" value="2" id="chk-perusahaan" name="account_role"
                                            {{ old('account_role') == '2' ? 'checked' : '' }}>
                                        <label class="label-chk" for="chk-perusahaan">
                                            Perusahaan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn-signup">Daftar</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/front-end-assets/js/login.js') }}" type="text/javascript"></script>
    </script>
</body>

</html>
