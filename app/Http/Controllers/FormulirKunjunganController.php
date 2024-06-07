<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormulirKunjungan;
use App\Models\Akd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response; //Untuk download file
use Illuminate\Support\Facades\Http;

class FormulirKunjunganController extends Controller
{
    public function __construct()
    {
        $this->FormulirKunjungan = new FormulirKunjungan();
        $this->Akd = new Akd();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Kunjungan',
            'datakunjungan' => $this->FormulirKunjungan->tampilkunjungan()
        ];
        return view('Backend.Kunjungan.vkunjungan', $data);
    }

    public function addkunjungan()
    {
        $data = [
            'title' => 'Buat Kunjungan',
            'tampilakd' => $this->Akd->tampilakd()
        ];
        return view('Backend.Kunjungan.vaddkunjungan', $data);
    }

    public function simpankunjungan()
    {
        Request()->validate(
            [
                'namainstansi' => 'required',
                'kabupaten' => 'required',
                'provinsi' => 'required',
                'kategorikunjungan' => 'required',
                'kepada' => 'required',
                'akd' => 'required',
                'jumlahrombongan' => 'required',
                'tanggalkunjungan' => 'required',
                'jamkunjungan' => 'required',
                'keterangankunjungan' => 'required',
                'namanarahubung' => 'required',
                'noponsel' => 'required',
                'dokumenkunjungan' => 'required|mimes:pdf|max:1024',
            ],
            [
                'namainstansi.required' => 'Silahkan masukan nama instanasi/perusahaan terlbih dahulu..!!',
                'kabupaten.required' => 'Silahkan inputkan nama kabupaten terlebih dahulu..!!',
                'provinsi.required' => 'Silahkan inputkan provinsi terlebih dahulu..!!',
                'kategorikunjungan.required' => 'Silahkan pilih ketegori kunjunggan terlebih dahulu..!!',
                'kepada.required' => 'Silahkan pilih sasarn kunjungan terlebih dahulu..!!',
                'akd.required' => 'Silahkan pilih Alat Kelengkapan Dewan terlebih dahulu..!!',
                'jumlahrombongan.required' => 'Silahkan inputkan jumlah rombongan yang ingin berkunjung..!!',
                'tanggalkunjungan.required' => 'Silahkan masukan tanggal kunjungan terlebih dahulu..!!',
                'jamkunjungan.required' => 'Silahkan masukan jam berapa akan berkunnjung..!!',
                'keterangankunjungan.required' => 'Silahkan buat keterangan kunjungan terlebih dahulu..!!',
                'namanarahubung.required' => 'Silahkan masukan narahubung terlebih dahulu..!!',
                'noponsel.required' => 'Silahkan masukan No. Ponsel narahubung terlebih dahulu..!!',
                'dokumenkunjungan.required' => 'Silahkan file lampiran kunjungan terlebih dahulu..!!',
                'dokumenkunjungan.max' => 'Ukuran file lampiran kunjungan minimal 1MB',
                'dokumenkunjungan.mimes' => 'File lampiran kunjungan yang diupload harus berekstensi .Pdf'
            ]
        );

        $file = Request()->dokumenkunjungan;
        $name_file = time() . str_replace("", "", $file->getClientOriginalName());
        $file->move('dokumen kunjungan', $name_file);

        $data = [
            'instansi' => Request()->namainstansi,
            'kabupaten' => Request()->kabupaten,
            'provinsi' => Request()->provinsi,
            'kategorikunjungan' => Request()->kategorikunjungan,
            'kepada' => Request()->kepada,
            'akd' => Request()->akd,
            'jumlahrombongan' => Request()->jumlahrombongan,
            'tglkedatangan' => Request()->tanggalkunjungan,
            'jam' => Request()->jamkunjungan,
            'keterangankunjungan' => Request()->keterangankunjungan,
            'koordinator' => Request()->namanarahubung,
            'noponsel' => Request()->noponsel,
            'dokumenkunjungan' => $name_file,
            'statuskunjungan' => "Pending",
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->FormulirKunjungan->simpankunjungan($data);
        return redirect()->route('admin.kunjungan')->with('save', 'Pengajuan kunjungan berhasil diposting..!!');
    }


    public function editkunjungan($id)
    {
        $data = [
            'title' => 'Update Kunjungan',
            'updatekunjungan' => $this->FormulirKunjungan->editkunjungan($id)
        ];
        return view('Backend.Kunjungan.veditkunjungan', $data);
    }


    public function rubahkunjungan($id)
    {
        $data = [
            'statuskunjungan' => "Selesai",
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->FormulirKunjungan->rubahkunjungan($id, $data);
        return redirect()->route('admin.kunjungan')->with('update', 'Pengajuan kunjungan berhasil update..!!');
    }

    public function hapuskunjungan($id)
    {
        $datafoto = FormulirKunjungan::find($id);
        $lokasigambar = 'dokumen kunjungan/' . $datafoto->dokumenkunjungan;
        File::delete($lokasigambar);
        $this->FormulirKunjungan->hapuskunjungan($id);
        return redirect()->route('admin.kunjungan')->with('delete', 'PPID berhasil dihapus..!!');
    }


    public function downloadkunjungan($id)
    {
        $data = FormulirKunjungan::find($id);
        $lokasifile = 'dokumen kunjungan/' . $data->dokumenkunjungan;
        $header = array(
            'Content-Type: aplication/pdf',
        );
        return Response::download($lokasifile, $data->dokumenkunjungan, $header);
    }
}
