<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Agenda extends Model
{
    use HasFactory;

    public function tampilagendadprd()
    {
        return DB::table('agendas')
            ->join('users', 'users.id', '=', 'agendas.iduser')
            ->select('agendas.*', 'users.name')
            ->where('agendas.kategoriagenda', '=', 'Agenda DPRD')
            ->orderBy('agendas.id', 'desc')
            ->paginate(10);
    }

    public function tampilagendasekretariat()
    {
        return DB::table('agendas')
            ->join('users', 'users.id', '=', 'agendas.iduser')
            ->select('agendas.*', 'users.name')
            ->where('agendas.kategoriagenda', '=', 'Agenda Sekretariat')
            ->orderBy('agendas.id', 'desc')
            ->paginate(10);
    }

    public function simpanagenda($data)
    {
        DB::table('agendas')->insert($data);
    }

    public function editagenda($id)
    {
        return DB::table('agendas')
            ->join('users', 'users.id', '=', 'agendas.iduser')
            ->select('agendas.*', 'users.name')
            ->where('agendas.id', $id)
            ->first();
    }

    public function rubahagenda($id, $data)
    {
        DB::table('agendas')
            ->where('id', $id)
            ->update($data);
    }

    public function hapusagenda($id)
    {
        DB::table('agendas')
            ->where('id', $id)
            ->delete();
    }
}
