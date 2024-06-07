<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tatatertip;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class TatatertipController extends Controller
{
    public function __construct()
    {
        $this->Tatatertip = new Tatatertip();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Peraturan DPRD',
            'datatatatertib' => $this->Tatatertip->tampiltatatertib()
        ];
        return view('Backend.Tatatertib.vtatatertib', $data);
    }

    public function addtatatertib()
    {
        $data = [
            'title' => 'Input Peraturan DPRD',
        ];
        return view('Backend.Tatatertib.vaddtatatertib', $data);
    }

    public function simpantatatertib()
    {
        Request()->validate(
            [
                'fileperaturan' => 'required|mimes:pdf',
                'kategoriperaturan' => 'required',
            ],
            [
                'fileperaturan.required' => 'Silahkan upload peraturan DPRD terlebih dahulu..!!',
                'fileperaturan.mimes' => 'File yang diupload harus format PDF..!!',
                'kategoriperaturan.required' => 'Silahkan input kategori peraturan DPRD terlebih dahulu..!!',
            ]
        );

        $file = Request()->fileperaturan;
        $name_file = $file->getClientOriginalName();
        $file->move('peraturan dprd', $name_file);

        $data = [
            'fileperaturan' => $name_file,
            'kategori' => Request()->kategoriperaturan,
            'slugkategori' => Str::slug(Request()->kategoriperaturan, '-'),
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->Tatatertip->simpantatatertib($data);
        return redirect()->route('admin.tatatertib')->with('save', 'Perturan DPRD Berhasil diSimpan..!!');
    }


    public function edittatatertib($id)
    {
        $data = [
            'title' => 'Update Perturan DPRD',
            'edittatatertib' => $this->Tatatertip->edittatatertib($id)
        ];
        return view('Backend.Tatatertib.vedittatatertib', $data);
    }


    public function rubahtatatertib($id)
    {
        Request()->validate(
            [
                'kategoriperaturan' => 'required',
            ],
            [
                'kategoriperaturan.required' => 'Silahkan input kategori peraturan DPRD terlebih dahulu..!!',
            ]
        );

        $fileperaturan = Tatatertip::find($id); //Baca data foto berdasrakan id
        if (Request()->fileperaturan <> "") {
            Request()->validate(
                [
                    'fileperaturan' => 'required|mimes:pdf',
                ],
                [
                    'fileperaturan.required' => 'Silahkan upload peraturan DPRD terlebih dahulu..!!',
                    'fileperaturan.mimes' => 'File yang diupload harus format PDF..!!',
                ]
            );

            $file = Request()->fileperaturan;
            $name_file = $file->getClientOriginalName();
            $lokasigambar = 'peraturan dprd/' . $fileperaturan->fileperaturan; //mengarahakn ke lokas/folderi foto dan ke field foto
            File::delete($lokasigambar); //hapus foto yang lama
            $file->move('peraturan dprd', $name_file); //upload foto yang baru

            $data = [
                'fileperaturan' => $name_file,
                'kategori' => Request()->kategoriperaturan,
                'slugkategori' => Str::slug(Request()->kategoriperaturan, '-'),
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Tatatertip->rubahtatatertib($id, $data);
        } else {
            $data = [
                'kategori' => Request()->kategoriperaturan,
                'slugkategori' => Str::slug(Request()->kategoriperaturan, '-'),
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Tatatertip->rubahtatatertib($id, $data);
        }

        return redirect()->route('admin.tatatertib')->with('update', 'Perturan DPRD Berhasil diUpdate..!!');
    }

    public function hapustatatertib($id)
    {
        $dokumen = Tatatertip::find($id);
        $lokasigambar = 'peraturan dprd/' . $dokumen->fileperaturan;
        File::delete($lokasigambar);
        $this->Tatatertip->hapustatatertib($id);
        return redirect()->route('admin.tatatertib')->with('delete', 'Perturan Berhasil dihapus');
    }
}
