<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dapil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DapilController extends Controller
{
    public function __construct()
    {
        $this->Dapil = new Dapil();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Daerah Pemilihan',
            'datadapil' => $this->Dapil->tampildapil()
        ];
        return view('Backend.Dapil.vdapil', $data);
    }

    public function adddapil()
    {
        $data = [
            'title' => 'Input Daerah Pemilihan',
        ];
        return view('Backend.Dapil.vadddapil', $data);
    }

    public function simpandapil()
    {
        Request()->validate(
            [
                'dapil' => 'required',
                'kecamatan' => 'required',
            ],
            [
                'dapil.required' => 'Silahkan isikan Daerah Pemilihan terlebih dahulu..!!',
                'kecamatan.required' => 'Silahkan masukan kecamatan daerah pemilihan terlebih dahulu..!!',
            ]
        );

        $data = [
            'dapil' => Request()->dapil,
            'slugdapil' => Str::slug(Request()->dapil, '-'),
            'kecamatan' => Request()->kecamatan,
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->Dapil->simpandapil($data);
        return redirect()->route('admin.daftardapil')->with('save', 'Daerah Pemilihan Berhasil diSimpan..!!');
    }


    public function editdapil($id)
    {
        $data = [
            'title' => 'Update Daerah Pemilihan',
            'editdapil' => $this->Dapil->editdapil($id)
        ];
        return view('Backend.Dapil.veditdapil', $data);
    }


    public function rubahdapil($id)
    {
        Request()->validate(
            [
                'dapil' => 'required',
                'kecamatan' => 'required',
            ],
            [
                'dapil.required' => 'Silahkan isikan Daerah Pemilihan terlebih dahulu..!!',
                'kecamatan.required' => 'Silahkan masukan kecamatan daerah pemilihan terlebih dahulu..!!',
            ]
        );

        $data = [
            'dapil' => Request()->dapil,
            'slugdapil' => Str::slug(Request()->dapil, '-'),
            'kecamatan' => Request()->kecamatan,
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];

        $this->Dapil->rubahdapil($id, $data);
        return redirect()->route('admin.daftardapil')->with('update', 'Daerah Pemilihan Berhasil diUpdate..!!');
    }

    public function hapusdapil($id)
    {
        $this->Dapil->hapusdapil($id);
        return redirect()->route('admin.daftardapil')->with('delete', 'Daerah Pemilihan Berhasil dihapus');
    }
}
