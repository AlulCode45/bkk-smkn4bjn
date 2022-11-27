@extends('Template.app')
@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="testimoni">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Testemoni</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_testimoni as $testemoni)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \App\Models\User::find($testemoni->id_user)->name }}</td>
                                <td>{{ $testemoni->testimoni }}</td>
                                <td>
                                    <a href="{{ route('operator.editTestimoni', $testemoni->id) }}" class="btn btn-primary"><i
                                            class="fa fa-pencil-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script-bawah')
    <script>
        $(document).ready(function() {
            $('#testimoni').DataTable();
        });
    </script>
@endsection
