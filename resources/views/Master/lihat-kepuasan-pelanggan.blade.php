@extends('Template.app')
@section('title', 'Kepuasan Pelanggan')
@section('content')
    <div class="card shadow rounded">
        <div class="card-body">
            <h3 class="font-weight-bold mb-3">Data Kepuasan Pelanggan ( {{ $kepuasan_pelanggan[0]->name }} )</h3>
            <hr>
            <p>
                @foreach ($kepuasan_pelanggan as $data)
                    @if ($data->id_survey == 1)
                        Pelayanan di BKK terhadap penyaluran lulusan ke Industri : @if ($data->status_kepuasan == 1)
                            <b>Sangat Setuju</b>
                        @elseif ($data->status_kepuasan == 2)
                            <b>Setuju</b>
                        @elseif ($data->status_kepuasan == 3)
                            <b>Netral</b>
                        @elseif ($data->status_kepuasan == 4)
                            <b>Tidak Setuju</b>
                        @endif
                        <br>
                        <br>
                    @elseif ($data->id_survey == 2)
                        Pelayanan di BKK menerapkan 5 S (Salam, Senyum, Sapan, Sopan dan Santun) : @if ($data->status_kepuasan == 1)
                            <b>Sangat Setuju</b>
                        @elseif ($data->status_kepuasan == 2)
                            <b>Setuju</b>
                        @elseif ($data->status_kepuasan == 3)
                            <b>Netral</b>
                        @elseif ($data->status_kepuasan == 4)
                            <b>Tidak Setuju</b>
                        @endif
                        <br>
                        <br>
                    @elseif ($data->id_survey == 3)
                        Pelayanan di BKK menggunakan komunikasi bahasa yang mudah dimengerti dan dipahami : @if ($data->status_kepuasan == 1)
                            <b>Sangat Setuju</b>
                        @elseif ($data->status_kepuasan == 2)
                            <b>Setuju</b>
                        @elseif ($data->status_kepuasan == 3)
                            <b>Netral</b>
                        @elseif ($data->status_kepuasan == 4)
                            <b>Tidak Setuju</b>
                        @endif
                        <br>
                        <br>
                    @elseif ($data->id_survey == 4)
                        Pelayanan di BKK dalam penyampaian informasi kerja : @if ($data->status_kepuasan == 1)
                            <b>Sangat Setuju</b>
                        @elseif ($data->status_kepuasan == 2)
                            <b>Setuju</b>
                        @elseif ($data->status_kepuasan == 3)
                            <b>Netral</b>
                        @elseif ($data->status_kepuasan == 4)
                            <b>Tidak Setuju</b>
                        @endif
                        <br>
                        <br>
                    @elseif ($data->id_survey == 5)
                        Pelayanan di BKK dalam pelaksanaan tes kerja (recruitment) : @if ($data->status_kepuasan == 1)
                            <b>Sangat Setuju</b>
                        @elseif ($data->status_kepuasan == 2)
                            <b>Setuju</b>
                        @elseif ($data->status_kepuasan == 3)
                            <b>Netral</b>
                        @elseif ($data->status_kepuasan == 4)
                            <b>Tidak Setuju</b>
                        @endif
                        <br>
                        <br>
                    @elseif ($data->id_survey == 6)
                        Pelayanan di BKK dalam pembimbingan karir alumni : @if ($data->status_kepuasan == 1)
                            <b>Sangat Setuju</b>
                        @elseif ($data->status_kepuasan == 2)
                            <b>Setuju</b>
                        @elseif ($data->status_kepuasan == 3)
                            <b>Netral</b>
                        @elseif ($data->status_kepuasan == 4)
                            <b>Tidak Setuju</b>
                        @endif
                        <br>
                        <br>
                    @elseif ($data->id_survey == 7)
                        Pelayanan di BKK dalam pembekalan alumni sebelum ke tempat kerja : @if ($data->status_kepuasan == 1)
                            <b>Sangat Setuju</b>
                        @elseif ($data->status_kepuasan == 2)
                            <b>Setuju</b>
                        @elseif ($data->status_kepuasan == 3)
                            <b>Netral</b>
                        @elseif ($data->status_kepuasan == 4)
                            <b>Tidak Setuju</b>
                        @endif
                        <br>
                        <br>
                    @elseif ($data->id_survey == 8)
                        Kemampuan Pengelola BKK dalam menjawab pertanyaan dan kebutuhan informasi dari
                        Orangtua/Wali : @if ($data->status_kepuasan == 1)
                            <b>Sangat Setuju</b>
                        @elseif ($data->status_kepuasan == 2)
                            <b>Setuju</b>
                        @elseif ($data->status_kepuasan == 3)
                            <b>Netral</b>
                        @elseif ($data->status_kepuasan == 4)
                            <b>Tidak Setuju</b>
                        @endif
                        <br>
                        <br>
                    @elseif ($data->id_survey == 9)
                        Kenyamanan Fasilitas dan Perangkat yang digunakan di ruang BKK : @if ($data->status_kepuasan == 1)
                            <b>Sangat Setuju</b>
                        @elseif ($data->status_kepuasan == 2)
                            <b>Setuju</b>
                        @elseif ($data->status_kepuasan == 3)
                            <b>Netral</b>
                        @elseif ($data->status_kepuasan == 4)
                            <b>Tidak Setuju</b>
                        @endif
                        <br>
                        <br>
                    @elseif ($data->id_survey == 10)
                        Respon/Penanganan BKK dalam memberikan solusi terhadap keluhan orangtua/Wali : @if ($data->status_kepuasan == 1)
                            <b>Sangat Setuju</b>
                        @elseif ($data->status_kepuasan == 2)
                            <b>Setuju</b>
                        @elseif ($data->status_kepuasan == 3)
                            <b>Netral</b>
                        @elseif ($data->status_kepuasan == 4)
                            <b>Tidak Setuju</b>
                        @endif
                        <br><br>
                    @endif
                @endforeach
                <a href="{{ route('master.kepuasanPelanggan') }}" class="btn btn-secondary">Kembali</a>
            </p>
        </div>
    </div>
@endsection
