<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ruangan as createRuangan;

class Ruangan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ruangan = [
            [
                'kode_ruangan' => 'K01',
                'nama_ruangan' => 'Discussion Room 1'
            ]
        ];

        foreach ($ruangan as $item) {
            createRuangan::create($item);
        }
    }
}
