@extends('Template.app')
@section('css')
    <style>
        iframe {
            background: gray;
        }
    </style>
@endsection
@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-6">
                    <h3>Kelola Gallery</h3>
                </div>
                <div class="col-6 d-flex">
                    <div class="ml-auto">
                        <a class="btn btn-success rounded rounded-pill text-white" data-toggle="modal"
                            data-target="#tambahGallery">Tambah
                            Foto / Video</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="gallery">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Gambar / Video</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_gallery as $gallery)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $gallery->judul }}</td>
                                <td>
                                    @if ($gallery->type == 1)
                                        <img class="w-100" src="{{ asset('assets/images/gallery/' . $gallery->name) }}"
                                            width="300" height="200">
                                    @else
                                        <iframe width="330" height="200" src="{{ $gallery->name }}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    @endif
                                </td>
                                <td>{{ substr($gallery->deskripsi, 0, 100) }}</td>
                                <td>
                                    <a href="{{ route('master.editFoto', $gallery->id) }}" class="btn btn-primary m-1"><i
                                            class="fa fa-pencil-alt"></i></a>
                                    <a href="{{ route('master.hapusFoto', $gallery->id) }}" class="btn btn-danger m-1"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambahGallery" tabindex="" role="dialog" aria-labelledby="tambahGalleryLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahGalleryLabel">Tambah Gallery</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('master.tambahFoto') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Judul</label>
                            <input type="text" name="judul" class="form-control">
                        </div>
                        <div class="form-gambar">
                            <div class="form-group">
                                <label for="">Deskripsi Foto</label>
                                <textarea name="deskripsi" class="form-control dekripsi-foto"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Upload Gambar</label>
                                <input type="file" name="foto" class="form-control foto">
                            </div>
                        </div>
                        <div class="form-video d-none">
                            <div class="form-group">
                                <label for="">Deskripsi Video</label>
                                <textarea name="deskripsi" class="form-control deskripsi-video" disabled></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Link Video</label>
                                <input type="text" name="video" class="form-control link-video" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Pilih Tipe Gallery</label>
                            <select name="type" id="type" class="form-control">
                                <option value="1" selected>Foto / Gambar</option>
                                <option value="2">Video Youtube</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script-bawah')
    <script>
        $(document).ready(function() {
            $('#gallery').DataTable();

            // ezoom.onInit($('img'), {
            //     hideControlBtn: false,
            //     onClose: function(result) {
            //         console.log(result);
            //     },
            //     onRotate: function(result) {
            //         console.log(result);
            //     },
            // });

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
