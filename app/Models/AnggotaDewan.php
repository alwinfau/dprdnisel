<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AnggotaDewan extends Model
{
    use HasFactory;

    public function tampildewan()
    {
        return DB::table('anggota_dewans')
            ->join('users', 'users.id', '=', 'anggota_dewans.iduser')
            ->select('anggota_dewans.*', 'users.name')
            ->where('anggota_dewans.jabatan', '!=',  'Anggota')
            ->orderBy('anggota_dewans.id', 'desc')
            ->get();
    }

    public function tampilanggotadprd()
    {
        return DB::table('anggota_dewans')
            ->join('users', 'users.id', '=', 'anggota_dewans.iduser')
            ->select('anggota_dewans.*', 'users.name')
            // ->where('anggota_dewans.jabatan', '=',  'Anggota')
            ->orderBy('anggota_dewans.id', 'desc')
            ->get();
    }

    public function simpandewan($data)
    {
        DB::table('anggota_dewans')->insert($data);
    }

    public function editdewan($id)
    {
        return DB::table('anggota_dewans')
            ->join('users', 'users.id', '=', 'anggota_dewans.iduser')
            ->join('fraksis', 'fraksis.id', '=', 'anggota_dewans.idfraksi')
            ->join('dapils', 'dapils.id', '=', 'anggota_dewans.iddapil')
            ->join('akds', 'akds.id', '=', 'anggota_dewans.idakd')
            ->select('anggota_dewans.*', 'users.name', 'fraksis.fraksi', 'dapils.dapil', 'akds.akd')
            ->where('anggota_dewans.id', $id)
            ->first();
    }

    public function rubahdewan($id, $data)
    {
        DB::table('anggota_dewans')
            ->where('id', $id)
            ->update($data);
    }

    public function hapusdewan($id)
    {
        DB::table('anggota_dewans')
            ->where('id', $id)
            ->delete();
    }

    public function detaildprd($id)
    {
        return DB::table('anggota_dewans')
            ->join('users', 'users.id', '=', 'anggota_dewans.iduser')
            ->join('fraksis', 'fraksis.id', '=', 'anggota_dewans.idfraksi')
            ->join('dapils', 'dapils.id', '=', 'anggota_dewans.iddapil')
            ->join('akds', 'akds.id', '=', 'anggota_dewans.idakd')
            ->select('anggota_dewans.*', 'users.name', 'fraksis.fraksi', 'dapils.dapil', 'dapils.kecamatan', 'akds.akd')
            ->where('anggota_dewans.id', $id)
            ->first();
    }
}
