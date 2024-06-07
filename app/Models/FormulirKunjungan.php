<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FormulirKunjungan extends Model
{
    use HasFactory;

    public function tampilkunjungan()
    {
        return DB::table('formulir_kunjungans')
            ->select('formulir_kunjungans.*')
            ->orderBy('formulir_kunjungans.id', 'desc')
            ->get();
    }

    public function simpankunjungan($data)
    {
        DB::table('formulir_kunjungans')->insert($data);
    }

    public function editkunjungan($id)
    {
        return DB::table('formulir_kunjungans')
            ->select('formulir_kunjungans.*')
            ->where('formulir_kunjungans.id', $id)
            ->first();
    }

    public function rubahkunjungan($id, $data)
    {
        DB::table('formulir_kunjungans')
            ->where('id', $id)
            ->update($data);
    }

    public function hapuskunjungan($id)
    {
        DB::table('formulir_kunjungans')
            ->where('id', $id)
            ->delete();
    }
}
