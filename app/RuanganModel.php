<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jurusan;

class RuanganModel extends Model
{
    public $table = 'ruangan';
    protected $primaryKey = 'id_ru';
    protected $fillable = ['nama_ru', 'id_jur'];

    public function jurusan(){
    	return $this->belongsTo('App\JurusanModel', 'id_jur','id_jur');
    }
}
