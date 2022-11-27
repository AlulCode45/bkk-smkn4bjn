@extends('Template.app')
@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <form action="{{ route('master.tambahBeritaAction') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" name="judul" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Isi</label>
                    <textarea name="isi" id="isi" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Tambah Berita</button>
                    <a href="{{ route('master.berita') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script-bawah')
    <script>
        $(document).ready(function() {
            ClassicEditor
                .create(document.querySelector('#isi'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
