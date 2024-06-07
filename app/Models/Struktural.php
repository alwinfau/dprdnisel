<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Struktural extends Model
{
    use HasFactory;

    public function tampilstruktural()
    {
        return DB::table('strukturals')
            ->join('users', 'users.id', '=', 'strukturals.iduser')
            ->select('strukturals.*', 'users.name')
            ->orderBy('strukturals.id', 'desc')
            ->get();
    }

    public function simpanstruktural($data)
    {
        DB::table('strukturals')->insert($data);
    }

    public function editstruktural($id)
    {
        return DB::table('strukturals')
            ->join('users', 'users.id', '=', 'strukturals.iduser')
            ->select('strukturals.*', 'users.name')
            ->where('strukturals.id', $id)
            ->first();
    }

    public function rubahstruktural($id, $data)
    {
        DB::table('strukturals')
            ->where('id', $id)
            ->update($data);
    }

    public function hapusstruktural($id)
    {
        DB::table('strukturals')
            ->where('id', $id)
            ->delete();
    }
}
