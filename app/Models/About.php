<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table = 'setup_identitas';
    protected $fillable = ['nama', 'alamat', 'kota', 'provinsi', 'kodepos', 'no_telepon', 'no_hp', 'website', 'email', 'tgl_awal_periode'];
}
