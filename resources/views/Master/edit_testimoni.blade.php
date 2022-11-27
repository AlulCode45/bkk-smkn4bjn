@extends('Template.app')
@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <form action="{{ route('master.updateTestimoni') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Pilih User</label>
                    <select name="id_user" class="form-control">
                        <option value="">Pilih User</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Testimoni</label>
                    <textarea name="testimoni" id="testimoni" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('master.testimoni') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
