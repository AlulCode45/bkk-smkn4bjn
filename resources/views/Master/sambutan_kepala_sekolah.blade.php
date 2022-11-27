@extends('Template.app')
@section('title', 'Edit Sambutan Kepala Sekolah')
@section('name-page', 'Edit Kepala Sekolah')

@section('content')
    <div class="card rounded shadow">
        <div class="card-body">
            <form action="{{ route('master.updateSambutankepalasekolah') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <img src="{{ asset('assets/images/kepsek/' . $kepalasekolah->foto) }}" id="foto_kepsek"
                    alt="Foto kepala sekolah">
                <div class="form-group mt-4">
                    <label for="">Foto Kepala Sekolah</label>
                    <input type="file" name="foto" id="foto_kepalasekolah" onchange="showPreview(event)"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nama Kepala Sekolah</label>
                    <input type="text" name="nama" class="form-control" value="{{ $kepalasekolah->nama }}">
                </div>
                <div class="form-group">
                    <label for="sambutan">Sambutan Kepala Sekolah</label>
                    <textarea name="sambutan" id="sambutan" class="form-control" rows="10">{{ $kepalasekolah->sambutan }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script-bawah')
    <script>
        ClassicEditor
            .create(document.querySelector('#sambutan'))
            .catch(error => {
                console.error(error);
            });

        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("foto_kepsek");
                preview.src = src;
            }
        }
    </script>
@endsection
