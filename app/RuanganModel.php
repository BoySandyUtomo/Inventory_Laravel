<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Fakultas;

class RuanganModel extends Model
{
    public $table = 'Ruangan';
    protected $primaryKey = 'id_rua';
    protected $fillable = ['nama_rua', 'id_fak'];

    public function fakultas(){
    	return $this->belongsTo('App\Fakultas', 'id_fak','id_fak');
    }
}
