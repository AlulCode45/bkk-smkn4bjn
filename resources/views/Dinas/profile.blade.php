@extends('Template.app')
@section('title', 'Profile')
@section('name-page', 'Profile')
@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <img src="{{ asset('assets/images/profile/' . $profile->foto_profile) }}" class="rounded rounded-circle mb-3"
                width="200" height="200" id="profile-photo">
            <form action="{{ route('dinas.updateProfile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Foto Profile</label>
                    <input type="file" class="form-control" name="foto" onchange="previewImg(event)">
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ $profile->name }}">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ $profile->email }}">
                </div>
                <div class="form-group">
                    <label for="">Pasword</label>
                    <input type="password" name="passwoord" class="form-control">
                </div>
                <button class="btn btn-success" type="submit">Simpan</button>
                <a href="{{ route('dinas') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
@section('script-bawah')
    <script>
        function previewImg(e) {
            if (e.target.files.length > 0) {
                var src = URL.createObjectURL(e.target.files[0]);
                var preview = document.getElementById("profile-photo");
                preview.src = src;
            }
        }
    </script>
@endsection
