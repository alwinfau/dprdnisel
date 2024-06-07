<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // menampilkan foto user random menggunakan api dari gravatar
    public function gravatar($size = 100)
    {
        $default = "mm";
        return "https://www.gravatar.com/avatar/" . md5(strtolower(trim($this->email))) . "?d=" . urlencode($default) . "&s=" . $size;
    }


    public function tampil()
    {
        return DB::table('users')
            ->select('users.*')
            ->orderBy('users.id', 'desc')
            ->get();
    }

    public function tampiluserupt()
    {
        return DB::table('users')
            ->orderBy('users.id', 'desc')
            ->where('users.id', Auth::user()->id)
            ->get();
    }

    public function simpan($data)
    {
        DB::table('users')->insert($data);
    }

    public function edit($id)
    {
        return DB::table('users')
            // ->join('upt_models', 'upt_models.id', '=', 'users.idupt')
            ->select('users.*')
            ->where('users.id', $id)
            ->first();
    }

    public function rubah($id, $data)
    {
        DB::table('users')
            ->where('id', $id)
            ->update($data);
    }

    public function hapus($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->delete();
    }

    // untuk ganti avatar user

}
