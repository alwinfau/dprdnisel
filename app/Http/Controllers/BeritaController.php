<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->Berita = new Berita();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Berita',
            'beritaumum' => $this->Berita->tampilberitaumum(),
            'beritasekretariat' => $this->Berita->tampilberitasekretariat()
        ];
        return view('Backend.Berita.vberita', $data);
    }

    public function addberita()
    {
        $data = [
            'title' => 'Posting Berita',
        ];
        return view('Backend.Berita.vaddberita', $data);
    }

    public function simpanberita()
    {
        Request()->validate(
            [
                'judulberita' => 'required',
                'deskripsisingkat' => 'required|max:700',
                'dekripsiberita' => 'required',
                'kategoriberita' => 'required',
                'gambarberita' => 'required|image|mimes:jpg,png,jpeg,webp|max:2048',
            ],
            [
                'judulberita.required' => 'Silahkan input judul berita terlebih dahulu..!!',
                'deskripsisingkat.required' => 'Silahkan input deskripsi singkat terlebih dahulu..!!',
                'deskripsisingkat.max' => 'Silahkan input deskripsi singkat (Maksimal 700 Karakter)..!!',
                'dekripsiberita.required' => 'Silahkan input deskripsi berita..!!',
                'kategoriberita.required' => 'Silahkan di pilih kategori berita..!!',
                'gambarberita.required' => 'Silahkan upload gambar berita terlbih dahulu..!!',
                'gambarberita.max' => 'Ukuran Gambar minimal 2MB',
                'gambarberita.mimes' => 'format gambar tidak sesuai',
                'gambarberita.dimensions' => 'Lebar dan tinggi Gambar Maksimal 1500 X 1000 Piksel',
            ]
        );

        $file = Request()->gambarberita;
        $name_file = time() . str_replace("", "", $file->getClientOriginalName());
        $file->move('gambar berita', $name_file);

        $data = [
            'judulberita' => Request()->judulberita,
            'slug' => Str::slug(Request()->judulberita, '-'),
            'deskripsisingkat' => Request()->deskripsisingkat,
            'deskripsi' => Request()->dekripsiberita,
            'gambarberita' => $name_file,
            'kategoriberita' => Request()->kategoriberita,
            'iduser' => Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        $this->Berita->simpanberita($data);
        return redirect()->route('admin.berita')->with('save', 'Berita berhasil diposting..!!');
    }


    public function editberita($id)
    {
        $data = [
            'title' => 'Update Berita',
            'updateberita' => $this->Berita->editberita($id),
        ];
        return view('Backend.Berita.veditberita', $data);
    }


    public function rubahberita($id)
    {
        Request()->validate(
            [
                'judulberita' => 'required',
                'deskripsisingkat' => 'required|max:700',
                'dekripsiberita' => 'required',
                'kategoriberita' => 'required',

            ],
            [
                'judulberita.required' => 'Silahkan input judul berita terlebih dahulu..!!',
                'deskripsisingkat.required' => 'Silahkan input deskripsi singkat terlebih dahulu..!!',
                'deskripsisingkat.max' => 'Silahkan input deskripsi singkat (Maksimal 700 Karakter)..!!',
                'dekripsiberita.required' => 'Silahkan input deskripsi berita..!!',
                'kategoriberita.required' => 'Silahkan di pilih kategori berita..!!',
            ]
        );

        $datafoto = Berita::find($id); //Baca data foto berdasrakan id
        if (Request()->gambarberita <> "") {
            Request()->validate(
                [
                    'gambarberita' => 'required|image|mimes:jpg|max:2048|dimensions:width=1500,height=1000',
                ],
                [
                    'gambarberita.required' => 'Silahkan upload gambar berita terlbih dahulu..!!',
                    'gambarberita.max' => 'Ukuran Gambar minimal 2MB',
                    'gambarberita.mimes' => 'Logo yang di upload harus berekstensi .Png',
                    'gambarberita.dimensions' => 'Lebar dan tinggi Gambar Maksimal 1500 X 1000 Piksel',
                ]
            );

            $file = Request()->gambarberita;
            $name_file = time() . str_replace("", "", $file->getClientOriginalName());
            $lokasigambar = 'gambar berita/' . $datafoto->gambarberita; //mengarahakn ke lokas/folderi foto dan ke field foto
            File::delete($lokasigambar); //hapus foto yang lama
            $file->move('gambar berita', $name_file); //upload foto yang baru

            $data = [
                'judulberita' => Request()->judulberita,
                'slug' => Str::slug(Request()->judulberita, '-'),
                'deskripsisingkat' => Request()->deskripsisingkat,
                'deskripsi' => Request()->dekripsiberita,
                'gambarberita' => $name_file,
                'kategoriberita' => Request()->kategoriberita,
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Berita->rubahberita($id, $data);
        } else {
            $data = [
                'judulberita' => Request()->judulberita,
                'slug' => Str::slug(Request()->judulberita, '-'),
                'deskripsisingkat' => Request()->deskripsisingkat,
                'deskripsi' => Request()->dekripsiberita,
                'kategoriberita' => Request()->kategoriberita,
                'iduser' => Auth::user()->id,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Berita->rubahberita($id, $data);
        }

        return redirect()->route('admin.berita')->with('update', 'Berita berhasil diupdate..!!');
    }

    public function hapusberita($id)
    {
        $datafoto = Berita::find($id);
        $lokasigambar = 'gambar berita/' . $datafoto->gambarberita;
        File::delete($lokasigambar);
        $this->Berita->hapusberita($id);
        return redirect()->route('admin.berita')->with('delete', 'Berita berhasil dihapus..!!');
    }
}
