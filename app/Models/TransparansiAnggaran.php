<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransparansiAnggaran extends Model
{
    use HasFactory;

    public function tampiltransparansi_anggarans()
    {
        return DB::table('transparansi_anggarans')
            ->join('users', 'users.id', '=', 'transparansi_anggarans.iduser')
            ->select('transparansi_anggarans.*', 'users.name')
            ->orderBy('transparansi_anggarans.id', 'desc')
            ->get();
    }

    public function simpantransparansi_anggarans($data)
    {
        DB::table('transparansi_anggarans')->insert($data);
    }

    public function edittransparansi_anggarans($id)
    {
        return DB::table('transparansi_anggarans')
            ->join('users', 'users.id', '=', 'transparansi_anggarans.iduser')
            ->select('transparansi_anggarans.*', 'users.name')
            ->where('transparansi_anggarans.id', $id)
            ->first();
    }

    public function rubahtransparansi_anggarans($id, $data)
    {
        DB::table('transparansi_anggarans')
            ->where('id', $id)
            ->update($data);
    }

    public function hapustransparansi_anggarans($id)
    {
        DB::table('transparansi_anggarans')
            ->where('id', $id)
            ->delete();
    }
}
