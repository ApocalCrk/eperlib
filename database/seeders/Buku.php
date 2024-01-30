<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku as createBuku;

class Buku extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buku = [
            [
                'isbn' => '9783161484100',
                'judul' => 'Machine Learning',
                'penulis' => 'Ferdy',
                'penerbit' => 'Gramedia',
                'tahun_terbit' => '2021-01-01',
                'jumlah_buku' => 10,
                'jumlah_halaman' => 100,
                'kategori' => 'Komputer',
                'rak' => 'A',
                'tentang' => '<p>Machine learning adalah salah satu cabang ilmu kecerdasan buatan yang mempelajari bagaimana membuat komputer belajar dari data. Belajar dari data berarti memberikan komputer kemampuan untuk memecahkan masalah dengan cara mengumpulkan dan menganalisis data, lalu menemukan pola yang tersembunyi di dalamnya. Setelah menemukan pola, komputer dapat membuat keputusan atau prediksi berdasarkan data yang telah dianalisis. Machine learning adalah salah satu cabang ilmu kecerdasan buatan yang mempelajari bagaimana membuat komputer belajar dari data. Belajar dari data berarti memberikan komputer kemampuan untuk memecahkan masalah dengan cara mengumpulkan dan menganalisis data, lalu menemukan pola yang tersembunyi di dalamnya. Setelah menemukan pola, komputer dapat membuat keputusan atau prediksi berdasarkan data yang telah dianalisis.</p>',
                'cover' => 'book/machine-learning.jpg'
            ]
        ];

        foreach ($buku as $item) {
            createBuku::create($item);
        }

    }
}
