<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Master\Customer;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create(); // Inisialisasi Faker sekali saja

        for ($i = 0; $i < 10; $i++) {
            $customerName = $faker->name;

            $firstChar = Str::substr($customerName, 0, 1); // Karakter pertama
            $centerChar = Str::substr($customerName, 1, -1); // Karakter tengah
            $lastChar = Str::substr($customerName, -1); // Karakter terakhir

            // Gabungkan dan ubah menjadi huruf besar
            $customerCode = Str::upper($firstChar . $centerChar . $lastChar);

            // Simpan ke database
            Customer::create([
                'regional_id' => $faker->numberBetween(1, 10),
                'name' => $customerName,
                'code' => $customerCode,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
            ]);
        }
    }
}
