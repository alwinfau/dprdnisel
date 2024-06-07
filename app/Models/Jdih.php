<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Jdih extends Model
{
    use HasFactory;

    public function tampiljdih()
    {
        return DB::table('jdihs')
            ->join('users', 'users.id', '=', 'jdihs.iduser')
            ->select('jdihs.*', 'users.name')
            ->orderBy('jdihs.id', 'desc')
            ->get();
    }

    public function simpanjdih($data)
    {
        DB::table('jdihs')->insert($data);
    }

    public function editjdih($id)
    {
        return DB::table('jdihs')
            ->join('users', 'users.id', '=', 'jdihs.iduser')
            ->select('jdihs.*', 'users.name')
            ->where('jdihs.id', $id)
            ->first();
    }

    public function rubahjdih($id, $data)
    {
        DB::table('jdihs')
            ->where('id', $id)
            ->update($data);
    }

    public function deletejdih($id)
    {
        DB::table('jdihs')
            ->where('id', $id)
            ->delete();
    }
}
