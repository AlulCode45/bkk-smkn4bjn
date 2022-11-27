<?php

namespace App\Http\Controllers;

use App\Models\PelamarModel;
use Illuminate\Http\Request;
use App\Models\LowonganModel;
use App\Models\DataPerusahaanModel;
use App\Models\JurusanLowonganModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PerusahaanController extends Controller
{
    public function index()
    {
        return view('Perusahaan.index');
    }
    //profile
    public function profile()
    {
        $data = [
            'perusahaan' => DataPerusahaanModel::where('id', Auth::user()->id)->first(),
            'user' => Auth::user()
        ];
        return view('Perusahaan.profile', $data);
    }
    //update profile
    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_perusahaan' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'standar' => 'required',
            'tahun_gabung' => 'required',
            'status_mou' => 'required',
            'mou_file' => 'mimes:pdf',
            'umkm' => 'required',
            'kota' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $foto = $request->file('foto');
        if ($foto == null) {
            $fotoName = Auth::user()->foto_profile == null ? 'default.png' : Auth::user()->foto_profile;
            $moveFoto = true;
        } else {
            $fotoName = 'foto_profile_' . rand(1, 99999) . '_' . time() . '.' . $foto->extension();
            $moveFoto = $foto->move('assets/images/profile', $fotoName);
        }
        $mou = $request->file('mou_file');
        if ($mou == null) {
            $mouName = Auth::user()->mou_file;
            $moveMou = true;
        } else {
            $mouName = 'mou_file_' . rand(1, 99999) . '_' . time() . '.' . $mou->extension();
            $moveMou = $mou->move(public_path('mou_file'), $mouName);
        }
        $data = [
            'nama' => $request->nama_perusahaan,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'standar' => $request->standar,
            'tahun_gabung' => $request->tahun_gabung,
            'mou' => $request->status_mou,
            'mou_file' => $mouName,
            'umkm' => $request->umkm,
            'kota' => $request->kota,
        ];
        $password = $request->password == null ? Auth::user()->password : bcrypt($request->password);;
        $user = [
            'foto_profile' => $fotoName,
            'name' => $request->nama_perusahaan,
            'email' => $request->email,
            'password' => $password,
        ];
        $update = DataPerusahaanModel::where('id', Auth::user()->id)->update($data);
        $updateUser = User::find(Auth::user()->id)->update($user);
        if ($update && $updateUser && $moveFoto && $moveMou) {
            $user = Auth::user();
            $user->foto_profile = $fotoName;
            $user->name = $request->nama_perusahaan;
            $user->email = $request->email;
            $user->password = $password;
            return redirect()->back()->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'Data gagal diupdate');
        }
    }
    public function lowongan()
    {
        $data = [
            'lowongan' => LowonganModel::join('data_perusahaan', 'data_perusahaan.id_user', '=', 'lowongan.id_pembuat')
                ->select('lowongan.*', 'lowongan.id as id_lowongan', 'data_perusahaan.*')
                ->where('id_pembuat', Auth::user()->id)
                ->get(),
            'perusahaan' => DataPerusahaanModel::where('id_user', Auth::user()->id)->first()
        ];
        return view('Perusahaan.lowongan', $data);
    }
    //tambah lowongan
    public function tambahLowonganAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'perusahaan' => 'required',
            'judul' => 'required|string',
            'deskripsi' => 'required',
            'gaji' => 'required',
            'lokasi' => 'required|string',
            'penempatan' => 'required|string',
            'tanggal' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $id_perusahaan = DataPerusahaanModel::where('id_user', Auth::user()->id)->first()->id;
        $save = [
            'id_pembuat' => Auth::user()->id,
            'id_perusahaan' => $id_perusahaan,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gaji' => $request->gaji,
            'lokasi' => $request->lokasi,
            'penempatan' => $request->penempatan,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ];
        $saveLowongan = LowonganModel::create($save);
        $jurusan_lowongan = [];
        foreach ($request->jurusan as $jurusan_dibutuhkan) {
            $jurusan_lowongan[] = [
                'id_lowongan' => $saveLowongan->id,
                'id_jurusan' => $jurusan_dibutuhkan
            ];
        }
        $saveJurusanLowongan = JurusanLowonganModel::insert($jurusan_lowongan);
        if ($saveLowongan and $saveJurusanLowongan) {
            return redirect()->back()->with('success', 'Lowongan berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Lowongan gagal ditambahkan');
        }
    }
    //edit lowongan
    public function editLowongan($id)
    {
        $lowongan = LowonganModel::find($id);
        if ($lowongan == null) {
            return redirect()->back()->with('error', 'Lowongan tidak ditemukan');
        }
        $data  = [
            'lowongan' => $lowongan,
            'perusahaan' => DataPerusahaanModel::where('id_user', Auth::user()->id)->first(),
        ];
        return view('Perusahaan.edit_lowongan', $data);
    }
    public function updateLowongan(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'perusahaan' => 'required',
            'judul' => 'required|string',
            'deskripsi' => 'required',
            'gaji' => 'required',
            'lokasi' => 'required|string',
            'penempatan' => 'required|string',
            'tanggal' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $id_perusahaan = DataPerusahaanModel::where('id_user', Auth::user()->id)->first()->id;
        $save = [
            'id_perusahaan' => $id_perusahaan,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gaji' => $request->gaji,
            'lokasi' => $request->lokasi,
            'penempatan' => $request->penempatan,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ];
        $lowongan = LowonganModel::find($request->id);
        if ($lowongan == null) {
            return redirect()->back()->with('error', 'Lowongan tidak ditemukan');
        }
        $saveLowongan = $lowongan->update($save);
        $jurusan_lowongan = [];
        foreach ($request->jurusan as $jurusan_dibutuhkan) {
            $jurusan_lowongan[] = [
                'id_lowongan' => $lowongan->id,
                'id_jurusan' => $jurusan_dibutuhkan
            ];
        }
        $saveJurusanLowongan = JurusanLowonganModel::where('id_lowongan', $lowongan->id)->delete();
        $saveJurusanLowongan = JurusanLowonganModel::insert($jurusan_lowongan);
        if ($saveLowongan and $saveJurusanLowongan) {
            return redirect()->back()->with('success', 'Lowongan berhasil di edit');
        } else {
            return redirect()->back()->with('error', 'Lowongan gagal di edit');
        }
    }
    //hapus lowongan
    public function hapusLowongan($id)
    {
        $lowongan = LowonganModel::find($id);
        if ($lowongan == null) {
            return redirect()->back()->with('error', 'Lowongan tidak ditemukan');
        }
        if ($lowongan->delete()) {
            return redirect()->back()->with('success', 'Lowongan berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Lowongan gagal dihapus');
        }
    }
    //tutup lowongan
    public function tutupLowongan($id)
    {
        $lowongan = LowonganModel
            ::where('id', $id)
            ->where('id_pembuat', Auth::user()->id)
            ->first();
        if ($lowongan == null) {
            return redirect()->back()->with('error', 'Lowongan tidak ditemukan');
        }
        $lowongan->status = 0;
        if ($lowongan->save()) {
            return redirect()->back()->with('success', 'Lowongan berhasil ditutup');
        } else {
            return redirect()->back()->with('error', 'Lowongan gagal ditutup');
        }
    }
    //aktifkan lowongan
    public function aktifkanLowongan($id)
    {
        $lowongan = LowonganModel
            ::where('id', $id)
            ->where('id_pembuat', Auth::user()->id)
            ->first();
        if ($lowongan == null) {
            return redirect()->back()->with('error', 'Lowongan tidak ditemukan');
        }
        $lowongan->status = 1;
        if ($lowongan->save()) {
            return redirect()->back()->with('success', 'Lowongan berhasil diaktifkan');
        } else {
            return redirect()->back()->with('error', 'Lowongan gagal diaktifkan');
        }
    }
    public function pelamarKerja($id_lowongan)
    {
        $data = [
            'pelamar' => PelamarModel::join('users', 'users.id', '=', 'pelamar_kerja.id_user')
                ->join('lowongan', 'lowongan.id', '=', 'pelamar_kerja.id_lowongan')
                ->join('data_siswa', 'data_siswa.id_user', '=', 'pelamar_kerja.id_user')
                ->select('pelamar_kerja.*', 'pelamar_kerja.id_user as id_user', 'users.email', 'lowongan.judul', 'data_siswa.*')
                ->where('id_lowongan', $id_lowongan)
                ->get()
        ];
        return view('Perusahaan.pelamar_kerja', $data);
    }
    public function viewPelamarKerja($id_lowongan, $id_user)
    {
        $pelamar = PelamarModel::join('users', 'users.id', '=', 'pelamar_kerja.id_user')
            ->join('lowongan', 'lowongan.id', '=', 'pelamar_kerja.id_lowongan')
            ->join('data_siswa', 'data_siswa.id_user', '=', 'pelamar_kerja.id_user')
            ->select('pelamar_kerja.*', 'users.email', 'lowongan.judul', 'data_siswa.*')
            ->where(['id_lowongan' => $id_lowongan, 'data_siswa.id_user' => $id_user])
            ->first();
        if ($pelamar == null) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
        $data = [
            'pelamar' => $pelamar,
            'id_lowongan' => $id_lowongan
        ];
        return view('Perusahaan.view_pelamar_kerja', $data);
    }
    //terima pelamar
    public function terimaPelamarKerja($id_lowongan, $id_user)
    {
        $pelamar = PelamarModel::where(['id_lowongan' => $id_lowongan, 'id_user' => $id_user])->first();
        if ($pelamar == null) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
        $pelamar->status = 2;
        if ($pelamar->save()) {
            return redirect()->back()->with('success', 'Berhasil menerima pelamar');
        } else {
            return redirect()->back()->with('error', 'Gagal menerima pelamar');
        }
    }
    //tolak pelamar
    public function tolakPelamarKerja($id_lowongan, $id_user)
    {
        $pelamar = PelamarModel::where(['id_lowongan' => $id_lowongan, 'id_user' => $id_user])->first();
        if ($pelamar == null) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
        $pelamar->status = 3;
        if ($pelamar->save()) {
            return redirect()->back()->with('success', 'Berhasil menolak pelamar');
        } else {
            return redirect()->back()->with('error', 'Gagal menolak pelamar');
        }
    }
    public function batalTerimaPelamarKerja($id_lowongan, $id_user)
    {
        $pelamar = PelamarModel::where(['id_lowongan' => $id_lowongan, 'id_user' => $id_user])->first();
        if ($pelamar == null) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
        $pelamar->status = 1;
        if ($pelamar->save()) {
            return redirect()->back()->with('success', 'Berhasil membatalkan penerimaan pelamar');
        } else {
            return redirect()->back()->with('error', 'Gagal membatalkan penerimaan pelamar');
        }
    }
    public function batalTolakPelamarKerja($id_lowongan, $id_user)
    {
        $pelamar = PelamarModel::where(['id_lowongan' => $id_lowongan, 'id_user' => $id_user])->first();
        if ($pelamar == null) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
        $pelamar->status = 1;
        if ($pelamar->save()) {
            return redirect()->back()->with('success', 'Berhasil membatalkan penolakan pelamar');
        } else {
            return redirect()->back()->with('error', 'Gagal membatalkan penolakan pelamar');
        }
    }
}
