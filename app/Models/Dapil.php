<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dapil extends Model
{
    use HasFactory;

    public function tampildapil()
    {
        return DB::table('dapils')
            ->join('users', 'users.id', '=', 'dapils.iduser')
            ->select('dapils.*', 'users.name')
            ->orderBy('dapils.id', 'desc')
            ->get();
    }

    public function simpandapil($data)
    {
        DB::table('dapils')->insert($data);
    }

    public function editdapil($id)
    {
        return DB::table('dapils')
            ->join('users', 'users.id', '=', 'dapils.iduser')
            ->select('dapils.*', 'users.name')
            ->where('dapils.id', $id)
            ->first();
    }

    public function rubahdapil($id, $data)
    {
        DB::table('dapils')
            ->where('id', $id)
            ->update($data);
    }

    public function hapusdapil($id)
    {
        DB::table('dapils')
            ->where('id', $id)
            ->delete();
    }
}
