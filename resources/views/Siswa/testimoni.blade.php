@extends('Template.app')
@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <form action="{{ route('siswa.updateTestimoni') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $testimoni->id }}">
                <div class="form-group">
                    <label for="">Testimoni </label>
                    <textarea name="testimoni" class="form-control">{{ $testimoni->testimoni }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan Testemoni</button>
                </div>
            </form>
        </div>
    </div>
@endsection
