<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 3) as $index) {
            DB::table('cabang')->insert([
                'id_cabang' => $index,
                'nama_cabang' => "Cabang " . $index,
                'alamat' => $faker->address(),
                'kontak' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
