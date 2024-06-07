<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kategori extends Model
{
    use HasFactory;

    public function tampilkategori()
    {
        return DB::table('kategoris')
            ->join('users', 'users.id', '=', 'kategoris.iduser')
            ->select('kategoris.*', 'users.name')
            ->orderBy('kategoris.id', 'desc')
            ->get();
    }

    public function simpankategori($data)
    {
        DB::table('kategoris')->insert($data);
    }

    public function editkategori($id)
    {
        return DB::table('kategoris')
            ->join('users', 'users.id', '=', 'kategoris.iduser')
            ->select('kategoris.*', 'users.name')
            ->where('kategoris.id', $id)
            ->first();
    }

    public function rubahkategori($id, $data)
    {
        DB::table('kategoris')
            ->where('id', $id)
            ->update($data);
    }

    public function hapuskategori($id)
    {
        DB::table('kategoris')
            ->where('id', $id)
            ->delete();
    }
}
