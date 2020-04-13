<?php

namespace App\Exports;
use App\BarangModel;
use App\RuanganModel;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BarangExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('Barang')
            ->select('barang.id_bar', 'ruangan.nama_ru', 'barang.nama_bar', 'barang.total_bar', 'barang.rusak_bar', 'user1.name as created_by', 'user2.name as updated_by', 'barang.created_at', 'barang.updated_at')
            ->leftJoin('users as user1', 'user1.id', '=', 'barang.created_by')
            ->leftJoin('users as user2', 'user2.id', '=', 'barang.updated_by')
            ->leftJoin('ruangan', 'ruangan.id_ru', '=', 'barang.id_ru')
            ->orderBy('id_bar')
            ->get();
    }


    public function headings(): array
    {
        return 
        [
            'Id',
            'Ruangan',
            'Barang',
            'Total',
            'Rusak',
            'Dibuat',
            'Diupdate',
            'Updated_at',
            'Created_at',
        ];
    }

}
