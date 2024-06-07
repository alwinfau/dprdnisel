<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AgendaController extends Controller
{
    public function __construct()
    {
        $this->Agenda = new Agenda();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Agenda',
            'agendadprd' => $this->Agenda->tampilagendadprd(),
            'agendasekretariat' => $this->Agenda->tampilagendasekretariat(),
        ];
        return view('Backend.Agenda.vagenda', $data);
    }

    public function addagenda()
    {
        $data = [
            'title' => 'Buat Agenda',
        ];
        return view('Backend.Agenda.vaddagenda', $data);
    }

    public function simpanagenda()
    {
        Request()->validate(
            [
                'tglagenda' => 'required',
                'namaagenda' => 'required',
                'deskripsiagenda' => 'required',
                'lokasi' => 'required',
                'kategoriagenda' => 'required',
            ],
            [
                'tglagenda.required' => 'Silahkan pilih tanggal agenda..!!',
                'namaagenda.required' => 'Silahkan input nama agenda..!!',
                'deskripsiagenda.required' => 'Silahkan input deskripsi agenda..!!',
                'lokasi.required' => 'Silahkan input lokasi agenda..!!',
                'kategoriagenda.required' => 'Silahkan pilih kategori agenda terlbih dahulu..!!',
            ]
        );

        $data = [
            'namaagenda' => Request()->namaagenda,
            'slug' => Str::slug(Request()->namaagenda, '-'),
            'tglagenda' => Request()->tglagenda,
            'deskripsiagenda' => Request()->deskripsiagenda,
            'lokasi' => Request()->lokasi,
            'kategoriagenda' => Request()->kategoriagenda,
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->Agenda->simpanagenda($data);
        return redirect()->route('admin.agenda')->with('save', 'Agenda berhasil disimpan..!!');
    }


    public function editagenda($id)
    {
        $data = [
            'title' => 'Update Agenda',
            'updateagenda' => $this->Agenda->editagenda($id),
        ];
        return view('Backend.Agenda.veditagenda', $data);
    }


    public function rubahagenda($id)
    {
        Request()->validate(
            [
                'tglagenda' => 'required',
                'namaagenda' => 'required',
                'deskripsiagenda' => 'required',
                'lokasi' => 'required',
                'kategoriagenda' => 'required',
            ],
            [
                'tglagenda.required' => 'Silahkan pilih tanggal agenda..!!',
                'namaagenda.required' => 'Silahkan input nama agenda..!!',
                'deskripsiagenda.required' => 'Silahkan input deskripsi agenda..!!',
                'lokasi.required' => 'Silahkan input lokasi agenda..!!',
                'kategoriagenda.required' => 'Silahkan pilih kategori agenda terlbih dahulu..!!',
            ]
        );

        $data = [
            'namaagenda' => Request()->namaagenda,
            'slug' => Str::slug(Request()->namaagenda, '-'),
            'tglagenda' => Request()->tglagenda,
            'deskripsiagenda' => Request()->deskripsiagenda,
            'lokasi' => Request()->lokasi,
            'kategoriagenda' => Request()->kategoriagenda,
            'iduser' => Auth::user()->id,
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->Agenda->rubahagenda($id, $data);
        return redirect()->route('admin.agenda')->with('update', 'Agenda berhasil diupdate..!!');
    }

    public function hapusagenda($id)
    {
        $this->Agenda->hapusagenda($id);
        return redirect()->route('admin.agenda')->with('delete', 'Agenda berhasil dihapus..!!');
    }
}
