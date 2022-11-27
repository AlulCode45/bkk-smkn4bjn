@extends('Template.app')
@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <form action="{{ route('master.updateFoto') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $foto->id }}">
                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" name="judul" class="form-control" value="{{ $foto->judul }}">
                </div>
                <div class="form-gambar">
                    <div class="form-group">
                        <label for="">Deskripsi Foto</label>
                        <textarea name="deskripsi" class="form-control dekripsi-foto" row="40" cols="20">{{ $foto->deskripsi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Upload Gambar</label>
                        <div class="form-group">
                            <img src="{{ asset('assets/images/gallery/' . $foto->name) }}" class="rounded" width="350"
                                alt="Foto gallery" id="profile-photo">
                        </div>
                        <input type="file" name="foto" class="form-control foto" onchange="previewImg(event)">
                    </div>
                </div>
                <div class="form-video d-none">
                    <div class="form-group">
                        <label for="">Deskripsi Video</label>
                        <textarea name="deskripsi" class="form-control deskripsi-video" disabled>{{ $foto->deskripsi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Link Video</label>
                        <input type="text" name="video" class="form-control link-video" value="{{ $foto->name }}"
                            disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Pilih Tipe Gallery</label>
                    <select name="type" id="type" class="form-control">
                        <option value="1" {{ $foto->type == 1 ? 'selected' : '' }}>Foto / Gambar</option>
                        <option value="2" {{ $foto->type == 2 ? 'selected' : '' }}>Video Youtube</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('master.gallery') }}" class="btn btn-secondary">Kembali</a>
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
        $(document).ready(function() {
            if ($('#type').val() == 1) {
                $('.form-gambar').removeClass('d-none');
                $('.form-video').addClass('d-none');
                $(".deskripsi-foto").removeAttr("disabled")
                $(".foto").removeAttr("disabled")
                $(".deskripsi-video").attr('disabled', 'disabled');
                $(".link-video").attr('disabled', 'disabled');
            } else {
                $('.form-gambar').addClass('d-none');
                $('.form-video').removeClass('d-none');
                $(".deskripsi-video").removeAttr("disabled")
                $(".link-video").removeAttr("disabled")
                $(".deskripsi-foto").attr('disabled', 'disabled');
                $(".foto").attr('disabled', 'disabled');
            }
            $('#type').change(function(e) {
                if (this.value == '1') {
                    $('.form-gambar').removeClass('d-none');
                    $('.form-video').addClass('d-none');
                    $(".deskripsi-foto").removeAttr("disabled")
                    $(".foto").removeAttr("disabled")
                    $(".deskripsi-video").attr('disabled', 'disabled');
                    $(".link-video").attr('disabled', 'disabled');
                } else {
                    $('.form-gambar').addClass('d-none');
                    $('.form-video').removeClass('d-none');
                    $(".deskripsi-video").removeAttr("disabled")
                    $(".link-video").removeAttr("disabled")
                    $(".deskripsi-foto").attr('disabled', 'disabled');
                    $(".foto").attr('disabled', 'disabled');
                }
            });
        });
    </script>
@endsection
