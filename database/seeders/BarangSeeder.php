<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barang')->insert(
            [[
                'kode_barang' => 'PRD001',
                'nama_barang' => 'Indomie 10',
                'kategori_barang' => 'Makanan',
                'harga' => '3000',
                'qty' => '100',
            ],
            [
                'kode_barang' => 'PRD002',
                'nama_barang' => 'Pocari Sweat',
                'kategori_barang' => 'Minuman',
                'harga' => '6000',
                'qty' => '50',
            ],
            [
                'kode_barang' => 'PRD003',
                'nama_barang' => 'Silverqueen',
                'kategori_barang' => 'Snack',
                'harga' => '12500',
                'qty' => '45',
            ]]
        );
    }
}
