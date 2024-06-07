<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Visimisistruktur extends Model
{
    use HasFactory;

    public function tampilvisimisi()
    {
        return DB::table('visimisistrukturs')
            ->join('users', 'users.id', '=', 'visimisistrukturs.iduser')
            ->select('visimisistrukturs.*', 'users.name')
            ->get();
    }

    public function tampilstruktur()
    {
        return DB::table('visimisistrukturs')
            ->join('users', 'users.id', '=', 'visimisistrukturs.iduser')
            ->select('visimisistrukturs.*', 'users.name')
            ->get();
    }

    public function simpanvisimisi($data)
    {
        DB::table('visimisistrukturs')->insert($data);
    }

    public function editvisimisi($id)
    {
        return DB::table('visimisistrukturs')
            ->join('users', 'users.id', '=', 'visimisistrukturs.iduser')
            ->select('visimisistrukturs.*', 'users.name')
            ->where('visimisistrukturs.id', $id)
            ->first();
    }

    public function rubahvisimisi($id, $data)
    {
        DB::table('visimisistrukturs')
            ->where('id', $id)
            ->update($data);
    }

    public function hapusvisimisi($id)
    {
        DB::table('visimisistrukturs')
            ->where('id', $id)
            ->delete();
    }
}
