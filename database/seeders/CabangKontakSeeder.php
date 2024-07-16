<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CabangKontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $kontakId = DB::table('user')->pluck('id_user')->toArray();
        $cabangId = DB::table('cabang')->pluck('id_cabang')->toArray();

        foreach ($cabangId as $data) {
            DB::table('cabang')->updateOrInsert(
                ['id_cabang' => $data], // Kondisi untuk menentukan record yang akan diperbarui atau dimasukkan
                [
                    'kontak' => $faker->randomElement($kontakId),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
