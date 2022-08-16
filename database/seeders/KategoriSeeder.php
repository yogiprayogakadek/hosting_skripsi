<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            'Pura', 'Penginapan', 'Kesehatan', 'Kebudayaan'
        ];

        foreach($kategori as $kategori) {
            Kategori::create([
                'nama' => $kategori
            ]);
        }
    }
}
