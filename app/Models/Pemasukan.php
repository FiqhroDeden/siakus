<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemasukan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'pemasukan';
    protected $fillable = ['kode', 'id_siswa', 'uraian', 'id_laba_rugi', 'jumlah_masuk', 'jumlah_keluar', 'id_neraca', 'keterangan', 'tanggal_pemasukan'];

    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'id', 'id_siswa');
    }
    public function laba_rugi()
    {
        return $this->hasOne(Kategori::class, 'id', 'id_laba_rugi');
    }
    public function neraca()
    {
        return $this->hasOne(Kategori::class, 'id', 'id_neraca');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_laba_rugi', 'id');
    }
}
