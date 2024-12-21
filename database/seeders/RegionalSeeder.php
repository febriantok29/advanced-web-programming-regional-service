<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Master\Regional;
use Illuminate\Support\Str;
use Faker\Factory as FakerFactory;

class RegionalSeeder extends Seeder
{
    use WithoutModelEvents;

    protected $model = Regional::class;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $regionals = ['Jakarta', 'Bandung', 'Surabaya', 'Semarang', 'Yogyakarta', 'Lampung', 'Palembang', 'Medan', 'Makassar', 'Manado'];

        $faker = FakerFactory::create(); // Inisialisasi Faker sekali saja

        foreach ($regionals as $regional) {
            $firstChar = Str::substr($regional, 0, 1); // Karakter pertama
            $centerChar = Str::substr($regional, 1, -1); // Karakter tengah
            $lastChar = Str::substr($regional, -1); // Karakter terakhir

            // Gabungkan dan ubah menjadi huruf besar
            $regionalCode = Str::upper($firstChar . $centerChar . $lastChar);

            // Simpan ke database
            $this->model::create([
                'name' => $regional,
                'code' => $regionalCode,
                'description' => $faker->optional()->sentence(), // Deskripsi opsional
            ]);
        }
    }
}
