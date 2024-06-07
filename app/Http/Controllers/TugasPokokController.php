<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TugasPokok;
use Illuminate\Support\Facades\Auth;

class TugasPokokController extends Controller
{
    public function __construct()
    {
        $this->TugasPokok = new TugasPokok();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Tugas Pokok',
            'datatugaspokok' => $this->TugasPokok->tampiltugaspokok()
        ];
        return view('Backend.Tugas Pokok.vtugaspokok', $data);
    }

    public function tampiltugaspokoksekretariat()
    {
        $data = [
            'title' => 'Tugas Pokok',
            'datatugaspokok' => $this->TugasPokok->tampiltugaspokoksekretariat()
        ];
        return view('Backend.Tugas Pokok.vtugaspokoksekretariat', $data);
    }

    public function addtugaspokok()
    {
        $data = [
            'title' => 'Tugas Pokok',
        ];
        return view('Backend.Tugas Pokok.vaddtugaspokok', $data);
    }

    public function simpantugaspokok()
    {
        Request()->validate(
            [
                'tugaspokok' => 'required',
                'kategori' => 'required',
            ],
            [
                'tugaspokok.required' => 'Silahkan isikan Tugas Pokok, Hak & Kewajiban terlebih dahulu..!!',
                'kategori.required' => 'Silahkan Pilih Kategori sejarah terlebih dahulu..!!',
            ]
        );

        $data = [
            'tugaspokok' => Request()->tugaspokok,
            'kategoritugas' => Request()->kategori,
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->TugasPokok->simpantugaspokok($data);
        return redirect()->route('admin.daftartugaspokok')->with('save', 'Tugas Pokok, Hak & Kewajiban Berhasil di Simpan..!!');
    }


    public function edittugaspokok($id)
    {
        $data = [
            'title' => 'Update Tugas Pokok',
            'edittugaspokok' => $this->TugasPokok->edittugaspokok($id)
        ];
        return view('Backend.Tugas Pokok.vedittugaspokok', $data);
    }


    public function rubahtugaspokok($id)
    {
        Request()->validate(
            [
                'tugaspokok' => 'required',
                'kategori' => 'required',
            ],
            [
                'tugaspokok.required' => 'Silahkan isikan Tugas Pokok, Hak & Kewajiban terlebih dahulu..!!',
                'kategori.required' => 'Silahkan Pilih Kategori sejarah terlebih dahulu..!!',
            ]
        );

        $data = [
            'tugaspokok' => Request()->tugaspokok,
            'kategoritugas' => Request()->kategori,
            'iduser' => Auth::user()->id,
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];

        $this->TugasPokok->rubahtugaspokok($id, $data);
        return redirect()->route('admin.daftartugaspokok')->with('update', 'Tugas Pokok, Hak & Kewajiban Berhasil diUpdate..!!');
    }

    public function hapustugaspokok($id)
    {
        $this->TugasPokok->hapustugaspokok($id);
        return redirect()->route('admin.daftartugaspokok')->with('delete', 'Tugas Pokok Berhasil dihapus');
    }
}
