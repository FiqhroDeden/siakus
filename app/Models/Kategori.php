<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'kategori';
    protected $fillable = ['jenis_kategori', 'nama', 'keterangan'];


    public function pemasukan()
    {
        return $this->hasMany(Pemasukan::class, 'id_laba_rugi', 'id');
    }
    public function pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class, 'id_kategori', 'id');
    }
    public function neraca_pemasukan()
    {
        return $this->hasMany(Pemasukan::class, 'id_neraca', 'id');
    }
    public function neraca_pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class, 'id_rekening', 'id');
    }
    public function pindah_buku()
    {
        return $this->hasMany(PindahBuku::class, 'to', 'id');
    }
    
}
