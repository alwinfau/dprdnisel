<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AkdController extends Controller
{
    public function __construct()
    {
        $this->Akd = new Akd();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Alat Kelengkapan Dewan',
            'dataakd' => $this->Akd->tampilakd()
        ];
        return view('Backend.Akd.vakd', $data);
    }

    public function addakd()
    {
        $data = [
            'title' => 'Input Alat Kelangkapan Dewan',
        ];
        return view('Backend.Akd.vaddakd', $data);
    }

    public function simpanakd()
    {
        Request()->validate(
            [
                'akd' => 'required',
                'akd' => 'required',
                'iconakd' => 'required|image|mimes:png|max:1024',
            ],
            [
                'akd.required' => 'Silahkan isikan nama alat kelengkapan dewan terlebih dahulu..!!',
                'keteranganakd.required' => 'Silahkan isikan keterangan alat kelengkapan dewan terlebih dahulu..!!',
                'iconakd.required' => 'Icon AKD harus di Upload..!!',
                'iconakd.max' => 'Ukuran Gambar minimal 1 MB',
                'iconakd.mimes' => 'Icon AKD yang di upload harus berekstensi .Png'
            ]
        );

        $file = Request()->iconakd;
        $name_file = time() . str_replace("", "", $file->getClientOriginalName());
        $file->move('icon akd', $name_file);

        $data = [
            'akd' => Request()->akd,
            'keteranganakd' => Request()->keteranganakd,
            'slugakd' => Str::slug(Request()->akd, '-'),
            'iconakd' => $name_file,
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->Akd->simpanakd($data);
        return redirect()->route('admin.daftarakd')->with('save', 'Alat Kelengkapan Dewan Berhasil diSimpan..!!');
    }


    public function editakd($id)
    {
        $data = [
            'title' => 'Update Alat Kelengkapan Dewan',
            'editakd' => $this->Akd->editakd($id)
        ];
        return view('Backend.Akd.veditakd', $data);
    }


    public function rubahakd($id)
    {

        Request()->validate(
            [
                'akd' => 'required',
                'keteranganakd' => 'required',
            ],
            [
                'akd.required' => 'Silahkan isikan nama alat kelengkapan dewan terlebih dahulu..!!',
                'keteranganakd.required' => 'Silahkan isikan keterangan alat kelengkapan dewan terlebih dahulu..!!',
            ]
        );

        $datafoto = Akd::find($id); //Baca data foto berdasrakan id
        if (Request()->iconakd <> "") {
            Request()->validate(
                [
                    'iconakd' => 'required|image|mimes:png|max:1024',
                ],
                [
                    'iconakd.required' => 'Icon AKD harus di Upload..!!',
                    'iconakd.max' => 'Ukuran Gambar minimal 1 MB',
                    'iconakd.mimes' => 'Icon AKD yang di upload harus berekstensi .Png'
                ]
            );

            $file = Request()->iconakd;
            $name_file = time() . str_replace("", "", $file->getClientOriginalName());
            $lokasigambar = 'icon akd/' . $datafoto->logofraksi; //mengarahakn ke lokas/folderi foto dan ke field foto
            File::delete($lokasigambar); //hapus foto yang lama
            $file->move('icon akd', $name_file); //upload foto yang baru

            $data = [
                'akd' => Request()->akd,
                'keteranganakd' => Request()->keteranganakd,
                'slugakd' => Str::slug(Request()->akd, '-'),
                'iconakd' => $name_file,
                'iduser' => Auth::user()->id,
                'created_at' =>  date('Y-m-d H:i:s'),
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Akd->rubahakd($id, $data);
        } else {
            $data = [
                'akd' => Request()->akd,
                'keteranganakd' => Request()->keteranganakd,
                'slugakd' => Str::slug(Request()->akd, '-'),
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Akd->rubahakd($id, $data);
        }
        return redirect()->route('admin.daftarakd')->with('update', 'Alat Kelengkapan Dewan Berhasil diUpdate..!!');
    }

    public function hapusakd($id)
    {
        $datafoto = Akd::find($id);
        $lokasigambar = 'icon akd/' . $datafoto->iconakd;
        File::delete($lokasigambar);
        $this->Akd->hapusakd($id);
        return redirect()->route('admin.daftarakd')->with('delete', 'Alat Kelengkapan Dewan Berhasil dihapus');
    }
}
