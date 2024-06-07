<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TugasPokok extends Model
{
    use HasFactory;

    public function tampiltugaspokok()
    {
        return DB::table('tugas_pokoks')
            ->join('users', 'users.id', '=', 'tugas_pokoks.iduser')
            ->select('tugas_pokoks.*', 'users.name')
            ->where('tugas_pokoks.kategoritugas', 'DPRD')
            ->orderBy('tugas_pokoks.id', 'desc')
            ->get();
    }

    public function tampiltugaspokoksekretariat()
    {
        return DB::table('tugas_pokoks')
            ->join('users', 'users.id', '=', 'tugas_pokoks.iduser')
            ->select('tugas_pokoks.*', 'users.name')
            ->where('tugas_pokoks.kategoritugas', 'Sekretariat')
            ->orderBy('tugas_pokoks.id', 'desc')
            ->get();
    }

    public function simpantugaspokok($data)
    {
        DB::table('tugas_pokoks')->insert($data);
    }

    public function edittugaspokok($id)
    {
        return DB::table('tugas_pokoks')
            ->join('users', 'users.id', '=', 'tugas_pokoks.iduser')
            ->select('tugas_pokoks.*', 'users.name')
            ->where('tugas_pokoks.id', $id)
            ->first();
    }

    public function rubahtugaspokok($id, $data)
    {
        DB::table('tugas_pokoks')
            ->where('id', $id)
            ->update($data);
    }

    public function hapustugaspokok($id)
    {
        DB::table('tugas_pokoks')
            ->where('id', $id)
            ->delete();
    }
}
