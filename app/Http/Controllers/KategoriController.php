<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->Kategori = new Kategori();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Kategori',
            'datakategori' => $this->Kategori->tampilkategori()
        ];
        return view('Backend.Kategori.vdaftarkategori', $data);
    }

    public function addkategori()
    {
        $data = [
            'title' => 'Input Kategori',
        ];
        return view('Backend.Kategori.vaddkategori', $data);
    }

    public function simpankategori()
    {
        Request()->validate(
            [
                'kategori' => 'required',
            ],
            [
                'kategori.required' => 'Silahkan isikan kategori terlebih dahulu..!!',
            ]
        );



        $data = [
            'kategori' => Request()->kategori,
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->Kategori->simpankategori($data);
        return redirect()->route('admin.daftarkategori')->with('save', 'Kategori Berhasil diSimpan..!!');
    }


    public function editkategori($id)
    {
        $data = [
            'title' => 'Update Kategori',
            'editkategori' => $this->Kategori->editkategori($id)
        ];
        return view('Backend.Kategori.veditkategori', $data);
    }


    public function rubahkategori($id)
    {
        Request()->validate(
            [
                'kategori' => 'required',
            ],
            [
                'kategori.required' => 'Silahkan isikan kategori terlebih dahulu..!!',
            ]
        );

        $data = [
            'kategori' => Request()->kategori,
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];

        $this->Kategori->rubahkategori($id, $data);
        return redirect()->route('admin.daftarkategori')->with('update', 'Kategori Berhasil diUpdate..!!');
    }

    public function hapuskategori($id)
    {
        $this->Kategori->hapuskategori($id);
        return redirect()->route('admin.daftarkategori')->with('delete', 'Kategori Berhasil dihapus');
    }
}
