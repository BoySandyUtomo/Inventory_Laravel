<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    public $table = 'barang';
    protected $primaryKey = 'id_bar';
    protected $fillable = ['nama_bar', 'jumlah_bar'];
}
