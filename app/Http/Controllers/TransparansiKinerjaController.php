<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransparansiKinerja;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response; //Untuk download file

class TransparansiKinerjaController extends Controller
{
    public function __construct()
    {
        $this->TransparansiKinerja = new TransparansiKinerja();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Transparansi Kinerja',
            'datakinerja' => $this->TransparansiKinerja->tampilkinerja()
        ];
        return view('Backend.Informasi Publik.TransparansiKinerja.vkinerja', $data);
    }

    public function addkinerja()
    {
        $data = [
            'title' => 'Tambah Dokumen Kinerja',
        ];
        return view('Backend.Informasi Publik.TransparansiKinerja.vaddkinerja', $data);
    }

    public function simpankinerja()
    {
        Request()->validate(
            [
                'judulkinerja' => 'required',
                'kategorikinerja' => 'required',
                'filekinerja' => 'required|mimes:pdf|max:2048',
            ],
            [
                'judulkinerja.required' => 'Silahkan isikan nama atau judul dokumen terlbih dahulu..!!',
                'kategorikinerja.required' => 'Silahkan isikan kategori dokumen terlebih dahulu..!!',
                'filekinerja.required' => 'File transparansi anggaran Fraksi harus di Upload..!!',
                'filekinerja.max' => 'Ukuran file transparansi anggaran minimal 2MB',
                'filekinerja.mimes' => 'File transparansi anggaran yang di upload harus berekstensi .Pdf'
            ]
        );

        $file = Request()->filekinerja;
        $name_file = time() . str_replace("", "", $file->getClientOriginalName());
        $file->move('dokumen kinerja', $name_file);

        $data = [
            'judulkinerja' => Request()->judulkinerja,
            'kategorikinerja' => Request()->kategorikinerja,
            'slugkategorikinerja' => Str::slug(Request()->kategorikinerja, '-'),
            'dokumenkinerja' => $name_file,
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->TransparansiKinerja->simpankinerja($data);
        return redirect()->route('admin.kinerja')->with('save', 'Dokumen transparansi kinerja berhasil upload..!!');
    }


    public function editkinerja($id)
    {
        $data = [
            'title' => 'Update Dokumen Transparansi Kinerja',
            'updatekinerja' => $this->TransparansiKinerja->editkinerja($id)
        ];
        return view('Backend.Informasi Publik.TransparansiKinerja.veditkinerja', $data);
    }


    public function rubahkinerja($id)
    {
        Request()->validate(
            [
                'judulkinerja' => 'required',
                'kategorikinerja' => 'required',

            ],
            [
                'judulkinerja.required' => 'Silahkan isikan nama atau judul dokumen terlebih dahulu..!!',
                'kategorikinerja.required' => 'Silahkan isikan kategori dokumen terlebih dahulu..!!',
            ]
        );

        $datafoto = TransparansiKinerja::find($id); //Baca data foto berdasrakan id
        if (Request()->filekinerja <> "") {
            Request()->validate(
                [
                    'filekinerja' => 'required|mimes:pdf|max:2048',
                ],
                [
                    'filekinerja.required' => 'File transparansi anggaran Fraksi harus di Upload..!!',
                    'filekinerja.max' => 'Ukuran file transparansi anggaran minimal 2MB',
                    'filekinerja.mimes' => 'File transparansi anggaran yang di upload harus berekstensi .Pdf'
                ]
            );

            $file = Request()->filekinerja;
            $name_file = time() . str_replace("", "", $file->getClientOriginalName());
            $lokasigambar = 'dokumen kinerja/' . $datafoto->dokumenkinerja; //mengarahakn ke lokas/folderi foto dan ke field foto
            File::delete($lokasigambar); //hapus foto yang lama
            $file->move('dokumen kinerja', $name_file); //upload foto yang baru

            $data = [
                'judulkinerja' => Request()->judulkinerja,
                'kategorikinerja' => Request()->kategorikinerja,
                'slugkategorikinerja' => Str::slug(Request()->kategorikinerja, '-'),
                'dokumenkinerja' => $name_file,
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->TransparansiKinerja->rubahkinerja($id, $data);
        } else {
            $data = [
                'judulkinerja' => Request()->judulkinerja,
                'kategorikinerja' => Request()->kategorikinerja,
                'slugkategorikinerja' => Str::slug(Request()->kategorikinerja, '-'),
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->TransparansiKinerja->rubahkinerja($id, $data);
        }
        return redirect()->route('admin.kinerja')->with('update', 'Dokumen transparansi kinerja berhasil di update..!!');
    }

    public function hapuskinerja($id)
    {
        $datafoto = TransparansiKinerja::find($id);
        $lokasigambar = 'dokumen kinerja/' . $datafoto->dokumenkinerja;
        File::delete($lokasigambar);
        $this->TransparansiKinerja->deletekinerja($id);
        return redirect()->route('admin.kinerja')->with('delete', 'Dokumen transparansi kinerja berhasil dihapus..!!');
    }


    public function downloadkinerja($id)
    {
        $data = TransparansiKinerja::find($id);
        $lokasifile = 'dokumen kinerja/' . $data->dokumenkinerja;
        $header = array(
            'Content-Type: aplication/pdf',
        );
        return Response::download($lokasifile, $data->dokumenkinerja, $header);
    }
}
