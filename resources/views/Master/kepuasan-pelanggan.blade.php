@extends('Template.app')
@section('title', 'Kepuasan Pelanggan')
@section('name-page', 'Kepuasan Pelanggan')

@section('content')
    <div class="card shadow shadow-sm">
        <div class="card-body">
            <label for="">Link Angket</label>
            <input type="text" class="form-control" readonly value="{{ route('angketKepuasan') }}">
        </div>
    </div>
    <div class="card shadow rounded">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-6">
                    <h3>Data Kepuasan Pelanggan</h3>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="kepuasan-pelanggan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            {{-- <th>Survey</th>
                            <th>Kepuasan</th> --}}
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kepuasan_pelanggan as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                {{-- <td>
                                    @if ($data->id_survey == 1)
                                        Pelayanan di BKK terhadap penyaluran lulusan ke Industri
                                    @elseif ($data->id_survey == 2)
                                        Pelayanan di BKK menerapkan 5 S (Salam, Senyum, Sapan, Sopan dan Santun).
                                    @elseif ($data->id_survey == 3)
                                        Pelayanan di BKK menggunakan komunikasi bahasa yang mudah dimengerti dan dipahami.
                                    @elseif ($data->id_survey == 4)
                                        Pelayanan di BKK dalam penyampaian informasi kerja.
                                    @elseif ($data->id_survey == 5)
                                        Pelayanan di BKK dalam pelaksanaan tes kerja (recruitment)
                                    @elseif ($data->id_survey == 6)
                                        Pelayanan di BKK dalam pembimbingan karir alumni
                                    @elseif ($data->id_survey == 7)
                                        Pelayanan di BKK dalam pembekalan alumni sebelum ke tempat kerja.
                                    @elseif ($data->id_survey == 8)
                                        Kemampuan Pengelola BKK dalam menjawab pertanyaan dan kebutuhan informasi dari
                                        Orangtua/Wali
                                    @elseif ($data->id_survey == 9)
                                        Kenyamanan Fasilitas dan Perangkat yang digunakan di ruang BKK.
                                    @elseif ($data->id_survey == 10)
                                        Respon/Penanganan BKK dalam memberikan solusi terhadap keluhan orangtua/Wali.
                                    @endif
                                </td>
                                <td>
                                    @if ($data->status_kepuasan == 1)
                                        Sangat Setuju
                                    @elseif ($data->status_kepuasan == 2)
                                        Setuju
                                    @elseif ($data->status_kepuasan == 3)
                                        Netral
                                    @elseif ($data->status_kepuasan == 4)
                                        Tidak Setuju
                                    @endif
                                </td> --}}
                                <td>
                                    <a href="{{ route('master.lihatKepuasan', $data->id) }}" class="btn btn-primary m-1"><i
                                            class="fa fa-eye"></i></a>
                                    {{-- <a href="{{ route('master', $data->id) }}" class="btn btn-danger m-1"><i
                                            class="fa fa-trash"></i></a> --}}
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
            $('#kepuasan-pelanggan').DataTable();
        });
    </script>
@endsection
