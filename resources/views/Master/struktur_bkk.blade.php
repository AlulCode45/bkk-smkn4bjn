@extends('Template.app')
@section('title', 'Edit Struktur BKK')
@section('name-page', 'Edit Struktur BKK')

@section('content')
    <div class="card rounded shadow">
        <div class="card-body">
            <form action="{{ route('master.updateStrukturBkk') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <img src="{{ asset('assets/images/struktur/' . $struktur->struktur_photo) }}" alt="struktur bkk"
                        class="w-100" id="struktur-bkk">
                </div>
                <div class="form-group">
                    <label for="">Upload Struktur</label>
                    <input type="file" name="struktur" onchange="showPreview(event)" class="form-control">
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
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("struktur-bkk");
                preview.src = src;
            }
        }
    </script>
@endsection
