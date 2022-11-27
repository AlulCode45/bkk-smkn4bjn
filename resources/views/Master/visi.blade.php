@extends('Template.app')
@section('title', 'Edit visi')
@section('name-page', 'Edit visi')

@section('content')
    <div class="card rounded shadow">
        <div class="card-body">
            <form action="{{ route('master.updateVisi') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Visi : </label>
                    <textarea name="visi" cols="30" rows="10" class="form-control" id="editor">{{ $visi == null ? '' : $visi->visi }}</textarea>
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
