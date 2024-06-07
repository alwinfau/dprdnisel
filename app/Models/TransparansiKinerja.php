<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransparansiKinerja extends Model
{
    use HasFactory;

    public function tampilkinerja()
    {
        return DB::table('transparansi_kinerjas')
            ->join('users', 'users.id', '=', 'transparansi_kinerjas.iduser')
            ->select('transparansi_kinerjas.*', 'users.name')
            ->orderBy('transparansi_kinerjas.id', 'desc')
            ->get();
    }

    public function simpankinerja($data)
    {
        DB::table('transparansi_kinerjas')->insert($data);
    }

    public function editkinerja($id)
    {
        return DB::table('transparansi_kinerjas')
            ->join('users', 'users.id', '=', 'transparansi_kinerjas.iduser')
            ->select('transparansi_kinerjas.*', 'users.name')
            ->where('transparansi_kinerjas.id', $id)
            ->first();
    }

    public function rubahkinerja($id, $data)
    {
        DB::table('transparansi_kinerjas')
            ->where('id', $id)
            ->update($data);
    }

    public function deletekinerja($id)
    {
        DB::table('transparansi_kinerjas')
            ->where('id', $id)
            ->delete();
    }
}
