<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransparansiAnggaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response; //Untuk download file

class TransparansiAnggaranController extends Controller
{
    public function __construct()
    {
        $this->TransparansiAnggaran = new TransparansiAnggaran();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Transparansi Anggaran',
            'dataanggaran' => $this->TransparansiAnggaran->tampiltransparansi_anggarans()
        ];
        return view('Backend.Informasi Publik.TransparansiAnggaran.vanggaran', $data);
    }

    public function addtransparansianggaran()
    {
        $data = [
            'title' => 'Tambah Transparansi Anggaran',
        ];
        return view('Backend.Informasi Publik.TransparansiAnggaran.vaddanggaran', $data);
    }

    public function simpantransparansianggaran()
    {
        Request()->validate(
            [
                'juduldokumen' => 'required',
                'kategoridokumen' => 'required',
                'filetransparansianggaran' => 'required|mimes:pdf|max:2048',
            ],
            [
                'juduldokumen.required' => 'Silahkan isikan nama atau judul dokumen terlbih dahulu..!!',
                'kategoridokumen.required' => 'Silahkan isikan kategori dokumen terlebih dahulu..!!',
                'filetransparansianggaran.required' => 'File transparansi anggaran Fraksi harus di Upload..!!',
                'filetransparansianggaran.max' => 'Ukuran file transparansi anggaran minimal 2MB',
                'filetransparansianggaran.mimes' => 'File transparansi anggaran yang di upload harus berekstensi .Pdf'
            ]
        );

        $file = Request()->filetransparansianggaran;
        $name_file = time() . str_replace("", "", $file->getClientOriginalName());
        $file->move('dokumen anggaran', $name_file);

        $data = [
            'judulanggaran' => Request()->juduldokumen,
            'kategorianggaran' => Request()->kategoridokumen,
            'slug_kategorianggaran' => Str::slug(Request()->kategoridokumen, '-'),
            'dokumenanggaran' => $name_file,
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->TransparansiAnggaran->simpantransparansi_anggarans($data);
        return redirect()->route('admin.transparansianggaran')->with('save', 'Dokumen transparansi anggaran berhasil disimpan..!!');
    }


    public function edittransparansianggaran($id)
    {
        $data = [
            'title' => 'Update Dokumen Transparansi Anggaran',
            'updatetransparansianggaran' => $this->TransparansiAnggaran->edittransparansi_anggarans($id)
        ];
        return view('Backend.Informasi Publik.TransparansiAnggaran.veditanggaran', $data);
    }


    public function rubahtransparansianggaran($id)
    {
        Request()->validate(
            [
                'juduldokumen' => 'required',
                'kategoridokumen' => 'required',

            ],
            [
                'juduldokumen.required' => 'Silahkan isikan nama atau judul dokumen terlbih dahulu..!!',
                'kategoridokumen.required' => 'Silahkan isikan kategori dokumen terlebih dahulu..!!',
            ]
        );

        $datafoto = TransparansiAnggaran::find($id); //Baca data foto berdasrakan id
        if (Request()->filetransparansianggaran <> "") {
            Request()->validate(
                [
                    'filetransparansianggaran' => 'required|mimes:pdf|max:2048',
                ],
                [
                    'filetransparansianggaran.required' => 'File transparansi anggaran Fraksi harus di Upload..!!',
                    'filetransparansianggaran.max' => 'Ukuran file transparansi anggaran minimal 2MB',
                    'filetransparansianggaran.mimes' => 'File transparansi anggaran yang di upload harus berekstensi .Pdf'
                ]
            );

            $file = Request()->filetransparansianggaran;
            $name_file = time() . str_replace("", "", $file->getClientOriginalName());
            $lokasigambar = 'dokumen anggaran/' . $datafoto->dokumenanggaran; //mengarahakn ke lokas/folderi foto dan ke field foto
            File::delete($lokasigambar); //hapus foto yang lama
            $file->move('dokumen anggaran', $name_file); //upload foto yang baru

            $data = [
                'judulanggaran' => Request()->juduldokumen,
                'kategorianggaran' => Request()->kategoridokumen,
                'slug_kategorianggaran' => Str::slug(Request()->kategoridokumen, '-'),
                'dokumenanggaran' => $name_file,
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->TransparansiAnggaran->rubahtransparansi_anggarans($id, $data);
        } else {
            $data = [
                'judulanggaran' => Request()->juduldokumen,
                'kategorianggaran' => Request()->kategoridokumen,
                'slug_kategorianggaran' => Str::slug(Request()->kategoridokumen, '-'),
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->TransparansiAnggaran->rubahtransparansi_anggarans($id, $data);
        }

        return redirect()->route('admin.transparansianggaran')->with('update', 'Dokumen transparansi anggaran berhasil di update..!!');
    }

    public function hapustransparansianggaran($id)
    {
        $datafoto = TransparansiAnggaran::find($id);
        $lokasigambar = 'dokumen anggaran/' . $datafoto->dokumenanggaran;
        File::delete($lokasigambar);
        $this->TransparansiAnggaran->hapustransparansi_anggarans($id);
        return redirect()->route('admin.transparansianggaran')->with('delete', 'Dokumen transparansi anggaran berhasil dihapus..!!');
    }


    public function downloadtransparansianggaran($id)
    {
        $data = TransparansiAnggaran::find($id);
        $lokasifile = 'dokumen anggaran/' . $data->dokumenanggaran;
        $header = array(
            'Content-Type: aplication/pdf',
        );
        return Response::download($lokasifile, $data->dokumenanggaran, $header);
    }
}
