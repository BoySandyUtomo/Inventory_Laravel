<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_bar';
    protected $fillable = ['id_ru', 'nama_bar', 'total_bar', 'rusak_bar', 'created_by', 'updated_by'];

    public function ruangan()
    {
    	return $this->belongsTo(RuanganModel::class, 'id_ru');
    }
}
