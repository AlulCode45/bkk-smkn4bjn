@extends('Template.app')
@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <form action="{{ route('siswa.updateProfile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <img src="{{ asset('assets/images/profile/' . Auth::user()->foto_profile) }}"
                    class="rounded rounded-circle mb-3" width="200" height="200" id="profile-photo">
                <div class="form-group">
                    <label for="foto_profile">Foto Profile</label>
                    <input type="file" name="foto" class="form-control" onchange="previewImg(event)">
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ $siswa->nama_siswa }}">
                </div>
                <div class="form-group">
                    <label for="">Nisn</label>
                    <input type="number" name="nisn" class="form-control" value="{{ $siswa->nisn }}">
                </div>
                <div class="form-group">
                    <label for="">No Induk</label>
                    <input type="number" name="no_induk" class="form-control" value="{{ $siswa->no_induk }}">
                </div>
                <div class="form-group">
                    <label for="">Komli / Kelas</label>
                    <select name="komli" class="form-control">
                        <option value="">Pilih Jurusan</option>
                        @foreach (\App\Models\KomliModel::all() as $item)
                            <option value="{{ $item->id }}" {{ $siswa->id_komli == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_komli }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="{{ $siswa->tempat_lahir }}">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $siswa->tanggal_lahir }}">
                </div>
                <div class="form-group">
                    <label for="">Kelamin</label>
                    <select name="kelamin" class="form-control">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" {{ $siswa->kelamin == 'Laki-laki' ? 'selected' : '' }}>
                            Laki-laki
                        </option>
                        <option value="Perempuan" {{ $siswa->kelamin == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $siswa->email }}">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">No Telp</label>
                    <input type="text" name="no_telp" class="form-control" value="{{ $siswa->no_telp }}">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="5">{{ $siswa->alamat }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" value="{{ $siswa->kecamatan }}">
                </div>
                <div class="form-group">
                    <label for="">Kabupaten</label>
                    <input type="text" name="kabupaten" class="form-control" value="{{ $siswa->kabupaten }}">
                </div>
                <div class="form-group">
                    <label for="">Tahun Masuk</label>
                    <input type="number" name="tahun_masuk" class="form-control" value="{{ $siswa->tahun_masuk }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('siswa') }}" class="
                    btn btn-secondary">Kembali</a>
                </div>
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
