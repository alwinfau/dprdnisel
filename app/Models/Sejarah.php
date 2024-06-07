<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sejarah extends Model
{
    use HasFactory;

    public function tampilsejarah()
    {
        return DB::table('sejarahs')
            ->join('users', 'users.id', '=', 'sejarahs.iduser')
            ->select('sejarahs.*', 'users.name')
            ->where('sejarahs.kategori', 'DPRD')
            ->orderBy('sejarahs.id', 'desc')
            ->get();
    }

    public function tampilsejarahsekretariat()
    {
        return DB::table('sejarahs')
            ->join('users', 'users.id', '=', 'sejarahs.iduser')
            ->select('sejarahs.*', 'users.name')
            ->where('sejarahs.kategori', 'Sekretariat')
            ->orderBy('sejarahs.id', 'desc')
            ->get();
    }

    public function simpansejarah($data)
    {
        DB::table('sejarahs')->insert($data);
    }

    public function editsejarah($id)
    {
        return DB::table('sejarahs')
            ->join('users', 'users.id', '=', 'sejarahs.iduser')
            ->select('sejarahs.*', 'users.name')
            ->where('sejarahs.id', $id)
            ->first();
    }

    public function rubahsejarah($id, $data)
    {
        DB::table('sejarahs')
            ->where('id', $id)
            ->update($data);
    }

    public function hapussejarah($id)
    {
        DB::table('sejarahs')
            ->where('id', $id)
            ->delete();
    }
}
