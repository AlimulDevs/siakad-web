<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\NilaiAkhir;
use App\Models\Siswa;
use App\Models\WaktuJadwal;
use Illuminate\Http\Request;

class ViewWebController extends Controller
{
    public function loginIndex()
    {
        return view('auth.login');
    }

    public function registerIndex()
    {
        return view('auth.register');
    }
    public function berandaView()
    {
        return view('beranda.index');
    }


    public function guruIndex()
    {
        $data_guru = Guru::get();
        return view('guru.index', compact("data_guru"));
    }
    public function guruCreateIndex()
    {

        return view('guru.create',);
    }
    public function guruEditIndex($id)
    {
        $data_guru = Guru::where("id", $id)->get();
        return view('guru.edit', compact("data_guru"));
    }

    public function siswaIndex()
    {
        $data_siswa = Siswa::with("jurusan")->get();
        return view('siswa.index', compact("data_siswa"));
    }
    public function siswaCreateIndex()
    {
        $data_kelas = Kelas::get();
        $data_jurusan = Jurusan::get();
        return view('siswa.create', compact("data_kelas", "data_jurusan"));
    }
    public function siswaEditIndex($id)
    {
        $data_siswa = Siswa::where("id", $id)->get();
        $data_kelas = Kelas::get();
        $data_jurusan = Jurusan::get();
        return view('siswa.edit', compact("data_siswa", "data_kelas", "data_jurusan"));
    }
    public function siswaUjianIndex($id)
    {
        $data_siswa = Siswa::where("id", $id)->get();
        $data_nilai_akhir = NilaiAkhir::where("siswa_id", $id)->get();

        return view('siswa.ujian.index', compact("data_siswa", "data_nilai_akhir", "id"));
    }
    public function siswaUjianCreateIndex($siswa_id)
    {

        $data_mata_pelajaran = MataPelajaran::get();

        return view('siswa.ujian.create', compact("data_mata_pelajaran", "siswa_id",));
    }
    public function kelasIndex()
    {
        $data_kelas = Kelas::get();
        return view('kelas.index', compact("data_kelas"));
    }
    public function kelasSiswaIndex($kelas_id)
    {
        $data_siswa = Siswa::where("kelas_id", $kelas_id)->get();
        return view('kelas.siswa.index', compact("data_siswa", "kelas_id"));
    }
    public function kelasSiswaCreateIndex($kelas_id)
    {

        $data_jurusan = Jurusan::get();
        return view('kelas.siswa.create', compact("kelas_id", "data_jurusan",));
    }
    public function kelasCreateIndex()
    {


        return view('kelas.create',);
    }
    public function kelasEditIndex($id)
    {
        $data_kelas = Kelas::where("id", $id)->get();
        return view('kelas.edit', compact("data_kelas"));
    }
    public function mataPelajaranIndex()
    {
        $data_mata_pelajaran = MataPelajaran::with("jurusan")->get();
        return view('mata-pelajaran.index', compact("data_mata_pelajaran"));
    }
    public function mataPelajaranCreateIndex()
    {

        $data_jurusan = Jurusan::get();
        return view('mata-pelajaran.create', compact("data_jurusan"));
    }
    public function mataPelajaranEditIndex($id)
    {
        $data_mata_pelajaran = MataPelajaran::where("id", $id)->get();
        $data_jurusan = Jurusan::get();
        return view('mata-pelajaran.edit', compact("data_mata_pelajaran", "data_jurusan"));
    }
    public function jadwalIndex()
    {
        $data_jadwal = Jadwal::get();
        return view('jadwal.index', compact("data_jadwal"));
    }
    public function WaktuJadwalIndex($jadwal_id)
    {
        $data_waktu_jadwal = WaktuJadwal::where("jadwal_id", $jadwal_id)->with("jadwal")->get();
        return view('jadwal.waktu-jadwal.index', compact("data_waktu_jadwal", "jadwal_id"));
    }
    public function WaktuJadwalCreateIndex($jadwal_id)
    {

        return view('jadwal.waktu-jadwal.create', compact("jadwal_id"));
    }
    public function jadwalCreateIndex()
    {
        $data_guru = Guru::get();
        $data_kelas = Kelas::get();
        $data_mata_pelajaran = MataPelajaran::get();

        return view('jadwal.create', compact("data_guru", "data_kelas", "data_mata_pelajaran"));
    }
    public function jadwalEditIndex($id)
    {
        $data_guru = Guru::get();
        $data_kelas = Kelas::get();
        $data_mata_pelajaran = MataPelajaran::get();
        $data_jadwal = Jadwal::where("id", $id)->get();

        return view('jadwal.edit', compact("data_guru", "data_kelas", "data_mata_pelajaran", "data_jadwal"));
    }


    public function jurusanIndex()
    {
        $data_jurusan = Jurusan::get();
        return view('jurusan.index', compact("data_jurusan"));
    }
    public function jurusanCreateIndex()
    {


        return view('jurusan.create',);
    }
    public function jurusanEditIndex($id)
    {
        $data_jurusan = Jurusan::where("id", $id)->get();
        return view('jurusan.edit', compact("data_jurusan"));
    }
}
