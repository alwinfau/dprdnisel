<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Carbon\Carbon;


class UserkModelController extends Controller
{
    public function __construct()
    {
        $this->User = new User();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Data User',
            'datauser' => $this->User->tampil(),
        ];
        return view('Backend.User.vuser',  $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah User',
        ];
        return view('Backend.User.vadduser', $data);
    }

    public function simpan()
    {
        Request()->validate(
            [
                'namauser' => 'required',
                'emailuser' => 'required',
                'passworduser' => 'required',
                'leveluser' => 'required',
            ],
            [
                'namauser.required' => '*) Nama Lengkap User tidak boleh kosong..!!',
                'emailuser.required' => '*) Email User tidak boleh kosong..!!',
                'passworduser.required' => '*) Password tidak boleh kosong..!!',
                'leveluser.required' => '*) Silahkan pilih level user telebih dahulu..!!',
            ]
        );

        // $file = Request()->fotoprofil;
        // $name_file = time() . str_replace("", "", $file->getClientOriginalName());
        // $file->move('img', $name_file);

        $data = [
            'name' => Request()->namauser,
            'email' => Request()->emailuser,
            'is_admin' => Request()->leveluser,
            // 'fotoprofil' => $name_file,
            'password' => bcrypt(Request()->passworduser),
            // 'password' => Hash::make(Request()->password),
            'user' => Auth::user()->name,
            'email_verified_at' =>  date('Y-m-d H:i:s'),
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ];
        // dd($data);
        $this->User->simpan($data);
        return redirect('/user')->with('Pesan', 'Data Berhasil Disimpan Kedalam Database..!!');
    }


    public function edit($id)
    {
        $data = [
            'title' => 'Data User',
            'datauser' => $this->User->edit($id),
        ];
        return view('Backend.User.vedituser', $data);
    }


    public function rubah($id)
    {
        Request()->validate(
            [
                'namauser' => 'required',
                'emailuser' => 'required',
                'leveluser' => 'required',
            ],
            [
                'namauser.required' => '*) Nama Lengkap User tidak boleh kosong..!!',
                'emailuser.required' => '*) Email User tidak boleh kosong..!!',
                'leveluser.required' => '*) Silahkan pilih level user telebih dahulu..!!',
            ]
        );

        $datafoto = User::find($id); //Baca data foto berdasrakan id
        if (Request()->fotoprofil <> "") {
            $file = Request()->fotoprofil;
            $name_file = time() . str_replace("", "", $file->getClientOriginalName());
            $lokasigambar = 'img/' . $datafoto->fotoprofil; //mengarahakn ke lokas/folderi foto dan ke field foto
            File::delete($lokasigambar); //hapus foto yang lama
            $file->move('img', $name_file); //upload foto yang baru

            $data = [
                'name' => Request()->namauser,
                'email' => Request()->emailuser,
                'is_admin' => Request()->leveluser,
                'fotoprofil' => $name_file,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->User->rubah($id, $data);
        } else {
            if (Request()->passworduser <> "") {
                $data = [
                    'name' => Request()->namauser,
                    'email' => Request()->emailuser,
                    'is_admin' => Request()->leveluser,
                    'password' => bcrypt(Request()->passworduser),
                    'updated_at' =>  date('Y-m-d H:i:s'),
                ];
                $this->User->rubah($id, $data);
            } else {
                $data = [
                    'name' => Request()->namauser,
                    'email' => Request()->emailuser,
                    'is_admin' => Request()->leveluser,
                    'updated_at' =>  date('Y-m-d H:i:s'),
                ];
                $this->User->rubah($id, $data);
            }
        }
        return redirect()->route('admin.daftaruser')->with('Pesan', 'Data Berhasil Diupdate Kedalam Database..!!');
    }

    public function hapus($id)
    {
        $datafoto = User::find($id);
        $lokasigambar = 'img/' . $datafoto->fotoprofil;
        File::delete($lokasigambar);
        $this->User->hapus($id);
        return redirect('/user')->with('Pesan', 'Data Berhasil di Hapus Kedalam Database..!!');
    }


    public function updateprofile_perAdmin($id)
    {
        Request()->validate(
            [
                'namauser' => 'required',
                'emailuser' => 'required',
                // 'passworduser' => 'required',
                'leveluser' => 'required',
            ],
            [
                'namauser.required' => '*) Nama Lengkap User tidak boleh kosong..!!',
                'emailuser.required' => '*) Email User tidak boleh kosong..!!',
                // 'passworduser.required' => '*) Password tidak boleh kosong..!!',
                'leveluser.required' => '*) Silahkan pilih level user telebih dahulu..!!',
            ]
        );

        $datafoto = User::find($id); //Baca data foto berdasrakan id
        if (Request()->fotoprofil <> "") {
            $file = Request()->fotoprofil;
            $name_file = time() . str_replace("", "", $file->getClientOriginalName());
            $lokasigambar = 'img/' . $datafoto->fotoprofil; //mengarahakn ke lokas/folderi foto dan ke field foto
            File::delete($lokasigambar); //hapus foto yang lama
            $file->move('img', $name_file); //upload foto yang baru
            $data = [
                'name' => Request()->namauser,
                'email' => Request()->emailuser,
                'is_admin' => Request()->leveluser,
                'fotoprofil' => $name_file,
                'updated_at' =>  date('Y-m-d H:i:s'),
            ];
            $this->User->rubah($id, $data);
        } else {
            if (Request()->passworduser <> "") {
                $data = [
                    'name' => Request()->namauser,
                    'email' => Request()->emailuser,
                    'is_admin' => Request()->leveluser,
                    'password' => bcrypt(Request()->passworduser),
                    'updated_at' =>  date('Y-m-d H:i:s'),
                ];
                $this->User->rubah($id, $data);
            } else {
                $data = [
                    'name' => Request()->namauser,
                    'email' => Request()->emailuser,
                    'is_admin' => Request()->leveluser,
                    'updated_at' =>  date('Y-m-d H:i:s'),
                ];
                $this->User->rubah($id, $data);
            }
        }
        return redirect('/home')->with('Pesan', 'Profile Anda Berhasil Diupdate..!!');
    }
}
