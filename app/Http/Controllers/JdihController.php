<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Jdih;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response; //Untuk download file

class JdihController extends Controller
{
    public function __construct()
    {
        $this->Jdih = new Jdih();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Peraturan Daerah',
            'dataperda' => $this->Jdih->tampiljdih()
        ];
        return view('Backend.JDIH.vjdih', $data);
    }

    public function addjdih()
    {
        $data = [
            'title' => 'Upload Perturan Daerah',
        ];
        return view('Backend.JDIH.vaddjdih', $data);
    }

    public function simpanjdih()
    {
        Request()->validate(
            [
                'juduljdih' => 'required',
                'keteranganjdih' => 'required',
                'statusjdih' => 'required',
                'filejdih' => 'required|mimes:pdf|max:2048',
            ],
            [
                'juduljdih.required' => 'Silahkan masukan judul JDIH terlebih dahulu terlbih dahulu..!!',
                'keteranganjdih.required' => 'Silahkan input keterangan JDIH terlebih dahulu..!!',
                'statusjdih.required' => 'Silahkan pilih status JDIH terlebih dahulu..!!',
                'filejdih.required' => 'Silahkan input file JDIH  harus di Upload..!!',
                'filejdih.max' => 'Ukuran file JDIH minimal 2MB',
                'filejdih.mimes' => 'File JDIH yang di upload harus berekstensi .Pdf'
            ]
        );

        $file = Request()->filejdih;
        $name_file = time() . str_replace("", "", $file->getClientOriginalName());
        $file->move('dokumen jdih', $name_file);

        $data = [
            'juduljdih' => Request()->juduljdih,
            'slugjdih' => Str::slug(Request()->juduljdih, '-'),
            'deksripsijdih' => Request()->keteranganjdih,
            'status' => Request()->statusjdih,
            'filejdih' => $name_file,
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->Jdih->simpanjdih($data);
        return redirect()->route('admin.jdih')->with('save', 'JDIH berhasil diposting..!!');
    }


    public function editjdih($id)
    {
        $data = [
            'title' => 'Update JDIH',
            'updatejdih' => $this->Jdih->editjdih($id)
        ];
        return view('Backend.JDIH.veditjdih', $data);
    }


    public function rubahjdih($id)
    {
        Request()->validate(
            [
                'juduljdih' => 'required',
                'keteranganjdih' => 'required',
                'statusjdih' => 'required',

            ],
            [
                'juduljdih.required' => 'Silahkan masukan judul JDIH terlebih dahulu terlbih dahulu..!!',
                'keteranganjdih.required' => 'Silahkan input keterangan JDIH terlebih dahulu..!!',
                'statusjdih.required' => 'Silahkan pilih status JDIH terlebih dahulu..!!'
            ]
        );

        $datafoto = Jdih::find($id); //Baca data foto berdasrakan id
        if (Request()->filejdih <> "") {
            Request()->validate(
                [
                    'filejdih' => 'required|mimes:pdf|max:2048',
                ],
                [
                    'filejdih.required' => 'Silahkan input file JDIH  harus di Upload..!!',
                    'filejdih.max' => 'Ukuran file JDIH minimal 2MB',
                    'filejdih.mimes' => 'File JDIH yang di upload harus berekstensi .Pdf'
                ]
            );

            $file = Request()->filejdih;
            $name_file = time() . str_replace("", "", $file->getClientOriginalName());
            $lokasigambar = 'dokumen jdih/' . $datafoto->filejdih; //mengarahakn ke lokas/folderi foto dan ke field foto
            File::delete($lokasigambar); //hapus foto yang lama
            $file->move('dokumen jdih', $name_file); //upload foto yang baru

            $data = [
                'juduljdih' => Request()->juduljdih,
                'slugjdih' => Str::slug(Request()->juduljdih, '-'),
                'deksripsijdih' => Request()->keteranganjdih,
                'status' => Request()->statusjdih,
                'filejdih' => $name_file,
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Jdih->rubahjdih($id, $data);
        } else {
            $data = [
                'juduljdih' => Request()->juduljdih,
                'slugjdih' => Str::slug(Request()->juduljdih, '-'),
                'deksripsijdih' => Request()->keteranganjdih,
                'status' => Request()->statusjdih,
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Jdih->rubahjdih($id, $data);
        }
        return redirect()->route('admin.jdih')->with('update', 'JDIH berhasil di update..!!');
    }

    public function hapusjdih($id)
    {
        $datafoto = Jdih::find($id);
        $lokasigambar = 'dokumen jdih/' . $datafoto->filejdih;
        File::delete($lokasigambar);
        $this->Jdih->deletejdih($id);
        return redirect()->route('admin.jdih')->with('delete', 'JDIH berhasil dihapus..!!');
    }


    public function downloadjdih($id)
    {
        $data = Jdih::find($id);
        $lokasifile = 'dokumen jdih/' . $data->filejdih;
        $header = array(
            'Content-Type: aplication/pdf',
        );
        return Response::download($lokasifile, $data->filejdih, $header);
    }
}
