<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Berita extends Model
{
    use HasFactory;

    public function semua_berita()
    {
        return DB::table('beritas')
            ->join('users', 'users.id', '=', 'beritas.iduser')
            ->select('beritas.*', 'users.name')
            // ->inRandomOrder()
            ->orderBy('beritas.id', 'desc')
            ->take(8)
            ->get();
    }

    public function tampilberitaumum()
    {
        return DB::table('beritas')
            ->join('users', 'users.id', '=', 'beritas.iduser')
            ->select('beritas.*', 'users.name')
            ->where('beritas.kategoriberita', '=', 'Berita Umum')
            ->orderBy('beritas.id', 'desc')
            ->paginate(10);
    }

    public function tampilberitasekretariat()
    {
        return DB::table('beritas')
            ->join('users', 'users.id', '=', 'beritas.iduser')
            ->select('beritas.*', 'users.name')
            ->where('beritas.kategoriberita', '=', 'Berita Sekretariat')
            ->orderBy('beritas.id', 'desc')
            ->paginate(10);
    }

    public function simpanberita($data)
    {
        DB::table('beritas')->insert($data);
    }

    public function editberita($id)
    {
        return DB::table('beritas')
            ->join('users', 'users.id', '=', 'beritas.iduser')
            ->select('beritas.*', 'users.name')
            ->where('beritas.id', $id)
            ->first();
    }

    public function rubahberita($id, $data)
    {
        DB::table('beritas')
            ->where('id', $id)
            ->update($data);
    }

    public function hapusberita($id)
    {
        DB::table('beritas')
            ->where('id', $id)
            ->delete();
    }

    public function detailberita($slug)
    {
        return DB::table('beritas')
            ->join('users', 'users.id', '=', 'beritas.iduser')
            ->select('beritas.*', 'users.name')
            ->where('beritas.slug', $slug)
            ->get();
    }
}
