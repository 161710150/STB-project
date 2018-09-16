<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarSiswa extends Model
{
    protected $table = 'daftar_siswas';
    protected $fillable = ['Nama_Siswa','Kelas','Jurusan','nilai1','nilai2'];
    public $timestamp = true;
}
