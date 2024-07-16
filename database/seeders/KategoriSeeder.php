<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $kategori = ['Reguler', 'Bed Cover', 'Sepatu'];

        foreach ($kategori as $index => $data) {
            // Menghasilkan angka acak dalam rentang 14 hingga 50 (7000/500 hingga 25000/500)
            $harga = $faker->numberBetween(14, 50) * 500;

            DB::table('kategori')->insert([
                'id_kategori' => $index + 1,
                'kategori' => $data,
                'harga' => $harga,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
