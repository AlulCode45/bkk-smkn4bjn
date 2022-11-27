@extends('Template.app')
@section('title', 'Edit Berita')
@section('name-page', 'Edit Berita')
@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <form action="{{ route('operator.updateBerita') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $berita->id }}">
                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}">
                </div>
                <div class="form-group">
                    <label for="">Isi</label>
                    <textarea name="isi" id="isi" cols="30">{{ $berita->isi }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('operator.berita') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script-bawah')
    <script>
        $(document).ready(function() {
            ClassicEditor
                .create(document.querySelector('#isi'), {
                    ckfinder: {
                        uploadUrl: '{{ route('operator.uploadImage') . '?_token=' . csrf_token() }}',
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
