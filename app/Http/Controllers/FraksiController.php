<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fraksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FraksiController extends Controller
{
    public function __construct()
    {
        $this->Fraksi = new Fraksi();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Fraksi',
            'datafraksi' => $this->Fraksi->tampilfraksi()
        ];
        return view('Backend.Fraksi.vfraksi', $data);
    }

    public function addfraksi()
    {
        $data = [
            'title' => 'Tambah Fraksi',
        ];
        return view('Backend.Fraksi.vaddfraksi', $data);
    }

    public function simpanfraksi()
    {
        Request()->validate(
            [
                'fraksi' => 'required',
                'logo' => 'required|image|mimes:png|max:2048',
            ],
            [
                'fraksi.required' => 'Silahkan isikan nama fraksi terlebih dahulu..!!',
                'logo.required' => 'Logo Fraksi harus di Upload..!!',
                'logo.max' => 'Ukuran Gambar minimal 2MB',
                'logo.mimes' => 'Logo yang di upload harus berekstensi .Png'
            ]
        );

        $file = Request()->logo;
        $name_file = time() . str_replace("", "", $file->getClientOriginalName());
        $file->move('logo fraksi', $name_file);

        $data = [
            'fraksi' => Request()->fraksi,
            'slugfraksi' => Str::slug(Request()->fraksi, '-'),
            'logofraksi' => $name_file,
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->Fraksi->simpanfraksi($data);
        return redirect()->route('admin.daftarfraksi')->with('save', 'Fraksi berhasil disimpan..!!');
    }


    public function editfraksi($id)
    {
        $data = [
            'title' => 'Update Fraksi',
            'updatefraksi' => $this->Fraksi->editfraksi($id)
        ];
        return view('Backend.Fraksi.veditfraksi', $data);
    }


    public function rubahfraksi($id)
    {
        Request()->validate(
            [
                'fraksi' => 'required',
            ],
            [
                'fraksi.required' => 'Silahkan isikan nama fraksi terlebih dahulu..!!',
            ]
        );

        $datafoto = Fraksi::find($id); //Baca data foto berdasrakan id
        if (Request()->logo <> "") {
            Request()->validate(
                [
                    'fraksi' => 'required',
                    'logo' => 'required|image|mimes:png|max:2048',
                ],
                [
                    'fraksi.required' => 'Silahkan isikan nama fraksi terlebih dahulu..!!',
                    'logo.required' => 'Logo Fraksi harus di Upload..!!',
                    'logo.max' => 'Ukuran Gambar minimal 2MB',
                    'logo.mimes' => 'Logo yang di upload harus berekstensi .Png'
                ]
            );

            $file = Request()->logo;
            $name_file = time() . str_replace("", "", $file->getClientOriginalName());
            $lokasigambar = 'logo fraksi/' . $datafoto->logofraksi; //mengarahakn ke lokas/folderi foto dan ke field foto
            File::delete($lokasigambar); //hapus foto yang lama
            $file->move('logo fraksi', $name_file); //upload foto yang baru

            $data = [
                'fraksi' => Request()->fraksi,
                'slugfraksi' => Str::slug(Request()->fraksi, '-'),
                'logofraksi' => $name_file,
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Fraksi->rubahfraksi($id, $data);
        } else {
            $data = [
                'fraksi' => Request()->fraksi,
                'slugfraksi' => Str::slug(Request()->fraksi, '-'),
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Fraksi->rubahfraksi($id, $data);
        }

        return redirect()->route('admin.daftarfraksi')->with('update', 'Fraksi berhasil di update..!!');
    }

    public function hapusfraksi($id)
    {
        $datafoto = Fraksi::find($id);
        $lokasigambar = 'logo fraksi/' . $datafoto->logofraksi;
        File::delete($lokasigambar);
        $this->Fraksi->hapusfraksi($id);
        return redirect()->route('admin.daftarfraksi')->with('delete', 'Data Fraksi berhasil dihapus..!!');
    }
}
