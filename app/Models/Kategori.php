<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable = ['jenis_kategori', 'nama', 'keterangan'];


    public function pemasukan()
    {
        return $this->hasMany(Pemasukan::class, 'id_laba_rugi', 'id');
    }
}
