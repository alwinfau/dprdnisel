<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaDewan;
use App\Models\Fraksi;
use App\Models\Dapil;
use App\Models\Akd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AnggotaDewanController extends Controller
{
    public function __construct()
    {
        $this->AnggotaDewan = new AnggotaDewan();
        $this->Fraksi = new Fraksi();
        $this->Dapil = new Dapil();
        $this->Akd = new Akd();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pimpinan DPRD',
            'datadewan' => $this->AnggotaDewan->tampildewan()
        ];
        return view('Backend.Dewan.vpimpinandprd', $data);
    }

    public function daftaranggotadewan()
    {
        $data = [
            'title' => 'Daftar Pimpinan Anggota DPRD',
            'dataanggota' => $this->AnggotaDewan->tampilanggotadprd()
        ];
        return view('Backend.Dewan.vanggotadprd', $data);
    }

    public function adddewan()
    {
        $data = [
            'title' => 'Tambah Pimpinan & Anggota',
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'datadapil' => $this->Dapil->tampildapil(),
            'dataakd' => $this->Akd->tampilakd()
        ];
        return view('Backend.Dewan.vadddewan', $data);
    }

    public function simpandewan()
    {
        Request()->validate(
            [
                'namadewan' => 'required',
                'jabatan' => 'required',
                'pendidikan' => 'required',
                'periode' => 'required',
                'tempatlahir' => 'required',
                'tgllahir' => 'required',
                'fraksi' => 'required',
                'jabatandifraksi' => 'required',
                'dapil' => 'required',
                'akd' => 'required',
                'jabatandiakd' => 'required',
                'fotodewan' => 'required|image|mimes:png|max:2048',
                'alamat' => 'required',
            ],
            [

                'namadewan.required' => 'Silahkan masukan nama lengkap dewan berserta gelap..!!',
                'namadewan.required' => 'Silahkan pilih jabatan dewan terlebih dahulu..!!',
                'pendidikan.required' => 'silahkan masukan pendidikan terakhir..!!',
                'periode.required' => 'Silahkan di pilih masa periode terlebih dahulu..!!',
                'tempatlahir.required' => 'silahkan masukan tempat tgl lahir..!!',
                'tgllahir.required' => 'Silahkan dippilih tanggal lahir terlebih dahulu..!!',
                'fraksi.required' => 'Silahkan pilih fraksi terlebih dahulu..!!',
                'jabatandifraksi.required' => 'Silahkan pilih jabatan dewan di fraksi terlebih dahulu..!!',
                'dapil.required' => 'Silahkan dippilih daerah pemeilihan terlebih dahulu..!!',
                'akd.required' => 'Silahkan dippilih AKD terlebih dahulu..!!',
                'jabatandiakd.required' => 'Silahkan dippilih jabatan dewan di AKD terlebih dahulu..!!',
                'fotodewan.required' => 'Silahkan upload Foto dewan terlebih dahulu..!!',
                'fotodewan.max' => 'Ukuran Gambar minimal 2MB',
                'fotodewan.mimes' => 'Logo yang di upload harus berekstensi .Png',
                'alamat.required' => 'Silahkan silahkan isikan alamat dewan terlebih dahulu..!!',
            ]
        );

        $file = Request()->fotodewan;
        $name_file = time() . str_replace("", "", $file->getClientOriginalName());
        $file->move('foto dewan', $name_file);

        $data = [
            'namadewan' => Request()->namadewan,
            'slugnama' => Str::slug(Request()->namadewan, '-'),
            'jabatan' => Request()->jabatan,
            'pendidikan' => Request()->pendidikan,
            'periode' => Request()->periode,
            'tmptlahir' => Request()->tempatlahir,
            'tgllahir' => Request()->tgllahir,
            'idfraksi' => Request()->fraksi,
            'jabatandifraksi' => Request()->jabatandifraksi,
            'iddapil' => Request()->dapil,
            'idakd' => Request()->akd,
            'jabatandiakd' => Request()->jabatandiakd,
            'fotodewan' => $name_file,
            'iduser' => Auth::user()->id,
            'alamat' => Request()->alamat,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];

        $this->AnggotaDewan->simpandewan($data);
        return redirect()->route('admin.daftaranggotadewan')->with('save', 'Data Pimpinan & Anggota Dewan berhasil disimpan..!!');
    }


    public function editdewan($id)
    {
        $data = [
            'title' => 'Update Pimpinan & Anggota',
            'updatedewan' => $this->AnggotaDewan->editdewan($id),
            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'datadapil' => $this->Dapil->tampildapil(),
            'dataakd' => $this->Akd->tampilakd()
        ];
        return view('Backend.Dewan.veditdewan', $data);
    }


    public function rubahdewan($id)
    {
        Request()->validate(
            [
                'namadewan' => 'required',
                'jabatan' => 'required',
                'pendidikan' => 'required',
                'periode' => 'required',
                'tempatlahir' => 'required',
                'tgllahir' => 'required',
                'fraksi' => 'required',
                'jabatandifraksi' => 'required',
                'dapil' => 'required',
                'akd' => 'required',
                'jabatandiakd' => 'required',
                'alamat' => 'required',
            ],
            [
                'namadewan.required' => 'Silahkan masukan nama lengkap dewan berserta gelap..!!',
                'namadewan.required' => 'Silahkan pilih jabatan dewan terlebih dahulu..!!',
                'pendidikan.required' => 'silahkan masukan pendidikan terakhir..!!',
                'periode.required' => 'Silahkan di pilih masa periode terlebih dahulu..!!',
                'tempatlahir.required' => 'silahkan masukan tempat tgl lahir..!!',
                'tgllahir.required' => 'Silahkan dippilih tanggal lahir terlebih dahulu..!!',
                'fraksi.required' => 'Silahkan pilih fraksi terlebih dahulu..!!',
                'jabatandifraksi.required' => 'Silahkan pilih jabatan dewan di fraksi terlebih dahulu..!!',
                'dapil.required' => 'Silahkan dippilih daerah pemeilihan terlebih dahulu..!!',
                'akd.required' => 'Silahkan dippilih AKD terlebih dahulu..!!',
                'jabatandiakd.required' => 'Silahkan dippilih jabatan dewan di AKD terlebih dahulu..!!',
                'alamat.required' => 'Silahkan silahkan isikan alamat dewan terlebih dahulu..!!',
            ]
        );

        $datafoto = AnggotaDewan::find($id); //Baca data foto berdasrakan id
        if (Request()->fotodewan <> "") {
            Request()->validate(
                [
                    'fotodewan' => 'required|image|mimes:png|max:2048',
                ],
                [
                    'fotodewan.required' => 'Silahkan upload Foto dewan terlebih dahulu..!!',
                    'fotodewan.max' => 'Ukuran Gambar minimal 2MB',
                    'fotodewan.mimes' => 'Logo yang di upload harus berekstensi .Png'
                ]
            );

            $file = Request()->fotodewan;
            $name_file = time() . str_replace("", "", $file->getClientOriginalName());
            $lokasigambar = 'foto dewan/' . $datafoto->fotodewan; //mengarahakn ke lokas/folderi foto dan ke field foto
            File::delete($lokasigambar); //hapus foto yang lama
            $file->move('foto dewan', $name_file); //upload foto yang baru

            $data = [
                'namadewan' => Request()->namadewan,
                'slugnama' => Str::slug(Request()->namadewan, '-'),
                'jabatan' => Request()->jabatan,
                'pendidikan' => Request()->pendidikan,
                'periode' => Request()->periode,
                'tmptlahir' => Request()->tempatlahir,
                'tgllahir' => Request()->tgllahir,
                'idfraksi' => Request()->fraksi,
                'jabatandifraksi' => Request()->jabatandifraksi,
                'iddapil' => Request()->dapil,
                'idakd' => Request()->akd,
                'jabatandiakd' => Request()->jabatandiakd,
                'fotodewan' => $name_file,
                'alamat' => Request()->alamat,
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->AnggotaDewan->rubahdewan($id, $data);
        } else {
            $data = [
                'namadewan' => Request()->namadewan,
                'slugnama' => Str::slug(Request()->namadewan, '-'),
                'jabatan' => Request()->jabatan,
                'pendidikan' => Request()->pendidikan,
                'periode' => Request()->periode,
                'tmptlahir' => Request()->tempatlahir,
                'tgllahir' => Request()->tgllahir,
                'idfraksi' => Request()->fraksi,
                'jabatandifraksi' => Request()->jabatandifraksi,
                'iddapil' => Request()->dapil,
                'idakd' => Request()->akd,
                'jabatandiakd' => Request()->jabatandiakd,
                'iduser' => Auth::user()->id,
                'alamat' => Request()->alamat,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->AnggotaDewan->rubahdewan($id, $data);
        }

        return redirect()->route('admin.daftaranggotadewan')->with('update', 'Data Pimpinan & Anggota Dewan berhasil di update..!!');
    }

    public function hapusdewan($id)
    {
        $datafoto = AnggotaDewan::find($id);
        $lokasigambar = 'foto dewan/' . $datafoto->fotodewan;
        File::delete($lokasigambar);
        $this->AnggotaDewan->hapusdewan($id);
        return redirect()->route('admin.daftardewan')->with('delete', 'Data Pimpinan & Anggota Dewan berhasil dihapus..!!');
    }


    public function detailanggotadprd($id)
    {
        $data = [
            'title' => 'Detail DPRD',
            'detaildprd' => $this->AnggotaDewan->detaildprd($id),

            'datafraksi' => $this->Fraksi->tampilfraksi(),
            'datadapil' => $this->Dapil->tampildapil(),
            'dataakd' => $this->Akd->tampilakd()
        ];
        return view('Backend.Dewan.vdetaildprd', $data);
    }
}
