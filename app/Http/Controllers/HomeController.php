<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\dataregistrasivaksin;
use App\Models\Dokter;
use App\Models\JadwalVaksin;
use App\Models\UptModel;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->dataregistrasivaksin = new dataregistrasivaksin();
        // $this->Dokter = new Dokter();
        // $this->UptModel = new UptModel();
        // $this->JadwalVaksin = new JadwalVaksin();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Ini Untuk Pengunjung
        $pengunjung = DB::table('pengunjung')->select(DB::raw("CAST(SUM(jlhpengunjung) as int) as totalpengunjung"))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('totalpengunjung');

        $bulan = DB::table('pengunjung')->select(DB::raw("MONTHNAME(created_at) as bulan"))
            ->groupBy(DB::raw("MONTHNAME(created_at)"))
            ->pluck("bulan");
        // Ini Untuk Pengunjung
        return view('home', compact('pengunjung', 'bulan'));
    }

    public function adminHome()
    {
        return view('Backend.AdminHome');
    }


    public function pesertavaksin()
    {
        $data = [
            'title' => 'Peserta Vaksin',
            'datapeserta' => $this->dataregistrasivaksin->data_registrasi_puskesmas(),
        ];
        return view('Backend.Peserta Vaksin.vpesertavaksin', $data);
    }

    public function prosesvaksin($noregistrasi)
    {
        $data = [
            'title' => 'Detail Peserta Vaksin',
            'detaildatapeserta' => $this->dataregistrasivaksin->detail_peserta_vaksin($noregistrasi),
            'tampildokter' => $this->Dokter->tampildokter(),
        ];
        return view('Backend.Peserta Vaksin.vdetailpeserta', $data);
    }

    public function simpandatavaksin($noregistrasi)
    {
        Request()->validate(
            [
                'dokter' => 'required',
                'vaksinke' => 'required',
            ],
            [
                'dokter.required' => 'Silahkan pilih petugas/dokter terlebih dahulu..!!',
                'vaksinke.required' => 'Silahkan pilih tahap vaksin keberapa?..!!',
            ]
        );

        $data = [
            'iddokter' => Request()->dokter,
            'vaksinke' => Request()->vaksinke,
        ];
        $this->dataregistrasivaksin->simpandatavaksin($noregistrasi, $data);
        return redirect()->route('admin.pesertavaksin')->with('update', 'INFORMASI..!! Selamat anda berhasil melakukan vaksin..!!');
    }

    public function historisvaksin()
    {
        $data = [
            'title' => 'Historis Vaksin',
            'datapeserta' => $this->dataregistrasivaksin->historis_vaksin_ALL(),
        ];
        return view('Backend.Peserta Vaksin.vhistorisvaksin', $data);
    }
}
