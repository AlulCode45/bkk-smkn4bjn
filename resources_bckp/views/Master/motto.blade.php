@extends('Template.app')
@section('title', 'Edit Motto BKK')
@section('name-page', 'Edit Motto BKK')

@section('content')
    <div class="card rounded shadow">
        <div class="card-body">
            <form action="{{ route('master.updateMottoBkk') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Motto : </label>
                    <textarea name="motto" cols="30" rows="10" class="form-control" id="editor">{{ $motto == null ? '' : $motto->motto }}</textarea>
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
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
