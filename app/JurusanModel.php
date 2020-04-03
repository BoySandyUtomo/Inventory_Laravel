<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Fakultas;

class JurusanModel extends Model
{
    public $table = 'jurusan';
    protected $primaryKey = 'id_jur';
    protected $fillable = ['id_fak', 'nama_jur'];

    public function fakultas(){
    	return $this->belongsTo('App\FakultasModel', 'id_fak','id_fak');
    }
}
