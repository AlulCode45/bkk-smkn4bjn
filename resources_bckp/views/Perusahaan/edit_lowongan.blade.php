@extends('Template.app')
@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <form action="{{ route('perusahaan.updateLowongan', $lowongan->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Perusahaan</label>
                    <input type="text" name="perusahaan" class="form-control" value="{{ $perusahaan->nama }}" readonly>
                </div>
                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" name="judul" value="{{ $lowongan->judul }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control">{{ $lowongan->deskripsi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Gaji</label>
                    <input type="text" name="gaji" value="{{ $lowongan->gaji }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Lokasi</label>
                    <textarea name="lokasi" class="form-control" rows="5">{{ $lowongan->lokasi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Penempatan</label>
                    <input type="text" class="form-control" value="{{ $lowongan->penempatan }}" name="penempatan">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Penutupan</label>
                    <input type="date" name="tanggal" value="{{ $lowongan->tanggal }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Status Lowongan</label>
                    <select name="status" class="form-control">
                        <option value="{{ $lowongan->status }}">{{ $lowongan ? 'Aktif' : 'Tidak Aktif' }}</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Jurusan Terkait</label>
                    <select class="form-control" style="width: 100%" id="jurusan" name="jurusan[]" multiple>
                        @foreach (\App\Models\JurusanModel::whereNotIn('id', \App\Models\JurusanLowonganModel::where('id_lowongan', $lowongan->id)->pluck('id_jurusan'))->get() as $jurusan)
                            <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                        @endforeach
                        @foreach (\App\Models\JurusanModel::whereIn('id', \App\Models\JurusanLowonganModel::where('id_lowongan', $lowongan->id)->pluck('id_jurusan'))->get() as $jurusan)
                            <option value="{{ $jurusan->id }}" selected>{{ $jurusan->nama_jurusan }}</option>
                        @endforeach

                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('perusahaan.lowongan') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
@section('script-bawah')
    <script>
        $(document).ready(function() {
            ClassicEditor
                .create(document.querySelector('#deskripsi'))
                .catch(error => {
                    console.error(error);
                });
            $('#perusahaan').select2();
            $('#jurusan').select2();
        });
    </script>
@endsection
