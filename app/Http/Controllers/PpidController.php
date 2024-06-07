<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ppid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response; //Untuk download file

class PpidController extends Controller
{
    public function __construct()
    {
        $this->Ppid = new Ppid();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar PPID',
            'datappid' => $this->Ppid->tampilppid()
        ];
        return view('Backend.PPID.vppid', $data);
    }

    public function addppid()
    {
        $data = [
            'title' => 'Upload Dokumen PPID',
        ];
        return view('Backend.PPID.vaddppid', $data);
    }

    public function simpanppid()
    {
        Request()->validate(
            [
                'judulppid' => 'required',
                'keteranganppid' => 'required',
                'ketegorippid' => 'required',
                'fileppid' => 'required|mimes:pdf|max:2048',
            ],
            [
                'judulppid.required' => 'Silahkan masukan judul PPID terlebih dahulu terlbih dahulu..!!',
                'keteranganppid.required' => 'Silahkan input keterangan PPID terlebih dahulu..!!',
                'ketegorippid.required' => 'Silahkan pilih ketegori PPID terlebih dahulu..!!',
                'fileppid.required' => 'Silahkan input file PPID  harus di Upload..!!',
                'fileppid.max' => 'Ukuran file PPID minimal 2MB',
                'fileppid.mimes' => 'File PPID yang di upload harus berekstensi .Pdf'
            ]
        );

        $file = Request()->fileppid;
        $name_file = time() . str_replace("", "", $file->getClientOriginalName());
        $file->move('dokumen ppid', $name_file);

        $data = [
            'judulppid' => Request()->judulppid,
            'keteranganppid' => Request()->keteranganppid,
            'kategorippid' => Request()->ketegorippid,
            'slugkategorippid' => Str::slug(Request()->ketegorippid, '-'),
            'fileppid' => $name_file,
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->Ppid->simpanppid($data);
        return redirect()->route('admin.ppid')->with('save', 'PPID berhasil diposting..!!');
    }


    public function editppid($id)
    {
        $data = [
            'title' => 'Update PPID',
            'updateppid' => $this->Ppid->editppid($id)
        ];
        return view('Backend.PPID.veditppid', $data);
    }


    public function rubahppid($id)
    {
        Request()->validate(
            [
                'judulppid' => 'required',
                'keteranganppid' => 'required',
                // 'kategorippid' => 'required',
            ],
            [
                'judulppid.required' => 'Silahkan masukan judul PPID terlebih dahulu terlbih dahulu..!!',
                'keteranganppid.required' => 'Silahkan input keterangan PPID terlebih dahulu..!!',
                'kategorippid.required' => 'Silahkan pilih ketegori PPID terlebih dahulu..!!',
            ]
        );

        $datafoto = Ppid::find($id); //Baca data foto berdasrakan id
        if (Request()->fileppid <> "") {
            Request()->validate(
                [
                    'fileppid' => 'required|mimes:pdf|max:2048',
                ],
                [
                    'fileppid.required' => 'Silahkan input file PPID  harus di Upload..!!',
                    'fileppid.max' => 'Ukuran file PPID minimal 2MB',
                    'fileppid.mimes' => 'File PPID yang di upload harus berekstensi .Pdf'
                ]
            );

            $file = Request()->fileppid;
            $name_file = time() . str_replace("", "", $file->getClientOriginalName());
            $lokasigambar = 'dokumen ppid/' . $datafoto->fileppid; //mengarahakn ke lokas/folderi foto dan ke field foto
            File::delete($lokasigambar); //hapus foto yang lama
            $file->move('dokumen ppid', $name_file); //upload foto yang baru

            $data = [
                'judulppid' => Request()->judulppid,
                'keteranganppid' => Request()->keteranganppid,
                'kategorippid' => Request()->ketegorippid,
                'slugkategorippid' => Str::slug(Request()->ketegorippid, '-'),
                'fileppid' => $name_file,
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Ppid->rubahppid($id, $data);
        } else {
            $data = [
                'judulppid' => Request()->judulppid,
                'keteranganppid' => Request()->keteranganppid,
                'kategorippid' => Request()->ketegorippid,
                'slugkategorippid' => Str::slug(Request()->ketegorippid, '-'),
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Ppid->rubahppid($id, $data);
        }
        return redirect()->route('admin.ppid')->with('update', 'PPID berhasil di update..!!');
    }

    public function hapusppid($id)
    {
        $datafoto = Ppid::find($id);
        $lokasigambar = 'dokumen ppid/' . $datafoto->fileppid;
        File::delete($lokasigambar);
        $this->Ppid->hapusppid($id);
        return redirect()->route('admin.ppid')->with('delete', 'PPID berhasil dihapus..!!');
    }


    public function downloadppid($id)
    {
        $data = Ppid::find($id);
        $lokasifile = 'dokumen ppid/' . $data->fileppid;
        $header = array(
            'Content-Type: aplication/pdf',
        );
        return Response::download($lokasifile, $data->fileppid, $header);
    }
}
