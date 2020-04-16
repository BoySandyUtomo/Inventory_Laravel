<?php

use App\BarangModel;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listBarang = [ 'Meja',
                        'Papan Tulis',
                        'Meja Dosen',
                        'Remote AC',
                        'Proyektor',
                        'Kursi',
                        'Kursi Meja',
                        'Stop Kontak',
                        'Spidol',
                        'Stop Kontak',
                        'Remote AC',
                        'Speaker',
                        'Papan Tulis',
                        'Proyektor',
                        'Spidol'];
        $listTotal = [ '25','1','1','1','1','15','60','3','2','5','1','1','2','40','1' ];
        $listRusak = [ '2' ,'0','0','0','1','1' ,'4' ,'0','0','0','0','0','1','3' ,'0' ];
        $isi = 0;
        $ruangan = 1;

        foreach ($listBarang as $barang) {
        	BarangModel::create([
                'id_ru' => $ruangan++,
                'nama_bar' => $barang,
                'total_bar' => $listTotal[$isi],
                'rusak_bar' => $listRusak[$isi++],
                'created_by' => 1,
                'updated_by' => rand(1,2)
                ]);
        }
    }
}
