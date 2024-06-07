<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pengumuman extends Model
{
    use HasFactory;

    public function tampilpengumuman()
    {
        return DB::table('pengumumen')
            ->join('users', 'users.id', '=', 'pengumumen.iduser')
            ->select('pengumumen.*', 'users.name')
            ->orderBy('pengumumen.id', 'desc')
            ->get();
    }

    public function simpanpengumuman($data)
    {
        DB::table('pengumumen')->insert($data);
    }

    public function editpengumuman($id)
    {
        return DB::table('pengumumen')
            ->join('users', 'users.id', '=', 'pengumumen.iduser')
            ->select('pengumumen.*', 'users.name')
            ->where('pengumumen.id', $id)
            ->first();
    }

    public function rubahpengumuman($id, $data)
    {
        DB::table('pengumumen')
            ->where('id', $id)
            ->update($data);
    }

    public function deletepengumuman($id)
    {
        DB::table('pengumumen')
            ->where('id', $id)
            ->delete();
    }
}
