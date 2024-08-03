<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID'); // Mengatur locale untuk Indonesia

        foreach (range(1, 10) as $index) {
            DB::table('pelanggan')->insert([
                'id_pelanggan' => $index,
                'nama' => $faker->name(), // Menghasilkan nama acak
                'no_hp' => '08' . $faker->numberBetween(1000000000, 9999999999), // Nomor telepon dengan format 08xxxxxxxxxx
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
