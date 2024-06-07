<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sejarah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SejarahController extends Controller
{
    public function __construct()
    {
        $this->Sejarah = new Sejarah();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Sejarah DPRD',
            'datasejarah' => $this->Sejarah->tampilsejarah()
        ];
        return view('Backend.Sejarah DPRD.vsejarahdprd', $data);
    }

    public function tentangsetwan()
    {
        $data = [
            'title' => 'Tentang Setwan',
            'datasejarah' => $this->Sejarah->tampilsejarahsekretariat()
        ];
        return view('Backend.Sejarah DPRD.vsejarahsekretariat', $data);
    }

    public function addsejarah()
    {
        $data = [
            'title' => 'Input Sejarah & Tentang Setwan',
        ];
        return view('Backend.Sejarah DPRD.vaddsejarahdprd', $data);
    }

    public function simpansejarah()
    {
        Request()->validate(
            [
                'sejarah' => 'required',
                'kategori' => 'required',
            ],
            [
                'sejarah.required' => 'Silahkan isikan sejarah terlebih dahulu..!!',
                'kategori.required' => 'Silahkan Pilih Kategori sejarah terlebih dahulu..!!',
            ]
        );

        $data = [
            'sejarah' => Request()->sejarah,
            'kategori' => Request()->kategori,
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->Sejarah->simpansejarah($data);
        return redirect()->route('admin.daftarsejarah')->with('save', 'Sejarah Berhasil diSimpan..!!');
    }


    public function editsejarah($id)
    {
        $data = [
            'title' => 'Update Sejarah & Tentang Setwan',
            'editsejarah' => $this->Sejarah->editsejarah($id)
        ];
        return view('Backend.Sejarah DPRD.veditsejarahdprd', $data);
    }


    public function rubahsejarah($id)
    {
        Request()->validate(
            [
                'sejarah' => 'required',
                'kategori' => 'required',
            ],
            [
                'sejarah.required' => 'Silahkan isikan sejarah terlebih dahulu..!!',
                'kategori.required' => 'Silahkan Pilih Kategori sejarah terlebih dahulu..!!',
            ]
        );

        $data = [
            'sejarah' => Request()->sejarah,
            'kategori' => Request()->kategori,
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];

        $this->Sejarah->rubahsejarah($id, $data);
        return redirect()->route('admin.daftarsejarah')->with('update', 'Sejarah Berhasil diUpdate..!!');
    }

    public function hapussejarah($id)
    {
        $this->Sejarah->hapussejarah($id);
        return redirect()->route('admin.daftarsejarah')->with('delete', 'Sejarah Berhasil dihapus');
    }
}
