<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MitraKerja extends Model
{
    use HasFactory;

    public function tampilmitrakerja()
    {
        return DB::table('mitra_kerjas')
            ->join('users', 'users.id', '=', 'mitra_kerjas.iduser')
            ->join('akds', 'akds.id', '=', 'mitra_kerjas.kodekomisi')
            ->select('mitra_kerjas.*', 'akds.akd', 'users.name')
            ->orderBy('mitra_kerjas.id', 'desc')
            ->get();
    }

    public function simpanmitrakerja($data)
    {
        DB::table('mitra_kerjas')->insert($data);
    }

    public function editmitrakerja($id)
    {
        return DB::table('mitra_kerjas')
            ->join('akds', 'akds.id', '=', 'mitra_kerjas.kodekomisi')
            ->select('mitra_kerjas.*', 'akds.akd')
            ->where('mitra_kerjas.id', $id)
            ->first();
    }

    public function rubahmitrakerja($id, $data)
    {
        DB::table('mitra_kerjas')
            ->where('id', $id)
            ->update($data);
    }

    public function hapusmitrakerja($id)
    {
        DB::table('mitra_kerjas')
            ->where('id', $id)
            ->delete();
    }
}
