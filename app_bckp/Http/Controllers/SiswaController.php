<?php

namespace App\Http\Controllers;

use App\Models\User;
use Termwind\Components\Dd;
use App\Models\PelamarModel;
use Illuminate\Http\Request;
use App\Models\LowonganModel;
use App\Models\DataSiswaModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        return view('Siswa.index');
    }
    public function profile()
    {
        $data = [
            'siswa' => DataSiswaModel::join('users', 'users.id', '=', 'data_siswa.id_user')
                ->where('id_user', Auth::user()->id)
                ->select('data_siswa.*', 'users.*')
                ->first(),
        ];
        return view('Siswa.profile', $data);
    }
    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nisn' => 'required|numeric',
            'no_induk' => 'required|numeric',
            'komli' => 'required',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir'  => 'required',
            'kelamin'  => 'required|string',
            'no_telp'  => 'required',
            'kecamatan'  => 'required|string',
            'kabupaten'  => 'required|string',
            'tahun_masuk'  => 'required|string',
            'alamat'  => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $foto = $request->file('foto');
        if ($foto == null) {
            $moveFoto = true;
            if (Auth::user()->foto == 'default.jpg') {
                $fotoName = 'default.jpg';
            } else {
                $fotoName = Auth::user()->foto_profile;
            }
        } else {
            $fotoName = "foto_profile_" . rand(0, 9999) . time() . '.' . $foto->getClientOriginalExtension();
            $moveFoto = $foto->move('assets/images/profile', $fotoName);
        }
        $updateUser = User::find(Auth::user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => ($request->password == null) ? Auth::user()->password : bcrypt($request->password),
            'foto_profile' => $fotoName
        ]);
        $update = [
            'nama_siswa' => $request->name,
            'nisn' => $request->nisn,
            'no_induk' => $request->no_induk,
            'id_komli' => $request->komli,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'kelamin'  => $request->kelamin,
            'no_telp'  => $request->no_telp,
            'kecamatan'  => $request->kecamatan,
            'kabupaten'  => $request->kabupaten,
            'tahun_masuk'  => $request->tahun_masuk,
            'alamat'  => $request->alamat,
        ];
        if ($updateUser and $moveFoto and DataSiswaModel::where('id_user', Auth::user()->id)->update($update)) {
            $user = Auth::user();
            $user->name = $request->nama;
            $user->foto_profile = $fotoName;
            return redirect()->back()->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->back()->with('error', 'Data gagal diubah');
        }
    }
    public function lowongan()
    {
        $data = [
            'lowongan' => LowonganModel::join('data_perusahaan', 'lowongan.id_perusahaan', '=', 'data_perusahaan.id')->select(['data_perusahaan.*', 'lowongan.*'])->get()
        ];
        return view('Siswa.lowongan', $data);
    }
    public function viewLowongan($id)
    {
        if (LowonganModel::find($id) == null) {
            return redirect()->to(route('siswa.lowonganKerja'))->with('error', 'Lowongan tidak ditemukan');
        }
        $data = [
            'lowongan' => LowonganModel::join('data_perusahaan', 'lowongan.id_perusahaan', '=', 'data_perusahaan.id')->select(['data_perusahaan.*', 'lowongan.*'])->where('lowongan.id', $id)->get()[0]
        ];
        return view('Siswa.view_lowongam', $data);
    }
    public function daftarLowongan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cv' => 'required|file|mimes:pdf'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $cv = $request->file('cv');
        $cvName = "cv_" . rand(0, 9999) . time() . '.' . $cv->getClientOriginalExtension();
        $save = [
            'id_lowongan' => $request->id_lowongan,
            'id_user' => Auth::user()->id,
            'file_cv' => $cvName,
            'status' => 1
        ];
        if ($cv->move('assets/files/cv', $cvName) and PelamarModel::create($save)) {
            return redirect()->back()->with('success', 'Berhasil melamar pekerjaan, Silahkan tunggu informasi di web');
        } else {
            return redirect()->back()->with('error', 'Gagal malamar pekerjaan, Silahkan coba lagi');
        }
    }
}
