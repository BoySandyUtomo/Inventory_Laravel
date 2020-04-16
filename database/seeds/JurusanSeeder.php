<?php

use App\JurusanModel;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listJurusan = ['Ilmu Hukum',
                        'Manajemen',
                        'Administrasi Pendidikan',
                        'Agribisnis',
                        'Peternakan',
                        'Arsitektur',
                        'Ilmu Gizi',
                        'Budidaya Kelautan',
                        'Kimia',
                        'Bioteknologi',
                        'Hubungan Internasional',
                        'Sastra Jepang',
                        'Pendidikan Dokter Hewan',
                        'Sistem Informasi',
                        'Kedokteran Gigi'];
        $fakultas = 1;

        foreach ($listJurusan as $jurusan) {
        	JurusanModel::create([
                'id_fak' => $fakultas++,
                'nama_jur' => $jurusan
                ]);
        }
    }
}
