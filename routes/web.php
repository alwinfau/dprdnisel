<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route Front End
Route::get('/', [\App\Http\Controllers\FrontendController::class, 'index'])->name('frontend');

Route::get('dprd/sejarah-dprd', [\App\Http\Controllers\FrontendController::class, 'sejarahdprd'])->name('sejarah-dprd');
Route::get('sekretariat/tentang-setwan', [\App\Http\Controllers\FrontendController::class, 'tentangsetwan'])->name('tentang-setwan');
Route::get('/dprd/kedudukan-tugas-pokok-serta-hak-dan-kewajiban', [\App\Http\Controllers\FrontendController::class, 'tugasdprd'])->name('tugas-dprd');
Route::get('/sekretariat/tugas-pokok-dan-fungsi', [\App\Http\Controllers\FrontendController::class, 'tugassekretariat'])->name('tugas-sekretariat');
Route::get('/profile/pimpinan-dprd-kabupaten-nias-selatan', [\App\Http\Controllers\FrontendController::class, 'pimpinandprd'])->name('pimpinandprd');
Route::get('/profile/all-dprd', [\App\Http\Controllers\FrontendController::class, 'alldprd'])->name('alldprd');
Route::get('/profile/dprd-kabupaten-nias-selatan/{slugnama}', [\App\Http\Controllers\FrontendController::class, 'detaildewan'])->name('detaildewan');
Route::get('/dprd/peraturan-dprd', [\App\Http\Controllers\FrontendController::class, 'tatatertib'])->name('tatatertib');
Route::get('/dprd/peraturan-dprd/{slugkategori}', [\App\Http\Controllers\FrontendController::class, 'perperaturan'])->name('perperaturan');

// Keputusan DPRD
Route::get('/dprd/keputusan-dprd', [\App\Http\Controllers\FrontendController::class, 'keputusandprd'])->name('keputusandprd');
Route::get('/dprd/keputusan-dprd/{slugkategori}', [\App\Http\Controllers\FrontendController::class, 'perkeputusan'])->name('perkeputusan');
// Keputusan DPRD

// Berlum Selesai Bagian anggota drpd
Route::get('/profile/daerah-pemilihan', [\App\Http\Controllers\FrontendController::class, 'groupdapil'])->name('groupdapil');
Route::get('/profile/daerah-pemilihan/{slugdapil}', [\App\Http\Controllers\FrontendController::class, 'perdapil'])->name('perdapil');
// Berlum Selesai Bagian anggota drpd

// Tampil Komisi-Komisi

// Tampil Komisi-Komisi

Route::get('/berita/beritaumum', [\App\Http\Controllers\FrontendController::class, 'beritaumum'])->name('beritaumum');
Route::get('/berita/detail/beritaumum/{slug}', [\App\Http\Controllers\FrontendController::class, 'detailberitaumum'])->name('detailberitaumum');
Route::get('/berita/cari', [\App\Http\Controllers\FrontendController::class, 'cari'])->name('cari');


Route::get('/berita/sekretariat', [\App\Http\Controllers\FrontendController::class, 'beritasekretariat'])->name('beritasekretariat');
Route::get('/berita/detail/beritasekretariat/{slug}', [\App\Http\Controllers\FrontendController::class, 'detailberitasekretariat'])->name('detailberitasekretariat');

Route::get('/agenda/agendadprd', [\App\Http\Controllers\FrontendController::class, 'agenda_dprd_all'])->name('agendadprd');
Route::get('/agenda/agendasekretariat', [\App\Http\Controllers\FrontendController::class, 'agenda_sekretariat_all'])->name('agendasekretariat');

Route::get('/profile/komisi-komisi', [\App\Http\Controllers\FrontendController::class, 'tampilkomisi'])->name('komisikomisi');
Route::get('/tampil-akd/{slugakd}', [\App\Http\Controllers\FrontendController::class, 'tampil_per_akd'])->name('tampilakd');
Route::get('/fraksi/{slugfraksi}', [\App\Http\Controllers\FrontendController::class, 'tampil_per_fraksi'])->name('tampil_per_fraksi');

