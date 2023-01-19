<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'siswa';
    protected $fillable = ['nama', 'id_kelas', 'tanggal_masuk', 'tanggal_keluar', 'keterangan', 'status'];

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id', 'id_kelas');
    }
}
