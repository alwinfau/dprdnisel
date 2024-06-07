<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Struktural;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class StrukturalController extends Controller
{
    public function __construct()
    {
        $this->Struktural = new Struktural();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Struktural',
            'datastruktural' => $this->Struktural->tampilstruktural()
        ];
        return view('Backend.Struktural.vstruktural', $data);
    }

    public function addstruktural()
    {
        $data = [
            'title' => 'Buat Struktural',
        ];
        return view('Backend.Struktural.vaddstrktural', $data);
    }

    public function simpanstruktural()
    {
        Request()->validate(
            [
                'nip' => 'required|min:18|max:18',
                'namapegawai' => 'required',
                'tempatlahir' => 'required',
                'tgllahir' => 'required',
                'pendidikan' => 'required',
                'jabatanstruktur' => 'required',
                'alamat' => 'required',
                'fotopegawai' => 'required|image|mimes:png|max:2048|dimensions:width=400,height=565',
            ],
            [
                'nip.required' => 'Silahkan Nomor Induk Kepegawaian terlebih dahulu..!!',
                'nip.min' => 'NIP minimal 18 karakter..!!',
                'nip.max' => 'NIP maksimal 18 karakter..!!',
                'namapegawai.required' => 'Silahkan input nama pegawai terlebih dahulu..!!',
                'tempatlahir.required' => 'Silahkan masukan tempat lahir terlebih dahulu',
                'tgllahir.required' => 'Silahkan pilih tanggal terlebih dahulu',
                'pendidikan.required' => 'Silahkan input pendidikan terlebih dahulu',
                'alamat.required' => 'Silahkan input alamat pegawai terkebih dahulu',
                'jabatanstruktur.required' => 'Silahkan input nama jabatan struktural terlebih dahulu',
                'fotopegawai.required' => 'Silahkan upload foto pegawai terlebih dahulu..!!',
                'fotopegawai.max' => 'Ukuran foto pegawai minimal 2MB',
                'fotopegawai.mimes' => 'Foto pegawai yang di upload harus dan wajib berekstensi .Png',
                'fotopegawai.dimensions' => 'Lebar dan tinggi file struktur organisasi Maksimal 400 X 565 Piksel',
            ]
        );

        $file = Request()->fotopegawai;
        $name_file = time() . str_replace("", "", $file->getClientOriginalName());
        $file->move('foto struktural', $name_file);

        $data = [
            'nip' => Request()->nip,
            'namalengkap' => Request()->namapegawai,
            'slugstruktural' => Str::slug(Request()->namapegawai, '-'),
            'tempatlahir' => Request()->tempatlahir,
            'tanggallahir' => Request()->tgllahir,
            'pendidikan' => Request()->pendidikan,
            'alamat' => Request()->alamat,
            'jabatanstruktural' => Request()->jabatanstruktur,
            'fotostruktural' => $name_file,
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->Struktural->simpanstruktural($data);
        return redirect()->route('admin.daftarstruktural')->with('save', 'Pegawai struktural berhasil disimpan..!!');
    }


    public function editstruktural($id)
    {
        $data = [
            'title' => 'Update Data Pegawai Struktural',
            'updatestruktural' => $this->Struktural->editstruktural($id)
        ];
        return view('Backend.Struktural.veditstruktural', $data);
    }


    public function rubahstruktural($id)
    {
        Request()->validate(
            [
                'nip' => 'required|min:18|max:18',
                'namapegawai' => 'required',
                'tempatlahir' => 'required',
                'tgllahir' => 'required',
                'pendidikan' => 'required',
                'jabatanstruktur' => 'required',
                'alamat' => 'required',
            ],
            [
                'nip.required' => 'Silahkan Nomor Induk Kepegawaian terlebih dahulu..!!',
                'nip.min' => 'NIP minimal 18 karakter..!!',
                'nip.max' => 'NIP maksimal 18 karakter..!!',
                'namapegawai.required' => 'Silahkan input nama pegawai terlebih dahulu..!!',
                'tempatlahir.required' => 'Silahkan masukan tempat lahir terlebih dahulu',
                'tgllahir.required' => 'Silahkan pilih tanggal terlebih dahulu',
                'pendidikan.required' => 'Silahkan input pendidikan terlebih dahulu',
                'alamat.required' => 'Silahkan input alamat pegawai terkebih dahulu',
                'jabatanstruktur.required' => 'Silahkan input nama jabatan struktural terlebih dahulu',
            ]
        );

        $datafoto = Struktural::find($id); //Baca data foto berdasrakan id
        if (Request()->fotopegawai <> "") {
            Request()->validate(
                [
                    'fotopegawai' => 'required|image|mimes:png|max:2048|dimensions:width=400,height=565',
                ],
                [
                    'fotopegawai.required' => 'Silahkan upload foto pegawai terlebih dahulu..!!',
                    'fotopegawai.max' => 'Ukuran foto pegawai minimal 2MB',
                    'fotopegawai.mimes' => 'Foto pegawai yang di upload harus dan wajib berekstensi .Png',
                    'fotopegawai.dimensions' => 'Lebar dan tinggi file struktur organisasi Maksimal 400 X 565 Piksel',
                ]
            );

            $file = Request()->fotopegawai;
            $name_file = time() . str_replace("", "", $file->getClientOriginalName());
            $lokasigambar = 'foto struktural/' . $datafoto->fotostruktural; //mengarahakn ke lokas/folderi foto dan ke field foto
            File::delete($lokasigambar); //hapus foto yang lama
            $file->move('foto struktural', $name_file); //upload foto yang baru

            $data = [
                'nip' => Request()->nip,
                'namalengkap' => Request()->namapegawai,
                'slugstruktural' => Str::slug(Request()->namapegawai, '-'),
                'tempatlahir' => Request()->tempatlahir,
                'tanggallahir' => Request()->tgllahir,
                'pendidikan' => Request()->pendidikan,
                'alamat' => Request()->alamat,
                'jabatanstruktural' => Request()->jabatanstruktur,
                'fotostruktural' => $name_file,
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Struktural->rubahstruktural($id, $data);
        } else {
            $data = [
                'nip' => Request()->nip,
                'namalengkap' => Request()->namapegawai,
                'slugstruktural' => Str::slug(Request()->namapegawai, '-'),
                'tempatlahir' => Request()->tempatlahir,
                'tanggallahir' => Request()->tgllahir,
                'pendidikan' => Request()->pendidikan,
                'alamat' => Request()->alamat,
                'jabatanstruktural' => Request()->jabatanstruktur,
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Struktural->rubahstruktural($id, $data);
        }

        return redirect()->route('admin.daftarstruktural')->with('update', 'Data Struktural berhasil di update..!!');
    }

    public function hapusstruktural($id)
    {
        $datafoto = Struktural::find($id);
        $lokasigambar = 'foto struktural/' . $datafoto->fotostruktural;
        File::delete($lokasigambar);
        $this->Struktural->hapusstruktural($id);
        return redirect()->route('admin.daftarstruktural')->with('delete', 'Data Struktural berhasil dihapus..!!');
    }
}
