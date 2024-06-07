<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Galeri extends Model
{
    use HasFactory;

    public function tampilfoto()
    {
        return DB::table('galeris')
            ->join('users', 'users.id', '=', 'galeris.iduser')
            ->select('galeris.*', 'users.name')
            ->where('galeris.kategori', 'Foto')
            ->orderBy('galeris.id', 'desc')
            ->get();
    }

    public function tampilvideo()
    {
        return DB::table('galeris')
            ->join('users', 'users.id', '=', 'galeris.iduser')
            ->select('galeris.*', 'users.name')
            ->where('galeris.kategori', 'Video On Demand')
            ->orderBy('galeris.id', 'desc')
            ->get();
    }

    public function tampillive()
    {
        return DB::table('galeris')
            ->join('users', 'users.id', '=', 'galeris.iduser')
            ->select('galeris.*', 'users.name')
            ->where('galeris.kategori', 'Live')
            ->orderBy('galeris.id', 'desc')
            ->get();
    }

    public function simpangaleri($data)
    {
        DB::table('galeris')->insert($data);
    }

    public function editgaleri($id)
    {
        return DB::table('galeris')
            ->join('users', 'users.id', '=', 'galeris.iduser')
            ->select('galeris.*', 'users.name')
            ->where('galeris.id', $id)
            ->first();
    }

    public function rubahgaleri($id, $data)
    {
        DB::table('galeris')
            ->where('id', $id)
            ->update($data);
    }

    public function hapusgaleri($id)
    {
        DB::table('galeris')
            ->where('id', $id)
            ->delete();
    }
}
