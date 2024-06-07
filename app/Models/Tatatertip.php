<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tatatertip extends Model
{
    use HasFactory;

    public function tampiltatatertib()
    {
        return DB::table('tatatertips')
            ->join('users', 'users.id', '=', 'tatatertips.iduser')
            ->select('tatatertips.*', 'users.name')
            ->orderBy('tatatertips.id', 'desc')
            ->get();
    }

    public function simpantatatertib($data)
    {
        DB::table('tatatertips')->insert($data);
    }

    public function edittatatertib($id)
    {
        return DB::table('tatatertips')
            ->join('users', 'users.id', '=', 'tatatertips.iduser')
            ->select('tatatertips.*', 'users.name')
            ->where('tatatertips.id', $id)
            ->first();
    }

    public function rubahtatatertib($id, $data)
    {
        DB::table('tatatertips')
            ->where('id', $id)
            ->update($data);
    }

    public function hapustatatertib($id)
    {
        DB::table('tatatertips')
            ->where('id', $id)
            ->delete();
    }
}
