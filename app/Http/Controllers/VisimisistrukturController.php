<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visimisistruktur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class VisimisistrukturController extends Controller
{
    public function __construct()
    {
        $this->Visimisistruktur = new Visimisistruktur();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Visi Misi',
            'visimisi' => $this->Visimisistruktur->tampilvisimisi(),
            'strukturorganisasi' => $this->Visimisistruktur->tampilstruktur()
        ];
        return view('Backend.Visimisi.vvisimisi', $data);
    }

    public function addvisimisi()
    {
        $data = [
            'title' => 'Visi Misi & Struktur Organisasi',
        ];
        return view('Backend.Visimisi.vaddvisimisi', $data);
    }

    public function simpanvisimisi()
    {
        Request()->validate(
            [
                'visimisi' => 'required',
                'struktur' => 'required|image|mimes:png|max:2048|dimensions:width=3508,height=2481',
            ],
            [
                'visimisi.required' => 'Silahkan input visi misi terlebih dahulu..!!',
                'struktur.required' => 'Silahkan upload file truktur organisasi terlebih dahulu..!!',
                'struktur.max' => 'Ukuran Gambar minimal 2MB',
                'struktur.mimes' => 'fiel struktur yang di upload harus dan wajib berekstensi .Png',
                'struktur.dimensions' => 'Lebar dan tinggi file struktur organisasi Maksimal 3508 X 2481 Piksel',
            ]
        );

        $file = Request()->struktur;
        $name_file = time() . str_replace("", "", $file->getClientOriginalName());
        $file->move('struktur organisasi', $name_file);

        $data = [
            'visimisi' => Request()->visimisi,
            'struktur' => $name_file,
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->Visimisistruktur->simpanvisimisi($data);
        return redirect()->route('admin.visimisi')->with('save', 'Visi Misi dan Struktur berhasil diposting..!!');
    }


    public function editvisimisi($id)
    {
        $data = [
            'title' => 'Update Visi Misi dan Struktur',
            'updatevisimisi' => $this->Visimisistruktur->editvisimisi($id),
        ];
        return view('Backend.Visimisi.veditvisimisi', $data);
    }


    public function rubahvisimisi($id)
    {
        Request()->validate(
            [
                'visimisi' => 'required',
            ],
            [
                'visimisi.required' => 'Silahkan input visi misi terlebih dahulu..!!',
            ]
        );

        $datafoto = Visimisistruktur::find($id); //Baca data foto berdasrakan id
        if (Request()->struktur <> "") {
            Request()->validate(
                [
                    'struktur' => 'required|image|mimes:png|max:2048|dimensions:width=3508,height=2481',
                ],
                [
                    'struktur.required' => 'Silahkan upload file truktur organisasi terlebih dahulu..!!',
                    'struktur.max' => 'Ukuran Gambar minimal 2MB',
                    'struktur.mimes' => 'file struktur yang di upload harus dan wajib berekstensi .Png',
                    'struktur.dimensions' => 'Lebar dan tinggi file struktur organisasi Maksimal 3508 X 2481 Piksel',
                ]
            );

            $file = Request()->struktur;
            $name_file = time() . str_replace("", "", $file->getClientOriginalName());
            $lokasigambar = 'struktur organisasi/' . $datafoto->struktur; //mengarahakn ke lokas/folderi foto dan ke field foto
            File::delete($lokasigambar); //hapus foto yang lama
            $file->move('struktur organisasi', $name_file); //upload foto yang baru

            $data = [
                'visimisi' => Request()->visimisi,
                'struktur' => $name_file,
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Visimisistruktur->rubahvisimisi($id, $data);
        } else {
            $data = [
                'visimisi' => Request()->visimisi,
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Visimisistruktur->rubahvisimisi($id, $data);
        }

        return redirect()->route('admin.visimisi')->with('update', 'Visi Misi berhasil diupdate..!!');
    }

    public function hapusvisimisi($id)
    {
        $datafoto = Visimisistruktur::find($id);
        $lokasigambar = 'struktur organisasi/' . $datafoto->struktur;
        File::delete($lokasigambar);
        $this->Visimisistruktur->hapusvisimisi($id);
        return redirect()->route('admin.visimisi')->with('delete', 'Visimisi dan Struktur Organisasi berhasil dihapus..!!');
    }
}
