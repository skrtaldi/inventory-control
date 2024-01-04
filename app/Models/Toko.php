<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Toko extends Model
{
    use HasFactory;
    protected $table = 'toko';
    protected $fillable = ['kode', 'nama', 'jumlah', 'harga', 'supplier', 'minLimit', 'maxLimit', 'kategori_kode'];
}
