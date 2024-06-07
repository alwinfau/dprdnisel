<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Akd extends Model
{
    use HasFactory;

    public function tampilakd()
    {
        return DB::table('akds')
            ->join('users', 'users.id', '=', 'akds.iduser')
            ->select('akds.*', 'users.name')
            ->orderBy('akds.id', 'asc')
            ->get();
    }

    public function simpanakd($data)
    {
        DB::table('akds')->insert($data);
    }

    public function editakd($id)
    {
        return DB::table('akds')
            ->join('users', 'users.id', '=', 'akds.iduser')
            ->select('akds.*', 'users.name')
            ->where('akds.id', $id)
            ->first();
    }

    public function rubahakd($id, $data)
    {
        DB::table('akds')
            ->where('id', $id)
            ->update($data);
    }

    public function hapusakd($id)
    {
        DB::table('akds')
            ->where('id', $id)
            ->delete();
    }
}
