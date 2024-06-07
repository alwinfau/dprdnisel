<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Keputusandprd extends Model
{
    use HasFactory;

    public function tampilkeputusandprd()
    {
        return DB::table('keputusandprds')
            ->join('users', 'users.id', '=', 'keputusandprds.iduser')
            ->select('keputusandprds.*', 'users.name')
            ->orderBy('keputusandprds.id', 'desc')
            ->get();
    }

    public function simpankeputusandprd($data)
    {
        DB::table('keputusandprds')->insert($data);
    }

    public function editkeputusandprd($id)
    {
        return DB::table('keputusandprds')
            ->join('users', 'users.id', '=', 'keputusandprds.iduser')
            ->select('keputusandprds.*', 'users.name')
            ->where('keputusandprds.id', $id)
            ->first();
    }

    public function rubahkeputusandprd($id, $data)
    {
        DB::table('keputusandprds')
            ->where('id', $id)
            ->update($data);
    }

    public function hapuskeputusandprd($id)
    {
        DB::table('keputusandprds')
            ->where('id', $id)
            ->delete();
    }
}
