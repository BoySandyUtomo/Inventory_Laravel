<?php

use App\RuanganModel;
use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listRuangan = ['R-01',
                        'R-02',
                        'R-03',
                        'R-04',
                        'R-05',
                        'R-06',
                        'R-07',
                        'R-08',
                        'R-09',
                        'R-10',
                        'R-11',
                        'R-12',
                        'R-13',
                        'R-14',
                        'R-15'];
        $jurusan = 1;

        foreach ($listRuangan as $ruangan) {
        	RuanganModel::create([
                'id_jur' => $jurusan++,
                'nama_ru' => $ruangan
                ]);
        }
    }
}
