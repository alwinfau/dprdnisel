<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Fraksi extends Model
{
    use HasFactory;

    public function tampilfraksi()
    {
        return DB::table('fraksis')
            ->join('users', 'users.id', '=', 'fraksis.iduser')
            ->select('fraksis.*', 'users.name')
            ->orderBy('fraksis.id', 'desc')
            ->get();
    }

    public function simpanfraksi($data)
    {
        DB::table('fraksis')->insert($data);
    }

    public function editfraksi($id)
    {
        return DB::table('fraksis')
            ->join('users', 'users.id', '=', 'fraksis.iduser')
            ->select('fraksis.*', 'users.name')
            ->where('fraksis.id', $id)
            ->first();
    }

    public function rubahfraksi($id, $data)
    {
        DB::table('fraksis')
            ->where('id', $id)
            ->update($data);
    }

    public function hapusfraksi($id)
    {
        DB::table('fraksis')
            ->where('id', $id)
            ->delete();
    }
}
