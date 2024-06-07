<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Faq extends Model
{
    use HasFactory;

    public function tampilfaq()
    {
        return DB::table('faqs')
            ->join('users', 'users.id', '=', 'faqs.iduser')
            ->select('faqs.*', 'users.name')
            ->orderBy('faqs.id', 'desc')
            ->get();
    }

    public function simpanfaq($data)
    {
        DB::table('faqs')->insert($data);
    }

    public function editfaq($id)
    {
        return DB::table('faqs')
            ->join('users', 'users.id', '=', 'faqs.iduser')
            ->select('faqs.*', 'users.name')
            ->where('faqs.id', $id)
            ->first();
    }

    public function rubahfaq($id, $data)
    {
        DB::table('faqs')
            ->where('id', $id)
            ->update($data);
    }

    public function hapusfaq($id)
    {
        DB::table('faqs')
            ->where('id', $id)
            ->delete();
    }
}
