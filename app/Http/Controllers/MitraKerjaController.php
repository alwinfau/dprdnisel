<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MitraKerja;
use App\Models\Akd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MitraKerjaController extends Controller
{
    public function __construct()
    {
        $this->MitraKerja = new MitraKerja();
        $this->Akd = new Akd();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Mitra Kerja',
            'datamitrakerja' => $this->MitraKerja->tampilmitrakerja()
        ];
        return view('Backend.Mitra Kerja.vmitrakerja', $data);
    }

    public function addmitrakerja()
    {
        $data = [
            'title' => 'Tambahkan Mitra Kerja',
            'dataakd' => $this->Akd->tampilakd(),
        ];
        return view('Backend.Mitra Kerja.vaddmitrakerja', $data);
    }

    public function simpanmitrakerja()
    {
        Request()->validate(
            [
                'komisi' => 'required',
                'namaodp' => 'required',
                'logoodp' => 'required|image|mimes:jpg|max:2048',
            ],
            [
                'komisi.required' => 'Silahkan pilih komisi terlebih dahulu..!!',
                'namaodp.required' => 'Silahkan isikan nama odp mitra kerja terlebih dahulu..!!',
                'logoodp.required' => 'Silahkan upload logo odp mitra kerja..!!',
                'logoodp.max' => 'Ukuran Gambar minimal 2MB',
                'logoodp.mimes' => 'Logo yang di upload harus berekstensi .jpg'
            ]
        );

        $file = Request()->logoodp;
        $name_file = time() . str_replace("", "", $file->getClientOriginalName());
        $file->move('mitra kerja', $name_file);

        $data = [
            'namaopd' => Request()->namaodp,
            'logoopd' => $name_file,
            'kodekomisi' => Request()->komisi,
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->MitraKerja->simpanmitrakerja($data);
        return redirect()->route('admin.daftarmitrakerja')->with('save', 'Mitra Kerja berhasil disimpan..!!');
    }


    public function editmitrakerja($id)
    {
        $data = [
            'title' => 'Update Mitra Kerja',
            'dataakd' => $this->Akd->tampilakd(),
            'updatemitrakerja' => $this->MitraKerja->editmitrakerja($id)
        ];
        return view('Backend.Mitra Kerja.veditmitrakerja', $data);
    }


    public function rubahmitrakerja($id)
    {
        Request()->validate(
            [
                'komisi' => 'required',
                'namaodp' => 'required'
            ],
            [
                'komisi.required' => 'Silahkan pilih komisi terlebih dahulu..!!',
                'namaodp.required' => 'Silahkan isikan nama odp mitra kerja terlebih dahulu..!!'
            ]
        );

        $datafoto = MitraKerja::find($id); //Baca data foto berdasrakan id
        if (Request()->logoodp <> "") {
            Request()->validate(
                [
                    'logoodp' => 'required|image|mimes:jpg|max:2048',
                ],
                [
                    'logoodp.required' => 'Silahkan upload logo odp mitra kerja..!!',
                    'logoodp.max' => 'Ukuran Gambar minimal 2MB',
                    'logoodp.mimes' => 'Logo yang di upload harus berekstensi .jpg'
                ]
            );

            $file = Request()->logoodp;
            $name_file = time() . str_replace("", "", $file->getClientOriginalName());
            $lokasigambar = 'mitra kerja/' . $datafoto->logoodp; //mengarahakn ke lokas/folderi foto dan ke field foto
            File::delete($lokasigambar); //hapus foto yang lama
            $file->move('mitra kerja', $name_file); //upload foto yang baru

            $data = [
                'namaopd' => Request()->namaodp,
                'logoopd' => $name_file,
                'kodekomisi' => Request()->komisi,
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->MitraKerja->rubahmitrakerja($id, $data);
        } else {
            $data = [
                'namaopd' => Request()->namaodp,
                'kodekomisi' => Request()->komisi,
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->MitraKerja->rubahmitrakerja($id, $data);
        }
        return redirect()->route('admin.daftarmitrakerja')->with('update', 'Mitra Kerja berhasil di update..!!');
    }

    public function hapusmitrakerja($id)
    {
        $logoodp = MitraKerja::find($id);
        $lokasigambar = 'mitra kerja/' . $logoodp->logoopd;
        File::delete($lokasigambar);
        $this->MitraKerja->hapusmitrakerja($id);
        return redirect()->route('admin.daftarmitrakerja')->with('delete', 'Mitra Kerja berhasil dihapus..!!');
    }
}
