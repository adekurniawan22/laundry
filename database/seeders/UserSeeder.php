<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $roleId = DB::table('role')->pluck('id_role')->toArray();
        $cabangId = DB::table('cabang')->pluck('id_cabang')->toArray();

        foreach (range(1, 10) as $index) {
            DB::table('user')->insert([
                'id_user' => $index,
                'id_role' => $faker->randomElement($roleId),
                'id_cabang' => $faker->randomElement($cabangId),
                'nama' => $faker->name(),
                'username' => $faker->userName(),
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'no_hp' => $faker->phoneNumber(),
                'alamat' => $faker->address(),
                'foto' => "profil.png",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
