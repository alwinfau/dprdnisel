<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ppid extends Model
{
    use HasFactory;

    public function tampilppid()
    {
        return DB::table('ppids')
            ->join('users', 'users.id', '=', 'ppids.iduser')
            ->select('ppids.*', 'users.name')
            ->orderBy('ppids.id', 'desc')
            ->get();
    }

    public function simpanppid($data)
    {
        DB::table('ppids')->insert($data);
    }

    public function editppid($id)
    {
        return DB::table('ppids')
            ->join('users', 'users.id', '=', 'ppids.iduser')
            ->select('ppids.*', 'users.name')
            ->where('ppids.id', $id)
            ->first();
    }

    public function rubahppid($id, $data)
    {
        DB::table('ppids')
            ->where('id', $id)
            ->update($data);
    }

    public function hapusppid($id)
    {
        DB::table('ppids')
            ->where('id', $id)
            ->delete();
    }
}