Route::get('/sekretariat/visi-misi-sekretariat-dprd-kabupaten-nias-selatan', [\App\Http\Controllers\FrontendController::class, 'visimisisekretariat'])->name('visimisisekretariat');
Route::get('/sekretariat/struktur-organisasi', [\App\Http\Controllers\FrontendController::class, 'strukturorganisasi'])->name('strukturorganisasi');
Route::get('/sekretariat/pejabat-struktural', [\App\Http\Controllers\FrontendController::class, 'pejabatstruktural'])->name('pejabatstruktural');
Route::get('/sekretariat/detail-profil-pejabat-struktural/{slugstruktural}', [\App\Http\Controllers\FrontendController::class, 'detailpejabatstruktural'])->name('detailpejabatstruktural');

Route::get('/informasi-publik/transparansi-anggaran', [\App\Http\Controllers\FrontendController::class, 'transparansianggaran'])->name('transparansianggaran');
Route::get('/informasi-publik/transparansi-anggaran/{slug_kategorianggaran}', [\App\Http\Controllers\FrontendController::class, 'perkategorianggaran'])->name('perkategorianggaran');

Route::get('/informasi-publik/transparansi-kinerja', [\App\Http\Controllers\FrontendController::class, 'transparansikinerja'])->name('transparansikinerja');
Route::get('/informasi-publik/transparansi-kinerja/{slugkategorikinerja}', [\App\Http\Controllers\FrontendController::class, 'perkategorikinerja'])->name('perkategorikinerja');

Route::get('/informasi-publik/pengumuman', [\App\Http\Controllers\FrontendController::class, 'pengumuman'])->name('pengumuman');
Route::get('/informasi-publik/pengumuman/{slugkategoripengumuman}', [\App\Http\Controllers\FrontendController::class, 'perpengumuman'])->name('perpengumuman');

Route::get('/informasi-publik/form-kunjungan', [\App\Http\Controllers\FrontendController::class, 'formkunjungan'])->name('formkunjungan');
Route::post('/informasi-publik/formulir-kunjungan', [\App\Http\Controllers\FrontendController::class, 'kunjungan'])->name('kunjungan');

Route::get('/publikasi/galeri-foto', [\App\Http\Controllers\FrontendController::class, 'galerifoto'])->name('galerifoto');
Route::get('/publikasi/galeri-foto/{slugjudulgaleri}', [\App\Http\Controllers\FrontendController::class, 'pergalerifoto'])->name('pergalerifoto');
Route::get('/publikasi/galeri-video', [\App\Http\Controllers\FrontendController::class, 'galerivideo'])->name('galerivideo');
Route::get('/publikasi/galeri-video/{slugjudulgaleri}', [\App\Http\Controllers\FrontendController::class, 'pergalerivideo'])->name('pergalerivideo');
Route::get('/publikasi/live-streaming', [\App\Http\Controllers\FrontendController::class, 'livestreaming'])->name('livestreaming');

Route::get('/ppdi', [\App\Http\Controllers\FrontendController::class, 'frontppid'])->name('frontppid');
Route::get('/ppdi/{slugkategorippid}', [\App\Http\Controllers\FrontendController::class, 'perkategorippid'])->name('perkategorippid');

Route::get('/FAQ', [\App\Http\Controllers\FrontendController::class, 'frontfaq'])->name('frontfaq');

Route::get('/JDIH', [\App\Http\Controllers\FrontendController::class, 'datajdih'])->name('datajdih');
Route::get('/JDIH/{slugjdih}', [\App\Http\Controllers\FrontendController::class, 'perjdih'])->name('perjdih');
// Route Front End




Auth::routes(['verify' => true]);

// Route Untuk User
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// End Route Untuk User


// Route Untuk Admin
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
// ->middleware('is_admin');
// End Route Untuk Admin


