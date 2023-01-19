<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengeluaran extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'pengeluaran';
    protected $fillable = ['kode', 'no_kontrak', 'uraian', 'id_kategori', 'jumlah_masuk', 'jumlah_pengeluaran', 'id_rekening', 'jumlah_utang', 'id_rekening_utang', 'jumlah_piutang', 'id_rekening_utang', 'jumlah_piutang', 'id_rekening_piutang', 'id_siswa', 'keterangan', 'tanggal_pengeluaran'];

    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'id', 'id_kategori');
    }
    public function rekening()
    {
        return $this->hasOne(Kategori::class, 'id', 'id_rekening');
    }
}
