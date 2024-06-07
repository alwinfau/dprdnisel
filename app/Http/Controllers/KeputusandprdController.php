<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keputusandprd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class KeputusandprdController extends Controller
{
    public function __construct()
    {
        $this->Keputusandprd = new Keputusandprd();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Keputusan DPRD',
            'datakeputusan' => $this->Keputusandprd->tampilkeputusandprd()
        ];
        return view('Backend.Keputusan DPRD.vkeputusandprd', $data);
    }

    public function addkeputusan()
    {
        $data = [
            'title' => 'Input Keputusan DPRD',
        ];
        return view('Backend.Keputusan DPRD.vaddkeputusandprd', $data);
    }

    public function simpankeputusan()
    {
        Request()->validate(
            [
                'filekeputusan' => 'required|mimes:pdf',
                'ketagorikeputusan' => 'required',
            ],
            [
                'filekeputusan.required' => 'Silahkan upload dokumen keputusan DPRD terlebih dahulu..!!',
                'filekeputusan.mimes' => 'Dokumen yang diupload harus format PDF..!!',
                'ketagorikeputusan.required' => 'Silahkan input kategori keputusan DPRD terlebih dahulu..!!',
            ]
        );

        $file = Request()->filekeputusan;
        $name_file = $file->getClientOriginalName();
        $file->move('keputusan dprd', $name_file);

        $data = [
            'filekeputusan' => $name_file,
            'kategori' => Request()->ketagorikeputusan,
            'slugkategori' => Str::slug(Request()->ketagorikeputusan, '-'),
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->Keputusandprd->simpankeputusandprd($data);
        return redirect()->route('admin.daftarkeputusan')->with('save', 'Dokumen Keputusan DPRD Berhasil diSimpan..!!');
    }


    public function editkeputusan($id)
    {
        $data = [
            'title' => 'Update Keputusan DPRD',
            'keputusandprd' => $this->Keputusandprd->editkeputusandprd($id)
        ];
        return view('Backend.Keputusan DPRD.veditkeputusandprd', $data);
    }


    public function rubahkeputusan($id)
    {
        Request()->validate(
            [
                'ketagorikeputusan' => 'required',
            ],
            [
                'ketagorikeputusan.required' => 'Silahkan input kategori peraturan DPRD terlebih dahulu..!!',
            ]
        );

        $filekeputusan = Keputusandprd::find($id); //Baca data foto berdasrakan id
        if (Request()->filekeputusan <> "") {
            Request()->validate(
                [
                    'filekeputusan' => 'required|mimes:pdf',
                ],
                [
                    'filekeputusan.required' => 'Silahkan upload dokumen keputusan DPRD terlebih dahulu..!!',
                    'filekeputusan.mimes' => 'Dokumen Keputusan yang diupload harus format PDF..!!',
                ]
            );

            $file = Request()->filekeputusan;
            $name_file = $file->getClientOriginalName();
            $lokasigambar = 'keputusan dprd/' . $filekeputusan->filekeputusan; //mengarahakn ke lokas/folderi foto dan ke field foto
            File::delete($lokasigambar); //hapus foto yang lama
            $file->move('keputusan dprd', $name_file); //upload foto yang baru

            $data = [
                'filekeputusan' => $name_file,
                'kategori' => Request()->ketagorikeputusan,
                'slugkategori' => Str::slug(Request()->ketagorikeputusan, '-'),
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Keputusandprd->rubahkeputusandprd($id, $data);
        } else {
            $data = [
                'kategori' => Request()->ketagorikeputusan,
                'slugkategori' => Str::slug(Request()->ketagorikeputusan, '-'),
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Keputusandprd->rubahkeputusandprd($id, $data);
        }
        return redirect()->route('admin.daftarkeputusan')->with('update', 'Dokumen Keputusan DPRD Berhasil diUpdate..!!');
    }

    public function hapuskeputusan($id)
    {
        $filekeputusan = Keputusandprd::find($id);
        $lokasigambar = 'keputusan dprd/' . $filekeputusan->filekeputusan;
        File::delete($lokasigambar);
        $this->Keputusandprd->hapuskeputusandprd($id);
        return redirect()->route('admin.daftarkeputusan')->with('delete', 'Dokumen Keputusan DPRD Berhasil dihapus');
    }
}
