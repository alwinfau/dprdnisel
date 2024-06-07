<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response; //Untuk download file

class PengumumanController extends Controller
{
    public function __construct()
    {
        $this->Pengumuman = new Pengumuman();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Postingan Pengumuman',
            'datapengumuman' => $this->Pengumuman->tampilpengumuman()
        ];
        return view('Backend.Informasi Publik.Pengumumman.vpengumuman', $data);
    }

    public function addpengumuman()
    {
        $data = [
            'title' => 'Posting Pengumuman',
        ];
        return view('Backend.Informasi Publik.Pengumumman.vaddpengumuman', $data);
    }

    public function simpanpengumuman()
    {
        Request()->validate(
            [
                'judulpengumuman' => 'required',
                'kategoripengumuman' => 'required',
                'filepengumuman' => 'required|mimes:pdf|max:2048',
            ],
            [
                'judulpengumuman.required' => 'Silahkan masukan judul pengumuman terlebih dahulu terlbih dahulu..!!',
                'kategoripengumuman.required' => 'Silahkan isikan kategori pengumuman terlebih dahulu..!!',
                'filepengumuman.required' => 'Silahkan input file lampiran pengumuman  harus di Upload..!!',
                'filepengumuman.max' => 'Ukuran file lampiran pengumuman minimal 2MB',
                'filepengumuman.mimes' => 'File lampiran pengumuman yang di upload harus berekstensi .Pdf'
            ]
        );

        $file = Request()->filepengumuman;
        $name_file = time() . str_replace("", "", $file->getClientOriginalName());
        $file->move('dokumen pengumuman', $name_file);

        $data = [
            'judulpengumuman' => Request()->judulpengumuman,
            'kategoripengumuman' => Request()->kategoripengumuman,
            'slugkategoripengumuman' => Str::slug(Request()->kategoripengumuman, '-'),
            'lampiranpengumuman' => $name_file,
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->Pengumuman->simpanpengumuman($data);
        return redirect()->route('admin.pengumuman')->with('save', 'pengumuman berhasil diposting..!!');
    }


    public function editpengumuman($id)
    {
        $data = [
            'title' => 'Update Pengumuman',
            'updatepengumuman' => $this->Pengumuman->editpengumuman($id)
        ];
        return view('Backend.Informasi Publik.Pengumumman.veditpengumuman', $data);
    }


    public function rubahpengumuman($id)
    {
        Request()->validate(
            [
                'judulpengumuman' => 'required',
                'kategoripengumuman' => 'required',

            ],
            [
                'judulpengumuman.required' => 'Silahkan masukan judul pengumuman terlebih dahulu terlbih dahulu..!!',
                'kategoripengumuman.required' => 'Silahkan isikan kategori pengumuman terlebih dahulu..!!',
            ]
        );

        $datafoto = Pengumuman::find($id); //Baca data foto berdasrakan id
        if (Request()->filekinerja <> "") {
            Request()->validate(
                [
                    'filepengumuman' => 'required|mimes:pdf|max:2048',
                ],
                [
                    'filepengumuman.required' => 'Silahkan input file lampiran pengumuman  harus di Upload..!!',
                    'filepengumuman.max' => 'Ukuran file lampiran pengumuman minimal 2MB',
                    'filepengumuman.mimes' => 'File lampiran pengumuman yang di upload harus berekstensi .Pdf'
                ]
            );

            $file = Request()->filepengumuman;
            $name_file = time() . str_replace("", "", $file->getClientOriginalName());
            $lokasigambar = 'dokumen pengumuman/' . $datafoto->lampiranpengumuman; //mengarahakn ke lokas/folderi foto dan ke field foto
            File::delete($lokasigambar); //hapus foto yang lama
            $file->move('dokumen pengumuman', $name_file); //upload foto yang baru

            $data = [
                'judulpengumuman' => Request()->judulpengumuman,
                'kategoripengumuman' => Request()->kategoripengumuman,
                'slugkategoripengumuman' => Str::slug(Request()->kategoripengumuman, '-'),
                'lampiranpengumuman' => $name_file,
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Pengumuman->rubahpengumuman($id, $data);
        } else {
            $data = [
                'judulpengumuman' => Request()->judulpengumuman,
                'kategoripengumuman' => Request()->kategoripengumuman,
                'slugkategoripengumuman' => Str::slug(Request()->kategoripengumuman, '-'),
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Pengumuman->rubahpengumuman($id, $data);
        }
        return redirect()->route('admin.pengumuman')->with('update', 'pengumuman berhasil di update..!!');
    }

    public function hapuspengumuman($id)
    {
        $datafoto = Pengumuman::find($id);
        $lokasigambar = 'dokumen pengumuman/' . $datafoto->lampiranpengumuman;
        File::delete($lokasigambar);
        $this->Pengumuman->deletepengumuman($id);
        return redirect()->route('admin.pengumuman')->with('delete', 'pengumuman berhasil dihapus..!!');
    }


    public function downloadpengumuman($id)
    {
        $data = Pengumuman::find($id);
        $lokasifile = 'dokumen pengumuman/' . $data->lampiranpengumuman;
        $header = array(
            'Content-Type: aplication/pdf',
        );
        return Response::download($lokasifile, $data->lampiranpengumuman, $header);
    }
}
