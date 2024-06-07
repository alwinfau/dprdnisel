<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response; //Untuk download file
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Models\Fraksi;
use App\Models\Akd;
use App\Models\Agenda;
use App\Models\AnggotaDewan;
use App\Models\Berita;
use App\Models\FrontenModel;
use App\Models\Jdih;
use App\Models\TransparansiAnggaran;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class FrontendController extends Controller
{

    public function __construct()
    {
        $this->Fraksi = new Fraksi();
        $this->Akd = new Akd();
        $this->Agenda = new Agenda();
        $this->Berita = new Berita();
        $this->FrontenModel = new FrontenModel();
        // $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Berita',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->Akd->tampilakd(),
            'semua_berita' => $this->Berita->semua_berita(),
            'tampil_slide_beritaumum' => $this->FrontenModel->berita_umum_slide(),
            'umum_berita' => $this->FrontenModel->umum_berita(),
            'berita_sekretariat_slide' => $this->FrontenModel->berita_sekretariat_slide(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'semuaakd' => $this->FrontenModel->semuaakd(),
            'datafraksi' => $this->FrontenModel->tampilfraksi(),
            'galeri_foto' => $this->FrontenModel->tampil_galeri_foto(),
            'galeri_video' => $this->FrontenModel->tampil_galeri_video(),
            'show_agenda_dprd' => $this->FrontenModel->show_agenda_dprd(),
            'show_agenda_sekretariat' => $this->FrontenModel->show_agenda_sekretariat(),
        ];

        // Untuk Menambhkan Jumlah Pengunjung Website
        $nilai = [
            'jlhpengunjung' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        DB::table('pengunjung')->insert($nilai);
        // Untuk Menambhkan Jumlah Pengunjung Website

        // Ini Untuk Grafiknya
        // Ini Untuk Pengunjung
        $pengunjung = DB::table('pengunjung')->select(DB::raw("CAST(SUM(jlhpengunjung) as int) as totalpengunjung"))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('totalpengunjung');

        $bulan = DB::table('pengunjung')->select(DB::raw("MONTHNAME(created_at) as bulan"))
            ->groupBy(DB::raw("MONTHNAME(created_at)"))
            ->pluck("bulan");
        // Ini Untuk Pengunjung
        // Ini Untuk Grafiknya

        return view('Frontend', $data, compact('pengunjung', 'bulan'));
    }

    public function sejarahdprd()
    {
        $data = [
            'title' => 'Sejarah',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'sejarahdprd' => $this->FrontenModel->sejarahdprd(),
        ];
        return view('frontsejarahdprd', $data);
    }

    public function tentangsetwan()
    {
        $data = [
            'title' => 'Sejarah',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'sejarahsekretariat' => $this->FrontenModel->sejarahsekretariat()
        ];
        return view('frontsejarahsekretariat', $data);
    }

    public function tampilkomisi()
    {
        $data = [
            'title' => 'Komisi Komisi',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'tampikomisi' => $this->FrontenModel->tampikomisi(),
            'tampilmitrakerja' => $this->FrontenModel->tampilmitrakerja()
        ];
        // dd($data);
        return view('frontkomisikomisi', $data);
    }

    public function tugasdprd()
    {
        $data = [
            'title' => 'Kedudukan, Tugas Pokok Serta Hak & Kewajiban',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'tugasdprd' => $this->FrontenModel->tugasdprd(),
        ];
        return view('fronttugasdprd', $data);
    }

    public function tugassekretariat()
    {
        $data = [
            'title' => 'Tugas Pokok dan Fungsi',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'tugassekretariat' => $this->FrontenModel->tugassekretariat(),
        ];
        return view('fronttugassekretariat', $data);
    }

    public function pimpinandprd()
    {
        $data = [
            'title' => 'Profil Pimpinan DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'pimpinandprd' => $this->FrontenModel->pimpinandprd(),
        ];
        return view('frontpimpinandprd', $data);
    }

    public function alldprd()
    {
        $data = [
            'title' => 'Profil Anggota DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'alldprd' => $this->FrontenModel->alldprd(),
        ];
        return view('frontalldprd', $data);
    }

    // masih Belum Selesai
    public function groupdapil()
    {
        $data = [
            'title' => 'DAFTAR ANGGOTA DPRD KABUPATEN NIAS SELATAN',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'groupdapil' => $this->FrontenModel->groupdapil(),
        ];
        return view('frontanggotadprd', $data);
    }

    public function perdapil($slugdapil)
    {
        $data = [
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'perdapil' => $this->FrontenModel->perdapil($slugdapil),
        ];
        return view('frontperdapil', $data);
    }
    // masih Belum Selesai

    public function detaildewan($slugnama)
    {
        $data = [
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'detaildewan' => $this->FrontenModel->detaildewan($slugnama),
        ];
        return view('frontdetaildewan', $data);
    }

    // Tata Tertip atau Perturan DPRD
    public function tatatertib()
    {
        $data = [
            'title' => 'Peraturan DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'tatatertib' => $this->FrontenModel->tatatertib(),
            'semuatatatertib' => $this->FrontenModel->semuatatatertib(),
        ];
        return view('fronttatatertib', $data);
    }

    public function perperaturan($slugkategori)
    {
        $data = [
            'title' => 'Tata Tertib DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'tatatertib' => $this->FrontenModel->tatatertib(),
            // 'semuatatatertib' => $this->FrontenModel->semuatatatertib(),
            'perperaturan' => $this->FrontenModel->perperaturan($slugkategori),
        ];
        return view('frontperperaturan', $data);
    }
    // Tata Tertip atau Perturan DPRD


    // Keputusan DPRD
    public function keputusandprd()
    {
        $data = [
            'title' => 'Keputusan DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'ketegorikeputusan' => $this->FrontenModel->kategorikeputusandprd(),
            'semuakeputusan' => $this->FrontenModel->semuakeputusan(),
        ];
        return view('frontkeputusandprd', $data);
    }

    public function perkeputusan($slugkategori)
    {
        $data = [
            'title' => 'Tata Tertib DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'ketegorikeputusan' => $this->FrontenModel->kategorikeputusandprd(),
            'perkeputusan' => $this->FrontenModel->perkategorikeputusan($slugkategori),
        ];
        return view('frontperkeputusandprd', $data);
    }
    // Keputusan DPRD


    // Berita Umum
    public function beritaumum()
    {
        $data = [
            'title' => 'Berita Umum DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'beritaumumslider' => $this->FrontenModel->beritaumumslider(),
            'beritaumum' => $this->FrontenModel->beritaumum(),
            'paginateberitaumum' => $this->FrontenModel->paginateberitaumum(),
        ];
        return view('frontberitaumum', $data);
    }
    // Berita Umum

    public function detailberitaumum($slug)
    {
        $data = [
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'beritaumumterkait' => $this->FrontenModel->beritaumumterkait(),
            'detailberita' => $this->FrontenModel->detailberita($slug),
        ];
        // DB::table('beritas')->where('slug', $slug)->increment('dilihat');
        return view('frontenddetailberita', $data);
    }


    // Berita Sekretariat
    public function beritasekretariat()
    {
        $data = [
            'title' => 'Berita Umum DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),

            'beritasekretariatslider' => $this->FrontenModel->beritasekretariatslider(),
            'beritasekretariat' => $this->FrontenModel->beritsekretariat(),
            'paginateberitasekretariat' => $this->FrontenModel->paginatesekretariat(),
        ];
        return view('frontberitasekretariat', $data);
    }

    public function detailberitasekretariat($slug)
    {
        $data = [
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'beritasekretariatterkait' => $this->FrontenModel->beritasekretariatterkait(),
            'detailberitasekretariat' => $this->FrontenModel->detailberita($slug),
        ];
        // DB::table('beritas')->where('slug', $slug)->increment('dilihat');
        return view('frontenddetailsekretariat', $data);
    }
    // Berita Sekretariat

    // Agenda DPRD dan Sekretariat
    public function agenda_dprd_all()
    {
        $data = [
            'title' => 'Agenda DPRD',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'agenda_drpd_all' => $this->FrontenModel->show_agenda_dprd_all()
        ];
        return view('frontallagendadprd', $data);
    }

    public function agenda_sekretariat_all()
    {
        $data = [
            'title' => 'Agenda Sekretariat',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'agenda_sekretariat_all' => $this->FrontenModel->show_agenda_sekretariat_all()
        ];
        return view('frontallagendasekretariat', $data);
    }
    // Agenda DPRD dan Sekretariat


    public function tampil_per_akd($slugakd)
    {
        $data = [
            'title' => 'Alat Kelengkapan Dewan Perwakilan Daerah Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'tampil_per_akd' => $this->FrontenModel->tampil_per_akd($slugakd)
        ];
        // dd($data);
        return view('frontenddetailakd', $data);
    }

    public function tampil_per_fraksi($slugfraksi)
    {
        $data = [
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'tampil_per_fraksi' => $this->FrontenModel->tampil_per_fraksi($slugfraksi)
        ];
        // dd($data);
        return view('frontdetailperfraksi', $data);
    }

    public function visimisisekretariat()
    {
        $data = [
            'title' => 'Visi Misi Sekretariat DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'visimisisekretariat' => $this->FrontenModel->visimisisekretariat(),
        ];
        return view('frontvisimisisekretariat', $data);
    }

    public function strukturorganisasi()
    {
        $data = [
            'title' => 'Visi Misi Sekretariat DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'strukturorganisasi' => $this->FrontenModel->visimisisekretariat(),
        ];
        return view('frontstrukturorganisasi', $data);
    }

    public function pejabatstruktural()
    {
        $data = [
            'title' => 'Pejabat Struktural DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'pejabatstruktural' => $this->FrontenModel->pejabatstruktural(),
        ];
        return view('frontstruktural', $data);
    }

    public function detailpejabatstruktural($slugstruktural)
    {
        $data = [
            'title' => 'Pejabat Struktural DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'detailpejabatstruktural' => $this->FrontenModel->detailpejabatstruktural($slugstruktural),
        ];
        return view('frontdetailstruktural', $data);
    }

    // Perintah Untuk Transparansi Anggran
    public function transparansianggaran()
    {
        $data = [
            'title' => 'Transparansi Anggaran DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'groupanggaran' => $this->FrontenModel->grouptransparansianggaran(),
            'transparansianggaran' => $this->FrontenModel->transparansianggaran(),
        ];
        return view('fronttransparansianggaran', $data);
    }

    public function perkategorianggaran($slugkategorianggaran)
    {
        $data = [
            'title' => 'Transparansi Anggaran DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'groupanggaran' => $this->FrontenModel->grouptransparansianggaran(),
            'perkategorianggaran' => $this->FrontenModel->perkategorianggaran($slugkategorianggaran),
        ];
        return view('frontperkategorianggaran', $data);
    }
    // Perintah Untuk Transparansi Anggran


    // Perintah Untuk Transparansi Anggran
    public function transparansikinerja()
    {
        $data = [
            'title' => 'Transparansi Kinerja DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'groupkinerja' => $this->FrontenModel->grouptransparansikinerja(),
            'transparansikinerja' => $this->FrontenModel->transparansikinerja(),
        ];
        return view('fronttransparansikinerja', $data);
    }

    public function perkategorikinerja($slugkategorikinerja)
    {
        $data = [
            'title' => 'Transparansi Kinerja DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'groupkinerja' => $this->FrontenModel->grouptransparansikinerja(),
            'perkategorikinerja' => $this->FrontenModel->perkategorikinerja($slugkategorikinerja),
        ];
        return view('frontperkategorikinerja', $data);
    }
    // Perintah Untuk Transparansi Anggran


    // Pengumuman
    public function pengumuman()
    {
        $data = [
            'title' => 'Pengumuman DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'grouppengumuman' => $this->FrontenModel->grouppengumuman(),
            'pengumuman' => $this->FrontenModel->pengumuman(),
        ];
        return view('frontpengumuman', $data);
    }

    public function perpengumuman($slugkategoripengumuman)
    {
        $data = [
            'title' => 'Pengumuman DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'grouppengumuman' => $this->FrontenModel->grouppengumuman(),
            'perpengumuman' => $this->FrontenModel->perpengumuman($slugkategoripengumuman),
        ];
        return view('frontperpengumuman', $data);
    }
    // Pengumuman

    // Formulir Kunjnungan
    public function formkunjungan()
    {
        $data = [
            'title' => 'FORMULIR KUNJUNGAN',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
        ];
        return view('frontkunjungan', $data);
    }


    public function kunjungan()
    {
        Request()->validate(
            [
                'namainstansi' => 'required',
                'kabupaten' => 'required',
                'provinsi' => 'required',
                'kategorikunjungan' => 'required',
                'kepada' => 'required',
                'akd' => 'required',
                'jumlahrombongan' => 'required',
                'tanggalkunjungan' => 'required',
                'jamkunjungan' => 'required',
                'keterangankunjungan' => 'required',
                'namanarahubung' => 'required',
                'noponsel' => 'required',
                'dokumenkunjungan' => 'required|mimes:pdf|max:1024',
            ],
            [
                'namainstansi.required' => 'Silahkan masukan nama instanasi/perusahaan terlbih dahulu..!!',
                'kabupaten.required' => 'Silahkan inputkan nama kabupaten terlebih dahulu..!!',
                'provinsi.required' => 'Silahkan inputkan provinsi terlebih dahulu..!!',
                'kategorikunjungan.required' => 'Silahkan pilih ketegori kunjunggan terlebih dahulu..!!',
                'kepada.required' => 'Silahkan pilih sasarn kunjungan terlebih dahulu..!!',
                'akd.required' => 'Silahkan pilih Alat Kelengkapan Dewan terlebih dahulu..!!',
                'jumlahrombongan.required' => 'Silahkan inputkan jumlah rombongan yang ingin berkunjung..!!',
                'tanggalkunjungan.required' => 'Silahkan masukan tanggal kunjungan terlebih dahulu..!!',
                'jamkunjungan.required' => 'Silahkan masukan jam berapa akan berkunnjung..!!',
                'keterangankunjungan.required' => 'Silahkan buat keterangan kunjungan terlebih dahulu..!!',
                'namanarahubung.required' => 'Silahkan masukan narahubung terlebih dahulu..!!',
                'noponsel.required' => 'Silahkan masukan No. Ponsel narahubung terlebih dahulu..!!',
                'dokumenkunjungan.required' => 'Silahkan file lampiran kunjungan terlebih dahulu..!!',
                'dokumenkunjungan.max' => 'Ukuran file lampiran kunjungan minimal 1MB',
                'dokumenkunjungan.mimes' => 'File lampiran kunjungan yang diupload harus berekstensi .Pdf'
            ]
        );

        $file = Request()->dokumenkunjungan;
        $name_file = time() . str_replace("", "", $file->getClientOriginalName());
        $file->move('dokumen kunjungan', $name_file);

        $data = [
            'instansi' => Request()->namainstansi,
            'kabupaten' => Request()->kabupaten,
            'provinsi' => Request()->provinsi,
            'kategorikunjungan' => Request()->kategorikunjungan,
            'kepada' => Request()->kepada,
            'akd' => Request()->akd,
            'jumlahrombongan' => Request()->jumlahrombongan,
            'tglkedatangan' => Request()->tanggalkunjungan,
            'jam' => Request()->jamkunjungan,
            'keterangankunjungan' => Request()->keterangankunjungan,
            'koordinator' => Request()->namanarahubung,
            'noponsel' => Request()->noponsel,
            'dokumenkunjungan' => $name_file,
            'statuskunjungan' => "Pending",
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->FrontenModel->simpankunjungan($data);
        return redirect()->route('formkunjungan')->with('save', 'Pengajuan kunjungan berhasil terkirim..!!');
    }
    // Formulir Kunjnungan


    // Galeri
    public function galerifoto()
    {
        $data = [
            'title' => 'Galeri Foto DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'galerifoto' => $this->FrontenModel->galerifoto(),
        ];
        return view('frontgalerifoto', $data);
    }

    public function pergalerifoto($sluggaleri)
    {
        $data = [
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'pergalerifoto' => $this->FrontenModel->pergalerifoto($sluggaleri),
        ];
        return view('frontdetailgaleri', $data);
    }


    public function galerivideo()
    {
        $data = [
            'title' => 'Galeri Video DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'galerivideo' => $this->FrontenModel->galerivideo(),
        ];
        return view('frontgalerivideo', $data);
    }

    public function pergalerivideo($sluggaleri)
    {
        $data = [
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'pergalerivideo' => $this->FrontenModel->pergalerivideo($sluggaleri),
        ];
        return view('frontdetailgalerivideo', $data);
    }

    public function livestreaming()
    {
        $data = [
            'title' => 'Live Streaming DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'galerilive' => $this->FrontenModel->galerilive(),
        ];
        return view('frontgalerilive', $data);
    }
    // Galeri


    // PPID
    public function frontppid()
    {
        $data = [
            'title' => 'PPID DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'groupppid' => $this->FrontenModel->groupppid(),
            'semuappid' => $this->FrontenModel->semuappid(),
        ];
        return view('frontppid', $data);
    }

    public function perkategorippid($slugkategorippid)
    {
        $data = [
            'title' => 'DPPID DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'groupppid' => $this->FrontenModel->groupppid(),
            'perkategorippid' => $this->FrontenModel->perkategorippid($slugkategorippid),
        ];
        return view('frontperkategorippid', $data);
    }
    // PPID


    // FAQ
    public function frontfaq()
    {
        $data = [
            'title' => 'PUSAT BANTUAN',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'faq' => $this->FrontenModel->faq(),
        ];
        return view('frontfaq', $data);
    }
    // FAQ


    // JDIH
    public function datajdih()
    {
        $data = [
            'title' => 'JDIH DPRD Kabupaten Nias Selatan',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'datajdih' => $this->FrontenModel->datajdih(),
        ];
        return view('frontjdih', $data);
    }

    public function perjdih($slugjdih)
    {
        $data = [
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
            'perjdih' => $this->FrontenModel->perjdih($slugjdih),
        ];

        DB::table('jdihs')->where('slugjdih', $slugjdih)->increment('dilihat');
        DB::table('jdihs')->where('slugjdih', $slugjdih)->increment('didownload');
        return view('frontperjdih', $data);
    }
    // Data JDIH

    public function cari(Request $request)
    {
        $cari = $request->katacari;
        $berita = DB::table('beritas')->where('judulberita', 'like', "%" . $cari . "%")->paginate(10);

        $data = [
            'title' => 'Hasil Pencarian',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'dataakd' => $this->FrontenModel->tampilakd(),
        ];
        return view('hasilpencarian', ['berita' => $berita], $data);
    }
}
