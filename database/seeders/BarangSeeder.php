<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $barang = [
            [
                'nama' => 'Macbook Pro 2020',
                'harga' => 20000000,
                'stok' => 100,
                'merk' => 'Apple',
                'kode' => 'BRG001'
            ],
            [
                'nama' => 'Asus',
                'harga' => 12000000,
                'stok' => 110,
                'merk' => 'Asus',
                'kode' => 'BRG002'
            ],
            [
                'nama' => 'Dell',
                'harga' => 15000000,
                'stok' => 100,
                'merk' => 'Dell',
                'kode' => 'BRG003'
            ],
        ];

        Barang::insert($barang);
    }
}
