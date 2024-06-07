<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    public function __construct()
    {
        $this->Galeri = new Galeri();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Geleri',
            'datafoto' => $this->Galeri->tampilfoto(),
            'datavideo' => $this->Galeri->tampilvideo(),
            'datalive' => $this->Galeri->tampillive()
        ];
        return view('Backend.Galeri.vgaleri', $data);
    }

    public function addgaleri()
    {
        $data = [
            'title' => 'Posting Galeri',
        ];
        return view('Backend.Galeri.vaddgaleri', $data);
    }

    public function simpangaleri()
    {
        if (Request()->kategorigaleri == "Foto") {

            Request()->validate(
                [
                    'fotogaleri' => 'required|image|mimes:jpg|max:2048|dimensions:width=1500,height=1000',
                    'judul' => 'required|max:150',
                    'deskripsigaleri' => 'required',
                    'kategorigaleri' => 'required',
                ],
                [

                    'judul.required' => 'Silahkan input judul galeri terlebih dahulu',
                    'judul.max' => 'Judul maksimal 150 karakter',
                    'deskripsigaleri.required' => 'Silahkan input deskripsi Foto terlebih dahulu',
                    'kategorigaleri.required' => 'Silahkan pilih kategori galeri',
                    'fotogaleri.required' => 'Gambar Cover Video Wajib di iisikan..!!',
                    'fotogaleri.max' => 'Ukuran Gambar Atau Cover Video minimal 2 MB',
                    'fotogaleri.mimes' => 'Gambar Atau Cover Video yang di upload harus berekstensi .jpg',
                    'fotogaleri.dimensions' => 'Lebar dan tinggi Gambar Atau Cover Video Maksimal 1500 X 1000 Piksel',
                ]
            );

            if (Request()->foto1 == "" || Request()->foto2 == "" || Request()->foto3 == "" || Request()->foto4 == "") {
                return redirect()->route('admin.addgaleri')->with('update', 'Silahkan lengkapi foto terlebih dahulu..!!');
            } else {
                $file = Request()->fotogaleri;
                $name_file = time() . str_replace("", "", $file->getClientOriginalName());
                $file->move('foto galeri', $name_file);

                $file1 = Request()->foto1;
                $name_file1 = time() . str_replace("", "", $file1->getClientOriginalName());
                $file1->move('foto galeri', $name_file1);

                $file2 = Request()->foto2;
                $name_file2 = time() . str_replace("", "", $file2->getClientOriginalName());
                $file2->move('foto galeri', $name_file2);

                $file3 = Request()->foto3;
                $name_file3 = time() . str_replace("", "", $file3->getClientOriginalName());
                $file3->move('foto galeri', $name_file3);

                $file4 = Request()->foto4;
                $name_file4 = time() . str_replace("", "", $file4->getClientOriginalName());
                $file4->move('foto galeri', $name_file4);

                $data = [
                    'judul' => Request()->judul,
                    'slugjudulgaleri' => Str::slug(Request()->judul, '-'),
                    'deskripsigaleri' => Request()->deskripsigaleri,
                    'gambargaleri' => $name_file,
                    'gambar1' => $name_file1,
                    'gambar2' => $name_file2,
                    'gambar3' => $name_file3,
                    'gambar4' => $name_file4,
                    'link' => null,
                    'kategori' => Request()->kategorigaleri,
                    'iduser' => Auth::user()->id,
                    'created_at' =>  date('Y-m-d H:i:s'),
                    'updated_at' =>  date('Y-m-d H:i:s'),
                ];
                $this->Galeri->simpangaleri($data);
            }
        } elseif (Request()->kategorigaleri == "Video On Demand") {
            Request()->validate(
                [
                    'fotogaleri' => 'required|image|mimes:jpg|max:2048|dimensions:width=1500,height=1000',
                    'judul' => 'required|max:150',
                    'deskripsigaleri' => 'required',
                    'kategorigaleri' => 'required',
                    'urlvideo' => 'required',
                ],
                [
                    'judul.required' => 'Silahkan input judul galeri terlebih dahulu terlebih dahulu',
                    'judul.max' => 'Judul galeri maksimal 150 karakter',
                    'deskripsigaleri.required' => 'Silahkan input deskripsi Video terlebih dahulu',
                    'urlvideo.required' => 'silahkan masukan URL video terlebih dahulu',
                    'kategorigaleri.required' => 'Silahkan pilih kategori galeri',
                    'fotogaleri.required' => 'Gambar Cover Video Wajib di iisikan..!!',
                    'fotogaleri.max' => 'Ukuran Gambar Atau Cover Video minimal 2MB',
                    'fotogaleri.mimes' => 'Ukuran Gambar Atau Cover Video yang di upload harus berekstensi .jpg',
                    'fotogaleri.dimensions' => 'Lebar dan tinggi Gambar Atau Cover Video Maksimal 1500 X 1000 Piksel',
                ]
            );

            $file = Request()->fotogaleri;
            $name_file = time() . str_replace("", "", $file->getClientOriginalName());
            $file->move('foto galeri', $name_file);

            $data = [
                'judul' => Request()->judul,
                'slugjudulgaleri' => Str::slug(Request()->judul, '-'),
                'deskripsigaleri' => Request()->deskripsigaleri,
                'gambargaleri' => $name_file,
                'link' => Request()->urlvideo,
                'kategori' => Request()->kategorigaleri,
                'iduser' => Auth::user()->id,
                'created_at' =>  date('Y-m-d H:i:s'),
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Galeri->simpangaleri($data);
        } else {
            Request()->validate(
                [
                    'fotogaleri' => 'required|image|mimes:jpg|max:2048|dimensions:width=1500,height=1000',
                    'judul' => 'required|max:150',
                    'deskripsigaleri' => 'required',
                    'kategorigaleri' => 'required',
                    'urlvideo' => 'required',
                ],
                [
                    'judul.required' => 'Silahkan input judul galeri terlebih dahulu',
                    'judul.max' => 'Judul galeri maksimal 150 karakter',
                    'deskripsigaleri.required' => 'Silahkan input deskripsi Live terlebih dahulu',
                    'urlvideo.required' => 'silahkan masukan URL Live terlebih dahulu',
                    'kategorigaleri.required' => 'Silahkan pilih kategori galeri',
                    'fotogaleri.required' => 'Gambar Cover Video Wajib di iisikan..!!',
                    'fotogaleri.max' => 'Ukuran Gambar Atau Cover Video minimal 2MB',
                    'fotogaleri.mimes' => 'Ukuran Gambar Atau Cover Video yang di upload harus berekstensi .jpg',
                    'fotogaleri.dimensions' => 'Lebar dan tinggi Gambar Atau Cover Video Maksimal 1500 X 1000 Piksel',
                ]
            );

            $file = Request()->fotogaleri;
            $name_file = time() . str_replace("", "", $file->getClientOriginalName());
            $file->move('foto galeri', $name_file);

            $data = [
                'judul' => Request()->judul,
                'slugjudulgaleri' => Str::slug(Request()->judul, '-'),
                'deskripsigaleri' => Request()->deskripsigaleri,
                'gambargaleri' => $name_file,
                'link' => Request()->urlvideo,
                'kategori' => Request()->kategorigaleri,
                'iduser' => Auth::user()->id,
                'created_at' =>  date('Y-m-d H:i:s'),
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->Galeri->simpangaleri($data);
        }
        return redirect()->route('admin.daftargaleri')->with('save', 'Galeri berhasil disimpan..!!');
    }


    public function editgaleri($id)
    {
        $data = [
            'title' => 'Update Galeri',
            'updategaleri' => $this->Galeri->editgaleri($id)
        ];
        return view('Backend.Galeri.veditgaleri', $data);
    }


    public function rubahgaleri($id)
    {
        $datafoto = Galeri::find($id); //Baca data foto berdasrakan id
        if (Request()->kategorigaleri == "Foto") {
            if (Request()->fotogaleri <> "") {
                $file = Request()->fotogaleri;
                $name_file = time() . str_replace("", "", $file->getClientOriginalName());
                $file->move('foto galeri', $name_file);

                $data = [
                    'judul' => Request()->judul,
                    'slugjudulgaleri' => Str::slug(Request()->judul, '-'),
                    'deskripsigaleri' => Request()->deskripsigaleri,
                    'gambargaleri' => $name_file,
                    'link' => null,
                    'kategori' => Request()->kategorigaleri,
                    'iduser' => Auth::user()->id,
                    'updated_at' =>  date('Y-m-d H:i:s'),
                ];
                $this->Galeri->rubahgaleri($id, $data);
            } elseif (Request()->foto1 <> "") {
                $file1 = Request()->foto1;
                $name_file1 = time() . str_replace("", "", $file1->getClientOriginalName());
                $file1->move('foto galeri', $name_file1);
                $data = [
                    'judul' => Request()->judul,
                    'slugjudulgaleri' => Str::slug(Request()->judul, '-'),
                    'deskripsigaleri' => Request()->deskripsigaleri,
                    'gambar1' => $name_file1,
                    'link' => null,
                    'kategori' => Request()->kategorigaleri,
                    'iduser' => Auth::user()->id,
                    'updated_at' =>  date('Y-m-d H:i:s'),
                ];
                $this->Galeri->rubahgaleri($id, $data);
            } elseif (Request()->foto2 <> "") {
                $file2 = Request()->foto2;
                $name_file2 = time() . str_replace("", "", $file2->getClientOriginalName());
                $file2->move('foto galeri', $name_file2);
                $data = [
                    'judul' => Request()->judul,
                    'slugjudulgaleri' => Str::slug(Request()->judul, '-'),
                    'deskripsigaleri' => Request()->deskripsigaleri,
                    'gambar2' => $name_file2,
                    'link' => null,
                    'kategori' => Request()->kategorigaleri,
                    'iduser' => Auth::user()->id,
                    'updated_at' =>  date('Y-m-d H:i:s'),
                ];
                $this->Galeri->rubahgaleri($id, $data);
            } elseif (Request()->foto3 <> "") {
                $file3 = Request()->foto3;
                $name_file3 = time() . str_replace("", "", $file3->getClientOriginalName());
                $file3->move('foto galeri', $name_file3);
                $data = [
                    'judul' => Request()->judul,
                    'slugjudulgaleri' => Str::slug(Request()->judul, '-'),
                    'deskripsigaleri' => Request()->deskripsigaleri,
                    'gambar3' => $name_file3,
                    'link' => null,
                    'kategori' => Request()->kategorigaleri,
                    'iduser' => Auth::user()->id,
                    'updated_at' =>  date('Y-m-d H:i:s'),
                ];
                $this->Galeri->rubahgaleri($id, $data);
            } elseif (Request()->foto4 <> "") {
                $file4 = Request()->foto4;
                $name_file4 = time() . str_replace("", "", $file4->getClientOriginalName());
                $file4->move('foto galeri', $name_file4);
                $data = [
                    'judul' => Request()->judul,
                    'slugjudulgaleri' => Str::slug(Request()->judul, '-'),
                    'deskripsigaleri' => Request()->deskripsigaleri,
                    'gambar4' => $name_file4,
                    'link' => null,
                    'kategori' => Request()->kategorigaleri,
                    'iduser' => Auth::user()->id,
                    'updated_at' =>  date('Y-m-d H:i:s'),
                ];
                $this->Galeri->rubahgaleri($id, $data);
            } else {
                Request()->validate(
                    [
                        'deskripsigaleri' => 'required',
                        'kategorigaleri' => 'required',
                    ],
                    [
                        'deskripsigaleri.required' => 'Silahkan input deskripsi Foto terlebih dahulu',
                        'kategorigaleri.required' => 'Silahkan pilih kategori galeri',
                    ]
                );
                $data = [
                    'judul' => Request()->judul,
                    'slugjudulgaleri' => Str::slug(Request()->judul, '-'),
                    'deskripsigaleri' => Request()->deskripsigaleri,
                    'link' => null,
                    'kategori' => Request()->kategorigaleri,
                    'iduser' => Auth::user()->id,
                    'created_at' =>  date('Y-m-d H:i:s'),
                    'updated_at' =>  date('Y-m-d H:i:s'),
                ];
                $this->Galeri->rubahgaleri($id, $data);
            }
        } elseif (Request()->kategorigaleri == "Video On Demand") {
            if (Request()->fotogaleri <> "") {
                Request()->validate(
                    [
                        'fotogaleri' => 'required|image|mimes:jpg|max:2048|dimensions:width=1500,height=1000',
                        'judul' => 'required|max:150',
                        'deskripsigaleri' => 'required',
                        'kategorigaleri' => 'required',
                        'urlvideo' => 'required',
                    ],
                    [
                        'judul.required' => 'Silahkan input judul galeri terlebih dahulu',
                        'judul.max' => 'Judul galeri maksimal 150 karakter',
                        'deskripsigaleri.required' => 'Silahkan input deskripsi Video terlebih dahulu',
                        'urlvideo.required' => 'silahkan masukan URL video terlebih dahulu',
                        'kategorigaleri.required' => 'Silahkan pilih kategori galeri',
                        'fotogaleri.required' => 'Gambar Cover Video Wajib di iisikan..!!',
                        'fotogaleri.max' => 'Ukuran Thumbnail Atau Cover Video minimal 1 MB',
                        'fotogaleri.mimes' => 'Gambar Cover Video yang di upload harus berekstensi .jpg',
                        'fotogaleri.dimensions' => 'Lebar dan tinggi Thumbnail Atau Cover Video Maksimal 1500 X 1000 Piksel',
                    ]
                );

                $file = Request()->fotogaleri;
                $name_file = time() . str_replace("", "", $file->getClientOriginalName());
                $lokasigambar = 'foto galeri/' . $datafoto->gambargaleri; //mengarahakn ke lokas/folderi foto dan ke field foto
                File::delete($lokasigambar); //hapus foto yang lama
                $file->move('foto galeri', $name_file); //upload foto yang baru

                $data = [
                    'judul' => Request()->judul,
                    'slugjudulgaleri' => Str::slug(Request()->judul, '-'),
                    'deskripsigaleri' => Request()->deskripsigaleri,
                    'gambargaleri' => $name_file,
                    'link' => Request()->urlvideo,
                    'kategori' => Request()->kategorigaleri,
                    'iduser' => Auth::user()->id,
                    'updated_at' =>  date('Y-m-d H:i:s'),
                ];
                $this->Galeri->rubahgaleri($id, $data);
            } else {
                $data = [
                    'judul' => Request()->judul,
                    'slugjudulgaleri' => Str::slug(Request()->judul, '-'),
                    'deskripsigaleri' => Request()->deskripsigaleri,
                    'link' => Request()->urlvideo,
                    'kategori' => Request()->kategorigaleri,
                    'iduser' => Auth::user()->id,
                    'updated_at' =>  date('Y-m-d H:i:s'),
                ];
                $this->Galeri->rubahgaleri($id, $data);
            }
        } elseif (Request()->kategorigaleri == "Live") {
            if (Request()->fotogaleri <> "") {
                Request()->validate(
                    [
                        'fotogaleri' => 'required|image|mimes:jpg|max:2048|dimensions:width=1500,height=1000',
                        'judul' => 'required|max:150',
                        'deskripsigaleri' => 'required',
                        'kategorigaleri' => 'required',
                        'urlvideo' => 'required',
                    ],
                    [
                        'judul.required' => 'Silahkan input judul galeri terlebih dahulu',
                        'judul.max' => 'Judul galeri maksimal 150 karakter',
                        'deskripsigaleri.required' => 'Silahkan input deskripsi Live terlebih dahulu',
                        'urlvideo.required' => 'silahkan masukan URL Live terlebih dahulu',
                        'kategorigaleri.required' => 'Silahkan pilih kategori galeri',
                        'fotogaleri.required' => 'Thumbnail Atau Cover Live Wajib diisikan..!!',
                        'fotogaleri.max' => 'UkuranThumbnail Atau Cover Live minimal 2MB',
                        'fotogaleri.mimes' => 'Thumbnail Atau Cover Live yang di upload harus berekstensi .jpg',
                        'fotogaleri.dimensions' => 'Lebar dan tinggi Thumbnail Atau Cover LIve Maksimal 1500 X 1000 Piksel',
                    ]
                );

                $file = Request()->fotogaleri;
                $name_file = time() . str_replace("", "", $file->getClientOriginalName());
                $lokasigambar = 'foto galeri/' . $datafoto->gambargaleri; //mengarahakn ke lokas/folderi foto dan ke field foto
                File::delete($lokasigambar); //hapus foto yang lama
                $file->move('foto galeri', $name_file); //upload foto yang baru

                $data = [
                    'judul' => Request()->judul,
                    'slugjudulgaleri' => Str::slug(Request()->judul, '-'),
                    'deskripsigaleri' => Request()->deskripsigaleri,
                    'gambargaleri' => $name_file,
                    'link' => Request()->urlvideo,
                    'kategori' => Request()->kategorigaleri,
                    'iduser' => Auth::user()->id,
                    'updated_at' =>  date('Y-m-d H:i:s'),
                ];
                $this->Galeri->rubahgaleri($id, $data);
            } else {
                $data = [
                    'judul' => Request()->judul,
                    'slugjudulgaleri' => Str::slug(Request()->judul, '-'),
                    'deskripsigaleri' => Request()->deskripsigaleri,
                    'link' => Request()->urlvideo,
                    'kategori' => Request()->kategorigaleri,
                    'iduser' => Auth::user()->id,
                    'updated_at' =>  date('Y-m-d H:i:s'),
                ];
                $this->Galeri->rubahgaleri($id, $data);
            }
        }
        return redirect()->route('admin.daftargaleri')->with('update', 'Galeri berhasil di update..!!');
    }

    public function hapusgaleri($id)
    {
        $datafoto = Galeri::find($id);
        $lokasigambar = 'foto galeri/' . $datafoto->gambargaleri;
        $lokasigambar1 = 'foto galeri/' . $datafoto->gambar1;
        $lokasigambar2 = 'foto galeri/' . $datafoto->gambar2;
        $lokasigambar3 = 'foto galeri/' . $datafoto->gambar3;
        $lokasigambar4 = 'foto galeri/' . $datafoto->gambar4;
        File::delete($lokasigambar, $lokasigambar1, $lokasigambar2, $lokasigambar3, $lokasigambar4);
        $this->Galeri->hapusgaleri($id);
        return redirect()->route('admin.daftargaleri')->with('delete', 'Data Struktural berhasil dihapus..!!');
    }
}
