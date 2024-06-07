<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->Faq = new Faq();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Bantuan',
            'datafaq' => $this->Faq->tampilfaq()
        ];
        return view('Backend.Faq.vfaq', $data);
    }

    public function addfaq()
    {
        $data = [
            'title' => 'Posting FAQ',
        ];
        return view('Backend.Faq.vaddfaq', $data);
    }

    public function simpanfaq()
    {
        Request()->validate(
            [
                'pertanyaan' => 'required',
                'jawaban' => 'required',
            ],
            [
                'pertanyaan.required' => 'Silahkan judul atau pertanyaan terlebih dahulu..!!',
                'jawaban.required' => 'Silahkan isikan jawaban atau deskripsi terlebih dahulu..!!',
            ]
        );

        $data = [
            'pertanyaan' => Request()->pertanyaan,
            'jawaban' => Request()->jawaban,
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->Faq->simpanfaq($data);
        return redirect()->route('admin.daftarfaq')->with('save', 'FAQ Berhasil diSimpan..!!');
    }


    public function editfaq($id)
    {
        $data = [
            'title' => 'Update FAQ',
            'editfaq' => $this->Faq->editfaq($id)
        ];
        return view('Backend.Faq.veditfaq', $data);
    }


    public function rubahfaq($id)
    {
        Request()->validate(
            [
                'pertanyaan' => 'required',
                'jawaban' => 'required',
            ],
            [
                'pertanyaan.required' => 'Silahkan judul atau pertanyaan terlebih dahulu..!!',
                'jawaban.required' => 'Silahkan isikan jawaban atau deskripsi terlebih dahulu..!!',
            ]
        );

        $data = [
            'pertanyaan' => Request()->pertanyaan,
            'jawaban' => Request()->jawaban,
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];

        $this->Faq->rubahfaq($id, $data);
        return redirect()->route('admin.daftarfaq')->with('update', 'FAQ Berhasil diUpdate..!!');
    }

    public function hapusfaq($id)
    {
        $this->Faq->hapusfaq($id);
        return redirect()->route('admin.daftarfaq')->with('delete', 'FAQ Berhasil dihapus');
    }
}
