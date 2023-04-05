<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Barang as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model; //Model Eloquent

class Barang extends Model
{
    protected $table = "barang"; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswas
    public $timestamps = false;
    protected $primaryKey = 'kode_barang';
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori_barang',
        'harga', 
        'qty',
    ];
}
