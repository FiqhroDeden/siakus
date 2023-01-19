<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PindahBuku extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'pindah_buku';
    protected $fillable = ['from', 'to', 'jumlah', 'tanggal', 'keterangan'];

    public function from_e()
    {
        return $this->hasOne(Kategori::class, 'id', 'from');
    }
    public function to_e()
    {
        return $this->hasOne(Kategori::class, 'id', 'to');
    }

}
