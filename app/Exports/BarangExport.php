<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BarangExport implements FromQuery, WithMapping, ShouldAutoSize, WithHeadings
{
    use Exportable;

    public function query()
    {
        return Barang::query();
    }

    public function map($barang): array
    {
        return [
            $barang->nama,
            $barang->harga,
            $barang->stok,
            $barang->merk,
            $barang->kode
        ];
    }

    public function headings(): array
    {
        return [
            'NAMA',
            'HARGA',
            'STOK',
            'MERK',
            'KODE',
        ];
    }
}
