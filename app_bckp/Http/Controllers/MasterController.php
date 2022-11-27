<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MisiModel;
use App\Models\NewsModel;
use App\Models\VisiModel;
use App\Models\MottoModel;
use Illuminate\Support\Str;
use App\Models\GalleryModel;
use Illuminate\Http\Request;
use App\Models\LowonganModel;
use App\Models\StrukturModel;
use App\Models\PerusahaanModel;
use App\Models\ProgramKerjaModel;
use App\Models\SambutanKepsekModel;
use App\Models\JurusanLowonganModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MasterController extends Controller
{
    public function index()
    {
        return view('Master.index');
    }
    public function profile()
    {
        $data = [
            'profile' => User::find(Auth::user()->id)
        ];
        return view('Master.profile', $data);
    }
    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'email|required',
            'password' => 'min:6',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $foto = $request->file('foto');
        $fotoName = 'foto_profile_' . rand(1, 99999) . '_' . time() . '.' . $foto->extension();
        $update = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => ($request->password == null ? Auth::user()->password : $request->password),
            'foto_profile' => $fotoName
        ];
        if ($foto->move('assets/images/profile', $fotoName) and User::find(Auth::user()->id)->update($update)) {
            Auth::user()->name = $request->name;
            Auth::user()->email = $request->email;
            Auth::user()->password = ($request->password == null ? Auth::user()->password : $request->password);
            Auth::user()->foto_profile = $fotoName;

            return redirect()->back()->with('success', 'Profile berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'Profile gagal diupdate');
        }
    }
    public function visi()
    {
        $data = [
            'visi' => VisiModel::orderBy('id', 'DESC')->first()
        ];
        return view('Master.visi', $data);
    }
    public function updateVisi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'visi' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $data = [
            'visi' => $request->visi
        ];
        if (VisiModel::orderBy('id', 'DESC')->first()->update($data)) {
            return redirect()->back()->with('success', 'Visi berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'Visi gagal diupdate');
        }
    }
    public function misi()
    {
        $data = [
            'misi' => MisiModel::orderBy('id', 'DESC')->first()
        ];
        return view('Master.misi', $data);
    }
    public function updateMisi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'misi' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $data = [
            'misi' => $request->misi
        ];
        if (MisiModel::orderBy('id', 'DESC')->first()->update($data)) {
            return redirect()->back()->with('success', 'Misi berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'Misi gagal diupdate');
        }
    }
    public function mottoBkk()
    {
        $data = [
            'motto' => MottoModel::orderBy('id', 'DESC')->first()
        ];
        return view('Master.motto', $data);
    }
    public function updateMottoBkk(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'motto' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $data = [
            'motto' => $request->motto
        ];
        if (MottoModel::orderBy('id', 'DESC')->first()->update($data)) {
            return redirect()->back()->with('success', 'Motto berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'Motto gagal diupdate');
        }
    }
    public function strukturBkk()
    {
        $data = [
            'struktur' => StrukturModel::orderBy('id', 'DESC')->first()
        ];
        return view('Master.struktur_bkk', $data);
    }

    public function updateStrukturBkk(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'struktur' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $struktur = $request->file('struktur');
        $strukturName = 'struktur_' . rand(1, 99999) . '_' . time() . '.' . $struktur->extension();
        $save = [
            'struktur_photo' => $strukturName
        ];
        if ($struktur->move('assets/images/struktur', $strukturName) and StrukturModel::orderBy('id', 'DESC')->first()->update($save)) {
            return redirect()->back()->with('success', 'Struktur berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'Struktur gagal diupdate');
        }
    }


    // Perusahaan
    public function perusahaan()
    {
        $data = [
            'data_perusahaan' => PerusahaanModel::all()
        ];
        return view('Master.perusahaan', $data);
    }
    public function tambahPerusahaanAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'kode' => 'required',
            'alamat' => 'required|string',
            'kota' => 'required|string',
            'email' => 'required|email',
            'no_telp' => 'required',
            'tahun_gabung' => 'required|integer',
            'status_mou' => 'required',
            'status_umkm' => 'required',
            'standar' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        if ($request->file('mou_file') == null) {
            $saveMouFile = true;
            $mouFileName = null;
        } else {
            $mouFile = $request->file('mou_file');
            $mouFileName = 'mou_' . rand(1, 99999) . '_' . time() . '.' . $mouFile->extension();
            $saveMouFile = $mouFile->move('assets/files/mou', $mouFileName);
        }
        $user = [
            'name' => $request->nama,
            'foto_profil' => 'default.png',
            'email' => $request->email,
            'password' => Hash::make($request->kode),
            'role' => 2
        ];
        $user = User::create($user);
        $save = [
            'id_user' => $user->id,
            'nama' => $request->nama,
            'kode' => $request->kode,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'tahun_gabung' => $request->tahun_gabung,
            'mou' => $request->status_mou,
            'status_umkm' => $request->status_umkm,
            'mou_file' => $mouFileName,
            'standar' => $request->standar,
            'umkm' => $request->status_umkm
        ];
        if ($saveMouFile and PerusahaanModel::create($save) and $user) {
            return redirect()->back()->with('success', 'Perusahaan berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Perusahaan gagal ditambahkan');
        }
    }
    public function hapusPerusahaan($id)
    {
        $data = PerusahaanModel::find($id);
        if (!$data == null) {
            if (PerusahaanModel::destroy($id)) {
                return redirect()->back()->with('success', 'Perusahaan berhasil dihapus');
            } else {
                return redirect()->back()->with('error', 'Perusahaan gagal dihapus');
            }
        } else {
            return redirect()->back()->with('error', 'Perusahaan tidak di temukan');
        }
    }
    public function editPerusahaan($idPerusahaan)
    {
        $perusahaan = PerusahaanModel::find($idPerusahaan);
        if ($perusahaan == null) {
            return redirect()->back()->with('error', 'Perusahaan tidak ditemukan');
        }
        $data = [
            'perusahaan' => $perusahaan
        ];
        return view('Master.edit_perusahaan', $data);
    }
    public function updatePerusahaan(Request $request)
    {
        $perusahaan = PerusahaanModel::find($request->idPerusahaan);
        if ($perusahaan == null) {
            return redirect()->back()->with('error', 'Perusahaan tidak ditemukan');
        }
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'kode' => 'required',
            'alamat' => 'required|string',
            'kota' => 'required|string',
            'email' => 'required|email',
            'no_telp' => 'required',
            'tahun_gabung' => 'required|integer',
            'status_mou' => 'required',
            'status_umkm' => 'required',
            'standar' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        if ($request->file('mou_file') == null) {
            $saveMouFile = true;
            $mouFileName = $perusahaan->mou_file;
        } else {
            $mouFile = $request->file('mou_file');
            $mouFileName = 'mou_' . rand(1, 99999) . '_' . time() . '.' . $mouFile->extension();
            $saveMouFile = $mouFile->mov('assets/files/mou', $mouFileName);
        }
        $save = [
            'nama' => $request->nama,
            'kode' => $request->kode,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'tahun_gabung' => $request->tahun_gabung,
            'mou' => $request->status_mou,
            'status_umkm' => $request->status_umkm,
            'mou_file' => $mouFileName,
            'standar' => $request->standar,
            'umkm' => $request->status_umkm
        ];
        $user = [
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->kode),
        ];

        if ($saveMouFile and $perusahaan->update($save) and User::find($perusahaan->id_user)->update($user)) {
            return redirect()->back()->with('success', 'Perusahaan berhasil di edit');
        } else {
            return redirect()->back()->with('error', 'Perusahaan gagal di edit');
        }
    }

    //lowongan
    public function lowongan()
    {
        $data = [
            'data_perusahaan' => PerusahaanModel::all(),
            'lowongan_data' => PerusahaanModel::join('lowongan', 'data_perusahaan.id', '=', 'lowongan.id_perusahaan')->get()
        ];
        return view('Master.lowongan', $data);
    }
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
        $save = [
            'id_pembuat' => Auth::user()->id,
            'id_perusahaan' => $request->perusahaan,
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
    public function viewLowongan($id)
    {
        $lowongan = LowonganModel::find($id);
        if ($lowongan == null) {
            return redirect()->back()->with('error', 'Lowongan tidak ditemukan');
        }
        $data = [
            'lowongan' => $lowongan
        ];
        return view('Master.view_lowongan', $data);
    }
    public function editLowongan($id)
    {
        $lowongan = LowonganModel::find($id);
        if ($lowongan == null) {
            return redirect()->back()->with('error', 'Lowongan tidak ditemukan');
        }
        $data  = [
            'lowongan' => $lowongan
        ];
        return view('Master.edit_lowongan', $data);
    }
    public function updateLowongan(Request $request)
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
        $save = [
            'id_perusahaan' => $request->perusahaan,
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
    public function programkerja()
    {
        $data = [
            'programkerja' => ProgramKerjaModel::orderBy('id', 'DESC')->first()
        ];
        return view('Master.programkerja', $data);
    }
    public function updateProgramkerja(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'programkerja' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $save = [
            'programkerja' => $request->programkerja
        ];
        $programkerja = ProgramKerjaModel::orderBy('id', 'DESC')->first();
        if ($programkerja->update($save)) {
            return redirect()->back()->with('success', 'Program kerja berhasil di update');
        } else {
            return redirect()->back()->with('error', 'Program kerja gagal di update');
        }
    }

    //sambutan kepala sekolah
    public function sambutankepalasekolah()
    {
        $data = [
            'kepalasekolah' => SambutanKepsekModel::orderBy('id', 'DESC')->first()
        ];
        return view('Master.sambutan_kepala_sekolah', $data);
    }
    public function updateSambutankepalasekolah(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sambutan' => 'required',
            'nama' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $foto = $request->file('foto');
        if ($foto) {
            $fotoName = 'kepsek_' . rand(1, 99999) . '_' . time() . '.' . $foto->extension();
            $moveFoto = $foto->move('assets/images/kepsek', $fotoName);
            $save = [
                'sambutan' => $request->sambutan,
                'nama' => $request->nama,
                'foto' => $fotoName
            ];
        } else {
            $moveFoto = true;
            $save = [
                'sambutan' => $request->sambutan,
                'nama' => $request->nama,
            ];
        }
        $kepalasekolah = SambutanKepsekModel::orderBy('id', 'DESC')->first();
        if ($kepalasekolah->update($save) and $moveFoto) {
            return redirect()->back()->with('success', 'Sambutan kepala sekolah berhasil di update');
        } else {
            return redirect()->back()->with('error', 'Sambutan kepala sekolah gagal di update');
        }
    }
    public function berita()
    {
        $data = [
            'data_berita' => NewsModel::all()
        ];
        return view('Master.berita', $data);
    }
    public function tambahBerita()
    {
        return view('Master.tambah_berita');
    }
    public function tambahBeritaAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string',
            'isi' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $save = [
            'id_user' => Auth::user()->id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'slug' => Str::slug($request->judul),
            'created_at' => date('Y-m-d H:i:s')
        ];

        if (NewsModel::insert($save)) {
            return redirect()->to(route('master.berita'))->with('success', 'Tambah berita sukses');
        } else {
            return redirect()->back()->with('error', 'Tambah berita gagal');
        }
    }
    public function editBerita($id)
    {
        $data = [
            'berita' => NewsModel::find($id)
        ];
        return view('Master.edit_berita', $data);
    }
    public function updateBerita(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'string|required',
            'isi'   => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $update = [
            'judul' => $request->judul,
            'isi'   => $request->isi,
            'slug' => Str::slug($request->judul),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        if (NewsModel::find($request->id)->update($update)) {
            return redirect()->back()->with('success', 'Update berita sukses');
        } else {
            return redirect()->back()->with('error', 'Update berita gagal');
        }
    }
    public function hapusBerita($id)
    {
        if (NewsModel::find($id)->delete()) {
            return redirect()->back()->with('success', 'Hapus berita sukses');
        } else {
            return redirect()->back()->with('error', 'Hapus berita gagal');
        }
    }
    public function gallery()
    {
        $data = [
            'data_gallery' => GalleryModel::all()
        ];
        return view('Master.gallery', $data);
    }
    public function tambahFoto(Request $request)
    {
        if ($request->type == 1) {
            $validator = Validator::make($request->all(), [
                'judul' => 'required|string',
                'deskripsi' => 'required|string',
                'foto' => 'required|image|mimes:png,jpg,svg,jpeg,gif'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            }
            $file = $request->file('foto');
            if ($file == null) {
                $fileName = null;
                $moveFoto = true;
            } else {
                $fileName = 'gallery_' . rand(1, 99999) . '_' . time() . '.' . $file->extension();
                $moveFoto = $file->move('assets/images/gallery', $fileName);
            }
            $save = [
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'name' => $fileName,
                'type' => $request->type
            ];
            if (GalleryModel::insert($save) and $moveFoto) {
                return redirect()->back()->with('success', 'Tambah gallery sukses');
            } else {
                return redirect()->back()->with('error', 'Tambah gallery gagal');
            }
        } elseif ($request->type == 2) {
            $validator = Validator::make($request->all(), [
                'judul' => 'required|string',
                'deskripsi' => 'required|string',
                'video' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            }
            $save = [
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'name' => $request->video,
                'type' => $request->type
            ];
            if (GalleryModel::insert($save)) {
                return redirect()->back()->with('success', 'Tambah gallery sukses');
            } else {
                return redirect()->back()->with('error', 'Tambah gallery gagal');
            }
        }
    }
    public function hapusFoto($id)
    {
        if (GalleryModel::find($id) == null) {
            return redirect()->back()->with('error', 'Foto tidak ditemukan');
        }
        $foto = GalleryModel::find($id);
        if ($foto->type == 1) {
            if (GalleryModel::find($id)->delete() and unlink('assets/images/gallery/' . $foto->name)) {
                return redirect()->back()->with('success', 'Hapus foto sukses');
            } else {
                return redirect()->back()->with('error', 'Hapus foto gagal');
            }
        } else {
            if (GalleryModel::find($id)->delete()) {
                return redirect()->back()->with('success', 'Hapus foto sukses');
            } else {
                return redirect()->back()->with('error', 'Hapus foto gagal');
            }
        }
    }
    public function editFoto($id)
    {
        if (GalleryModel::find($id) == null) {
            return redirect()->back()->with('error', 'Foto tidak ditemukan');
        }
        $data = [
            'foto' => GalleryModel::find($id)
        ];
        return view('Master.edit_foto', $data);
    }
    public function updateFoto(Request $request)
    {
        if ($request->type == 1) {
            $validator = Validator::make($request->all(), [
                'judul' => 'required|string',
                'deskripsi' => 'required|string',
                'foto' => 'image|mimes:png,jpg,svg,jpeg,gif'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            }
            $file = $request->file('foto');
            if ($file == null) {
                $fileName = GalleryModel::find($request->id)->name;
                $moveFoto = true;
            } else {
                $fileName = 'gallery_' . rand(1, 99999) . '_' . time() . '.' . $file->extension();
                $moveFoto = $file->move('assets/images/gallery', $fileName);
            }
            $save = [
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'name' => $fileName,
                'type' => $request->type
            ];
            if (GalleryModel::find($request->id)->update($save) and $moveFoto) {
                return redirect()->back()->with('success', 'Edit gallery sukses');
            } else {
                return redirect()->back()->with('error', 'Edit gallery gagal');
            }
        } elseif ($request->type == 2) {
            $validator = Validator::make($request->all(), [
                'judul' => 'required|string',
                'deskripsi' => 'required|string',
                'video' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            }
            $save = [
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'name' => $request->video,
                'type' => $request->type
            ];
            if (GalleryModel::find($request->id)->update($save)) {
                return redirect()->back()->with('success', 'Edit gallery sukses');
            } else {
                return redirect()->back()->with('error', 'Edit gallery gagal');
            }
        }
    }
}