// Route Kategori
Route::middleware(['auth'])->group(function () {
    Route::get('/daftarkategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('admin.daftarkategori')->middleware('is_admin');
    Route::get('/addkategori', [App\Http\Controllers\KategoriController::class, 'addkategori'])->name('admin.addkategori')->middleware('is_admin');
    Route::post('/simpankategori', [App\Http\Controllers\KategoriController::class, 'simpankategori'])->name('admin.simpankategori')->middleware('is_admin');
    Route::get('/editkategori/{id}', [App\Http\Controllers\KategoriController::class, 'editkategori'])->name('admin.editkategori')->middleware('is_admin');
    Route::post('/rubahkategori/{id}', [App\Http\Controllers\KategoriController::class, 'rubahkategori'])->name('admin.rubahkategori')->middleware('is_admin');
    Route::get('/hapuskategori/{id}', [App\Http\Controllers\KategoriController::class, 'hapuskategori'])->name('admin.hapuskategori')->middleware('is_admin');
    // Route Kategori
});

// Route Sejarah
Route::middleware(['auth'])->group(function () {
    Route::get('/daftarsejarah', [App\Http\Controllers\SejarahController::class, 'index'])->name('admin.daftarsejarah')->middleware('is_admin');
    Route::get('/tentang-setwan', [App\Http\Controllers\SejarahController::class, 'tentangsetwan'])->name('admin.daftarsejarahsekretariat')->middleware('is_admin');
    Route::get('/addsejarah', [App\Http\Controllers\SejarahController::class, 'addsejarah'])->name('admin.addsejarah')->middleware('is_admin');
    Route::post('/simpansejarah', [App\Http\Controllers\SejarahController::class, 'simpansejarah'])->name('admin.simpansejarah')->middleware('is_admin');
    Route::get('/editsejarah/{id}', [App\Http\Controllers\SejarahController::class, 'editsejarah'])->name('admin.editsejarah')->middleware('is_admin');
    Route::post('/rubahsejarah/{id}', [App\Http\Controllers\SejarahController::class, 'rubahsejarah'])->name('admin.rubahsejarah')->middleware('is_admin');
    Route::get('/hapussejarah/{id}', [App\Http\Controllers\SejarahController::class, 'hapussejarah'])->name('admin.hapussejarah')->middleware('is_admin');
});
// Route Sejarah

// Route Tugas Pokok
Route::middleware(['auth'])->group(function () {
    Route::get('/daftartugaspokok', [App\Http\Controllers\TugaspokokController::class, 'index'])->name('admin.daftartugaspokok')->middleware('is_admin');
    Route::get('/tampiltugaspokoksekretariat', [App\Http\Controllers\TugaspokokController::class, 'tampiltugaspokoksekretariat'])->name('admin.tampiltugaspokoksekretariat')->middleware('is_admin');
    Route::get('/addtugaspokok', [App\Http\Controllers\TugaspokokController::class, 'addtugaspokok'])->name('admin.addtugaspokok')->middleware('is_admin');
    Route::post('/simpantugaspokok', [App\Http\Controllers\TugaspokokController::class, 'simpantugaspokok'])->name('admin.simpantugaspokok')->middleware('is_admin');
    Route::get('/edittugaspokok/{id}', [App\Http\Controllers\TugaspokokController::class, 'edittugaspokok'])->name('admin.edittugaspokok')->middleware('is_admin');
    Route::post('/rubahtugaspokok/{id}', [App\Http\Controllers\TugaspokokController::class, 'rubahtugaspokok'])->name('admin.rubahtugaspokok')->middleware('is_admin');
    Route::get('/hapustugaspokok/{id}', [App\Http\Controllers\TugaspokokController::class, 'hapustugaspokok'])->name('admin.hapustugaspokok')->middleware('is_admin');
}); // Route Tugas Pokok


// Route Data Fraksi
Route::middleware(['auth'])->group(function () {
    Route::get('/daftarfraksi', [App\Http\Controllers\FraksiController::class, 'index'])->name('admin.daftarfraksi')->middleware('is_admin');
    Route::get('/addfraksi', [App\Http\Controllers\FraksiController::class, 'addfraksi'])->name('admin.addfraksi')->middleware('is_admin');
    Route::post('/simpanfraksi', [App\Http\Controllers\FraksiController::class, 'simpanfraksi'])->name('admin.simpanfraksi')->middleware('is_admin');
    Route::get('/editfraksi/{id}', [App\Http\Controllers\FraksiController::class, 'editfraksi'])->name('admin.editfraksi')->middleware('is_admin');
    Route::post('/rubahfraksi/{id}', [App\Http\Controllers\FraksiController::class, 'rubahfraksi'])->name('admin.rubahfraksi')->middleware('is_admin');
    Route::get('/hapusfraksi/{id}', [App\Http\Controllers\FraksiController::class, 'hapusfraksi'])->name('admin.hapusfraksi')->middleware('is_admin');
});
// Route Data Fraksi

// Route Data Dapil
Route::middleware(['auth'])->group(function () {
    Route::get('/daftardapil', [App\Http\Controllers\DapilController::class, 'index'])->name('admin.daftardapil')->middleware('is_admin');
    Route::get('/adddapil', [App\Http\Controllers\DapilController::class, 'adddapil'])->name('admin.adddapil')->middleware('is_admin');
    Route::post('/simpandapil', [App\Http\Controllers\DapilController::class, 'simpandapil'])->name('admin.simpandapil')->middleware('is_admin');
    Route::get('/editdapil/{id}', [App\Http\Controllers\DapilController::class, 'editdapil'])->name('admin.editdapil')->middleware('is_admin');
    Route::post('/rubahdapil/{id}', [App\Http\Controllers\DapilController::class, 'rubahdapil'])->name('admin.rubahdapil')->middleware('is_admin');
    Route::get('/hapusdapil/{id}', [App\Http\Controllers\DapilController::class, 'hapusdapil'])->name('admin.hapusdapil')->middleware('is_admin');
});
// Route Data Dapil

// Route Data AKD
Route::middleware(['auth'])->group(function () {
    Route::get('/daftarakd', [App\Http\Controllers\AkdController::class, 'index'])->name('admin.daftarakd')->middleware('is_admin');
    Route::get('/addakd', [App\Http\Controllers\AkdController::class, 'addakd'])->name('admin.addakd')->middleware('is_admin');
    Route::post('/simpanakd', [App\Http\Controllers\AkdController::class, 'simpanakd'])->name('admin.simpanakd')->middleware('is_admin');
    Route::get('/editakd/{id}', [App\Http\Controllers\AkdController::class, 'editakd'])->name('admin.editakd')->middleware('is_admin');
    Route::post('/rubahakd/{id}', [App\Http\Controllers\AkdController::class, 'rubahakd'])->name('admin.rubahakd')->middleware('is_admin');
    Route::get('/hapusakd/{id}', [App\Http\Controllers\AkdController::class, 'hapusakd'])->name('admin.hapusakd')->middleware('is_admin');
}); // Route Data AKD

// Route Data Dewan
Route::middleware(['auth'])->group(function () {
    Route::get('/daftardewan', [App\Http\Controllers\AnggotaDewanController::class, 'index'])->name('admin.daftardewan')->middleware('is_admin');
    Route::get('/daftaranggotadewan', [App\Http\Controllers\AnggotaDewanController::class, 'daftaranggotadewan'])->name('admin.daftaranggotadewan')->middleware('is_admin');
    Route::get('/adddewan', [App\Http\Controllers\AnggotaDewanController::class, 'adddewan'])->name('admin.adddewan')->middleware('is_admin');
    Route::post('/simpandewan', [App\Http\Controllers\AnggotaDewanController::class, 'simpandewan'])->name('admin.simpandewan')->middleware('is_admin');
    Route::get('/editdewan/{id}', [App\Http\Controllers\AnggotaDewanController::class, 'editdewan'])->name('admin.editdewan')->middleware('is_admin');
    Route::post('/rubahdewan/{id}', [App\Http\Controllers\AnggotaDewanController::class, 'rubahdewan'])->name('admin.rubahdewan')->middleware('is_admin');
    Route::get('/hapusdewan/{id}', [App\Http\Controllers\AnggotaDewanController::class, 'hapusdewan'])->name('admin.hapusdewan')->middleware('is_admin');
    Route::get('/detailanggotadprd/{id}', [App\Http\Controllers\AnggotaDewanController::class, 'detailanggotadprd'])->name('admin.detailanggotadprd')->middleware('is_admin');
});
// Route Data Dewan

// Route Data Berita
Route::middleware(['auth'])->group(function () {
    Route::get('/berita', [App\Http\Controllers\BeritaController::class, 'index'])->name('admin.berita');
    Route::get('/addberita', [App\Http\Controllers\BeritaController::class, 'addberita'])->name('admin.addberita');
    Route::post('/simpanberita', [App\Http\Controllers\BeritaController::class, 'simpanberita'])->name('admin.simpanberita');
    Route::get('/editberita/{id}', [App\Http\Controllers\BeritaController::class, 'editberita'])->name('admin.editberita');
    Route::post('/rubahberita/{id}', [App\Http\Controllers\BeritaController::class, 'rubahberita'])->name('admin.rubahberita');
    Route::get('/hapusberita/{id}', [App\Http\Controllers\BeritaController::class, 'hapusberita'])->name('admin.hapusberita')->middleware('is_admin');
});
// Route Data Berita


// Route Visimisi dan Struktur Organisasi
Route::middleware(['auth'])->group(function () {
    Route::get('/visimisi', [App\Http\Controllers\VisimisistrukturController::class, 'index'])->name('admin.visimisi')->middleware('is_admin');
    Route::get('/addvisimisi', [App\Http\Controllers\VisimisistrukturController::class, 'addvisimisi'])->name('admin.addvisimisi')->middleware('is_admin');
    Route::post('/simpanvisimisi', [App\Http\Controllers\VisimisistrukturController::class, 'simpanvisimisi'])->name('admin.simpanvisimisi')->middleware('is_admin');
    Route::get('/editvisimisi/{id}', [App\Http\Controllers\VisimisistrukturController::class, 'editvisimisi'])->name('admin.editvisimisi')->middleware('is_admin');
    Route::post('/rubahvisimisi/{id}', [App\Http\Controllers\VisimisistrukturController::class, 'rubahvisimisi'])->name('admin.rubahvisimisi')->middleware('is_admin');
    Route::get('/hapusvisimisi/{id}', [App\Http\Controllers\VisimisistrukturController::class, 'hapusvisimisi'])->name('admin.hapusvisimisi')->middleware('is_admin');
});
// Route Visimisi dan Sturktur Organisasi

// Route Data Struktural
Route::middleware(['auth'])->group(function () {
    Route::get('/daftarstruktural', [App\Http\Controllers\StrukturalController::class, 'index'])->name('admin.daftarstruktural')->middleware('is_admin');
    Route::get('/addstruktural', [App\Http\Controllers\StrukturalController::class, 'addstruktural'])->name('admin.addstruktural')->middleware('is_admin');
    Route::post('/simpanstruktural', [App\Http\Controllers\StrukturalController::class, 'simpanstruktural'])->name('admin.simpanstruktural')->middleware('is_admin');
    Route::get('/editstruktural/{id}', [App\Http\Controllers\StrukturalController::class, 'editstruktural'])->name('admin.editstruktural')->middleware('is_admin');
    Route::post('/rubahstruktural/{id}', [App\Http\Controllers\StrukturalController::class, 'rubahstruktural'])->name('admin.rubahstruktural')->middleware('is_admin');
    Route::get('/hapusstruktural/{id}', [App\Http\Controllers\StrukturalController::class, 'hapusstruktural'])->name('admin.hapusstruktural')->middleware('is_admin');
});
// Route Data Struktural


// Route Data Agenda
Route::middleware(['auth'])->group(function () {
    Route::get('/agenda', [App\Http\Controllers\AgendaController::class, 'index'])->name('admin.agenda');
    Route::get('/addagenda', [App\Http\Controllers\AgendaController::class, 'addagenda'])->name('admin.addagenda');
    Route::post('/simpanagenda', [App\Http\Controllers\AgendaController::class, 'simpanagenda'])->name('admin.simpanagenda');
    Route::get('/editagenda/{id}', [App\Http\Controllers\AgendaController::class, 'editagenda'])->name('admin.editagenda');
    Route::post('/rubahagenda/{id}', [App\Http\Controllers\AgendaController::class, 'rubahagenda'])->name('admin.rubahagenda');
    Route::get('/hapusagenda/{id}', [App\Http\Controllers\AgendaController::class, 'hapusagenda'])->name('admin.hapusagenda');
});
// Route Data Agenda

// Route Data Galeri
Route::middleware(['auth'])->group(function () {
    Route::get('/daftargaleri', [App\Http\Controllers\GaleriController::class, 'index'])->name('admin.daftargaleri');
    Route::get('/addgaleri', [App\Http\Controllers\GaleriController::class, 'addgaleri'])->name('admin.addgaleri');
    Route::post('/simpangaleri', [App\Http\Controllers\GaleriController::class, 'simpangaleri'])->name('admin.simpangaleri');
    Route::get('/editgaleri/{id}', [App\Http\Controllers\GaleriController::class, 'editgaleri'])->name('admin.editgaleri');
    Route::post('/rubahgaleri/{id}', [App\Http\Controllers\GaleriController::class, 'rubahgaleri'])->name('admin.rubahgaleri');
    Route::get('/hapusgaleri/{id}', [App\Http\Controllers\GaleriController::class, 'hapusgaleri'])->name('admin.hapusgaleri');
});
// Route Data Galeri

// Route Data Transparansi Angaran
Route::middleware(['auth'])->group(function () {
    Route::get('/daftartransparansianggaran', [App\Http\Controllers\TransparansiAnggaranController::class, 'index'])->name('admin.transparansianggaran')->middleware('is_admin');
    Route::get('/addtransparansianggaran', [App\Http\Controllers\TransparansiAnggaranController::class, 'addtransparansianggaran'])->name('admin.addtransparansianggaran')->middleware('is_admin');
    Route::post('/simpantransparansianggaran', [App\Http\Controllers\TransparansiAnggaranController::class, 'simpantransparansianggaran'])->name('admin.simpantransparansianggaran')->middleware('is_admin');
    Route::get('/edittransparansianggaran/{id}', [App\Http\Controllers\TransparansiAnggaranController::class, 'edittransparansianggaran'])->name('admin.edittransparansianggaran')->middleware('is_admin');
    Route::get('/downloadtransparansianggaran/{id}', [App\Http\Controllers\TransparansiAnggaranController::class, 'downloadtransparansianggaran'])->name('admin.downloadtransparansianggaran')->middleware('is_admin');
    Route::post('/rubahtransparansianggaran/{id}', [App\Http\Controllers\TransparansiAnggaranController::class, 'rubahtransparansianggaran'])->name('admin.rubahtransparansianggaran')->middleware('is_admin');
    Route::get('/hapustransparansianggaran/{id}', [App\Http\Controllers\TransparansiAnggaranController::class, 'hapustransparansianggaran'])->name('admin.hapustransparansianggaran')->middleware('is_admin');
});
// Route Data Transparansi Angaran

// Route Data Transparansi Kinerja
Route::middleware(['auth'])->group(function () {
    Route::get('/daftarkinerja', [App\Http\Controllers\TransparansiKinerjaController::class, 'index'])->name('admin.kinerja')->middleware('is_admin');
    Route::get('/addkinerja', [App\Http\Controllers\TransparansiKinerjaController::class, 'addkinerja'])->name('admin.addkinerja')->middleware('is_admin');
    Route::post('/simpankinerja', [App\Http\Controllers\TransparansiKinerjaController::class, 'simpankinerja'])->name('admin.simpankinerja')->middleware('is_admin');
    Route::get('/editkinerja/{id}', [App\Http\Controllers\TransparansiKinerjaController::class, 'editkinerja'])->name('admin.editkinerja')->middleware('is_admin');
    Route::post('/rubahkinerja/{id}', [App\Http\Controllers\TransparansiKinerjaController::class, 'rubahkinerja'])->name('admin.rubahkinerja')->middleware('is_admin');
    Route::get('/hapuskinerja/{id}', [App\Http\Controllers\TransparansiKinerjaController::class, 'hapuskinerja'])->name('admin.hapuskinerja')->middleware('is_admin');
    Route::get('/downloadkinerja/{id}', [App\Http\Controllers\TransparansiKinerjaController::class, 'downloadkinerja'])->name('admin.downloadkinerja')->middleware('is_admin');
});
// Route Data Transparansi Kinerja

// Route Data Pengumuman
Route::middleware(['auth'])->group(function () {
    Route::get('/daftarpengumuman', [App\Http\Controllers\PengumumanController::class, 'index'])->name('admin.pengumuman')->middleware('is_admin');
    Route::get('/addpengumuman', [App\Http\Controllers\PengumumanController::class, 'addpengumuman'])->name('admin.addpengumuman')->middleware('is_admin');
    Route::post('/simpanpengumuman', [App\Http\Controllers\PengumumanController::class, 'simpanpengumuman'])->name('admin.simpanpengumuman')->middleware('is_admin');
    Route::get('/editpengumuman/{id}', [App\Http\Controllers\PengumumanController::class, 'editpengumuman'])->name('admin.editpengumuman')->middleware('is_admin');
    Route::post('/rubahpengumuman/{id}', [App\Http\Controllers\PengumumanController::class, 'rubahpengumuman'])->name('admin.rubahpengumuman')->middleware('is_admin');
    Route::get('/hapuspengumuman/{id}', [App\Http\Controllers\PengumumanController::class, 'hapuspengumuman'])->name('admin.hapuspengumuman')->middleware('is_admin');
    Route::get('/downloadpengumuman/{id}', [App\Http\Controllers\PengumumanController::class, 'downloadpengumuman'])->name('admin.downloadpengumuman')->middleware('is_admin');
});
// Route Data Pengumuman


// Route Data Tata Tertip DPRD
Route::middleware(['auth'])->group(function () {
    Route::get('/peraturandprd', [App\Http\Controllers\TatatertipController::class, 'index'])->name('admin.tatatertib');
    Route::get('/addtatatertib', [App\Http\Controllers\TatatertipController::class, 'addtatatertib'])->name('admin.addtatatertib');
    Route::post('/simpantatatertib', [App\Http\Controllers\TatatertipController::class, 'simpantatatertib'])->name('admin.simpantatatertib');
    Route::get('/edittatatertib/{id}', [App\Http\Controllers\TatatertipController::class, 'edittatatertib'])->name('admin.edittatatertib');
    Route::post('/rubahtatatertib/{id}', [App\Http\Controllers\TatatertipController::class, 'rubahtatatertib'])->name('admin.rubahtatatertib');
    Route::get('/hapustatatertib/{id}', [App\Http\Controllers\TatatertipController::class, 'hapustatatertib'])->name('admin.hapustatatertib');
});
// Route Data Tata Tertip DPRD

// Route Data JDIH
Route::middleware(['auth'])->group(function () {
    Route::get('/daftarjdih', [App\Http\Controllers\JdihController::class, 'index'])->name('admin.jdih');
    Route::get('/addjdih', [App\Http\Controllers\JdihController::class, 'addjdih'])->name('admin.addjdih');
    Route::post('/simpanjdih', [App\Http\Controllers\JdihController::class, 'simpanjdih'])->name('admin.simpanjdih');
    Route::get('/editjdih/{id}', [App\Http\Controllers\JdihController::class, 'editjdih'])->name('admin.editjdih');
    Route::post('/rubahjdih/{id}', [App\Http\Controllers\JdihController::class, 'rubahjdih'])->name('admin.rubahjdih');
    Route::get('/hapusjdih/{id}', [App\Http\Controllers\JdihController::class, 'hapusjdih'])->name('admin.hapusjdih');
    Route::get('/downloadjdih/{id}', [App\Http\Controllers\JdihController::class, 'downloadjdih'])->name('admin.downloadjdih');
    // Route Data JDIH
});

// Route Data PPID
Route::middleware(['auth'])->group(function () {
    Route::get('/daftarppid', [App\Http\Controllers\PpidController::class, 'index'])->name('admin.ppid');
    Route::get('/addppid', [App\Http\Controllers\PpidController::class, 'addppid'])->name('admin.addppid');
    Route::post('/simpanppid', [App\Http\Controllers\PpidController::class, 'simpanppid'])->name('admin.simpanppid');
    Route::get('/editppid/{id}', [App\Http\Controllers\PpidController::class, 'editppid'])->name('admin.editppid');
    Route::post('/rubahppid/{id}', [App\Http\Controllers\PpidController::class, 'rubahppid'])->name('admin.rubahppid');
    Route::get('/hapusppid/{id}', [App\Http\Controllers\PpidController::class, 'hapusppid'])->name('admin.hapusppid');
    Route::get('/downloadppid/{id}', [App\Http\Controllers\PpidController::class, 'downloadppid'])->name('admin.downloadppid');
});
// Route Data PPID

// Route Keputusan DPRD
Route::middleware(['auth'])->group(function () {
    Route::get('/daftar-keputusan', [App\Http\Controllers\KeputusandprdController::class, 'index'])->name('admin.daftarkeputusan');
    Route::get('/addkeputusan', [App\Http\Controllers\KeputusandprdController::class, 'addkeputusan'])->name('admin.addkeputusan');
    Route::post('/simpankeputusan', [App\Http\Controllers\KeputusandprdController::class, 'simpankeputusan'])->name('admin.simpankeputusan');
    Route::get('/editkeputusan/{id}', [App\Http\Controllers\KeputusandprdController::class, 'editkeputusan'])->name('admin.editkeputusan');
    Route::post('/rubahkeputusan/{id}', [App\Http\Controllers\KeputusandprdController::class, 'rubahkeputusan'])->name('admin.rubahkeputusan');
    Route::get('/hapuskeputusan/{id}', [App\Http\Controllers\KeputusandprdController::class, 'hapuskeputusan'])->name('admin.hapuskeputusan');
});
// Route Keputusan DPRD

// Route Kunjungan
Route::middleware(['auth'])->group(function () {
    Route::get('/daftarkunjungan', [App\Http\Controllers\FormulirKunjunganController::class, 'index'])->name('admin.kunjungan')->middleware('is_admin');
    Route::get('/addkunjungan', [App\Http\Controllers\FormulirKunjunganController::class, 'addkunjungan'])->name('admin.addkunjungan')->middleware('is_admin');
    Route::post('/simpankunjungan', [App\Http\Controllers\FormulirKunjunganController::class, 'simpankunjungan'])->name('admin.simpankunjungan')->middleware('is_admin');
    Route::get('/editkunjungan/{id}', [App\Http\Controllers\FormulirKunjunganController::class, 'editkunjungan'])->name('admin.editkunjungan')->middleware('is_admin');
    Route::post('/rubahkunjungan/{id}', [App\Http\Controllers\FormulirKunjunganController::class, 'rubahkunjungan'])->name('admin.rubahkunjungan')->middleware('is_admin');
    Route::get('/hapuskunjungan/{id}', [App\Http\Controllers\FormulirKunjunganController::class, 'hapuskunjungan'])->name('admin.hapuskunjungan')->middleware('is_admin');
    Route::get('/downloadkunjungan/{id}', [App\Http\Controllers\FormulirKunjunganController::class, 'downloadkunjungan'])->name('admin.downloadkunjungan')->middleware('is_admin');
});
// Route Kunjungan

// Route FAQ
Route::middleware(['auth'])->group(function () {
    Route::get('/daftarfaq', [App\Http\Controllers\FaqController::class, 'index'])->name('admin.daftarfaq')->middleware('is_admin');
    Route::get('/addfaq', [App\Http\Controllers\FaqController::class, 'addfaq'])->name('admin.addfaq')->middleware('is_admin');
    Route::post('/simpanfaq', [App\Http\Controllers\FaqController::class, 'simpanfaq'])->name('admin.simpanfaq')->middleware('is_admin');
    Route::get('/editfaq/{id}', [App\Http\Controllers\FaqController::class, 'editfaq'])->name('admin.editfaq')->middleware('is_admin');
    Route::post('/rubahfaq/{id}', [App\Http\Controllers\FaqController::class, 'rubahfaq'])->name('admin.rubahfaq')->middleware('is_admin');
    Route::get('/hapusfaq/{id}', [App\Http\Controllers\FaqController::class, 'hapusfaq'])->name('admin.hapusfaq')->middleware('is_admin');
    // Route FAQ
});

// Route Mitra Kerja
Route::middleware(['auth'])->group(function () {
    Route::get('/daftarmitrakerja', [App\Http\Controllers\MitraKerjaController::class, 'index'])->name('admin.daftarmitrakerja')->middleware('is_admin');
    Route::get('/addmitrakerja', [App\Http\Controllers\MitraKerjaController::class, 'addmitrakerja'])->name('admin.addmitrakerja')->middleware('is_admin');
    Route::post('/simpanmitrakerja', [App\Http\Controllers\MitraKerjaController::class, 'simpanmitrakerja'])->name('admin.simpanmitrakerja')->middleware('is_admin');
    Route::get('/editmitrakerja/{id}', [App\Http\Controllers\MitraKerjaController::class, 'editmitrakerja'])->name('admin.editmitrakerja')->middleware('is_admin');
    Route::post('/rubahmitrakerja/{id}', [App\Http\Controllers\MitraKerjaController::class, 'rubahmitrakerja'])->name('admin.rubahmitrakerja')->middleware('is_admin');
    Route::get('/hapusmitrakerja/{id}', [App\Http\Controllers\MitraKerjaController::class, 'hapusmitrakerja'])->name('admin.hapusmitrakerja')->middleware('is_admin');
});
// Route Mitra kerja



// Route Untuk manajemen user
Route::middleware(['auth'])->group(function () {
    Route::get('/user', [App\Http\Controllers\UserkModelController::class, 'index'])->name('admin.daftaruser')->middleware('is_admin');
    Route::get('/adduser', [App\Http\Controllers\UserkModelController::class, 'add'])->name('admin.formadduser')->middleware('is_admin');
    Route::post('/simpanuser', [App\Http\Controllers\UserkModelController::class, 'simpan'])->name('admin.simpanuser')->middleware('is_admin');
    Route::get('/edituser/{id}', [App\Http\Controllers\UserkModelController::class, 'edit'])->name('admin.edituser')->middleware('is_admin');
    Route::post('/rubahuser/{id}', [App\Http\Controllers\UserkModelController::class, 'rubah'])->name('admin.updateuser')->middleware('is_admin');
    Route::get('/hapususer/{id}', [App\Http\Controllers\UserkModelController::class, 'hapus'])->name('admin.hapususer')->middleware('is_admin');

    Route::get('/editprofile/{id}', [App\Http\Controllers\UserkModelController::class, 'edit'])->name('admin.edituser');
    Route::post('/updateprofile/{id}', [App\Http\Controllers\UserkModelController::class, 'updateprofile_perAdmin'])->name('admin.updateprofile');
});

// End Route Untuk manajemen user
