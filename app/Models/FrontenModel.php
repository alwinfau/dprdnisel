<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class FrontenModel extends Model
{
    use HasFactory;

    public function sejarahdprd()
    {
        return DB::table('sejarahs')
            ->where('kategori', 'DPRD')
            ->get();
    }

    public function sejarahsekretariat()
    {
        return DB::table('sejarahs')
            ->where('kategori', 'Sekretariat')
            ->get();
    }

    public function tugasdprd()
    {
        return DB::table('tugas_pokoks')
            ->where('kategoritugas', 'DPRD')
            ->get();
    }

    public function tugassekretariat()
    {
        return DB::table('tugas_pokoks')
            ->where('kategoritugas', 'Sekretariat')
            ->get();
    }

    public function pimpinandprd()
    {
        return DB::table('anggota_dewans')
            ->join('akds', 'akds.id', '=', 'anggota_dewans.idakd')
            ->select('anggota_dewans.*', 'akds.akd')
            ->orderBy('anggota_dewans.id', 'asc')
            ->get();
    }

    public function alldprd()
    {
        return DB::table('anggota_dewans')
            ->join('akds', 'akds.id', '=', 'anggota_dewans.idakd')
            ->select('anggota_dewans.*', 'akds.akd')
            ->orderBy('anggota_dewans.id', 'asc')
            ->get();
    }

    public function detaildewan($slugnama)
    {
        return DB::table('anggota_dewans')
            ->join('users', 'users.id', '=', 'anggota_dewans.iduser')
            ->join('fraksis', 'fraksis.id', '=', 'anggota_dewans.idfraksi')
            ->join('dapils', 'dapils.id', '=', 'anggota_dewans.iddapil')
            ->join('akds', 'akds.id', '=', 'anggota_dewans.idakd')
            ->select('anggota_dewans.*', 'users.name', 'fraksis.fraksi', 'dapils.dapil', 'dapils.kecamatan', 'akds.akd')
            ->where('anggota_dewans.slugnama', $slugnama)
            ->first();
    }

    // Perintah Untuk Menampilkan Keseluruhan Data Anggota Dewan
    public function groupdapil()
    {
        return DB::table('anggota_dewans')
            ->join('users', 'users.id', '=', 'anggota_dewans.iduser')
            ->join('fraksis', 'fraksis.id', '=', 'anggota_dewans.idfraksi')
            ->join('dapils', 'dapils.id', '=', 'anggota_dewans.iddapil')
            ->join('akds', 'akds.id', '=', 'anggota_dewans.idakd')
            ->select('anggota_dewans.*', 'users.name', 'fraksis.fraksi', 'dapils.dapil', 'dapils.slugdapil', 'dapils.kecamatan', 'akds.akd')
            ->groupBy('anggota_dewans.iddapil')
            ->orderBy('dapils.dapil', 'asc')
            ->get();
    }

    public function perdapil($slugdapil)
    {
        return DB::table('anggota_dewans')
            ->join('users', 'users.id', '=', 'anggota_dewans.iduser')
            ->join('fraksis', 'fraksis.id', '=', 'anggota_dewans.idfraksi')
            ->join('dapils', 'dapils.id', '=', 'anggota_dewans.iddapil')
            ->join('akds', 'akds.id', '=', 'anggota_dewans.idakd')
            ->select('anggota_dewans.*', 'users.name', 'fraksis.fraksi', 'dapils.dapil', 'dapils.slugdapil', 'dapils.kecamatan', 'akds.akd')
            ->where('dapils.slugdapil', $slugdapil)
            ->orderBy('dapils.dapil', 'asc')
            ->get();
    }
    // Perintah Untuk Menampilkan Keseluruhan Data Anggota Dewan


    // Perturan DPRD
    public function tatatertib()
    {
        return DB::table('tatatertips')
            ->get();
    }

    public function semuatatatertib()
    {
        return DB::table('tatatertips')
            ->paginate(10);
    }

    public function perperaturan($slugkategori)
    {
        return DB::table('tatatertips')
            ->where('slugkategori', $slugkategori)
            ->orderBy('tatatertips.id', 'asc')
            ->paginate(10);
    }
    // Perturan DPRD

    // Keputusan DPRD
    public function kategorikeputusandprd()
    {
        return DB::table('keputusandprds')
            ->get();
    }

    public function semuakeputusan()
    {
        return DB::table('keputusandprds')
            ->paginate(10);
    }

    public function perkategorikeputusan($slugkategori)
    {
        return DB::table('keputusandprds')
            ->where('slugkategori', $slugkategori)
            ->orderBy('keputusandprds.id', 'asc')
            ->paginate(10);
    }
    // Keputusan DPRD


    // Tampil Berita Umum dan Sekretariat Pada Untuk Front End FrondEnd
    public function berita_umum_slide()
    {
        return DB::table('beritas')
            ->where('kategoriberita', 'Berita Umum')
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();
    }

    public function umum_berita()
    {
        return DB::table('beritas')
            ->where('kategoriberita', 'Berita Umum')
            ->inRandomOrder()
            ->get();
    }

    public function berita_sekretariat_slide()
    {
        return DB::table('beritas')
            ->where('kategoriberita', 'Berita Sekretariat')
            ->inRandomOrder()
            ->take(5)
            ->get();
    }
    // Tampil Berita Umum dan Sekretariat Pada Untuk Front End FrondEnd



    // Berita Umum Pada View Berita Umum
    public function beritaumum()
    {
        return DB::table('beritas')
            ->where('kategoriberita', 'Berita Umum')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function paginateberitaumum()
    {
        return DB::table('beritas')
            ->where('kategoriberita', 'Berita Umum')
            ->orderBy('dilihat', 'desc')
            ->paginate(6);
    }

    public function beritaumumterkait()
    {
        return DB::table('beritas')
            ->where('kategoriberita', 'Berita Umum')
            ->orderBy('id', 'desc')
            ->get();
    }


    public function beritaumumslider()
    {
        return DB::table('beritas')
            ->where('kategoriberita', 'Berita Umum')
            ->orderBy('dilihat', 'desc')
            ->take(6)
            ->get();
    }
    // Berita Umum Pada View Berita Umum


    public function detailberita($slug)
    {
        return DB::table('beritas')
            ->where('slug', $slug)
            ->first();
    }



    // Berita Srektariat
    public function beritsekretariat()
    {
        return DB::table('beritas')
            ->where('kategoriberita', 'Berita Sekretariat')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function paginatesekretariat()
    {
        return DB::table('beritas')
            ->where('kategoriberita', 'Berita Sekretariat')
            ->orderBy('dilihat', 'desc')
            ->paginate(6);
    }

    public function beritasekretariatslider()
    {
        return DB::table('beritas')
            ->where('kategoriberita', 'Berita Sekretariat')
            ->orderBy('dilihat', 'desc')
            ->take(6)
            ->get();
    }

    public function beritasekretariatterkait()
    {
        return DB::table('beritas')
            ->where('kategoriberita', 'Berita Sekretariat')
            ->orderBy('id', 'desc')
            ->get();
    }
    // Berita Srektariat

    // Tampil Akd Pada Front End
    public function tampilakd()
    {
        return DB::table('akds')
            ->orderBy('akds.id', 'asc')
            ->where('akd', '!=', "Komisi 1")
            ->where('akd', '!=', "Komisi 2")
            ->where('akd', '!=', "Komisi 3")
            ->where('akd', '!=', "Pimpinan DPRD")
            ->get();
    }

    public function semuaakd()
    {
        return DB::table('akds')
            ->orderBy('akds.id', 'asc')
            ->where('akd', '!=', "Komisi 1")
            ->where('akd', '!=', "Komisi 2")
            ->where('akd', '!=', "Komisi 3")
            ->get();
    }

    public function tampikomisi()
    {
        return DB::table('akds')
            ->orderBy('akds.id', 'asc')
            ->where('akd', '!=', "Pimpinan DPRD")
            ->where('akd', '!=', "Badan Kehormatan")
            ->where('akd', '!=', "Badan Musyawarah (BAMUS)")
            ->where('akd', '!=', "Badan Anggaran (Banggar)")
            ->where('akd', '!=', "Badan Pembentukan Peraturan Daerah (BAPEMPERDA)")
            ->get();
    }

    public function tampilmitrakerja()
    {
        return DB::table('mitra_kerjas')
            ->join('users', 'users.id', '=', 'mitra_kerjas.iduser')
            ->join('akds', 'akds.id', '=', 'mitra_kerjas.kodekomisi')
            ->select('mitra_kerjas.*', 'akds.akd', 'users.name')
            ->orderBy('mitra_kerjas.id', 'asc')
            ->get();
    }
    // Tampil Akd Pada Front End

    // Tampil Fraksi Pada Front End
    public function tampilfraksi()
    {
        return DB::table('fraksis')
            ->orderBy('fraksis.id', 'asc')
            ->get();
    }
    // Tampil Fraksi Pada Front End

    // Tampil Galeri Foto Pada Front End
    public function tampil_galeri_foto()
    {
        return DB::table('galeris')
            ->where('galeris.kategori', 'Foto')
            ->take(8)
            ->inRandomOrder()
            ->get();
    }
    // Tampil Galeri Foto Pada Front End

    // Tampil Galeri Video Pada Front End
    public function tampil_galeri_video()
    {
        return DB::table('galeris')
            ->where('galeris.kategori', 'Video On Demand')
            ->orderBy('galeris.id', 'desc')
            ->get();
    }
    // Tampil Galeri Video Pada Front End


    // Tampil Agenda DPRD Pada Front End
    public function show_agenda_dprd_all()
    {
        return DB::table('agendas')
            ->where('agendas.kategoriagenda', '=', 'Agenda DPRD')
            ->orderByDesc('id')
            ->get();
    }

    public function show_agenda_sekretariat_all()
    {
        return DB::table('agendas')
            ->where('agendas.kategoriagenda', '=', 'Agenda Sekretariat')
            ->orderByDesc('id')
            ->get();
    }

    public function show_agenda_dprd()
    {
        return DB::table('agendas')
            ->join('users', 'users.id', '=', 'agendas.iduser')
            ->select('agendas.*', 'users.name')
            ->where('agendas.kategoriagenda', '=', 'Agenda DPRD')
            ->orderByDesc('id')
            ->take(8)
            ->get();
    }

    public function show_agenda_sekretariat()
    {
        return DB::table('agendas')
            ->join('users', 'users.id', '=', 'agendas.iduser')
            ->select('agendas.*', 'users.name')
            ->where('agendas.kategoriagenda', '=', 'Agenda Sekretariat')
            ->orderByDesc('id')
            ->take(8)
            ->get();
    }

    // Tampil Agenda DPRD Pada Front End

    // Detail Akd
    public function tampil_per_akd($slugakd)
    {
        return DB::table('anggota_dewans')
            ->join('fraksis', 'fraksis.id', '=', 'anggota_dewans.idfraksi')
            ->join('dapils', 'dapils.id', '=', 'anggota_dewans.iddapil')
            ->join('akds', 'akds.id', '=', 'anggota_dewans.idakd')
            ->select('anggota_dewans.*', 'fraksis.fraksi',  'dapils.dapil', 'akds.akd', 'akds.slugakd', 'akds.keteranganakd')
            ->where('akds.slugakd', $slugakd)
            ->get();
    }
    // Detail Akd


    public function tampil_per_fraksi($slugfraksi)
    {
        return DB::table('anggota_dewans')
            ->join('fraksis', 'fraksis.id', '=', 'anggota_dewans.idfraksi')
            ->join('dapils', 'dapils.id', '=', 'anggota_dewans.iddapil')
            ->join('akds', 'akds.id', '=', 'anggota_dewans.idakd')
            ->select('anggota_dewans.*', 'fraksis.fraksi', 'fraksis.slugfraksi', 'fraksis.logofraksi', 'dapils.dapil', 'akds.akd', 'akds.keteranganakd')
            ->where('fraksis.slugfraksi', $slugfraksi)
            ->get();
    }
    // Detail Akd

    // Tampil Visi Misi Sekretariat
    public function visimisisekretariat()
    {
        return DB::table('visimisistrukturs')
            ->get();
    }

    public function pejabatstruktural()
    {
        return DB::table('strukturals')
            ->get();
    }

    public function detailpejabatstruktural($slugtruktural)
    {
        return DB::table('strukturals')
            ->where('slugstruktural', $slugtruktural)
            ->first();
    }
    // Tampil Visi Misi Sekretariat


    // Transparansi Anggaran
    public function grouptransparansianggaran()
    {
        return DB::table('transparansi_anggarans')
            ->groupBy('kategorianggaran')
            ->get();
    }

    public function transparansianggaran()
    {
        return DB::table('transparansi_anggarans')
            ->orderBy('id', 'desc')
            ->paginate(10);
    }

    public function perkategorianggaran($slugkategorianggaran)
    {
        return DB::table('transparansi_anggarans')
            ->where('slug_kategorianggaran', $slugkategorianggaran)
            ->orderBy('id', 'desc')
            ->get();
    }
    // Transparansi Anggaran


    // Transparansi Kinerja
    public function grouptransparansikinerja()
    {
        return DB::table('transparansi_kinerjas')
            ->groupBy('kategorikinerja')
            ->get();
    }

    public function transparansikinerja()
    {
        return DB::table('transparansi_kinerjas')
            ->orderBy('id', 'desc')
            ->paginate(10);
    }

    public function perkategorikinerja($slugkategorikinerja)
    {
        return DB::table('transparansi_kinerjas')
            ->where('slugkategorikinerja', $slugkategorikinerja)
            ->orderBy('id', 'desc')
            ->get();
    }
    // Transparansi Anggaran


    // Pengumuman
    public function grouppengumuman()
    {
        return DB::table('pengumumen')
            ->groupBy('slugkategoripengumuman')
            ->get();
    }

    public function pengumuman()
    {
        return DB::table('pengumumen')
            ->orderBy('id', 'desc')
            ->paginate(10);
    }

    public function perpengumuman($slugkategoripengumuman)
    {
        return DB::table('pengumumen')
            ->where('slugkategoripengumuman', $slugkategoripengumuman)
            ->orderBy('id', 'desc')
            ->get();
    }
    // TPengumuman


    // Formulir Kunjungan
    public function simpankunjungan($data)
    {
        DB::table('formulir_kunjungans')->insert($data);
    }
    // Formulir Kunjungan

    // Galeri
    public function galerifoto()
    {
        return DB::table('galeris')
            ->join('users', 'users.id', '=', 'galeris.iduser')
            ->select('galeris.*', 'users.name')
            ->where('galeris.kategori', 'Foto')
            ->orderBy('galeris.id', 'desc')
            ->paginate(12);
    }

    public function pergalerifoto($sluggaleri)
    {
        return DB::table('galeris')
            ->where('slugjudulgaleri', $sluggaleri)
            ->first();
    }

    public function galerivideo()
    {
        return DB::table('galeris')
            ->join('users', 'users.id', '=', 'galeris.iduser')
            ->select('galeris.*', 'users.name')
            ->where('galeris.kategori', 'Video On Demand')
            ->orderBy('galeris.id', 'desc')
            ->paginate(12);
    }

    public function pergalerivideo($sluggaleri)
    {
        return DB::table('galeris')
            ->where('slugjudulgaleri', $sluggaleri)
            ->first();
    }


    public function galerilive()
    {
        return DB::table('galeris')
            ->join('users', 'users.id', '=', 'galeris.iduser')
            ->select('galeris.*', 'users.name')
            ->where('galeris.kategori', 'Live')
            ->orderBy('galeris.id', 'desc')
            ->get();
    }
    // Galeri

    // PPID
    public function groupppid()
    {
        return DB::table('ppids')
            ->groupBy('kategorippid')
            ->orderBy('ppids.id', 'asc')
            ->get();
    }

    public function semuappid()
    {
        return DB::table('ppids')
            ->orderBy('ppids.id', 'asc')
            ->paginate(10);
    }

    public function perkategorippid($slugkategorippid)
    {
        return DB::table('ppids')
            ->where('slugkategorippid', $slugkategorippid)
            ->orderBy('ppids.id', 'asc')
            ->paginate(10);
    }
    // PPID

    // FAQ
    public function faq()
    {
        return DB::table('faqs')
            ->orderBy('faqs.id', 'asc')
            ->get();
    }
    // FAQ

    // JDIH
    public function datajdih()
    {
        return DB::table('jdihs')
            ->orderBy('dilihat', 'desc')
            ->paginate(15);
    }

    public function perjdih($slujdih)
    {
        return DB::table('jdihs')
            ->where('slugjdih', $slujdih)
            ->first();
    }
    // JDIH
}
